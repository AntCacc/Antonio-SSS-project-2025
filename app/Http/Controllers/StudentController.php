<?php

namespace App\Http\Controllers;


use App\Models\Student;
use App\Models\College;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of students with optional filtering by college.
     */
    public function index(Request $request)
    {
        $colleges = College::all(); // Fetch all colleges for filtering
        $students = Student::query();

        if ($request->has('college_id') && $request->college_id != '') {
            $students->where('college_id', $request->college_id); // Filter by selected college
        }

        $students = $students->orderBy('name')->get(); // Fetch students sorted by name

        return view('students.students', compact('students', 'colleges')); // Updated Blade path
    }

    /**
     * Display the specified student.
     */
    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }


    /**
     * Show the form for creating a new student.
     */
    public function create()
    {
        $colleges = College::all(); // Fetch all colleges for selection
        return view('students.create-edit', compact('colleges')); //use a single create-edit Blade file
    }

    /**
     * Store a newly created student in storage.
     */
    public function store(Request $request)
    {
        // Validate the form inputs
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:students,email',
            'phone' => 'required|digits:8',
            'dob' => 'required|date',
            'college_id' => 'required|exists:colleges,id',
        ]);

        // Create and save the student
        Student::create($request->all());

        // Redirect back with a success message
        return redirect()->route('students.index')->with('success', 'Student added successfully!');
    }


     /**
     * Show the form for editing an existing student.
     */
    public function edit(Student $student)
    {
        $colleges = College::all(); // Fetch all colleges for dropdown
        return view('students.create-edit', compact('student', 'colleges')); // Using the same Blade for create & edit
    }

    /**
     * Update the specified student in the database.
     */
    public function update(Request $request, Student $student)
    {
        // Validate the input fields
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:students,email,' . $student->id,
            'phone' => 'required|digits:8',
            'dob' => 'required|date',
            'college_id' => 'required|exists:colleges,id',
        ]);

        // Update the student details
        $student->update($request->all());

        // Redirect back with a success message
        return redirect()->route('students.index')->with('success', 'Student updated successfully!');
    }

    /**
     * Remove the specified student from the database.
     */
    public function destroy(Student $student)
    {
        $student->delete(); // Delete the student

        // Redirect back with a success message
        return redirect()->route('students.index')->with('success', 'Student deleted successfully!');
    }


    /**
     * Custom function to filter students by college.
     */
    public function filterByCollege($college_id)
    {
        $students = Student::where('college_id', $college_id)->orderBy('name')->get();
        return view('students.students', compact('students')); 
    }

}
