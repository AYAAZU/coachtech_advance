<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class FavoriteTableSeeder extends Seeder
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
            'created_at' => $now
        ];
        DB::table('favorites')->insert($param);

        $param = [
            'user_id' => '5',
            'shop_id' => '4',
            'created_at' => $now
        ];
        DB::table('favorites')->insert($param);

        $param = [
            'user_id' => '5',
            'shop_id' => '8',
            'created_at' => $now
        ];
        DB::table('favorites')->insert($param);

        $param = [
            'user_id' => '5',
            'shop_id' => '11',
            'created_at' => $now
        ];
        DB::table('favorites')->insert($param);

        $param = [
            'user_id' => '6',
            'shop_id' => '1',
            'created_at' => $now
        ];
        DB::table('favorites')->insert($param);

        $param = [
            'user_id' => '6',
            'shop_id' => '14',
            'created_at' => $now
        ];
        DB::table('favorites')->insert($param);

        $param = [
            'user_id' => '6',
            'shop_id' => '18',
            'created_at' => $now
        ];
        DB::table('favorites')->insert($param);

        $param = [
            'user_id' => '7',
            'shop_id' => '1',
            'created_at' => $now
        ];
        DB::table('favorites')->insert($param);

        $param = [
            'user_id' => '7',
            'shop_id' => '15',
            'created_at' => $now
        ];
        DB::table('favorites')->insert($param);
    }
}
