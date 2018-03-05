<?php
namespace Tests\Repository;

use Entity\Contact;
use Repository\ContactsRepository;

class MockContactsRepository implements ContactsRepository
{

    protected $contacts;

    public function __construct()
    {
        $this->contacts = [];
    }

    /**
     *
     * {@inheritdoc}
     * @see \Repository\ContactsRepository::addNew()
     */
    public function addNew($id_account, $contact)
    {
        $key = $id_account . '-' . $contact->getEmail();

        $contacts[$key] = $contact;
    }

    /**
     *
     * {@inheritdoc}
     * @see \Repository\ContactsRepository::alreadyExists()
     */
    public function alreadyExists($id_account, $email)
    {
        $key = $id_account . '-' . $contact['email'];

        return array_key_exists($key, $this->contacts);
    }

    /**
     *
     * {@inheritdoc}
     * @see \Repository\ContactsRepository::count()
     */
    public function count()
    {
        return count($this->contacts);
    }

    /**
     *
     * {@inheritdoc}
     * @see \Repository\ContactsRepository::get()
     */
    public function get($id_account, $email)
    {
        if (!$this->alreadyExists($id_account, $email)) {
            return FALSE;
        }

        $key = $id_account . '-' . $contact['email'];

        $contact = $this->contacts[$key];
        return $contact;
    }
}

