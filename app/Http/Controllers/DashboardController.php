<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Auth;

/**
 * Controller that handles all interaction with the dashboard.
 *
 * @package App\Http\Controllers
 * @author Severin Kaderli
 */
class DashboardController extends Controller
{

    /**
     * Assign the auth-middleware to this controller.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $tasks = Auth::user()->tasks;
        $lessons = Auth::user()->lessons;
        $weekdays = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday',];
        return View('dashboard.index', compact('tasks', 'lessons', 'weekdays'));
    }
}
