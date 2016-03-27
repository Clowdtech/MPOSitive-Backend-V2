<?php

namespace App\Platform\Domains;

/**
* StoreProductCategory domain.
*/
class StoreProductCategory
{
	public $active;
	public $store;
	public $storeProductCategory;

    /**
     * Gets the value of active.
     *
     * @return mixed
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Sets the value of active.
     *
     * @param mixed $active the active
     *
     * @return self
     */
    public function setActive($active)
    {
        $this->active = $active;

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
     * Gets the value of storeProductCategory.
     *
     * @return mixed
     */
    public function getStoreProductCategory()
    {
        return $this->storeProductCategory;
    }

    /**
     * Sets the value of storeProductCategory.
     *
     * @param mixed $storeProductCategory the store product category
     *
     * @return self
     */
    public function setStoreProductCategory($storeProductCategory)
    {
        $this->storeProductCategory = $storeProductCategory;

        return $this;
    }
}