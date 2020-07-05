<?php

namespace Pablobaenas\PickupSystem\Model\Source;

class Status implements \Magento\Framework\Option\ArrayInterface
{
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 2;


    public function toOptionArray()
    {
        return [
            ['value' => self::STATUS_ENABLED, 'label' => __('Enabled')],
            ['value' => self::STATUS_DISABLED, 'label' => __('Disabled')],
        ];
    }
}
