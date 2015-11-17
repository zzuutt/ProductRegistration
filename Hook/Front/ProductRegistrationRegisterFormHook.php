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

namespace ProductRegistration\Hook\Front;

use ProductRegistration\ProductRegistration;
use Thelia\Core\Event\Hook\HookRenderEvent;
use Thelia\Core\Hook\BaseHook;
use ProductRegistration\Form\ProductRegistrationForm;

class ProductRegistrationRegisterFormHook extends BaseHook
{
    /**
     * Display information.
     * @param HookRenderEvent $event
     */
    public function onRegisterTop(HookRenderEvent $event)
    {
        $event->add($this->render(
            'register-top.html'
        ));
    }

    /**
     * Extra form fields.
     * @param HookRenderEvent $event
     */
    public function onRegisterFormBottom(HookRenderEvent $event)
    {
        $event->add($this->render(
            'register.html',
            array(
                'form' => $event->getArgument('form'),
                'messageDomain' => ProductRegistration::DOMAIN_NAME,
            )
        ));
    }

    /**
     * Css for extra form fields.
     * @param HookRenderEvent $event
     */
    public function onRegisterAfterCssInclude(HookRenderEvent $event)
    {
        $event
            ->add($this->addCSS('assets/js/bootstrap-datetimepicker/bootstrap-datetimepicker.min.css'))
            ->add($this->addCSS('assets/css/panel-product-registration.css'))
        ;
    }

    /**
     * Javascript for extra form fields.
     * @param HookRenderEvent $event
     */
    public function onRegisterAfterJsInclude(HookRenderEvent $event)
    {
        $event
            ->add($this->addJS('assets/js/moment-with-locales.min.js'))
            ->add($this->addJS('assets/js/bootstrap-datetimepicker/bootstrap-datetimepicker.min.js'))
            ->add($this->render('assets/js/init-js.html'))
        ;
    }
}
