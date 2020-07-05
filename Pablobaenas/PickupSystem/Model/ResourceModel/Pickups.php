<?php
/**
 * Resource model Pickups
 *
 * @package Pablobaenas_PickupSystem
 * @author  Pablo Baenas
 * @created 2020-07-03
 */
namespace Pablobaenas\PickupSystem\Model\ResourceModel;

/**
 * Class Pickups
 * @package Pablobaenas\PickupSystem\Model\ResourceModel
 */
class Pickups extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    /**
     *
     */
    protected function _construct()
    {
        $this->_init('pablobaenas_pickup_system', 'id');
    }
}
