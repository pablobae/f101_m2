<?php
namespace Pablobaenas\PickupSystem\Model;

class Pickups extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'pablobaenas_pickupsystem_pickup';

    protected $_cacheTag = 'pablobaenas_pickupsystem_pickup';

    protected $_eventPrefix = 'pablobaenas_pickupsystem_pickup';

    protected function _construct()
    {
        $this->_init('Pablobaenas\PickupSystem\Model\ResourceModel\Pickups');
    }

    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    public function getDefaultValues()
    {
        $values = [];

        return $values;
    }
}
