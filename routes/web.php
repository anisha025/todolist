<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/', function () {
//     return view('home');
// });
Route::get('/', [TaskController::class, 'home']);

Route::post('/todo/store', [TaskController::class, 'store']);
Route::get('/todo/update/{id}', [TaskController::class, 'update']);
Route::get('/todo/delete/{id}', [TaskController::class, 'destroy']);

//filter
Route::get('/show-all-tasks', [TaskController::class, 'showAllTask']);
Route::get('/show-missed-tasks', [TaskController::class, 'showMissedTask']);
Route::get('/show-pending-tasks', [TaskController::class, 'showPendingTask']);
Route::get('/show-completed-tasks', [TaskController::class, 'showCompletedTask']);
