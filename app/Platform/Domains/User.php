<?php

namespace App\Platform\Domains;

use App\Platform\Helpers\Generate;
use Hash;

class User
{
	public $name;
	public $email;
	public $password;
    public $uid;
	public $salesman;

	public function __construct()
	{
		$this->setUid();
	}

    /**
     * Gets the value of name.
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Sets the value of name.
     *
     * @param mixed $name the name
     *
     * @return self
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Gets the value of email.
     *
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Sets the value of email.
     *
     * @param mixed $email the email
     *
     * @return self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Gets the value of password.
     *
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Sets the value of password.
     *
     * @param mixed $password the password
     *
     * @return self
     */
    public function setPassword($password)
    {
        $this->password = Hash::make($password);

        return $this;
    }

    /**
     * Gets the value of uid.
     *
     * @return mixed
     */
    public function getUid()
    {
        return $this->uid;
    }

    /**
     * Sets the value of uid.
     *
     * @param mixed $uid the uid
     *
     * @return self
     */
    public function setUid()
    {
        $this->uid = Generate::uid();

        return $this;
    }

    /**
     * Gets the value of salesman.
     *
     * @return mixed
     */
    public function getSalesman()
    {
        return $this->salesman;
    }

    /**
     * Sets the value of salesman.
     *
     * @param mixed $salesman the salesman
     *
     * @return self
     */
    public function setSalesman($salesman)
    {
        $this->salesman = $salesman;

        return $this;
    }
}