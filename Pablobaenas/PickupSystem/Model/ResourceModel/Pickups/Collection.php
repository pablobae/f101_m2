<?php
namespace Pablobaenas\PickupSystem\Model\ResourceModel\Pickups;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'pablobaenas_pickupsystem_pickup_collection';
    protected $_eventObject = 'pickup_collection';

    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Pablobaenas\PickupSystem\Model\Pickups', 'Pablobaenas\PickupSystem\Model\ResourceModel\Pickups');
    }
}
