<?php

use Illuminate\Database\Seeder;

class OfficialsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(App\Official::class, 20)->create();
    }
}
