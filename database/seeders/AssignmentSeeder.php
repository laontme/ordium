<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;

class AssignmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::with(['assignments', 'emissions'])->get()->map(function ($item, $key) {
            $assignments[] = User::get()->random()->id;
            $assignments[] = User::where("id", "<>", $assignments[0])->get()->random()->id;

            $item->assignments()->sync($assignments);
        });
    }
}
