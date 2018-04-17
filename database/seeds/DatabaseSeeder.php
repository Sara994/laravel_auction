<?php

use Illuminate\Database\Seeder;
use App\ItemCategory;
use App\User;
use App\City;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        City::create(['name'=>'Riyadh']);
        City::create(['name'=>'Jeddha']);
        User::create([
            'username'=>'abdulrahman',
            'email'=>'asd@asd.com',
            'password'=>bcrypt('123123123'),
            'phone'=>'05300123123',
            'postcode'=>'123331',
            'first_name'=>'Abdulrahman',
            'last_name'=>'Alsoghayer',
            'city_id'=>1            
        ]);
        ItemCategory::create([
            'title'=>'Electronics'
        ]);
        ItemCategory::create([
            'title'=>'computers',
            'parent_id'=>1
        ]);
    }
}
