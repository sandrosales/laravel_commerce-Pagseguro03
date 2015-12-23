<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\Product;
use Faker\Factory as Faker;
/**
 * Created by PhpStorm.
 * User: chaca
 * Date: 24/09/15\
 * Time: 07:48
 */
class ProdutosTableSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        DB::table('products')->truncate();
        factory('CodeCommerce\Product', 40)->create();
    }


}