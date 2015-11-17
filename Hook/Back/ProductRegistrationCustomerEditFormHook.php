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

namespace ProductRegistration\Hook\Back;

use ProductRegistration\ProductRegistration;
use Thelia\Core\Event\Hook\HookRenderEvent;
use Thelia\Core\Hook\BaseHook;
use ProductRegistration\Form\ProductRegistrationForm;

class ProductRegistrationCustomerEditFormHook extends BaseHook
{
    /**
     * Extra form fields.
     * @param HookRenderEvent $event
     */
    public function onCustomerEditForm(HookRenderEvent $event)
    {
        $event->add($this->render(
            'customer-edit.html'
        ));
    }

}
