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

namespace ProductRegistration\Event;

/**
 * Class ProductRegistrationEvents
 * @package ProductRegistration\Event
 */
class ProductRegistrationEvents
{
    const PRODUCT_REGISTRATION_UPDATE = "action.front.product_registration.update";
    const PRODUCT_REGISTRATION_CREATE = "action.front.product_registration.create";
}
