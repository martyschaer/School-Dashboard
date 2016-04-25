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
}
