<?php
namespace Kirill\Books\Model;

use Kirill\Books\Api\Data\BooksInterface;
use Magento\Framework\Model\AbstractModel;
use Kirill\Books\Model\ResourceModel\Books as ResourceBooks;

/**
 * Class Books. Methods for model working with.
 */
class Books extends AbstractModel implements BooksInterface
{
    /**
     * Construct.
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init(ResourceBooks::class);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getData(self::BOOK_ID);
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return $this->getData(self::BOOK_NAME);
    }

    /**
     * @inheritdoc
     */
    public function getAuthor()
    {
        return $this->getData(self::BOOK_AUTHOR);
    }

    /**
     * @inheritdoc
     */
    public function getCreatedAt()
    {
        return $this->getData(self::BOOK_CREATED_AT);
    }

    /**
     * @inheritdoc
     */
    public function getUpdatedAt()
    {
        return $this->getData(self::BOOK_UPDATED_AT);
    }

    /**
     * @inheritdoc
     */
    public function setId($id)
    {
        return $this->setData(self::BOOK_ID, $id);
    }

    /**
     * @inheritdoc
     */
    public function setName($name)
    {
        return $this->setData(self::BOOK_NAME, $name);
    }

    /**
     * @inheritdoc
     */
    public function setAuthor($author)
    {
        return $this->setData(self::BOOK_AUTHOR, $author);
    }

    /**
     * @inheritdoc
     */
    public function setCreatedAt($creationTime)
    {
        return $this->setData(self::BOOK_CREATED_AT, $creationTime);
    }

    /**
     * @inheritdoc
     */
    public function setUpdatedAt($updateTime)
    {
        return $this->setData(self::BOOK_UPDATED_AT, $updateTime);
    }
}
