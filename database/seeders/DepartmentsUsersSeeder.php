<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersId = DB::table('users')->pluck('id');
        $departmentsId = array();

        foreach (DB::table('departments')->pluck('id') as $department)
            array_push($departmentsId, $department);

        foreach ($usersId as $userId)
        {
            $departmentsRandomId = array_rand($departmentsId, 1);

            for ($i = $departmentsId[array_key_first($departmentsId)]; $i <= $departmentsId[$departmentsRandomId]; $i++)
            {
                DB::table('users_departments')->insert([
                    'employee_id' => $userId,
                    'department_id' => $i
                ]);
            }
        }
    }
}
