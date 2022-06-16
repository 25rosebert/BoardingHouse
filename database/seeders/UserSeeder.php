<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use APp\Models\Properties;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::factory()
            ->count(5)
            ->create();

    }
}
