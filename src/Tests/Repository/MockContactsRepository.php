<?php
namespace Tests\Repository;

use App\Repository\ContactsRepository;
use App\Entity\Contact;

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
     * @see \App\Repository\ContactsRepository::addNew()
     */
    public function addNew($id_account, $contact)
    {
        $email = $contact->getEmail();
        if (!$email) {
            throw new \RuntimeException('Contact must have an email.');
        }

        // check it is really new
        if ($this->findByEmail($email)) {
            throw new \RuntimeException('Contact already exists.');
        }

        // complete the keys
        $contact->setId(count($this->contacts) + 1);
        $contact->setIdAccount($id_account);

        $this->contacts[$email] = $contact;
    }

    /**
     *
     * {@inheritdoc}
     * @see \App\Repository\ContactsRepository::count()
     */
    public function count()
    {
        return count($this->contacts);
    }

        /**
     *
     * {@inheritdoc}
     * @see \App\Repository\ContactsRepository::isGranted()
     */
    public function isGranted($id_account, $email)
    {
        // TODO check ACL to match id_account with contact register.
        return TRUE;
    }

    /**
     *
     * {@inheritdoc}
     * @see \App\Repository\ContactsRepository::update()
     */
    public function update($contact)
    {
        $current = &$this->find($contact->getEmail());
        if ($current) {

            $current->updateFields($contact);
        }
    }

    /**
     * Looks for a contact by email.
     *
     * @param string $email
     * @return Contact|FALSE The contact or FALSE if not found.
     */
    public function findByEmail($email)
    {
        if (array_key_exists($email, $this->contacts)) {

            return $this->contacts[$email];
        }

        return FALSE;
    }
}

