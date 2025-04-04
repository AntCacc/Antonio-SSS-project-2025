@extends('layouts.app')

@section('content')
<!-- Main container for the form -->
<div class="container mx-auto mt-8 px-4 mb-12">
    <div class="max-w-lg mx-auto bg-white p-6 rounded-md shadow-md">

        <!-- Form heading: dynamically changes based on create or edit mode -->
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">
            {{ isset($student) ? 'Edit Student' : 'Add Student' }}
        </h2>

        <!-- Student form starts here -->
        <!-- The form action dynamically switches between store and update routes based on whether a student exists -->
        <form method="POST" action="{{ isset($student) ? route('students.update', $student->id) : route('students.store') }}" novalidate>
            @include('students.partials.student-form')
        </form>
    </div>
</div>
@endsection
