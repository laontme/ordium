<?php

namespace Database\Seeders;

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Seeder;

class EmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Order::with(['assignments', 'emissions'])->get()->map(function ($item, $key) {
            $emissions[] = User::where("role_id", "<>", 4)->get()->random()->id;
            $emissions[] = User::where("role_id", "<>", 4)->where("id", "<>", $emissions[0])->get()->random()->id;

            $item->emissions()->sync($emissions);
        });
    }
}
