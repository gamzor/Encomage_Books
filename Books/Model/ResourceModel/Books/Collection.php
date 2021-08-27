<?php
namespace Kirill\Books\Model\ResourceModel\Books;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection.
 */
class Collection extends AbstractCollection
{
    protected $_idFieldName = 'id';
    protected $_eventPrefix = 'Books_collection';
    protected $_eventObject = 'post_collection';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Kirill\Books\Model\Books', 'Kirill\Books\Model\ResourceModel\Books');
    }
}
