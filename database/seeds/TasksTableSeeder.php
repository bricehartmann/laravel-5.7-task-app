<?php

use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;

class TasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // get all users
        $users = User::all();

        // loop through each user
        foreach ($users as $user) {
            // determine how many tasks to create for the user
            $limit = random_int(10, 20);

            // create a new task until the limit is hit
            for ($i = 0; $i < $limit; $i++) {
                // make a new random task
                $task = factory(Task::class)->make();

                // associate the task to the user
                $task->user()->associate($user);

                // save the task
                $task->save();
            }
        }
    }
}
