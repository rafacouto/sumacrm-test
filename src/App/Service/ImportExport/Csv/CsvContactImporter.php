<?php
namespace App\Service\ImportExport\Csv;

use App\Entity\Contact;
use App\Repository\ContactsRepository;
use League\Csv\Reader;

class CsvContactImporter
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
    public function __construct($repo)
    {
        $this->repository = $repo;
    }

    /**
     *
     * {@inheritdoc}
     * @see \App\Service\ImportExport\ContactImporter::import()
     */
    public function import($temp_file, $id_account)
    {
        $csv = Reader::createFromPath($temp_file, 'r');
        $csv->setHeaderOffset(0);

        foreach ($csv as $record) {
            $contact = Contact::fromArray($record);
            $this->repository->addNew($id_account, $contact);
        }
    }
}

