<?php
/*************************************************************************************/
/*      This file is part of the module ProductRegistration                               */
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
use Thelia\Core\Event\Hook\HookRenderBlockEvent;
use Thelia\Core\Hook\BaseHook;

class ProductRegistrationAccountDisplayHook extends BaseHook
{
    public function onAccountAdditional(HookRenderBlockEvent $event)
    {
        $customer = $this->getCustomer();

        if (is_null($customer)) {
            // No customer => nothing to do.
            return;
        }

        $customerId = $customer->getId();

        if ($customerId <= 0) {
            // Wrong customer => return.
            return;
        }

        $title = $this->trans('My registered products', [], ProductRegistration::DOMAIN_NAME);

        $event->add(array(
            'id'      => $customerId,
            'title'   => $title,
            'content' => $this->render(
                'account-additional.html',
                array(
                    'customer_id' => $customerId,
                    'messageDomain' => ProductRegistration::DOMAIN_NAME,
                    'title'      => $title,
                )
            ),
        ));
    }
}
