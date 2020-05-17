<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $param = [
            'username' => 'hikaru',
            'mail' => 'test7@mail',
            'password' => '777777',
            'bio' => '初めまして！',
            'images' => 'dawn.png',
        ];
        DB::table('users')->insert($param);
        
        $param = [
            'username' => 'hika',
            'mail' => 'test8@mail',
            'password' => '888888',
            'bio' => '初めまして！初めまして！',
            'images' => 'dawn.png',
        ];
        DB::table('users')->insert($param);
    }
}
