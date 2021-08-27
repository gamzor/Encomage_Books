<?php

namespace Kirill\Books\Controller\Adminhtml\Index;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\Action\HttpPostActionInterface;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\UrlInterface;
use Magento\Framework\View\Result\PageFactory;
use Kirill\Books\Model\BooksRepository;

/**
 * Class Submit.
 */
class Save extends Action implements HttpPostActionInterface
{
    /**
     * @var \Magento\Framework\View\Result\PageFactory
     */
    protected $resultPageFactory;

    /**
     * @var \Kirill\Books\Model\BooksRepository
     */
    protected $booksRepository;

    /**
     * @var UrlInterface
     */
    private $url;

    /**
     * Submit constructor
     *
     * @param UrlInterface $url
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param BooksRepository $booksRepository
     */
    public function __construct(
        UrlInterface    $url,
        Context         $context,
        PageFactory     $resultPageFactory,
        BooksRepository $booksRepository
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->booksRepository = $booksRepository;
        $this->url = $url;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|\Magento\Framework\View\Result\Layout
     */
    public function execute()
    {
        try {
            $data = $this->getRequest()->getParams();

            if ($data) {
                $model = $this->booksRepository->getNewInstance();
                $model->setData($data);
                $this->booksRepository->save($model);
                $this->messageManager->addSuccessMessage(__("Data Saved Successfully."));
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e, __("We can\'t submit your request, Please try again."));
        }
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->url->getUrl('book/index/index'));
        return $resultRedirect;
    }
}
