<?php

namespace Kirill\Books\Controller\Adminhtml\Index;

use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Kirill\Books\Model\BooksRepository;
use Magento\Framework\Controller\ResultFactory;
use Magento\Framework\App\Action\Action;

class Delete extends Action
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;
    /**
     * @var BooksRepository
     */
    protected $booksRepository;

    /**
     * @param Context $context
     * @param PageFactory $resultPageFactory
     * @param BooksRepository $booksRepository
     */
    public function __construct(
        Context         $context,
        PageFactory     $resultPageFactory,
        BooksRepository $booksRepository
    )
    {
        $this->resultPageFactory = $resultPageFactory;
        $this->booksRepository = $booksRepository;
        parent::__construct($context);
    }

    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface
     */
    public function execute()
    {
        try {
            $data = $this->getRequest()->getParams();
            if ($data) {
                $model = $this->booksRepository->getNewInstance();
                $model->load($data['id'])->delete();
                $this->messageManager->addSuccessMessage(__("Record Delete Successfully."));
            }
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e, __("We can\'t delete record, Please try again."));
        }
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        $resultRedirect->setUrl($this->_redirect->getRefererUrl());
        return $resultRedirect;

    }
}
