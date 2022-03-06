<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

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
        
        $this->call(FlightSeeder::class);
        $this->call(AreaTableSeeder::class);
        $this->call(GenreTableSeeder::class);

        $this->call(*TableSeeder::class);
        $this->call(*TableSeeder::class);
        $this->call(*TableSeeder::class);
        $this->call(*TableSeeder::class);
        $this->call(*TableSeeder::class);
        $this->call(*TableSeeder::class);

    }
}
