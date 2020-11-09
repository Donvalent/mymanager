<?php

namespace Database\Seeders;

use App\Models\Days_info;
use App\Models\Employee;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DepartmentSeeder::class);
        User::factory(10)->create()->each(function ($user){
            $user->days_info()->saveMany(Days_info::factory(10)->make());
        });
        $this->call(DepartmentsUsersSeeder::class);
    }
}
