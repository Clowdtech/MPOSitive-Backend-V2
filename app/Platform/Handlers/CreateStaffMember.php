<?php

namespace App\Platform\Handlers;

use App\Platform\Repositories\StaffRepo;
use App\Platform\Repositories\StoreStaffRepo;
use App\Platform\Repositories\UserRepo;
use App\Platform\Repositories\StoreRepo;

use App\Platform\Domains\Staff as StaffDomain;
use App\Platform\Domains\StoreStaff as StoreStaffDomain;

use Exception;

class CreateStaffMember
{
	protected $staffRepo;
	protected $storeStaffRepo;
	protected $userRepo;
	protected $storeRepo;

	protected $staffDomain;
	protected $storeStaffDomain;

	protected $unprocessed;

	protected $processed;

	private $required = [
		'name',
        'user_id',
        'store_id',
	];

	public function __construct()
	{
		$this->staffRepo = new StaffRepo;
		$this->storeStaffRepo = new StoreStaffRepo;
		$this->storeRepo = new StoreRepo;
		$this->userRepo = new UserRepo;
		$this->staffDomain = new StaffDomain;
		$this->storeStaffDomain = new StoreStaffDomain;
	}

	public function handle(array $data)
	{
		$this->setUnprocessed($data);

		$this->validate();

		return $this->execute();
	}

	public function execute()
	{
		// 1. Find user
		$user = $this->userRepo->find($this->processed['user_id']);
		// 2. Find store
		$store = $this->storeRepo->find($this->processed['store_id']);
		// 3. Create staff domain
		$staff = $this->staffDomain->setName($this->processed['name'])
								   ->setPin($this->processed['pin'])
								   ->setUser($user)
								   ->setStore($store);
		// 4. Store new staff member.
		$createdStaff = $this->staffRepo->create($staff);
		// 5. Create store staff domain.
		$storeStaff = $this->storeStaffDomain->setStore($store)
											 ->setStaff($createdStaff);
		// 6. Persist store staff.
		$createdStoreStaff = $this->storeStaffRepo->create($storeStaff);

		return $createdStaff;
	}

	public function validate()
	{
		foreach ($this->unprocessed as $key => $field) {
			if (in_array($key, $this->required)) {
				if ($field === '' || is_null($field)) {
					throw new Exception("Value cannot be empty. Required values are [" . implode(',', $this->required) . "]");
				}
			}
		}

		$this->setProcessed($this->unprocessed);
	}

    /**
     * Gets the value of unprocessed.
     *
     * @return mixed
     */
    public function getUnprocessed()
    {
        return $this->unprocessed;
    }

    /**
     * Sets the value of unprocessed.
     *
     * @param mixed $unprocessed the unprocessed
     *
     * @return self
     */
    protected function setUnprocessed($unprocessed)
    {
        $this->unprocessed = $unprocessed;

        return $this;
    }

    /**
     * Gets the value of processed.
     *
     * @return mixed
     */
    public function getProcessed()
    {
        return $this->processed;
    }

    /**
     * Sets the value of processed.
     *
     * @param mixed $processed the processed
     *
     * @return self
     */
    protected function setProcessed($processed)
    {
        $this->processed = $processed;

        return $this;
    }
}