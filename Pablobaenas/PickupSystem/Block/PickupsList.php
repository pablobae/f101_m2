<?php
/**
 * List contents of pablobaenas_pickupsystem table
 *
 * @package Pablobaenas_PickupSystem
 * @author  Pablo Baenas
 * @created 2020-07-03
 */
namespace Pablobaenas\PickupSystem\Block;

use Magento\Framework\View\Element\Template;
use Magento\Store\Model\ScopeInterface;
use Pablobaenas\PickupSystem\Model\ResourceModel\Pickups\Collection;

class PickupsList extends Template
{
    /**
     * Pickups collection
     *
     * @var Collection
     */
    protected $pickupsCollection;

    /**
     * Pickups resource model
     *
     * @var \Pablobaenas\PickupSystem\Model\ResourceModel\Pickups\CollectionFactory
     */
    protected $pickupsCollectionFactory;

    /**
     * @param Template\Context $context
     * @param \Pablobaenas\PickupSystem\Model\ResourceModel\Pickups\CollectionFactory $pickupsCollectionFactory
     * @param array $data
     * @SuppressWarnings(PHPMD.ExcessiveParameterList)
     */
    public function __construct(
        Template\Context $context,
        \Pablobaenas\PickupSystem\Model\ResourceModel\Pickups\CollectionFactory $pickupsCollectionFactory,
        array $data = []
    ) {
        $this->pickupsCollectionFactory = $pickupsCollectionFactory;
        parent::__construct(
            $context,
            $data
        );
    }


    /**
     * Get Pickups Items Collection
     * @return Collection
     */
    public function getPickupsItems()
    {
        if (null === $this->pickupsCollection) {
            $this->pickupsCollection = $this->pickupsCollectionFactory->create();
        }
        return $this->pickupsCollection;
    }
}
