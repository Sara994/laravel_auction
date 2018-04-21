<?php

use Illuminate\Database\Seeder;
use App\ItemCategory;
use App\User;
use App\City;
use App\Item;
use App\Auction;

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
        User::create([
            'username'=>'Maram',
            'email'=>'mrm@asd.com',
            'password'=>bcrypt('123123123'),
            'phone'=>'05300123123',
            'postcode'=>'123331',
            'first_name'=>'Maram',
            'last_name'=>'m',
            'city_id'=>2    
        ]);
        ItemCategory::create([
            'title'=>'Electronics'
        ]);
        ItemCategory::create([
            'title'=>'computers',
            'parent_id'=>1
        ]);
        Item::create([
            'title'=>'Dell XPS 13',
            'subtitle'=>"Dell Laptop XPS 13",
            'description'=>"Some description sdf sdf ",
            'buy_now'=>1000,
            'status'=>0,
            'pay_method'=>"cash",
            'ship_method'=>"FedEX",
            "photos"=>"[]",
            "category_id"=>2,
            "seller_id"=>2,
            "city_id"=>2
        ]);

        Auction::create([
            'start_time'=>'2018-04-14',
            'end_time'=>'2018-04-21',
            'start_price'=>100,
            'min_increment'=>50,
            'buy_now'=>1500            
        ]);

        Item::create([
            'title'=>'Lenovo XPS 13',
            'subtitle'=>"Lenovo Laptop XPS 13",
            'description'=>"Some description sdf sdf ",
            'buy_now'=>1000,
            'status'=>0,
            'pay_method'=>"cash",
            'ship_method'=>"FedEX",
            "photos"=>"[]",
            "category_id"=>2,
            "seller_id"=>1,
            "city_id"=>2,
            "auction_id"=>1
        ]);
    }
}
