<?php

namespace Pablobaenas\PickupSystem\Controller\Adminhtml\Pickups;

use Magento\Framework\Controller\ResultFactory;
use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Pablobaenas\PickupSystem\Model\ResourceModel\Pickups\CollectionFactory;
use Magento\Backend\App\Action;

class MassDelete extends Action
{
    protected $resultPageFactory = false;
    protected $collectionFactory;

    public function __construct(
        Context $context,
        CollectionFactory $collectionFactory,
        Filter $filter
    ) {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context);
    }

    public function execute()
    {
        $collection = $this->filter->getCollection($this->collectionFactory->create());
        $collectionSize = $collection->getSize();
        foreach ($collection as $item) {

            $item->delete();

        }
        $this->messageManager->addSuccess(__('%1 pickup point(s) have been deleted.', $collectionSize));

        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $resultRedirect->setPath('*/*/');
    }
}
