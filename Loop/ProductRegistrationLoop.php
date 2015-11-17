<?php
/*************************************************************************************/
/*      This file is part of the module ProductRegistration                           */
/*                                                                                   */
/*      Copyright (c) OpenStudio                                                     */
/*      email : dev@thelia.net                                                       */
/*      web : http://www.thelia.net                                                  */
/*                                                                                   */
/*      For the full copyright and license information, please view the LICENSE.txt  */
/*      file that was distributed with this source code.                             */
/*************************************************************************************/

namespace ProductRegistration\Loop;

use \DateTime;
use ProductRegistration\Model\ProductRegistrationQuery;
use Propel\Runtime\ActiveQuery\Criteria;
use Thelia\Core\Template\Element\BaseLoop;
use Thelia\Core\Template\Element\LoopResult;
use Thelia\Core\Template\Element\LoopResultRow;
use Thelia\Core\Template\Element\PropelSearchLoopInterface;
use Thelia\Core\Template\Loop\Argument\Argument;
use Thelia\Core\Template\Loop\Argument\ArgumentCollection;


/**
 * Class ProductRegistrationLoop
 * @package ProductRegistration\Loop
 */
class ProductRegistrationLoop extends BaseLoop implements PropelSearchLoopInterface
{
    /**
     * @param LoopResult $loopResult
     *
     * @return LoopResult
     */
    public function parseResults(LoopResult $loopResult)
    {
        foreach ($loopResult->getResultDataCollection() as $result) {
            /** @var \ProductRegistration\Model\ProductRegistration $result */
            $loopResultRow = new LoopResultRow($result);

            //$date_warranty = $result->getDatePurchase();
            $date_warranty = date_format($result->getDatePurchase(), 'Y-m-d');
            $t = new \DateTime($date_warranty);
            $last_warranty = $t->modify('+'.$result->getWarranty().' years');
            $now = new \DateTime();
            if($now < $last_warranty){
                $etat_warranty = true;
            }
            else {
                $etat_warranty = false;
            }
            $loopResultRow
                ->set("ID", $result->getId())
                ->set("TRANSCEIVER_ID", $result->getTransceiverId())
                ->set("ANTENNA_ID", $result->getAntennaId())
                ->set("SERIAL_NUMBER", $result->getSerialNumber())
                ->set("DATE_PURCHASE", $result->getDatePurchase())
                ->set("WHERE_PURCHASE", $result->getWherePurchase())
                ->set("OTHER_ANTENNA", $result->getOtherAntenna())
                ->set("WARRANTY", $result->getWarranty())
                ->set("ETAT_WARRANTY", $etat_warranty)
            ;

            $loopResult->addRow($loopResultRow);
        }

        return $loopResult;
    }

    /**
     * Definition of loop arguments
     *
     * example :
     *
     * public function getArgDefinitions()
     * {
     *  return new ArgumentCollection(
     *
     *       Argument::createIntListTypeArgument('id'),
     *           new Argument(
     *           'ref',
     *           new TypeCollection(
     *               new Type\AlphaNumStringListType()
     *           )
     *       ),
     *       Argument::createIntListTypeArgument('category'),
     *       Argument::createBooleanTypeArgument('new'),
     *       ...
     *   );
     * }
     *
     * @return \Thelia\Core\Template\Loop\Argument\ArgumentCollection
     */
    protected function getArgDefinitions()
    {
        return new ArgumentCollection(
            Argument::createIntListTypeArgument('customer_id')
        );
    }

    /**
     * this method returns a Propel ModelCriteria
     *
     * @return \Propel\Runtime\ActiveQuery\ModelCriteria
     */
    public function buildModelCriteria()
    {
        $search = ProductRegistrationQuery::create();

        $customerId = $this->getCustomerId();

        if (null !== $customerId) {
            $search->filterByCustomerId($customerId, Criteria::IN);
        }

        return $search;
    }
}
