<?php
namespace Entity;

class Contact
{

    protected $id;

    protected $id_account;

    protected $email;

    protected $firstname;

    protected $lastname;

    protected $phone;

    public function __construct()
    {
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
    public function getId_account()
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
        return $this->firstname;
    }

    /**
     * Getter.
     *
     * @return mixed
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Getter.
     *
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
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
    public function setId_account($id_account)
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
        $this->firstname = $firstname;
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
        $this->lastname = $lastname;
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
        $this->phone = $phone;
        return $this;
    }
}

