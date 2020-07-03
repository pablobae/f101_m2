<?php
namespace Pablobaenas\PickupSystem\Model\ResourceModel;

class Pickups extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct()
    {
        $this->_init('pablobaenas_pickup_system', 'id');
    }
}
