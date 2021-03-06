<?php

namespace App\Platform\Domains;

/**
* 
*/
class StoreStaff
{
    /**
     * Store that the staff member works for.
     * 
     * @var \App\Store
     */
	public $store;

    /**
     * Staff member that is being assigned to this store.
     * 
     * @var \App\Staff
     */
	public $staff;

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
     * Gets the value of staff.
     *
     * @return mixed
     */
    public function getStaff()
    {
        return $this->staff;
    }

    /**
     * Sets the value of staff.
     *
     * @param mixed $staff the staff
     *
     * @return self
     */
    public function setStaff($staff)
    {
        $this->staff = $staff;

        return $this;
    }
}