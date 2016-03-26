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
        $this->call(SalesmenSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(StoreSeeder::class);
        $this->call(ProductCategory::class);
    }
}



class SalesmenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Salesman::create([
            'name'  =>  'System',
        ]);
    }
}


class ProductCategory extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\ProductCategory::create([
            'name'  =>  'Latte',
            'active'    =>  true,
            'user_id'   =>  \App\User::first()->id,
            'store_id' => \App\Store::first()->id,
        ]);
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
            'uid' => uniqid(),
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
            'email' => 'imants.kusins@gmail.com',
    		'salesman_id'	=> \App\Salesman::first()->id,
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
