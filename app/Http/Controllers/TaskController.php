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
    public function checkPermissions(int $id)
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
        $task = new Task(Input::all());

        Auth::user()->tasks()->save($task);

        return Redirect::to('dashboard');
    }

    public function update(int $id)
    {
        $this->checkPermissions($id);
        return "Updated $id";
    }

    /**
     * @param int $id
     * @return string
     */
    public function destroy(int $id)
    {
        $task = $this->checkPermissions($id);
        $task->destroy($id);
    }
}
