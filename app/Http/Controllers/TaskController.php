<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Task;
use Auth;
use Input;
use Redirect;

class TaskController extends Controller
{

    /**
     * Checks if the current user has the permissions to alter the
     * task w owns the task
     */
    public function checkPermissions(int $id)
    {
        $task = Task::findOrFail($id);
        if(Auth::user()->id === $id) {
            return $task;
        } else {
            return Redirect::to('dashboard');
        }
    }

    /**
     *  Creates a new task in the database
     */
    public function store(\Illuminate\Http\Request $request)
    {
        $task = new Task([
            'description' => $request -> taskDescription,
            'is_done' => 0
        ]);

        Auth::user() -> tasks() -> save($task);

        return Redirect::to('dashboard');
    }

    public function update(int $id)
    {
        $this->checkPermissions($id);
        return "Updated $id";
    }

    public function delete(int $id)
    {
        $task = $this->checkPermissions($id);
        return "Deleted $id";
    }
}
