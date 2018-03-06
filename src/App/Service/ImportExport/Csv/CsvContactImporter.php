<?php
namespace App\Service\ImportExport\Csv;

use App\Entity\Contact;
use League\Csv\Reader;
use App\Service\ImportExport\ContactImporter;

class CsvContactImporter implements ContactImporter
{

    /**
     *
     * @var \App\Repository\ContactsRepository
     */
    protected $repository;

    /**
     * Constructor.
     *
     * @param \App\Repository\ContactsRepository $repo
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

        $count = 0;
        foreach ($csv as $record) {

            $count ++;
            $contact = Contact::fromArray($record);

            $result = $this->importContact($id_account, $contact);
            if ($result !== TRUE) {

                // show the error by standard output
                $message = sprintf('Line #%u: %s', $count, $result);
                print($message);
            }
        }
    }

    /**
     * Try to import a contact or returns the problem.
     *
     * @param integer $id_account
     * @param Contact $contact
     * @return string|boolean
     */
    protected function importContact($id_account, $contact)
    {
        if ($contact->getEmail() == NULL) {

            // warning: contact email is mandatory
            return 'W skipping contact without email.';
        }
        else {

            $repo_contact = $this->repository->findByEmail($contact->getEmail());
            if (!$repo_contact) {

                // import the contact to the current user
                $this->repository->addNew($id_account, $contact);
            }
            else {

                // check visibility access
                if (!$this->repository->isGranted($id_account, $contact->getEmail())) {

                    // error: not allowed to update the contact
                    return 'E contact already exists and not granted to update.';
                }
                else {

                    // update contact
                    $this->repository->update($contact);
                }
            }
        }

        // contact is added or updated
        return TRUE;
    }
}

