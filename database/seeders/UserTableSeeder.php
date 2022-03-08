<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        $param = [
            'name' => '運営　太郎',
            'email' => 'taro@mail.com',
            'password' => Hash::make('passwordtaro'),
            'role' => '1',
            'created_at' => $now
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '店舗　次郎',
            'email' => 'jiro@mail.com',
            'password' => Hash::make('passwordtaro'),
            'role' => '3',
            'created_at' => $now
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '店舗　三郎',
            'email' => 'saburo@mail.com',
            'password' => Hash::make('passwordsaburo'),
            'role' => '3',
            'created_at' => $now
        ];
        DB::table('users')->insert($param);
        
        $param = [
            'name' => '店舗　四郎',
            'email' => 'shiro@mail.com',
            'password' => Hash::make('passwordshiro'),
            'role' => '3',
            'created_at' => $now
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '顧客　五郎',
            'email' => 'goro@mail.com',
            'password' => Hash::make('passwordgoro'),
            'role' => '5',
            'created_at' => $now
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '顧客　六郎',
            'email' => 'rokuro@mail.com',
            'password' => Hash::make('passwordrokuro'),
            'role' => '5',
            'created_at' => $now
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '顧客　七郎',
            'email' => 'nanaro@mail.com',
            'password' => Hash::make('passwordnanaro'),
            'role' => '5',
            'created_at' => $now
        ];
        DB::table('users')->insert($param);
    }
}
