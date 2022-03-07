<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ReviewTableSeeder extends Seeder
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
            'reservation_id' => '1',
            'stars' => '3',
            'comment' => '口コミです。',
            'created_at' => $now
        ];
        DB::table('reviews')->insert($param);

        $param = [
            'reservation_id' => '3',
            'stars' => '3',
            'comment' => '口コミです。',
            'created_at' => $now
        ];
        DB::table('reviews')->insert($param);

        $param = [
            'reservation_id' => '5',
            'stars' => '4',
            'comment' => '口コミです。',
            'created_at' => $now
        ];
        DB::table('reviews')->insert($param);

        $param = [
            'reservation_id' => '6',
            'stars' => '5',
            'comment' => '口コミです。',
            'created_at' => $now
        ];
        DB::table('reviews')->insert($param);
    }
}
