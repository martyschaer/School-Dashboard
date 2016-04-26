<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Task;
use Mail;
use App\User;
use Carbon\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function() {
            $tasks = \DB::table("tasks")
                    ->where("is_done", 0)
                    ->where("reminder_sent", 0)
                    ->where("due_at", ">=", \DB::raw("NOW()"))
                    ->where("due_at", "<", \DB::raw("NOW() + INTERVAL 1 HOUR"))
                    ->get();

            foreach($tasks as $taskObj) {
                $task = Task::findOrFail($taskObj->id);
                $user = $task->user;
                $task->update(["reminder_sent" => 1]);
                Mail::send('email.reminder', ["user" => $user, "task" => $task], function($m) use($user) {
                    $m->from('hello@app.com', 'School-Dashboard');
                    $m->to($user->email, $user->email)->subject("Reminder for task!");
                });
            }
        });
    }
}
