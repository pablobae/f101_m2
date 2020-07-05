<?php

/**
 * Action class to edit pickup points
 *
 * @package Pablobaenas_PickupSystem
 * @author  Pablo Baenas
 * @created 2020-07-03
 */
namespace Pablobaenas\PickupSystem\Controller\Adminhtml\Pickups;

use Magento\Backend\App\Action;


/**
 * Class Edit
 * @package Pablobaenas\PickupSystem\Controller\Adminhtml\Pickups
 */
class Edit extends Action
{
    /**
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry;

    /**
     * @var \Magento\Backend\Model\View\Result\ForwardFactory
     */
    protected $resultForwardFactory;

    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     *
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->_coreRegistry = $coreRegistry;
        parent::__construct($context);
        $this->resultForwardFactory = $resultForwardFactory;
        $this->resultPageFactory = $resultPageFactory;
    }



    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Pablobaenas_PickupSystem::manage');
    }

    public function execute()
    {
        return $this->resultForwardFactory->create()->forward('new');
    }
}
