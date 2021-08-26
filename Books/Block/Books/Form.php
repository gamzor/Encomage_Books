<?php

namespace Kirill\Books\Block\Books;

use Magento\Backend\Block\Template\Context;
use Magento\Framework\View\Element\Template;
use Kirill\Books\Model\BooksRepository;

/**
 * Class Form.
 */
class Form extends Template
{
    /**
     * @var BooksRepository
     */
    private $bookRepository;

    /**
     * Form constructor.
     *
     * @param BooksRepository $bookRepository
     * @param Context $context
     * @param array $data
     */
    public function __construct(
        BooksRepository $bookRepository,
        Context         $context,
        array           $data = []
    )
    {
        parent::__construct($context, $data);
        $this->bookRepository = $bookRepository;
    }

    /**
     * @return string
     */
    public function getFormAction()
    {
        return $this->getUrl('book/index/save', ['_secure' => true]);
    }

    /**
     * @return \Kirill\Books\Api\Data\BooksInterface
     */
    public function getAllData()
    {
        $id = $this->getRequest()->getParam('id');
        if ($id) {
            return $this->bookRepository->getById($id);
        }
        return $this->bookRepository->getNewInstance();
    }
}
