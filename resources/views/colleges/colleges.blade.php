@extends('layouts.app')

@section('content')
<div class="container mx-auto mt-8 px-4 mb-12">
    <!-- Success Message with Auto-Dismiss -->
    @if(session('success'))
        <div id="success-alert" class="bg-green-500 text-white p-3 rounded-md mb-4">
            {{ session('success') }}
        </div>

        <script>
            setTimeout(() => {
                const alertBox = document.getElementById('success-alert');
                if (alertBox) {
                    alertBox.style.transition = "opacity 0.5s";
                    alertBox.style.opacity = "0";
                    setTimeout(() => alertBox.remove(), 500);
                }
            }, 3000); // Hide after 3 seconds
        </script>
    @endif

    <!-- College List Heading -->
    <h2 class="text-2xl font-semibold text-gray-800 mb-4">Colleges List</h2>

    <!-- Add College Button -->
    <a href="{{ route('colleges.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mb-6 inline-block">Add College</a>

    <!-- Colleges Table -->
    <div class="overflow-x-auto bg-white rounded-md shadow-md p-4">
        <table class="min-w-full leading-normal">
            <thead>
                <tr>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Address</th>
                    <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($colleges as $college)
                    <tr>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $college->name }}</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $college->address }}</td>
                        <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                            <a href="{{ route('colleges.show', $college->id) }}" class="text-blue-500 hover:text-blue-700 ml-2">
                                <i class="fas fa-eye"></i>
                            </a>                            
                            <a href="{{ route('colleges.edit', $college->id) }}" class="text-yellow-500 hover:text-yellow-700 ml-2">
                                <i class="fas fa-edit"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
