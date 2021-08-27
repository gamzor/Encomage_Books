<?php
namespace Kirill\Books\Api;

use Kirill\Books\Api\Data\BooksInterface;
use Magento\Framework\Api\SearchCriteriaInterface;

/**
 * Interface BooksRepositoryInterface.
 */
interface BooksRepositoryInterface
{
    /**
     * Save book.
     *
     * @param \Kirill\Books\Api\Data\BooksInterface $book
     * @return \Kirill\Books\Api\Data\BooksInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function save(BooksInterface $book);

    /**
     * Retrieve book.
     *
     * @param int $bookId
     * @return \Kirill\Books\Api\Data\BooksInterface
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     */
    public function getById($bookId);

    /**
     * Retrieve books matching the specified criteria.
     *
     * @param \Magento\Framework\Api\SearchCriteriaInterface $searchCriteria
     * @return \Magento\Cms\Api\Data\BlockSearchResultsInterface
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function getList(SearchCriteriaInterface $searchCriteria);

    /**
     * Delete book.
     *
     * @param \Kirill\Books\Api\Data\BooksInterface $book
     * @return bool true on success
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function delete(BooksInterface $book);

    /**
     * Delete book by ID.
     *
     * @param int $bookId
     * @return bool true on success
     * @throws \Magento\Framework\Exception\NoSuchEntityException
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    public function deleteById($bookId);

}
