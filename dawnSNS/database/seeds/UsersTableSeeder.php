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
            'mail' => 'test6@mail',
            'password' => '666666',
            'bio' => '初めまして！',
            'images' => 'dawn.png',
        ];
        DB::table('users')->insert($param);
        
        $param = [
            'username' => 'hika',
            'mail' => 'test5@mail',
            'password' => '555555',
            'bio' => '初めまして！初めまして！',
            'images' => 'dawn.png',
        ];
        DB::table('users')->insert($param);
    }
}
