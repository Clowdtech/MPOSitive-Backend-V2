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
