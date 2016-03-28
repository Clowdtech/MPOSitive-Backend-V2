<?php

namespace App\Platform\Domains;

use App\Platform\Helpers\Generate;

class Store
{
    /**
     * Store name.
     * 
     * @var string
     */
	public $name;

    /**
     * Store slug.
     * 
     * @var string
     */
    public $slug;

    /**
     * Store address.
     * 
     * @var string
     */
	public $address;

    /**
     * Unique store identifier.
     * 
     * @var string
     */
	public $uid;

    /**
     * Store location latitude.
     * 
     * @var double
     */
	public $latitude;

    /**
     * Store location longitude.
     * 
     * @var double
     */
	public $longitude;

    /**
     * User who creates the store.
     * 
     * @var \App\User
     */
	public $user;

    /**
     * Category that this store belongs to.
     * 
     * @var \App\StoreCategory
     */
	public $category;

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

        $this->setSlug($name);

        return $this;
    }

    /**
     * Gets the value of address.
     *
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Sets the value of address.
     *
     * @param mixed $address the address
     *
     * @return self
     */
    public function setAddress($address)
    {
        $this->address = $address;

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
     * Gets the value of latitude.
     *
     * @return mixed
     */
    public function getLatitude()
    {
        return $this->latitude;
    }

    /**
     * Sets the value of latitude.
     *
     * @param mixed $latitude the latitude
     *
     * @return self
     */
    public function setLatitude($latitude)
    {
        $this->latitude = $latitude;

        return $this;
    }

    /**
     * Gets the value of longitude.
     *
     * @return mixed
     */
    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Sets the value of longitude.
     *
     * @param mixed $longitude the longitude
     *
     * @return self
     */
    public function setLongitude($longitude)
    {
        $this->longitude = $longitude;

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
     * Gets the value of category.
     *
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Sets the value of category.
     *
     * @param mixed $category the category
     *
     * @return self
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Gets the Store slug.
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Sets the Store slug.
     *
     * @param string $slug the slug
     *
     * @return self
     */
    public function setSlug($name)
    {
        $this->slug = Generate::storeSlugFromName($name);

        return $this;
    }
}