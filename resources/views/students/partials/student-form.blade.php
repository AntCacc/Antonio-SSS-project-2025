@csrf
@if(isset($student))
    @method('PUT')
@endif

<!-- Name input field -->
<div class="mb-4">
    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
    <input type="text" name="name" id="name" class="w-full px-3 py-2 border rounded @error('name') border-red-500 @enderror"
           value="{{ old('name', $student->name ?? '') }}" required>
    @error('name')
        <div class="text-red-500 mt-2">{{ $message }}</div>
    @enderror
</div>

<!-- Email input field -->
<div class="mb-4">
    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
    <input type="email" name="email" id="email" class="w-full px-3 py-2 border rounded @error('email') border-red-500 @enderror"
           value="{{ old('email', $student->email ?? '') }}" required>
    @error('email')
        <div class="text-red-500 mt-2">{{ $message }}</div>
    @enderror
</div>

<!-- Phone input field -->
<div class="mb-4">
    <label for="phone" class="block text-gray-700 text-sm font-bold mb-2">Phone</label>
    <input type="text" name="phone" id="phone" class="w-full px-3 py-2 border rounded @error('phone') border-red-500 @enderror"
           value="{{ old('phone', $student->phone ?? '') }}" required>
    @error('phone')
        <div class="text-red-500 mt-2">{{ $message }}</div>
    @enderror
</div>

<!-- Date of Birth input field -->
<div class="mb-4">
    <label for="dob" class="block text-gray-700 text-sm font-bold mb-2">Date of Birth</label>
    <input type="date" name="dob" id="dob" class="w-full px-3 py-2 border rounded @error('dob') border-red-500 @enderror"
           value="{{ old('dob', $student->dob ?? '') }}" required>
    @error('dob')
        <div class="text-red-500 mt-2">{{ $message }}</div>
    @enderror
</div>

<!-- College selection dropdown -->
<div class="mb-4">
    <label for="college_id" class="block text-gray-700 text-sm font-bold mb-2">College</label>
    <select name="college_id" id="college_id" class="w-full px-3 py-2 border rounded @error('college_id') border-red-500 @enderror" required>
        <option value="">Select College</option>
        @foreach($colleges as $college)
            <option value="{{ $college->id }}" {{ (old('college_id', $student->college_id ?? '') == $college->id) ? 'selected' : '' }}>
                {{ $college->name }}
            </option>
        @endforeach
    </select>
    @error('college_id')
        <div class="text-red-500 mt-2">{{ $message }}</div>
    @enderror
</div>

<!-- Form action buttons -->
<div class="flex justify-end">
    <a href="{{ route('students.index') }}" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded mr-2">
        Cancel
    </a>
    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
        {{ isset($student) ? 'Update' : 'Add' }} Student
    </button>
</div>
