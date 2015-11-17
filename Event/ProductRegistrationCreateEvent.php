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

use ProductRegistration\Model\ProductRegistration;
use Thelia\Core\Event\ActionEvent;

/**
 * Class ProductRegistrationEvent
 * @package ProductRegistration\Event
 */
class ProductRegistrationCreateEvent extends ActionEvent
{
    /** @var int */
    protected $transceiverId;

    /** @var int */
    protected $antennaId;

    /** @var string */
    protected $otherAntenna;

    /** @var string */
    protected $serialNumber;

    /** @var date */
    protected $datePurchase;

    /** @var string */
    protected $wherePurchase;

    /** @var int */
    protected $warranty;

    /**
     * @param int $customerId
     */
    protected $customerId;

    public function __construct($transceiverId, $antennaId, $otherAntenna, $serialNumber, $datePurchase, $wherePurchase)
    {
        $this->transceiverId = $transceiverId;
        $this->antennaId = $antennaId;
        $this->otherAntenna = $otherAntenna;
        $this->serialNumber = $serialNumber;
        $this->datePurchase = $datePurchase;
        $this->wherePurchase = $wherePurchase;
    }

    /**
     * @param int $customerId
     *
     * @return ProductRegistration
     */
    public function setCustomerId($customerId)
    {
        $this->customerId = $customerId;

        return $this;
    }

    /**
     * @return int
     */
    public function getCustomerId()
    {
        return $this->customerId;
    }

    /**
     * @param mixed $transceiverId
     *
     * @return ProductRegistration
     */
    public function setTransceiverId($transceiverId)
    {
        $this->transceiverId = $transceiverId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getTransceiverId()
    {
        return $this->transceiverId;
    }

    /**
     * @param mixed $antennaId
     *
     * @return ProductRegistration
     */
    public function setAntennaId($antennaId)
    {
        $this->antennaId = $antennaId;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getAntennaId()
    {
        return $this->antennaId;
    }

    /**
     * @param mixed $otherAntenna
     *
     * @return ProductRegistration
     */
    public function setOtherAntenna($otherAntenna)
    {
        $this->otherAntenna = $otherAntenna;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getOtherAntenna()
    {
        return $this->otherAntenna;
    }

    /**
     * @param mixed $serialNumber
     *
     * @return ProductRegistration
     */
    public function setSerialNumber($serialNumber)
    {
        $this->serialNumber = $serialNumber;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getSerialNumber()
    {
        return $this->serialNumber;
    }

    /**
     * @param mixed $datePurchase
     *
     * @return ProductRegistration
     */
    public function setDatePurchase($datePurchase)
    {
        $this->datePurchase = $datePurchase;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getDatePurchase()
    {
        return $this->datePurchase;
    }

    /**
     * @param mixed $wherePurchase
     *
     * @return ProductRegistration
     */
    public function setWherePurchase($wherePurchase)
    {
        $this->wherePurchase = $wherePurchase;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getWherePurchase()
    {
        return $this->wherePurchase;
    }

    /**
     * @param mixed $warranty
     *
     * @return ProductRegistration
     */
    public function setWarranty($warranty)
    {
        $this->warranty = $warranty;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getWarranty()
    {
        return $this->warranty;
    }
}
