<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Playtech ADM',
            'email' => 'playtech@playtechsolutions.com.br',
            'password' => bcrypt('playtech@password'),
        ]);
    }
}
