<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Grade;
use Illuminate\Support\Facades\Auth;

class GradesController extends Controller
{
    /**
     * Show grades view divided by terms.
     */
    public function index()
    {
        $grades = Grade::where('user_id', Auth::id())->orderBy('term')->get();
        $groupedGrades = $grades->groupBy('term'); // Group grades by term
        
        return view('grades.index', compact('groupedGrades'));
    }

    /**
     * Show form to create a new grade.
     */
    public function create()
    {
        return view('grades.create');
    }

    /**
     * Store a new grade in the database.
     */
    public function store(Request $request)
    {
        $request->validate([
            'course_code' => 'required|string',
            'course_name' => 'required|string',
            'credit_hours' => 'required|integer|min:1',
            'grade' => 'required|string|in:A,A-,B+,B,B-,C+,C,C-,D+,D,F',
            'term' => 'required|integer|min:1',
        ]);

        Grade::create([
            'user_id' => Auth::id(),
            'course_code' => $request->course_code,
            'course_name' => $request->course_name,
            'credit_hours' => $request->credit_hours,
            'grade' => $request->grade,
            'term' => $request->term,
        ]);

        return redirect()->route('grades.index')->with('status', 'Grade added successfully.');
    }

    /**
     * Show the edit form for a grade.
     */
    public function edit($id)
    {
        $grade = Grade::where('user_id', Auth::id())->findOrFail($id);
        return view('grades.edit', compact('grade'));
    }

    /**
     * Update an existing grade.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'course_code' => 'required|string',
            'course_name' => 'required|string',
            'credit_hours' => 'required|integer|min:1',
            'grade' => 'required|string|in:A,A-,B+,B,B-,C+,C,C-,D+,D,F',
            'term' => 'required|integer|min:1',
        ]);

        $grade = Grade::where('user_id', Auth::id())->findOrFail($id);
        $grade->update($request->all());

        return redirect()->route('grades.index')->with('status', 'Grade updated successfully.');
    }

    /**
     * Delete a grade.
     */
    public function destroy($id)
    {
        $grade = Grade::where('user_id', Auth::id())->findOrFail($id);
        $grade->delete();

        return redirect()->route('grades.index')->with('status', 'Grade deleted successfully.');
    }
}
