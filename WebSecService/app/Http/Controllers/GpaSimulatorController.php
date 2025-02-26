<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GpaSimulatorController extends Controller
{
    public function index()
    {
        $courses = [
            ['code' => 'CS101', 'title' => 'Computer Science Basics', 'credit_hours' => 3],
            ['code' => 'MATH102', 'title' => 'Calculus I', 'credit_hours' => 4],
            ['code' => 'ENG103', 'title' => 'English Composition', 'credit_hours' => 2],
            ['code' => 'PHY104', 'title' => 'Physics I', 'credit_hours' => 3],
            ['code' => 'HIST105', 'title' => 'World History', 'credit_hours' => 2],
        ];

        return view('gpa-simulator', compact('courses'));
    }
}
