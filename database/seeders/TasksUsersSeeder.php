<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TasksUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usersId = DB::table('users')->pluck('id');
        $tasksId = array();

        foreach (DB::table('tasks')->pluck('id') as $task)
            array_push($tasksId, $task);

        foreach ($usersId as $userId)
        {
            $tasksRandomId = array_rand($tasksId, 1);

            for ($i = $tasksId[array_key_first($tasksId)]; $i <= $tasksId[$tasksRandomId]; $i++)
            {
                DB::table('users_tasks')->insert([
                    'employee_id' => $userId,
                    'task_id' => $i
                ]);
            }
        }
    }
}
