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
	/**
	 * [$staffRepo description]
	 * @var [type]
	 */
	protected $staffRepo;

	/**
	 * [$staffRepo description]
	 * @var [type]
	 */
	protected $storeStaffRepo;

	/**
	 * [$staffRepo description]
	 * @var [type]
	 */
	protected $userRepo;

	/**
	 * [$staffRepo description]
	 * @var [type]
	 */
	protected $storeRepo;

	/**
	 * [$staffRepo description]
	 * @var [type]
	 */
	protected $staffDomain;

	/**
	 * [$staffRepo description]
	 * @var [type]
	 */
	protected $storeStaffDomain;


	public function __construct()
	{
		$this->staffRepo = new StaffRepo;
		$this->storeStaffRepo = new StoreStaffRepo;
		$this->storeRepo = new StoreRepo;
		$this->userRepo = new UserRepo;
		$this->staffDomain = new StaffDomain;
		$this->storeStaffDomain = new StoreStaffDomain;
	}

	/**
	 * Handle staff member creation.
	 * @param  array  $data [description]
	 * @return [type]       [description]
	 */
	public function handle(array $data)
	{
		// 1. Find user
		$user = $this->userRepo->find($data['user_id']);
		// 2. Find store
		$store = $this->storeRepo->find($data['store_id']);
		// 3. Create staff domain
		$staff = $this->staffDomain->setName($data['name'])
								   ->setPin($data['pin'])
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

}