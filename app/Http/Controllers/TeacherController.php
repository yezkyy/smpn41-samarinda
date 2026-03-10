<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::orderBy('name')->get();
        return view('pages.teachers', compact('teachers'));
    }

    public function show(Teacher $teacher)
    {
        return view('pages.teacher-detail', compact('teacher'));
    }
}
