<?php
namespace Kirill\Books\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;
use Magento\Framework\Model\ResourceModel\Db\Context;

/**
 * Class Books.
 */
class Books extends AbstractDb
{
    /**
     * Books constructor.
     *
     * @param \Magento\Framework\Model\ResourceModel\Db\Context $context
     */
    public function __construct(Context $context)
    {
        parent::__construct($context);
    }

    /**
     * Init connection
     */
    protected function _construct()
    {
        $this->_init('encomage_books', 'id');
    }
}
