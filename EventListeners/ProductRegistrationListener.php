<?php
/*************************************************************************************/
/*      This file is part of the module ProductRegistration                          */
/*                                                                                   */
/*      Copyright (c) OpenStudio                                                     */
/*      email : dev@thelia.net                                                       */
/*      web : http://www.thelia.net                                                  */
/*                                                                                   */
/*      For the full copyright and license information, please view the LICENSE.txt  */
/*      file that was distributed with this source code.                             */
/*************************************************************************************/

namespace ProductRegistration\EventListeners;

use ProductRegistration\ProductRegistration;
use ProductRegistration\Event\ProductRegistrationEvent;
use ProductRegistration\Event\ProductRegistrationCreateEvent;
use ProductRegistration\Event\ProductRegistrationEvents;
use ProductRegistration\Model\ProductRegistration as ProductRegistrationModel;
use ProductRegistration\Model\ProductRegistrationQuery;
use Propel\Runtime\ActiveQuery\Criteria;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Thelia\Core\Event\Customer\CustomerCreateOrUpdateEvent;
use Thelia\Core\Event\Customer\CustomerEvent;
use Thelia\Core\Event\TheliaEvents;
use Thelia\Core\HttpFoundation\Request;
use Thelia\Core\Template\ParserInterface;
use Thelia\Mailer\MailerFactory;
use Thelia\Model\ConfigQuery;

/**
 * Class ProductRegistrationListener
 * @package ProductRegistration\EventListeners
 */
class ProductRegistrationListener implements EventSubscriberInterface
{
    const THELIA_CUSTOMER_CREATE_FORM_NAME = 'thelia_customer_create';
    const THELIA_CUSTOMER_UPDATE_FORM_NAME = 'thelia_customer_profile_update';

    /** @var \Thelia\Core\HttpFoundation\Request */
    protected $request;

    /** @var \Thelia\Core\Template\ParserInterface */
    protected $parser;

    /** @var \Thelia\Mailer\MailerFactory */
    protected $mailer;

    /**
     * @param Request $request
     * @param ParserInterface $parser
     * @param MailerFactory $mailer
     */
    public function __construct(Request $request, ParserInterface $parser, MailerFactory $mailer)
    {
        $this->request = $request;
        $this->parser = $parser;
        $this->mailer = $mailer;
    }

    /**
     * Returns an array of event names this subscriber wants to listen to.
     *
     * The array keys are event names and the value can be:
     *
     *  * The method name to call (priority defaults to 0)
     *  * An array composed of the method name to call and the priority
     *  * An array of arrays composed of the method names to call and respective
     *    priorities, or 0 if unset
     *
     * For instance:
     *
     *  * array('eventName' => 'methodName')
     *  * array('eventName' => array('methodName', $priority))
     *  * array('eventName' => array(array('methodName1', $priority), array('methodName2'))
     *
     * @return array The event names to listen to
     *
     * @api
     */
    public static function getSubscribedEvents()
    {
        return array(
            TheliaEvents::AFTER_CREATECUSTOMER => array(
                'afterCreateCustomer', 100
            ),
            ProductRegistrationEvents::PRODUCT_REGISTRATION_UPDATE => array(
                "productRegistrationUpdate", 128
            ),
            ProductRegistrationEvents::PRODUCT_REGISTRATION_CREATE => array(
                "productRegistrationCreate", 128
            ),

        );
    }

