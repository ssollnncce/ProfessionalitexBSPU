<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Inertia\Inertia;
use App\Models\Course;

class CourseController extends Controller
{
    public function redirectToPageCourses()
    {
        $courses = Course::with('teacher')->get();

        return Inertia::render('Courses', ['courses' => $courses]);
    }

    public function redirectToCurrentPageCourse($id)
    {
        $currentCourse = Course::with('teacher', 'courseFamily')->findOrFail($id);

        return Inertia::render('CourseDetail', ['currentCourse' => $currentCourse]);
    }
}
