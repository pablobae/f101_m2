<?php
/**
 *  Collection pickups resource mode
 *
 * @package Pablobaenas_PickupSystem
 * @author  Pablo Baenas
 * @created 2020-07-03
 */
namespace Pablobaenas\PickupSystem\Model\ResourceModel\Pickups;

/**
 * Class Collection
 * @package Pablobaenas\PickupSystem\Model\ResourceModel\Pickups
 */
class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'id';
    /**
     * @var string
     */
    protected $_eventPrefix = 'pablobaenas_pickupsystem_pickup_collection';
    /**
     * @var string
     */
    protected $_eventObject = 'pickup_collection';

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Pablobaenas\PickupSystem\Model\Pickups', 'Pablobaenas\PickupSystem\Model\ResourceModel\Pickups');
    }
}
