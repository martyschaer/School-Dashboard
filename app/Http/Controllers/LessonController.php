<?php

namespace App\Http\Controllers;



use App\Http\Requests;
use App\Lesson;
use Auth;
use Illuminate\Support\Facades\Input;
use Redirect;

/**
 * Class LessonController
 * @package App\Http\Controllers
 * @author Marius Schär
 */
class LessonController extends Controller
{
    /**
     * Checks if the current user has permission to acces   s the lesson. If not
     * the user is redirected to the dashboard.
     *
     * @param int $id
     * @return mixed
     */
    public function checkPermissions($id)
    {
        $lesson = Lesson::findOrFail($id);
        if (Auth::user()->id === $lesson->user->id) {
            return $lesson;
        } else {
            return "No Permission!";
        }
    }

    /**
     * Creates a new lesson in the database.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        // Create a new task from the input data
        $lesson = new Lesson(Input::all());
        Auth::user()->lessons()->save($lesson);

        return Redirect::to('dashboard');
    }

    /**
     * Updates a specific lesson in the database.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function update($id)
    {
        $this->checkPermissions($id);

        // Update the task with the new data
        $lesson = Lesson::findOrFail($id);
        $lesson->update(Input::all());

        // Return the updates list of tasks
        $lessons = Auth::user()->lessons;
        return View('lessons.list', compact('lessons'));
    }

    /**
     * Deletes a specific lesson from the database.
     *
     * @param int $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function destroy($id)
    {
        $lesson = $this->checkPermissions($id);
        $lesson->destroy($id);

        // Return the updated list of tasks
        $lessons = Auth::user()->lessons;
        return View('lessons.list', compact('lessons'));
    }
}