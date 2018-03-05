<?php
namespace App\Entity;

class Contact
{

    protected $id;

    protected $id_account;

    protected $email;

    protected $data;

    public function __construct()
    {
        $data = [];
    }

    /**
     * Getter.
     *
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Getter.
     *
     * @return mixed
     */
    public function getIdAccount()
    {
        return $this->id_account;
    }

    /**
     * Getter.
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Getter.
     *
     * @return mixed
     */
    public function getFirstname()
    {
        return (array_key_exists('firstname', $this->data) ? $this->data['firstname'] : NULL);
    }

    /**
     * Getter.
     *
     * @return mixed
     */
    public function getLastname()
    {
        return (array_key_exists('lastname', $this->data) ? $this->data['lastname'] : NULL);
    }

    /**
     * Getter.
     *
     * @return mixed
     */
    public function getPhone()
    {
        return (array_key_exists('phone', $this->data) ? $this->data['phone'] : NULL);
    }

    /**
     * Setter.
     *
     * @param mixed $id
     * @return self
     */
    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    /**
     * Setter.
     *
     * @param mixed $id_account
     * @return self
     */
    public function setIdAccount($id_account)
    {
        $this->id_account = $id_account;
        return $this;
    }

    /**
     * Setter.
     *
     * @param mixed $email
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * Setter.
     *
     * @param mixed $firstname
     * @return self
     */
    public function setFirstname($firstname)
    {
        $this->data['firstname'] = $firstname;
        return $this;
    }

    /**
     * Setter.
     *
     * @param mixed $lastname
     * @return self
     */
    public function setLastname($lastname)
    {
        $this->data['lastname'] = $lastname;
        return $this;
    }

    /**
     * Setter.
     *
     * @param mixed $phone
     * @return self
     */
    public function setPhone($phone)
    {
        $this->data['phone'] = $phone;
        return $this;
    }

    /**
     * Factory from array.
     *
     * @param array $record
     * @return \App\Entity\Contact
     */
    public static function fromArray($record)
    {
        $contact = new Contact();

        $contact->setEmail($record['email']);
        $contact->setFirstname($record['firstname']);
        $contact->setLastname($record['lastname']);
        $contact->setPhone($record['phone']);

        return $contact;
    }

    /**
     * Update fields from another contact.
     *
     * @param Contact $another_contact
     */
    public function updateFields($another_contact)
    {
        $this->data = array_merge($this->data, $another_contact->data);
    }
}

