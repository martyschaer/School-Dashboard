<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Task;
use Auth;
use Input;
use Request;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {

        $tasks = Auth::user()->tasks;
        return View('dashboard.index', compact('tasks'));
    }
}
