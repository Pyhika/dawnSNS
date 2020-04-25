<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'username' => 'hikaru',
            'mail' => 'sky@mail',
            'password' => '4dare',
            'bio' => '初めまして！',
        ];
    DB::table('users')->insert($param);
    }
}
