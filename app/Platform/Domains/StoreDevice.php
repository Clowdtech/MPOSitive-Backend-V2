<?php

namespace App\Platform\Domains;

use App\Platform\Helpers\Generate;


class StoreDevice
{
	public $brand;
	public $model;
	public $uid;
	public $store;
	public $user;

	public function __construct()
	{
		$this->setUid();
	}

    /**
     * Gets the value of brand.
     *
     * @return mixed
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Sets the value of brand.
     *
     * @param mixed $brand the brand
     *
     * @return self
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Gets the value of model.
     *
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Sets the value of model.
     *
     * @param mixed $model the model
     *
     * @return self
     */
    public function setModel($model)
    {
        $this->model = $model;

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
}