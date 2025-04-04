<?php

namespace App\Http\Controllers;

use App\Models\College;
use Illuminate\Http\Request;

class CollegeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colleges = College::all();
        return view('colleges.colleges', compact('colleges')); // Updated path
    }

    /**
     * Display the specified college.
     */
    public function show(College $college)
    {
        return view('colleges.show', compact('college'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('colleges.create-edit'); // Use the shared create-edit view
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate form inputs
        $request->validate([
            'name' => 'required|unique:colleges,name,' . ($college->id ?? 'NULL') . ',id', // The uniqueness check excludes the current college's ID (if it exists) to allow updating without conflict.
            'address' => 'required'
        ]);        

        // Create and save the college
        College::create($request->all());

        // Redirect back with a success message
        return redirect()->route('colleges.index')->with('success', 'College added successfully!');
    }


    /**
     * Show the form for editing the specified college.
     */
    public function edit(College $college)
    {
        return view('colleges.create-edit', compact('college')); // Pass the college data for editing
    }

    /**
     * Update the specified college in the database.
     */
    public function update(Request $request, College $college)
    {
        // Validate the input fields
        $request->validate([
            'name' => 'required|unique:colleges,name,' . ($college->id ?? 'NULL') . ',id', // The uniqueness check excludes the current college's ID (if it exists) to allow updating without conflict.
            'address' => 'required'
        ]);        

        // Update the college details
        $college->update($request->all());

        // Redirect back with a success message
        return redirect()->route('colleges.index')->with('success', 'College updated successfully!');
    }


}
