<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Task;
use Mail;

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
        /**
         * Send reminder e-mails 30 minutes before the task is due.
         */
        $schedule->call(function() {
            $tasks = Task::where("is_done", 0)
                    ->where("reminder_sent", 0)
                    ->where("due_at", ">=", \DB::raw("NOW()"))
                    ->where("due_at", "<", \DB::raw("NOW() + INTERVAL 1 HOUR"))
                    ->get();

            foreach($tasks as $task) {
                $user = $task->user;
                $task->reminder_sent = 1;
                $task->save();
                Mail::send('email.reminder', ["user" => $user, "task" => $task], function($m) use($user) {
                    $m->to($user->email, $user->email)->subject("Reminder for task!");
                });
            }
        });
    }
}
