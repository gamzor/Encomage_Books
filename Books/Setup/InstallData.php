<?php

namespace Kirill\Books\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Kirill\Books\Model\BooksFactory;
use Kirill\Books\Model\BooksRepository;

/**
 * Class InstallData. Set additional data to custom table
 */
class InstallData implements InstallDataInterface
{
    /**
     * @var \Kirill\Books\Model\BooksFactory
     */
    private $postFactory;

    /**
     * @var \Kirill\Books\Model\BooksRepository
     */
    private $booksRepository;

    /**
     * InstallData constructor.
     *
     * @param \Kirill\Books\Model\BooksFactory $postFactory
     * @param \Kirill\Books\Model\BooksRepository $booksRepository
     */
    public function __construct(
        BooksFactory $postFactory,
        BooksRepository $booksRepository
    )
    {
        $this->postFactory = $postFactory;
        $this->booksRepository = $booksRepository;
    }

    /**
     * Set data to table
     *
     * @param \Magento\Framework\Setup\ModuleDataSetupInterface $setup
     * @param \Magento\Framework\Setup\ModuleContextInterface $context
     * @throws \Exception
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $data = [
            ['name' => "How to Create SQL Setup Script in Magento 3", 'author' => ' John Deer'],
            ['name' => 'InstallData script', 'author' => 'Cyrill Skrypnyk']
        ];

        foreach ($data as $item) {
            $book = $this->postFactory->create();
            $book->addData($item);
            $this->booksRepository->save($book);
        }
    }
}
