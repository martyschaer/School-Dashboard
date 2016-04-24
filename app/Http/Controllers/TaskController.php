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

    public function check(int $id)
    {
        $task = $this->checkPermissions($id);
        $task->is_done = 1 - $task->is_done;
        $task->update();
    }

    /**
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function destroy(int $id)
    {
        $task = $this->checkPermissions($id);
        $task->destroy($id);

        $tasks = Auth::user()->tasks;
        return View('tasks.list', compact('tasks'));
    }
}
