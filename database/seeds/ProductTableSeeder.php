<?php

use Illuminate\Database\Seeder;
use App\Product;
class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $products = [
             ["name"=>"Apple","pic"=>"https://www.kofixlabs.co/logo.png","desc"=>"Our Apple","price"=>"1","payment_link"=>"rtvgkhf3"],
        ];
        Product::insert($products);
    }
}
