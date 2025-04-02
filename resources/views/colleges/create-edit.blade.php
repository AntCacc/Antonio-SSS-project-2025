@extends('layouts.app')

@section('content')

<!-- Main container for the form -->
<div class="container mx-auto mt-8 px-4 mb-12">
    <div class="max-w-lg mx-auto bg-white p-6 rounded-md shadow-md">

        <!-- Form heading: dynamically changes based on create or edit mode -->
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">
            {{ isset($college) ? 'Edit College' : 'Add College' }}
        </h2>

        <!-- College form starts here -->
        <form method="POST" action="{{ isset($college) ? route('colleges.update', $college->id) : route('colleges.store') }}">
            @csrf
            @if(isset($college))
                @method('PUT')
            @endif

            <!-- College Name input field -->
            <div class="mb-4">
                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">College Name</label>
                <input type="text" name="name" id="name" class="w-full px-3 py-2 border rounded @error('name') border-red-500 @enderror" value="{{ old('name', $college->name ?? '') }}" required>
                @error('name')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>

            <!-- Address input field -->
            <div class="mb-4">
                <label for="address" class="block text-gray-700 text-sm font-bold mb-2">Address</label>
                <input type="text" name="address" id="address" class="w-full px-3 py-2 border rounded @error('address') border-red-500 @enderror" value="{{ old('address', $college->address ?? '') }}" required>
                @error('address')
                    <div class="text-red-500 mt-2">{{ $message }}</div>
                @enderror
            </div>


            <!-- Form action buttons -->
            <div class="flex justify-end">
                <a href="{{ route('colleges.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">
                    Cancel
                </a>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                    {{ isset($college) ? 'Update' : 'Add' }} College
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
