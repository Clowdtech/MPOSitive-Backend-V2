<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(StoreCategoriesSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(StoreSeeder::class);
    }
}

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Store::create([
            'name' => 'my first store',
            'address' => '90 Gaysham avenue, Ilford, IG2 6TA, Unite Kingdom',
            'latitude' => 51.5798718,
            'longitude' => 0.07193119999999453,
            'category_id'   =>  \App\StoreCategory::first()->id,
            'user_id'   =>  \App\User::first()->id,
        ]);
    }
}


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\App\User::create([
    		'name' => 'Imants Kusins',
    		'password'	=> \Hash::make('password'),
    		'email'	=> 'imants.kusins@gmail.com',
    	]);
    }
}


class StoreCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	\App\StoreCategory::create([
    		'name' => 'Coffee Shop',
    		'active'	=>	true,
    	]);
    }
}
