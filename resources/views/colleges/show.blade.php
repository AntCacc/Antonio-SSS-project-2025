@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8 px-4 mb-12">
    <div class="bg-white rounded-md shadow-md p-6">
        <h1 class="text-2xl font-semibold text-gray-800 mb-4">College Details</h1>

        <div class="mb-6">
            <p class="text-gray-700"><strong>Name:</strong> {{ $college->name }}</p>
            <p class="text-gray-700"><strong>Address:</strong> {{ $college->address }}</p>
        </div>

        <h2 class="text-xl font-semibold text-gray-800 mb-4">Students in this College</h2>

        <div class="overflow-x-auto bg-white rounded-md shadow-md">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase">Name</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase">Email</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($college->students as $student)
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $student->name }}</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $student->email }}</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <a href="{{ route('students.show', $student->id) }}" class="text-blue-500 hover:text-blue-700">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('students.edit', $student->id) }}" class="text-yellow-500 hover:text-yellow-700 ml-2">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            <a href="{{ route('colleges.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">
                Back to List
            </a>
        </div>
    </div>
</div>
@endsection
