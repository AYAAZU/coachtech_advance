<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReservationTableSeeder extends Seeder
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
            'user_id' => '5',
            'shop_id' => '1',
            'start_datetime' => '2022-02-01 17:30',
            'number' => '2',
            'created_at' => $now
        ];
        DB::table('reservations')->insert($param);

        $param = [
            'user_id' => '5',
            'shop_id' => '2',
            'start_datetime' => '2022-02-21 18:30',
            'number' => '5',
            'created_at' => $now
        ];
        DB::table('reservations')->insert($param);

        $param = [
            'user_id' => '5',
            'shop_id' => '3',
            'start_datetime' => '2022-02-25 18:30',
            'number' => '2',
            'created_at' => $now
        ];
        DB::table('reservations')->insert($param);

        $param = [
            'user_id' => '5',
            'shop_id' => '7',
            'start_datetime' => '2022-03-25 19:00',
            'number' => '3',
            'created_at' => $now
        ];
        DB::table('reservations')->insert($param);

        $param = [
            'user_id' => '6',
            'shop_id' => '1',
            'start_datetime' => '2022-02-12 18:30',
            'number' => '3',
            'created_at' => $now
        ];
        DB::table('reservations')->insert($param);

        $param = [
            'user_id' => '6',
            'shop_id' => '3',
            'start_datetime' => '2022-03-01 18:30',
            'number' => '3',
            'created_at' => $now
        ];
        DB::table('reservations')->insert($param);

        $param = [
            'user_id' => '6',
            'shop_id' => '5',
            'start_datetime' => '2022-03-06 18:30',
            'number' => '3',
            'created_at' => $now
        ];
        DB::table('reservations')->insert($param);

        $param = [
            'user_id' => '6',
            'shop_id' => '8',
            'start_datetime' => '2022-03-23 18:30',
            'number' => '3',
            'created_at' => $now
        ];
        DB::table('reservations')->insert($param);
    }
}
