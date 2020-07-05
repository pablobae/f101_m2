<?php

namespace Pablobaenas\PickupSystem\Block\Adminhtml\Pickups\Edit;

use Magento\Customer\Controller\RegistryConstants;
use Magento\Backend\Block\Widget\Form\Generic;

class Form extends Generic
{

    /**
     * @var Pablobaenas\PickupSystem\Model\PickupsFactory
     */
    protected $pickupsFactory;
    protected $shippingMethod;
    protected $status;

    /**
     * @param \Magento\Backend\Block\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\Data\FormFactory $formFactory
     * @param \Pablobaenas\PickupSystem\Model\PickupsFactory $pickupsFactory
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\Data\FormFactory $formFactory,
        \Pablobaenas\PickupSystem\Model\PickupsFactory $pickupsFactory,
        \Pablobaenas\PickupSystem\Model\Source\ShippingMethod $shippingMethod,
        \Pablobaenas\PickupSystem\Model\Source\Status $status,
        array $data = []
    ) {
        $this->pickupsFactory = $pickupsFactory;
        $this->shippingMethod = $shippingMethod;
        $this->status = $status;
        parent::__construct($context, $registry, $formFactory, $data);
    }


    protected function _prepareLayout()
    {
        parent::_prepareLayout();

        /** @var \Magento\Framework\Data\Form $form */
        $form = $this->_formFactory->create();

        $id = $this->_coreRegistry->registry('current_id');
        /** @var \Pablobaenas\PickupSystem\Model\PickupsFactory $pickups */
        if ($id === null) {
            $pickups = $this->pickupsFactory->create();
        } else {
            $pickups = $this->pickupsFactory->create()->load($id);
        }


        $fieldset = $form->addFieldset('base_fieldset', ['legend' => __('Pickup Point Information')]);

        $fieldset->addField(
            'name',
            'text',
            [
                'name' => 'name',
                'label' => __('Name'),
                'title' => __('Name'),
                'required' => true
            ]
        );

        $fieldset->addField(
            'latitude',
            'text',
            [
                'name' => 'latitude',
                'label' => __('Latitude'),
                'title' => __('Latitude'),
                'required' => true
            ]
        );

        $fieldset->addField(
            'longitude',
            'text',
            [
                'name' => 'longitude',
                'label' => __('Longitude'),
                'title' => __('Longitude'),
                'required' => true
            ]
        );

        $fieldset->addField(
            'shipping_method',
            'select',
            [
                'id' => 'shipping_method',
                'name' => 'shipping_method',
                'label' => __('Shipping Method'),
                'title' => __('Shipping Method'),
                'values' => $this->shippingMethod->toOptionArray(),
                'required' => true

            ]
        );

        $fieldset->addField(
            'status',
            'select',
            [
                'id' => 'status',
                'name' => 'status',
                'label' => __('Status'),
                'title' => __('Status'),
                'values' => $this->status->toOptionArray(),
                'required' => true

            ]
        );

        if ($pickups->getId() !== null) {
            // If edit add id
            $form->addField('id', 'hidden', ['name' => 'id', 'value' => $pickups->getId()]);
        }

        if ($this->_backendSession->getDemoData()) {
            $form->addValues($this->_backendSession->getDemoData());
            $this->_backendSession->setDemoData(null);
        } else {
            $form->addValues(
                [
                    'id' => $pickups->getId(),
                    'name' => $pickups->getName(),
                    'latitude' => $pickups->getLatitude(),
                    'longitude' => $pickups->getLongitude(),
                    'shipping_method' => $pickups->getShippingMethod(),
                    'status' => $pickups->getStatus(),
                ]
            );
        }

        $form->setUseContainer(true);
        $form->setId('edit_form');
        $form->setAction($this->getUrl('*/*/save'));
        $form->setMethod('post');
        $this->setForm($form);
    }
}
