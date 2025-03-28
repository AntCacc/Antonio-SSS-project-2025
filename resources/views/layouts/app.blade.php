<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'College and Student Management')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-9usAa10IRO0HhonpyAIVpjrylPvoDwiPUiKdWk5t3PyolY1cOd4DSE0Ga+ri4AuTroPR5aQvXU9xC6qOPnzFeg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
        body {
            font-family: sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 font-sans">
    <!-- Top Navigation Bar -->
    <div class="bg-blue-900 text-white py-4">
        <div class="container mx-auto flex items-center justify-between px-4">
            <div class="text-lg font-bold">
                College and Student Management System
            </div>
            <div class="flex items-center">
                <a href="{{ route('colleges.index') }}" class="text-sm mr-4">Colleges</a>
                <a href="{{ route('students.index') }}" class="text-sm mr-4">Students</a>
            </div>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container mx-auto mt-8 px-4">
        @yield('content')
    </div>

    <!-- Footer with Dark Grey Background -->
    <footer class="bg-gray-800 text-white text-center py-4 mt-10">
        <p>&copy; 2025 College and Student Management System. All Rights Reserved.</p>
    </footer>
</body>
</html>
