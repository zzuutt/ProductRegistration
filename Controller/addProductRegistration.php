<?php
/*************************************************************************************/
/*                                                                                   */
/*      Thelia	                                                                     */
/*                                                                                   */
/*      Copyright (c) OpenStudio                                                     */
/*      email : info@thelia.net                                                      */
/*      web : http://www.thelia.net                                                  */
/*                                                                                   */
/*      This program is free software; you can redistribute it and/or modify         */
/*      it under the terms of the GNU General Public License as published by         */
/*      the Free Software Foundation; either version 3 of the License                */
/*                                                                                   */
/*      This program is distributed in the hope that it will be useful,              */
/*      but WITHOUT ANY WARRANTY; without even the implied warranty of               */
/*      MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the                */
/*      GNU General Public License for more details.                                 */
/*                                                                                   */
/*      You should have received a copy of the GNU General Public License            */
/*	    along with this program. If not, see <http://www.gnu.org/licenses/>.         */
/*                                                                                   */
/*************************************************************************************/
namespace ProductRegistration\Controller;

use ProductRegistration\Form\ProductRegistrationForm;
use ProductRegistration\ProductRegistration;
use ProductRegistration\Event\ProductRegistrationCreateEvent;
use ProductRegistration\Event\ProductRegistrationEvents;
use Thelia\Controller\Front\BaseFrontController;
use Thelia\Core\Event\TheliaEvents;
use Thelia\Core\Security\Exception\AuthenticationException;
use Thelia\Form\Exception\FormValidationException;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Thelia\Log\Tlog;
use Thelia\Model\ConfigQuery;
use Thelia\Tools\URL;

/**
 * Class ProductRegistration
 * @package ProductRegistration
 * @author zzuutt <zzuutt34@free.fr>
 */
class addProductRegistration extends BaseFrontController
{

    protected $useFallbackTemplate = true;

    /**
     * Display the add-product-warranty-registration template or login template if no customer logged
     */
    public function viewAddProductRegistrationAction()
    {
        if ($this->getSecurityContext()->hasCustomerUser()) {
            // Redirect to home page
            return $this->render("add-product-warranty-registration");
        }

        return $this->render("login");
    }

    public function createAction(){

        $this->checkAuth();

        $addProductCreate = new ProductRegistrationForm($this->getRequest());//$this->createForm(ProductRegistration::PRODUCT_REGISTRATION_ADD_PRODUCT);
        $message = false;
        try {
            $customer = $this->getSecurityContext()->getCustomerUser();
            $form = $this->validateForm($addProductCreate, "post");
            $event = $this->createProductRegistrationEvent($form);
            $event = $event->setCustomerId($customer->getId());

            $this->dispatch(ProductRegistrationEvents::PRODUCT_REGISTRATION_CREATE, $event);

            return $this->generateSuccessRedirect($addProductCreate);

        } catch (FormValidationException $e) {
            $message = $this->getTranslator()->trans("Please check your input: %s", ['%s' => $e->getMessage()], ProductRegistration::DOMAIN_NAME);
        } catch (\Exception $e) {
            $message = $this->getTranslator()->trans("Sorry, an error occured: %s", ['%s' => $e->getMessage()], ProductRegistration::DOMAIN_NAME);
        }
        if (null !== $message) {
            \Thelia\Log\Tlog::getInstance()->error(sprintf("Error during add product warranty registration process : %s", $message));

            $addProductCreate->setErrorMessage($message);

            $this->getParserContext()
                ->addForm($addProductCreate)
                ->setGeneralError($message)
            ;

            // Redirect to error URL if defined
            if ($addProductCreate->hasErrorUrl()) {
                return $this->generateErrorRedirect($addProductCreate);
            }
        }

    }


    protected function createProductRegistrationEvent($form)
    {
        return new ProductRegistrationCreateEvent(
            $form->get("transceiver_id")->getData(),
            $form->get("antenna_id")->getData(),
            $form->get("other_antenna")->getData(),
            $form->get("serial_number")->getData(),
            $form->get("date_purchase")->getData(),
            $form->get("where_purchase")->getData()
        );
    }

}
