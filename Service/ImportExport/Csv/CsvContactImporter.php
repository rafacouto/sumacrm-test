<?php
namespace Service\ImportExport\Csv;

use Service\ImportExport\ContactImporter;
use Repository\ContactsRepository;

class CsvContactImporter implements ContactImporter
{

    /**
     *
     * @var ContactsRepository
     */
    protected $repository;

    /**
     * Constructor.
     *
     * @param ContactsRepository $repo
     *            Repository where the contacts are imported to.
     */
    public function __construct(ContactsRepository $repo)
    {
        $this->repository = $repo;
    }

    /**
     *
     * {@inheritdoc}
     * @see \Service\ImportExport\ContactImporter::import()
     */
    public function import($temp_file, $id_account)
    {
    }
}

