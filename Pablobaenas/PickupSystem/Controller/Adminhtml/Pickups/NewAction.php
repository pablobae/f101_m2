<?php
/**
 * Controller Action class to add new pickup point
 *
 * @package Pablobaenas_PickupSystem
 * @author  Pablo Baenas
 * @created 2020-07-03
 */
namespace Pablobaenas\PickupSystem\Controller\Adminhtml\Pickups;

use Magento\Backend\App\Action;

/**
 * Class NewAction
 * @package Pablobaenas\PickupSystem\Controller\Adminhtml\Pickups
 */
class NewAction extends Action
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
     * NewAction constructor.
     * @param Action\Context $context
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
