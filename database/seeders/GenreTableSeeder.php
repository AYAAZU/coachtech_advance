<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class GenreTableSeeder extends Seeder
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
            'name' => '寿司',
            'created_at' => $now
        ];
        DB::table('genres')->insert($param);

        $param = [
            'name' => '焼肉',
            'created_at' => $now
        ];
        DB::table('genres')->insert($param);

        $param = [
            'name' => '居酒屋',
            'created_at' => $now
        ];
        DB::table('genres')->insert($param);

        $param = [
            'name' => 'イタリアン',
            'created_at' => $now
        ];
        DB::table('genres')->insert($param);

        $param = [
            'name' => 'ラーメン',
            'created_at' => $now
        ];
        DB::table('genres')->insert($param);
    }
}
