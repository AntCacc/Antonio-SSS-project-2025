<!-- Sort Component: Allows users to sort students by name -->
<div class="mb-4 pt-4 flex">
    <a href="{{ route('students.index', [
            'college_id' => request('college_id'), // Preserve selected college filter
            'sort' => request('sort') === 'asc' ? 'desc' : 'asc' // Toggle sorting order
        ]) }}"
       class="bg-gray-800 hover:bg-gray-900 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
       
        Sort by Name  
        @if(request('sort') === 'asc')
            ↑ <!-- Show upward arrow if sorting is ascending -->
        @else
            ↓ <!-- Show downward arrow if sorting is descending -->
        @endif
    </a>
</div>
