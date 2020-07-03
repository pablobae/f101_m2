<?php

namespace Pablobaenas\PickupSystem\Block\Adminhtml\Pickups;

use Magento\Backend\Block\Widget\Form\Container;


class Edit extends Container
{
    /**
     * @var \Magento\Framework\Registry
     */
    protected $coreRegistry;

    /**
     * @var bool|int
     */
    protected $id=false;

    /**
     * @param \Magento\Backend\Block\Widget\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param array $data
     */
    public function __construct(
        \Magento\Backend\Block\Widget\Context $context,
        \Magento\Framework\Registry $registry,
        array $data = []
    ) {
        $this->coreRegistry = $registry;
        parent::__construct($context, $data);
    }


    protected function _construct()
    {
        $this->_objectId = 'id';
        $this->_controller = 'adminhtml_pickups';
        $this->_blockGroup = 'Pablobaenas_PickupSystem';

        parent::_construct();

        $id = $this->getId();
        if (!$id) {
            $this->buttonList->remove('delete');
        }
    }


    public function getHeaderText()
    {
        $id = $this->getId();
        if (!$id) {
            return __('New Pickup Point');
        } else {
            return __('Edit Pickup Point');
        }
    }

    public function getId()
    {
        if (!$this->id) {
            $this->id=$this->coreRegistry->registry('current_id');
        }
        return $this->id;
    }

}
