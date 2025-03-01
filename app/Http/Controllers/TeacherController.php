<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Inertia\Inertia;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function redirectToPageTeachers()
    {

        $teachers = Teacher::all();

        return Inertia::render('Teachers', ['teachers' => $teachers]);
    }

    public function redirectToCurrentPageTeacher($id)
    {
        $currentTeacher = Teacher::with('courses')->findOrFail($id);

        return Inertia::render('TeacherDetail', ['currentTeacher' => $currentTeacher]);
    }
}
