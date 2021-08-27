<?php

namespace Kirill\Books\Block\Books;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Kirill\Books\Model\ResourceModel\Books\CollectionFactory;

/**
 * Class Grid.
 */
class Grid extends Template
{
    /**
     * @var \Kirill\Books\Model\ResourceModel\Books\CollectionFactory
     */
    private $collectionFactory;

    /**
     * Grid constructor.
     * @param Template\Context $context
     * @param \Kirill\Books\Model\ResourceModel\Books\CollectionFactory $collectionFactory
     * @param array $data
     */
    public function __construct(
        Context           $context,
        CollectionFactory $collectionFactory,
        array             $data = []
    )
    {
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context, $data);
    }

    /**
     * Get collection of books
     *
     * @return \Kirill\Books\Model\ResourceModel\Books\Collection
     */
    public function getCollection()
    {
        //@todo create logic for getting all records from database via Repository (method getList)
        return $this->collectionFactory->create();
    }

    /**
     * @return string
     */
    public function getDeleteAction()
    {
        return $this->getUrl('book/index/delete', ['_secure' => true]);
    }

    /**
     * @param int $id
     * @return string
     */
    public function getEditAction($id)
    {
        return $this->getUrl('book/index/edit', ['id' => $id, '_secure' => true]);
    }

    /**
     * @return string
     */
    public function getAddAction()
    {
        return $this->getUrl('book/index/New', ['_secure' => true]);
    }
}
