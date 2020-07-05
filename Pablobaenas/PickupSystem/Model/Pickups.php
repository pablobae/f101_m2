<?php

namespace Pablobaenas\PickupSystem\Model;

class Pickups extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    const CACHE_TAG = 'pablobaenas_pickupsystem_pickup';
    protected $_cacheTag = 'pablobaenas_pickupsystem_pickup';
    protected $_eventPrefix = 'pablobaenas_pickupsystem_pickup';

    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 2;

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

    public function isEnabled()
    {
        if ($this->getStatus() == self::STATUS_ENABLED) {
            return true;
        }

        return false;
    }

    public function getGoogleMapsURL()
    {
        $google_maps_url = 'https://maps.google.com/?q=';

        return $google_maps_url . $this->getLatitude() . ',' . $this->getLongitude();
    }
}
