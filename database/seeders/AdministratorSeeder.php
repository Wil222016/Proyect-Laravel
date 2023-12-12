<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Administrator;

class AdministratorSeeder extends Seeder
{
    public function run()
    {
        Administrator::factory()->count(50)->create();
    }
}
