<?php

namespace Kirill\Books\Controller\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Result\PageFactory;
use Kirill\Books\Model\BooksRepository;

/**
 * Class Edit.
 */
class Edit extends Action
{
    /**
     * @var PageFactory
     */
    protected PageFactory $resultPageFactory;

    /**
     * @var BooksRepository
     */
    private BooksRepository $booksRepository;

    /**
     * @var UrlInterface
     */
    private UrlInterface $url;

    /**
     * Index constructor.
     *
     * @param UrlInterface $url
     * @param BooksRepository $booksRepository
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        UrlInterface    $url,
        BooksRepository $booksRepository,
        Context         $context,
        PageFactory     $resultPageFactory
    )
    {
        parent::__construct($context);
        $this->resultPageFactory = $resultPageFactory;
        $this->booksRepository = $booksRepository;
        $this->url = $url;
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Layout|\Magento\Framework\View\Result\Page
     */
    public function execute()
    {
        return $this->resultPageFactory->create();

    }
}
