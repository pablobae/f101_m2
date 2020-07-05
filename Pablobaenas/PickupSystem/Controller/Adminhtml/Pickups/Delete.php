<?php
/**
 * Action class Delete
 *
 * @package Pablobaenas_PickupSystem
 * @author  Pablo Baenas
 * @created 2020-07-03
 */
namespace Pablobaenas\PickupSystem\Controller\Adminhtml\Pickups;

use Magento\Backend\App\Action;

/**
 * Class Delete
 * @package Pablobaenas\PickupSystem\Controller\Adminhtml\Pickups
 */
class Delete extends Action
{


    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Pablobaenas_PickupSystem::manage');
    }

    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        /** @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect */
        $resultRedirect = $this->resultRedirectFactory->create();
        if ($id) {
            try {
                $model = $this->_objectManager->create('Pablobaenas\PickupSystem\Model\Pickups');
                $model->load($id);
                $model->delete();
                $this->messageManager->addSuccess(__('The pickup point has been deleted.'));
                return $resultRedirect->setPath('*/*/');
            } catch (\Exception $e) {
                $this->messageManager->addError($e->getMessage());
                return $resultRedirect->setPath('*/*/edit', ['id' => $id]);
            }
        }
        $this->messageManager->addError(__('We can\'t find a listing to delete.'));
        return $resultRedirect->setPath('*/*/');
    }
}
