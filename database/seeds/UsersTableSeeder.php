<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // factory(\App\User::class, 20)->create();
        DB::table('users')->insert([
           'nama_instansi' => 'UGM',
           'nama_manager' => 'Agung M',
           'email_manager' => 'a@a.a',
           'password' => bcrypt('aaa'),
        ]);
        DB::table('users')->insert([
           'nama_instansi' => 'admin',
           'nama_manager' => 'admin',
           'email_manager' => 'admin@kejurlat.com',
           'role' => 1,
           'password' => bcrypt('aaa'),
        ]);
    }
}
