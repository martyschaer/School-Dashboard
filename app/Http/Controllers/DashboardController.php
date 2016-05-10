<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Task;
use Auth;
use Input;
use Carbon\Carbon;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $tasks = Auth::user()->tasks;
        $lessons = Auth::user()->lessons;
        $weekdays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday',];
        return View('dashboard.index', compact('tasks', 'lessons', 'weekdays'));
    }
}