    /**
     * @param CustomerEvent $event
     */
    public function afterCreateCustomer(CustomerEvent $event)
    {
        $pathInfo = $this->request->getPathInfo();
        if ($pathInfo !== '/'.ProductRegistration::WARRANTY_REGISTRATION_PAGE){
            return;
        }
        $form = $this->request->request->get(self::THELIA_CUSTOMER_CREATE_FORM_NAME);

        $productRegistration = ProductRegistrationQuery::create()->findOneBySerialNumber($form[ProductRegistrationFormListener::PRODUCT_REGISTRATION_SERIAL_NUMBER_FIELD_NAME]);

        if ($productRegistration) {
            // Serial number => no product registration to update.
            return;
        }

        $transceiverId = $form[ProductRegistrationFormListener::PRODUCT_REGISTRATION_TRANSCEIVER_ID_FIELD_NAME];
        $serialNumber  = $form[ProductRegistrationFormListener::PRODUCT_REGISTRATION_SERIAL_NUMBER_FIELD_NAME];
        $datePurchase  = $form[ProductRegistrationFormListener::PRODUCT_REGISTRATION_DATE_PURCHASE_FIELD_NAME];
        $antennaId     = $form[ProductRegistrationFormListener::PRODUCT_REGISTRATION_ANTENNA_ID_FIELD_NAME];
        $otherAntenna  = $form[ProductRegistrationFormListener::PRODUCT_REGISTRATION_OTHER_ANTENNA_ID_FIELD_NAME];
        $wherePurchase = $form[ProductRegistrationFormListener::PRODUCT_REGISTRATION_WHERE_PURCHASE_FIELD_NAME];

        $updateEvent = new ProductRegistrationEvent($event->getCustomer()->getId());
        $updateEvent
            ->setTransceiverId($transceiverId)
            ->setSerialNumber($serialNumber)
            ->setDatePurchase($datePurchase)
            ->setAntennaId($antennaId)
            ->setOtherAntenna($otherAntenna)
            ->setWherePurchase($wherePurchase)
        ;

        $event->getDispatcher()->dispatch(ProductRegistrationEvents::PRODUCT_REGISTRATION_UPDATE, $updateEvent);
    }

    /**
     * @param ProductRegistrationEvent $event
     */
    public function productRegistrationUpdate(ProductRegistrationEvent $event)
    {
        $productRegistration = ProductRegistrationQuery::create()->findOneByCustomerId($event->getCustomerId());

        if ($productRegistration === null) {
            $productRegistration = new ProductRegistrationModel();
            $productRegistration
                ->setCustomerId($event->getCustomerId())
            ;
        }

        $otherAntenna = $event->getOtherAntenna();
        $antennaId = $event->getAntennaId();
        $idOtherAntenna = ConfigQuery::create()->findOneByName('productRegistration_idOtherAntenna');
        $warranty = ConfigQuery::create()->findOneByName('productRegistration_maximumWarranty');
        if (($antennaId == 0) || ($antennaId == $idOtherAntenna)) {
            $warranty = ConfigQuery::create()->findOneByName('productRegistration_minimumWarranty');
        }

        $productRegistration
            ->setTransceiverId($event->getTransceiverId())
            ->setSerialNumber($event->getSerialNumber())
            ->setDatePurchase($event->getDatePurchase())
            ->setAntennaId($event->getAntennaId())
            ->setOtherAntenna($event->getOtherAntenna())
            ->setWherePurchase($event->getWherePurchase())
            ->setWarranty($warranty->getValue())
            ->save()
        ;
    }

    /**
     * @return mixed|null
     */
    protected function getProductRegistrationForm()
    {
        if (null != $form = $this->request->request->get("product_registration_customer_profile_update_form")) {
            return $form;
        }

        if (null != $form = $this->request->request->get(self::THELIA_CUSTOMER_CREATE_FORM_NAME)) {
            return $form;
        }

        return null;
    }

    /**
     * @param ProductRegistrationCreateEvent $event
     */
    public function productRegistrationCreate(ProductRegistrationCreateEvent $event)
    {

        $productRegistration = new ProductRegistrationModel();
        $productRegistration
                ->setCustomerId($event->getCustomerId())
        ;

        $otherAntenna = $event->getOtherAntenna();
        $antennaId = $event->getAntennaId();
        $idOtherAntenna = ConfigQuery::create()->findOneByName('productRegistration_idOtherAntenna');
        $warranty = ConfigQuery::create()->findOneByName('productRegistration_maximumWarranty');
        if (($antennaId === 0) || ($antennaId == $idOtherAntenna->getValue())) {
            $warranty = ConfigQuery::create()->findOneByName('productRegistration_minimumWarranty');
        }

        $productRegistration
            ->setTransceiverId($event->getTransceiverId())
            ->setSerialNumber($event->getSerialNumber())
            ->setDatePurchase($event->getDatePurchase())
            ->setAntennaId($event->getAntennaId())
            ->setOtherAntenna($event->getOtherAntenna())
            ->setWherePurchase($event->getWherePurchase())
            ->setWarranty($warranty->getValue())
            ->save()
        ;
    }
}
