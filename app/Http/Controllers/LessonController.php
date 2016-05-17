<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Lesson;
use Auth;
use Illuminate\Support\Facades\Input;
use Redirect;

/**
 * Controller that handles all interaction with lessons.
 *
 * @package App\Http\Controllers
 * @author Marius Schär
 */
class LessonController extends Controller
{
    /**
     * Checks if the current user has permission to access the lesson. If not
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

    /**
     * Export the current users lesson in the .ical format.
     *
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Symfony\Component\HttpFoundation\Response
     */
    public function export()
    {
        $user = Auth::user();
        $lessons = Auth::user()->lessons;

        // Creating the .ical output
        $calendar = new \makinuk\ICalendar\ICalendar();

        foreach ($lessons as $lesson) {
            $event = new \makinuk\ICalendar\ICalEvent();

            $event->setUId(uniqid($lesson->id))
                ->setStartDate($lesson->time_start->getTimestamp())
                ->setEndDate($lesson->time_end->getTimestamp())
                ->setSummary($lesson->name)
                ->setDescription($lesson->details)
                ->setOrganizer(new \makinuk\ICalendar\ICalPerson($user->email, $user->email));

            $calendar->addEvent($event);
        }

        $output = $calendar->getCalendarText();

        // Automatically download the .ical file
        $headers = [
            "Content-Type" => 'text/calendar',
            "Content-Disposition" => 'attachment; filename="lessons.ical"'
        ];
        return Response($output, 200, $headers);

    }
}