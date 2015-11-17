<?php
/*************************************************************************************/
/*      This file is part of the Thelia package.                                     */
/*                                                                                   */
/*      Copyright (c) OpenStudio                                                     */
/*      email : dev@thelia.net                                                       */
/*      web : http://www.thelia.net                                                  */
/*                                                                                   */
/*      For the full copyright and license information, please view the LICENSE.txt  */
/*      file that was distributed with this source code.                             */
/*************************************************************************************/

namespace ProductRegistration;

//use ProductRegistration\Model\ProductRegistration;
use ProductRegistration\Model\ProductRegistrationQuery;
use Propel\Runtime\Connection\ConnectionInterface;
use Thelia\Module\BaseModule;
use Thelia\Install\Database;
use Thelia\Model\ConfigQuery;

class ProductRegistration extends BaseModule
{
    /** @var string */
    const DOMAIN_NAME = 'productregistration';
    const WARRANTY_REGISTRATION_PAGE = 'warranty-registration';
    const PRODUCT_REGISTRATION_ADD_PRODUCT = "product.registration.form";

    /*
     * You may now override BaseModuleInterface methods, such as:
     * install, destroy, preActivation, postActivation, preDeactivation, postDeactivation
     *
     * Have fun !
     */
    /**
     * @param ConnectionInterface $con
     */
    public function postActivation(ConnectionInterface $con = null)
    {
        $database = new Database($con);

        try {
            ProductRegistrationQuery::create()->findOne();
        } catch (\Exception $e) {
            $database->insertSql(null, array(__DIR__ . "/Config/thelia.sql"));
        }

        ConfigQuery::write('productRegistration_minimumWarranty', 2, true, true);
        ConfigQuery::write('productRegistration_maximumWarranty', 5, true, true);
        ConfigQuery::write('productRegistration_idOtherAntenna', 9999, true, true);
    }

}
