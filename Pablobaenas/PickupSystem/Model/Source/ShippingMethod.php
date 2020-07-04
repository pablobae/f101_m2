<?php
namespace Pablobaenas\PickupSystem\Model\Source;

class ShippingMethod extends \Magento\Shipping\Model\Config\Source\Allmethods implements \Magento\Framework\Data\OptionSourceInterface
{

    /**
     * Retrieve status options array.
     *
     * @return array
     */
    public function toOptionArray($isActiveOnlyFlag = true)
    {

        $methods = [['value' => '', 'label' => '']];
        $carriers = $this->_shippingConfig->getAllCarriers();
        foreach ($carriers as $carrierCode => $carrierModel) {
            if (!$carrierModel->isActive() && (bool)$isActiveOnlyFlag === true) {
                continue;
            }
            $carrierMethods = $carrierModel->getAllowedMethods();
            if (!$carrierMethods) {
                continue;
            }
            $carrierTitle = $this->_scopeConfig->getValue(
                'carriers/' . $carrierCode . '/title',
                \Magento\Store\Model\ScopeInterface::SCOPE_STORE
            );
            $methods[$carrierCode] = ['label' => $carrierTitle, 'value' => $carrierCode ];

        }
        return $methods;
    }
}
