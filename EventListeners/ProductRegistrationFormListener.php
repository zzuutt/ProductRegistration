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
use ProductRegistration\Model\ProductRegistrationQuery;
use Symfony\Component\Validator\Constraints;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Validator\ExecutionContextInterface;
use Thelia\Action\BaseAction;
use Thelia\Core\Event\TheliaEvents;
use Thelia\Core\Event\TheliaFormEvent;
use Thelia\Core\HttpFoundation\Request;
use Thelia\Core\Translation\Translator;

class ProductRegistrationFormListener extends BaseAction implements EventSubscriberInterface
{
    const PHP_DATETIME_FORMAT = "Y-m-d H:i:s";
    const PHP_INTLDATE_FORMAT = "yyyy-MM-dd HH:mm:ss";
    const MOMENT_JS_DATE_FORMAT = "YYYY-MM-DD HH:mm:ss";
    const PHP_DATEONLY_FORMAT = "Y-m-d";
    const PHP_INTLDATEONLY_FORMAT = "yyyy-MM-dd";
    const MOMENT_JS_DATEONLY_FORMAT = "YYYY-MM-DD";

    /** 'thelia_customer_create' is the name of the form used to create Customers (Thelia\Form\CustomerCreateForm). */
    const THELIA_CUSTOMER_CREATE_FORM_NAME = 'thelia_customer_create';

    /**
     * 'thelia_customer_profile_update' is the name of the form used to update accounts
     * (Thelia\Form\CustomerProfileUpdateForm).
     */
    const THELIA_ACCOUNT_UPDATE_FORM_NAME = 'thelia_customer_profile_update';

    const PRODUCT_REGISTRATION_SERIAL_NUMBER_FIELD_NAME = 'serial_number';

    const PRODUCT_REGISTRATION_TRANSCEIVER_ID_FIELD_NAME = 'transceiver_id';

    const PRODUCT_REGISTRATION_ANTENNA_ID_FIELD_NAME = 'antenna_id';

    const PRODUCT_REGISTRATION_OTHER_ANTENNA_ID_FIELD_NAME = 'other_antenna';

    const PRODUCT_REGISTRATION_DATE_PURCHASE_FIELD_NAME = 'date_purchase';

    const PRODUCT_REGISTRATION_WHERE_PURCHASE_FIELD_NAME = 'where_purchase';

    /** @var \Thelia\Core\HttpFoundation\Request */
    protected $request;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
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
            TheliaEvents::FORM_AFTER_BUILD.'.'.self::THELIA_CUSTOMER_CREATE_FORM_NAME => array('addProductRegistrationFieldsForRegister', 128)
        );
    }

    /**
     * Callback used to add some fields to the Thelia's CustomerCreateForm.
     * It add some fields : see below.
     * @param TheliaFormEvent $event
     */
    public function addProductRegistrationFieldsForRegister(TheliaFormEvent $event)
    {
        $pathInfo = $this->request->getPathInfo();
        if ($pathInfo !== '/'.ProductRegistration::WARRANTY_REGISTRATION_PAGE){
            return;
        }
        // Building additional fields
        $event->getForm()->getFormBuilder()
            ->add(
                'transceiver_id',
                'integer',
                array(
                    'constraints' => array(
                        new Constraints\NotBlank()
                    ),
                    'label' => Translator::getInstance()->trans(
                        'Transceiver',
                        array(),
                        ProductRegistration::DOMAIN_NAME
                    ),
                    'label_attr' => array(
                        'for' => 'transceiver_id'
                    )
                )
            )
            ->add(
                'antenna_id',
                'integer',
                array(
                    'constraints' => array(
                    ),
                    'required' => false,
                    'empty_data' => null,
                    'label' => Translator::getInstance()->trans(
                        'Antenna',
                        array(),
                        ProductRegistration::DOMAIN_NAME
                    ),
                    'label_attr' => array(
                        'for' => 'antenna_id'
                    )
                )
            )
            ->add(
                'serial_number',
                'text',
                array(
                    'constraints' => array(
                        new Constraints\Callback(array("methods" => array(
                            array($this, "checkSerialNumber")
                        )))
                    ),
                    'label' => Translator::getInstance()->trans(
                        'Serial number',
                        array(),
                        ProductRegistration::DOMAIN_NAME
                    ),
                    'label_attr' => array(
                        'for' => 'serial_number'
                    )
                )
            )
            ->add(
                'date_purchase',
                'date',
                array(
                    "constraints" => array(
                    ),
                    'label' => Translator::getInstance()->trans(
                        'Date purchase',
                        array(),
                        ProductRegistration::DOMAIN_NAME
                    ),
                    'label_attr' => array(
                        'for' => 'date_purchase',
                        "php_datetime_format" => static::PHP_DATEONLY_FORMAT,
                        "moment_js_date_format" => static::MOMENT_JS_DATEONLY_FORMAT,
                    ),
                    "widget" => "single_text",
                    "format" => static::PHP_INTLDATEONLY_FORMAT,
                )
            )
            ->add(
                'where_purchase',
                'text',
                array(
                    'constraints' => array(
                    ),
                    'required' => false,
                    'empty_data' => false,
                    'label' => Translator::getInstance()->trans(
                        'Where purchase',
                        array(),
                        ProductRegistration::DOMAIN_NAME
                    ),
                    'label_attr' => array(
                        'for' => 'where_purchase'
                    )
                )
            )
            ->add(
                'other_antenna',
                'text',
                array(
                    'constraints' => array(
                    ),
                    'required' => false,
                    'empty_data' => false,
                    'label' => Translator::getInstance()->trans(
                        'other antenna',
                        array(),
                        ProductRegistration::DOMAIN_NAME
                    ),
                    'label_attr' => array(
                        'for' => 'other_antenna'
                    )
                )
            )
        ;
    }


    /**
     * Validate a field only if serial number is unique
     *
     * @param string                    $value
     * @param ExecutionContextInterface $context
     */
    public function checkSerialNumber($value, ExecutionContextInterface $context)
    {
        $serialNumber = ProductRegistrationQuery::create()->findOneBySerialNumber($value);
        if ($serialNumber) {
            $context->addViolation(Translator::getInstance()->trans(
                "This serial number already exists.",
                array(),
                ProductRegistration::DOMAIN_NAME));
        }
    }

}
