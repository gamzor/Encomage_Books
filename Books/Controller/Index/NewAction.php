<?php

namespace Kirill\Books\Controller\Index;

use \Magento\Framework\App\Action\Action;

class NewAction extends Action
{
    /**
     * @return \Magento\Framework\App\ResponseInterface|\Magento\Framework\Controller\ResultInterface|void
     */
    public function execute()
    {
        // the same form is used to create and edit
        $this->_forward('edit');
    }
}
