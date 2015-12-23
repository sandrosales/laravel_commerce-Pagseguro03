<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use CodeCommerce\User;
use Faker\Factory as Faker;
/**
 * Created by PhpStorm.
 * User: chaca
 * Date: 24/09/15\
 * Time: 07:48
 */
class UserTableSeeder extends \Illuminate\Database\Seeder
{
    public function run()
    {
        DB::table('users')->truncate();


        factory('CodeCommerce\User')->create([
            'name' => 'Sandro',
            'email'=> 'sandrofsales@gmail.com',
            'password' => Hash::make(123456),
        ]);

        factory('CodeCommerce\User', 10)->create();
    }


}