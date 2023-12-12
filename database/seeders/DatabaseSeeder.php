<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Administrator;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(PersonSeeder::class);
        $this->call(AdministratorSeeder::class);
        $this->call(ClientSeeder::class);
        $this->call(EmployeeSeeder::class);
        $this->call(SemesterSeeder::class);
        $this->call(TypeMenuSeeder::class);
        $this->call(DrinkSeeder::class);
        $this->call(DishTypeSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ScheduleSeeder::class);
        $this->call(OfferedMenuSeeder::class);
        $this->call(DishSeeder::class);
        $this->call(DishOfferedMenuSeeder::class);
        $this->call(ReservationSeeder::class);
        $this->call(EntryRegisterSeeder::class);
        $this->call(PaymentSeeder::class);
        //$this->call(DrinkConsumptionSeeder::class);
    }
}
