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
