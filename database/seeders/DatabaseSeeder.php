<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    /*$this->call(ShopTableSeeder::class);*/
    public function run()
    {

        /*Schema::disableForeignKeyConstraints(); //外部キーチェックを無効にする
        \App\Models\Reservation::truncate();
        Schema::enableForeignKeyConstraints(); //外部キーチェックを有効にする*/

        
        $this->call(ShopTableSeeder::class);
        /*$this->call(UserTableSeeder::class);
        /*$this->call(AreaTableSeeder::class);*/
        /*$this->call(GenreTableSeeder::class);
        /*$this->call(ReservationTableSeeder::class);*/
        /*$this->call(FavoriteTableSeeder::class);*/
        /*$this->call(ReviewTableSeeder::class);*/
        /*$this->call(*TableSeeder::class);*/

    }
}
