<?php
namespace Repository;


interface ContactsRepository
{

    /**
     * Adds a new contact to the repository
     *
     * @param integer $id_account
     * @param \Entity\Contact $contact
     */
    function addNew($id_account, $contact);

    /**
     * Returns if a contacts exists to an account.
     *
     * @param integer $id_account
     * @param string $email
     * @return boolean
     */
    function alreadyExists($id_account, $email);

    /**
     * Returns the number of contacts in the repository.
     *
     * @return integer
     */
    function count();

    /**
     * Returns an account's contact identified by email.
     *
     * @param integer $id_account
     * @param string $email
     * @return \Entity\Contact
     */
    function get($id_account, $email);
}

