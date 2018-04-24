<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
        	['product_name' => 'Call of Duty Black Ops', 'product_description' => 'The game Call of Duty Black Ops. Made by Treyarch.', 'product_price' => '59.99'],
        	['product_name' => 'Call of Duty Black Ops 2', 'product_description' => 'The game Call of Duty Black Ops 2. Made by Treyarch.', 'product_price' => '59.99'],
        	['product_name' => 'Call of Duty Black Ops 3', 'product_description' => 'The game Call of Duty Black Ops 3. Made by Treyarch.', 'product_price' => '59.99'],
        	['product_name' => 'Plague Inc: Evolved', 'product_description' => 'Can you infect the world?', 'product_price' => '11.99'],
        	['product_name' => 'Plague Inc: The Board Game', 'product_description' => 'You can play it with friends.', 'product_price' => '19.99'],
        	['product_name' => 'Yu-Gi-Oh Booster Pack: Circuit Break', 'product_description' => 'A booster pack for Yu-Gi-Oh. Contains 9 cards per pack.', 'product_price' => '4.00'],
        	['product_name' => 'Yu-Gi-Oh Booster Pack: Code of the Duelist', 'product_description' => 'A booster pack for Yu-Gi-Oh. Contains 9 cards per pack.', 'product_price' => '4.00']
        	]);
    }
}
