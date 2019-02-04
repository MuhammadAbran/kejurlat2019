<?php

use Illuminate\Database\Seeder;

class AtlitsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Atlit::class, 20)->create();
    }
}
