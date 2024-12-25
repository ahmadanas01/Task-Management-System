<?php

use Illuminate\Http\Request;
use App\Http\Controllers\Api\TaskController as ApiTaskController;

use App\Http\Controllers\Api\AuthController;

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/login', [AuthController::class, 'login']);


// Group API routes for authenticated users
Route::middleware('auth:api')->group(function () {
    // API Task Management Routes
    Route::get('/tasks', [ApiTaskController::class, 'index']); // List tasks with filtering and sorting
    Route::post('/tasks', [ApiTaskController::class, 'store']); // Create a new task
    Route::put('/tasks/{task}', [ApiTaskController::class, 'update']); // Update an existing task
    Route::delete('/tasks/{task}', [ApiTaskController::class, 'destroy']); // Delete a task
});
