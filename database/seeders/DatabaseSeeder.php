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

        $this->call(UserTableSeeder::class);
        $this->call(AreaTableSeeder::class);
        $this->call(GenreTableSeeder::class);
        $this->call(ShopTableSeeder::class);
        $this->call(ReservationTableSeeder::class);
        $this->call(FavoriteTableSeeder::class);
        $this->call(ReviewTableSeeder::class);
        

    }
}
