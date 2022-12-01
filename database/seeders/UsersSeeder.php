<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("users")->insert([
            [
                'id' => 1,
                'role_id' => 1,
                'email' => 'a@abc.org',
                'password' => Hash::make("Secret!")
            ],
            [
                'id' => 2,
                'role_id' => 2,
                'email' => 'b@abc.org',
                'password' => Hash::make("Secret!")
            ],
        ]);
    }
}
