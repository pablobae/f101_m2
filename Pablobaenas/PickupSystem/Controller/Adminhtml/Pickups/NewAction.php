<?php

namespace Pablobaenas\PickupSystem\Controller\Adminhtml\Pickups;

use Magento\Backend\App\Action;

class NewAction extends Action
{

    protected $_coreRegistry;

    protected $resultForwardFactory;

    protected $resultPageFactory;


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
        $id = $this->getRequest()->getParam('id');
        $this->_coreRegistry->register('current_id', $id);

        /** @var \Magento\Backend\Model\View\Result\Page $resultPage */
        $resultPage = $this->resultPageFactory->create();

        if ($id === null) {
            $resultPage->addBreadcrumb(__('New Pickup Point'), __('New Pickup Point'));
            $resultPage->getConfig()->getTitle()->prepend(__('New Pickup Point'));
        } else {
            $resultPage->addBreadcrumb(__('Edit Pickup Point'), __('Edit Pickup Point'));
            $resultPage->getConfig()->getTitle()->prepend(__('Edit Pickup Point'));
        }

        $resultPage->getLayout()
            ->addBlock('Pablobaenas\PickupSystem\Block\Adminhtml\Pickups\Edit', 'pickups', 'content')
            ->setEditMode((bool)$id);

        return $resultPage;
    }
}
