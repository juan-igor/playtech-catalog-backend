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
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => bcrypt('playtech@password'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'name' => 'Male Version ADM',
            'email' => 'maleversion@maleversionstore.com.br',
            'email_verified_at' => date('Y-m-d H:i:s'),
            'password' => bcrypt('maleversionstore@password'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
