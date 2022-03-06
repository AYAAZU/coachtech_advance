<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AreaTableSeeder extends Seeder
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
            'name' => '東京都',
            'created_at' => $now
        ];
        DB::table('areas')->insert($param);

        $param = [
            'name' => '大阪府',
            'created_at' => $now
        ];
        DB::table('areas')->insert($param);

        $param = [
            'name' => '福岡県',
            'created_at' => $now
        ];
        DB::table('areas')->insert($param);
    }
}
