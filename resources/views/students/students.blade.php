@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8 px-4">
        <!-- Header with Button -->
    <div class="flex justify-between mb-4">
        <h1 class="text-2xl font-semibold text-gray-800">Student List</h1>
        <a href="{{ route('students.create') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Add Student
        </a>
    </div>

    <!-- Filter Section -->
    <div class="bg-white rounded-md shadow-md p-4 mb-4">
        <form method="GET" action="{{ route('students.index') }}">
            <div class="mb-4">
                <label for="collegeFilter" class="block text-gray-700 text-sm font-bold mb-2">Filter by College</label>
                <select name="college_id" id="collegeFilter" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">All Colleges</option>
                    @foreach($colleges as $college)
                        <option value="{{ $college->id }}" {{ request('college_id') == $college->id ? 'selected' : '' }}>
                            {{ $college->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Filter
            </button>
        </form>
    </div>
    

    <!-- Table Section -->
    <div class="overflow-x-auto bg-white rounded-md shadow-md p-4 mb-10">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Email</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Phone</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">College</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Date of Birth</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($students as $student)
                <tr>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $student->name }}</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $student->email }}</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $student->phone }}</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $student->college->name }}</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $student->dob }}</td>
                    <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                        <a href="{{ route('students.show', $student->id) }}" class="text-blue-500 hover:text-blue-700">
                            <i class="fas fa-eye"></i>
                        </a>                        
                        <a href="{{ route('students.edit', $student->id) }}" class="text-yellow-500 hover:text-yellow-700 ml-2"><i class="fas fa-edit"></i></a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700 ml-2" onclick="return confirm('Are you sure?');">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    
</div>
@endsection
