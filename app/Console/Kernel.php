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
            $tasks = Task::all()->where("is_done", 0)
                                ->where("reminder_sent", 0)
                                ->where("due_at", ">=", Carbon::now()->subMinutes(30));

            foreach($tasks as $task) {
                $user = $task->user;
                $task->reminder_sent = 1;
                $task->update();
                Mail::send('email.reminder', ["user" => $user, "task" => $task], function($m) use($user) {
                    $m->from('hello@app.com', 'School-Dashboard');
                    $m->to($user->email, $user->email)->subject("Reminder for task!");
                });
            }
        });
    }
}
