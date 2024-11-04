<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\City;
use App\Models\Order;
use App\Models\OrderDetails;
use App\Models\Payment;
use App\Models\Product;
use App\Models\Review;
use App\Models\Shipping;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Category::factory(10)->create();
         City::factory(60)->create();
         User::factory(100)->create();
         Product::factory(100)->create();
         Order::factory(100)->create();
         OrderDetails::factory(100)->create();
         Payment::factory(100)->create();
         Shipping::factory(100)->create();
         Review::factory(100)->create();
    }
}
