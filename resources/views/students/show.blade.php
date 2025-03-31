@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8 px-4">
    <div class="bg-white rounded-md shadow-md p-6">
        <h1 class="text-2xl font-semibold text-gray-800 mb-4">Student Details</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <p class="text-gray-700"><strong>Name:</strong> {{ $student->name }}</p>
                <p class="text-gray-700"><strong>Email:</strong> {{ $student->email }}</p>
                <p class="text-gray-700"><strong>Phone:</strong> {{ $student->phone }}</p>
                <p class="text-gray-700"><strong>Date of Birth:</strong> {{ $student->dob }}</p>
            </div>
            <div>
                <p class="text-gray-700"><strong>College:</strong> 
                    <a href="{{ route('colleges.show', $student->college->id) }}" class="text-blue-500 hover:text-blue-700">
                        {{ $student->college->name }}
                    </a>
                </p>
            </div>
        </div>

        <div class="mt-6">
            <a href="{{ route('students.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Back to List
            </a>
            <a href="{{ route('students.edit', $student->id) }}" class="ml-2 bg-yellow-500 hover:bg-yellow-700 text-white font-bold py-2 px-4 rounded">
                Edit
            </a>
        </div>        
    </div>
</div>
@endsection
