<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $this->call(UsersTableSeeder::class);
      // $this->call(AtlitsTableSeeder::class);
      // $this->call(OfficialsTableSeeder::class);
      // $this->call(KategorisTableSeeder::class);
    }
}
