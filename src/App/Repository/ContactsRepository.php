<?php
namespace App\Repository;

interface ContactsRepository
{

    /**
     * Adds a new contact to the repository
     *
     * @param integer $id_account
     * @param \App\Entity\Contact $contact
     */
    function addNew($id_account, $contact);

    /**
     * Looks for a contact by email.
     *
     * @param string $email
     * @return \App\Entity\Contact|FALSE The contact or FALSE if not found.
     */
    public function findByEmail($email);

    /**
     * Returns the number of contacts in the repository.
     *
     * @return integer
     */
    function count();

    /**
     * Check visibility permissions.
     *
     * @param integer $id_account
     * @param string $email
     * @return boolean
     */
    function isGranted($id_account, $email);

    /**
     * Update the contact
     *
     * @param \App\Entity\Contact $contact
     */
    function update($contact);
}

