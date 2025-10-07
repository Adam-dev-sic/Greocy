<?php

namespace Database\Seeders;

use App\Models\Shop;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        Shop::create(
            [
                "first_name" => "Adam",
                "last_name" => "Yakoub",
                "email" => "ademyak2006@gmail.com",
                "password" => bcrypt("fakepassword"),
                "is_admin" => true,

            ]

        );


        // Product::create([
        //     "name" => "Apple",
        //     "quantity" => "1kg",
        //     "price" => 4.58,
        //     "admin_id" => 1,
        //     "image" => "./assets/apple.jpg",
        //     "tag" => "Fruits"
        // ]);

        // Product::create([
        //     "name" => "Banana",
        //     "quantity" => "1kg",
        //     "price" => 3.20,
        //     "admin_id" => 1,
        //     "image" => "./assets/banana.jpg",
        //     "tag" => "Fruits"
        // ]);

        // Product::create([
        //     "name" => "Orange",
        //     "quantity" => "1kg",
        //     "price" => 4.10,
        //     "admin_id" => 1,
        //     "image" => "./assets/orange.jpg",
        //     "tag" => "Fruits"
        // ]);

        // Product::create([
        //     "name" => "Tomato",
        //     "quantity" => "1kg",
        //     "price" => 2.80,
        //     "admin_id" => 1,
        //     "image" => "./assets/tomato.jpg",
        //     "tag" => "Vegetables"
        // ]);

        // Product::create([
        //     "name" => "Potato",
        //     "quantity" => "1kg",
        //     "price" => 1.90,
        //     "admin_id" => 1,
        //     "image" => "./assets/potato.jpg",
        //     "tag" => "Vegetables"
        // ]);


    }
}
