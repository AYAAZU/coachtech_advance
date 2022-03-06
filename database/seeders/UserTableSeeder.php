<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
            'password' => 'passwordtaro',
            'role' => '1',
            'created_at' => $now
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '店舗　次郎',
            'email' => 'jiro@mail.com',
            'password' => 'passwordjiro',
            'role' => '2',
            'created_at' => $now
        ];
        DB::table('users')->insert($param);

        $param = [
            'name' => '顧客　太郎',
            'email' => 'jiro@mail.com',
            'password' => 'passwordjiro',
            'role' => '2',
            'created_at' => $now
        ];
        DB::table('users')->insert($param);
    }
}
