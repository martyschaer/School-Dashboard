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
    public function checkUser()
    {

    }

    public function store(\Illuminate\Http\Request $request)
    {
        $task = new Task([
            'description' => $request -> taskDescription,
            'is_done' => 0
        ]);

        $user = Auth::user();
        $user -> tasks() -> save($task);

        return Redirect::to('dashboard');
    }

    public function update(int $id)
    {

    }

    public function delete(int $id)
    {
        $this->checkPermissions($id);
        return "Deleted $id";
    }
}
