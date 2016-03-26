<?php

namespace App\Platform\Domains;

use App\Platform\Helpers\Generate;
/**
* 
*/
class Staff
{
	public $name;
	public $pin;
    public $user;
	public $store;

	public function __construct()
	{
		$this->generator = new Generate;
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
     * Gets the value of pin.
     *
     * @return mixed
     */
    public function getPin()
    {
        return $this->pin;
    }

    /**
     * Sets the value of pin.
     *
     * @param mixed $pin the pin
     *
     * @return self
     */
    public function setPin($pin = null)
    {
    	if (is_null($pin) || strlen($pin) !== 4) {
    		$pin = $this->generator->pin();
    	}

        $this->pin = $pin;

        return $this;
    }

    /**
     * Gets the value of user.
     *
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Sets the value of user.
     *
     * @param mixed $user the user
     *
     * @return self
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Gets the value of store.
     *
     * @return mixed
     */
    public function getStore()
    {
        return $this->store;
    }

    /**
     * Sets the value of store.
     *
     * @param mixed $store the store
     *
     * @return self
     */
    public function setStore($store)
    {
        $this->store = $store;

        return $this;
    }
}