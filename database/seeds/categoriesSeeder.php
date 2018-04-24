<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class categoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
        	['category_name' => 'Video Games'],
        	['category_name' => 'Board Games'],
        	['category_name' => 'Trading Card Games'],
        	['category_name' => 'Yu-Gi-Oh'],
        	['category_name' => 'Call of Duty'],
        	['category_name' => 'Plague Inc']
        	]);
    }
}
