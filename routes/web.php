<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\StudentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('colleges.index'); // Redirect to the colleges list
});

// College Routes - Defines all CRUD operations for colleges
Route::resource('colleges', CollegeController::class);

// Student Routes - Defines all CRUD operations for students
Route::resource('students', StudentController::class);

// Custom route for filtering students by college
Route::get('/students/filter/{college_id}', [StudentController::class, 'filterByCollege'])
     ->name('students.filter');
