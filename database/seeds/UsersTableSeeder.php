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
            'email_verified_at' => now(),
            'password' => bcrypt('playtech@password'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
