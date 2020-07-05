<?php
/**
 * Action class to save new pickup points
 *
 * @package Pablobaenas_PickupSystem
 * @author  Pablo Baenas
 * @created 2020-07-03
 */
namespace Pablobaenas\PickupSystem\Controller\Adminhtml\Pickups;

use Magento\Backend\App\Action;

class Save extends Action
{

    /**
     * @var \Pablobaenas\PickupSystem\Model\PickupsFactory
     */
    private $pickupsFactory;

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
     * @param \Magento\Backend\App\Action\Context $context
     * @param \Magento\Framework\Registry $coreRegistry
     * @param \Pablobaenas\PickupSystem\Model\PickupsFactory $pickupsFactory
     * @param \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory
     * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
     */
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\Registry $coreRegistry,
        \Pablobaenas\PickupSystem\Model\PickupsFactory $pickupsFactory,
        \Magento\Backend\Model\View\Result\ForwardFactory $resultForwardFactory,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory
    ) {
        $this->_coreRegistry = $coreRegistry;
        $this->pickupsFactory = $pickupsFactory;
        parent::__construct($context);
        $this->resultForwardFactory = $resultForwardFactory;
        $this->resultPageFactory = $resultPageFactory;
    }


    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Pablobaenas_PickupSystem::manage');
    }

    /**
     * @return \Magento\Backend\Model\View\Result\Page|\Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $resultRedirect = $this->resultRedirectFactory->create();
        try {
            if ($id !== null) {
                $pickups = $this->pickupsFactory->create()->load((int)$id);
            } else {
                $pickups = $this->pickupsFactory->create();
            }
            $data = $this->getRequest()->getParams();
            $pickups->setData($data)->save();

            $this->messageManager->addSuccess(__('Saved Pickup Point.'));
            $resultRedirect->setPath('pickupsystem/pickups');
        } catch (\Exception $e) {
            $this->messageManager->addError($e->getMessage());
            $this->_getSession()->setDemoData($data);

            $resultRedirect->setPath('pickupsystem/pickups/edit', ['id' => $id]);
        }
        return $resultRedirect;
    }
}
