<?php
namespace Kirill\Books\Api\Data;

/**
 * Interface BooksInterface. Retrieve books data
 */
interface BooksInterface
{
    /**#@+
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const BOOK_ID = 'id';
    const BOOK_NAME = 'name';
    const BOOK_AUTHOR = 'author';
    const BOOK_CREATED_AT = 'created_at';
    const BOOK_UPDATED_AT = 'updated_at';
    /**#@-*/

    /**
     * Get Id
     *
     * @return mixed
     */
    public function getId();

    /**
     * Get name
     *
     * @return string|null
     */
    public function getName();

    /**
     * Get author
     *
     * @return string|null
     */
    public function getAuthor();

    /**
     * Get creation time
     *
     * @return string|null
     */
    public function getCreatedAt();

    /**
     * Get update time
     *
     * @return string|null
     */
    public function getUpdatedAt();

    /**
     * Set ID
     *
     * @param int $id
     * @return \Kirill\Books\Api\Data\BooksInterface
     */
    public function setId($id);

    /**
     * Set title
     *
     * @param string $name
     * @return \Kirill\Books\Api\Data\BooksInterface
     */
    public function setName($name);

    /**
     * Set content
     *
     * @param string $author
     * @return \Kirill\Books\Api\Data\BooksInterface
     */
    public function setAuthor($author);

    /**
     * Set creation time
     *
     * @param string $creationTime
     * @return \Kirill\Books\Api\Data\BooksInterface
     */
    public function setCreatedAt($creationTime);

    /**
     * Set update time
     *
     * @param string $updateTime
     * @return \Kirill\Books\Api\Data\BooksInterface
     */
    public function setUpdatedAt($updateTime);
}
