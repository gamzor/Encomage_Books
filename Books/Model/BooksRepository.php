<?php
namespace Kirill\Books\Model;

use Kirill\Books\Api\BooksRepositoryInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Kirill\Books\Model\ResourceModel\Books as ResourceBooks;
use Kirill\Books\Api\Data\BooksInterface;
use Kirill\Books\Model\BooksFactory;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Class BooksRepository. CRUD's operation with object
 */
class BooksRepository implements BooksRepositoryInterface
{
    /**
     * @var \Kirill\Books\Model\ResourceModel\Books
     */
    private $resource;

    /**
     * @var \Kirill\Books\Model\BooksFactory
     */
    private $booksFactory;

    /**
     * BooksRepository constructor.
     *
     * @param \Kirill\Books\Model\ResourceModel\Books $resource
     * @param \Kirill\Books\Model\BooksFactory $booksFactory
     */
    public function __construct(
        ResourceBooks $resource,
        BooksFactory $booksFactory
    ) {
        $this->resource = $resource;
        $this->booksFactory = $booksFactory;
    }

    /**
     * Save book data
     *
     * @param \Kirill\Books\Api\Data\BooksInterface $book
     * @return \Kirill\Books\Api\Data\BooksInterface
     * @throws \Magento\Framework\Exception\CouldNotSaveException
     */
    public function save(BooksInterface $book)
    {
        try {
            /** @var \Kirill\Books\Model\Books $book */
            $this->resource->save($book);
        } catch (\Exception $exception) {
            throw new CouldNotSaveException(__($exception->getMessage()));
        }

        return $book;
    }

    /**
     * Retrieve book.
     *
     * @param int $bookId
     * @return \Kirill\Books\Api\Data\BooksInterface
     */
    public function getById($bookId)
    {
        $block = $this->booksFactory->create();
        $this->resource->load($block, $bookId);
        return $block;
    }

    /**
     * Load book data collection by given search criteria
     *
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     * @param \Magento\Framework\Api\SearchCriteriaInterface $criteria
     * @return string
     */
    public function getList(\Magento\Framework\Api\SearchCriteriaInterface $criteria)
    {
        //@todo think about logic with would works with search criteria
        return '';
    }

    /**
     * Delete Book
     *
     * @param \Kirill\Books\Api\Data\BooksInterface $book
     * @return bool
     * @throws CouldNotDeleteException
     */
    public function delete(BooksInterface $book)
    {
        try {
            /** @var \Kirill\Books\Model\Books $book */
            $this->resource->delete($book);
        } catch (\Exception $exception) {
            throw new CouldNotDeleteException(__($exception->getMessage()));
        }
        return true;
    }

    /**
     * Delete Block by given Block Identity
     *
     * @param string $blockId
     * @return bool
     * @throws CouldNotDeleteException
     * @throws NoSuchEntityException
     */
    public function deleteById($blockId)
    {
        return $this->delete($this->getById($blockId));
    }

    /**
     * Get clear model
     *
     * @return Books
     */
    public function getNewInstance()
    {
        return $this->booksFactory->create();
    }
}
