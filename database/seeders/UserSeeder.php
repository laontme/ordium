<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory(2)->create([
            "role_id" => 1,
        ]);
        User::factory(2)->create([
            "role_id" => 2,
        ]);
        User::factory(2)->create([
            "role_id" => 3,
        ]);
        User::factory(10)->create([
            "role_id" => 4,
        ]);
    }
}
