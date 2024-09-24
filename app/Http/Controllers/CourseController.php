<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    //
    public function show(Course $course)
    {
         //eager loading

        $course->load(['unit', 'students']);
        $studentCount = $course->studentCount();
        return view('course', [
            'course'=>$course,
            'students'=>$course->students,
            'studentCount'=> $studentCount
        ]);
    }
}
