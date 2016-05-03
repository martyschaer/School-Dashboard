<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\Task;
use Auth;
use Illuminate\Support\Facades\Input;
use Redirect;

/**
 * Class TaskController
 * @package App\Http\Controllers
 *
 * @author Severin Kaderli
 */
class TaskController extends Controller
{

    /**
     * Checks if the current user has permission to access the task. If not
     * the user is redirected to the dashboard.
     *
     * @param int $id
     * @return mixed
     */
    public function checkPermissions($id)
    {
        $task = Task::findOrFail($id);
        if (Auth::user()->id === $task->user->id) {
            return $task;
        } else {
            return "No Permission!";
        }
    }

    /**
     * Creates a new task in the database.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        // Create a new task from the input data
        $task = new Task(Input::all());
        Auth::user()->tasks()->save($task);

        return Redirect::to('dashboard');
    }

    /**
     * Updates a specific task in the database.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update($id)
    {
        $this->checkPermissions($id);

        // Update the task with the new data
        $task = Task::findOrFail($id);
        $task->update(Input::all());

        // Return the updates list of tasks
        $tasks = Auth::user()->tasks;
        return View('tasks.list', compact('tasks'));
    }

    /**
     * Toggles the state of a task between finished and not finished.
     *
     * @param $id
     * @return void
     */
    public function check($id)
    {
        $task = $this->checkPermissions($id);

        // Toggle between 0 and 1
        $task->is_done = 1 - $task->is_done;
        $task->update();
    }

    /**
     * Deletes a specific task from the database.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function destroy($id)
    {
        $task = $this->checkPermissions($id);
        $task->destroy($id);

        // Return the updated list of tasks
        $tasks = Auth::user()->tasks;
        return View('tasks.list', compact('tasks'));
    }

    /**
     * Returns the tasks in .ical format.
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function export()
    {
        $user = Auth::user();
        $tasks = Auth::user()->tasks;

        // Creating the .ical output
        $calendar = new \makinuk\ICalendar\ICalendar();

        foreach ($tasks as $task) {
            $event = new \makinuk\ICalendar\ICalEvent();

            $event->setUId(uniqid($task->id))
                ->setStartDate($task->due_at->getTimestamp())
                ->setEndDate($task->due_at->addMinutes(30)->getTimestamp())
                ->setSummary($task->description)
                ->setDescription($task->description)
                ->setOrganizer(new \makinuk\ICalendar\ICalPerson($user->email, $user->email));

            $calendar->addEvent($event);
        }

        $output = $calendar->getCalendarText();

        // Automatically download the .ical file
        $headers = [
            "Content-Type" => 'text/calendar',
            "Content-Disposition" => 'attachment; filename="tasks.ical"'
        ];
        return Response($output, 200, $headers);
    }
}
