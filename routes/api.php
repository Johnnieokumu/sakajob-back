 <?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\UserController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Jobs routes
Route::post("/jobs", [JobsController::class, 'createJob']);
Route::get("/jobs/{id}", [JobsController::class, 'readJob']); 
Route::post("/jobs/{id}", [JobsController::class, 'updateJob']); 

// Employer routes
Route::post("/employer", [EmployerController::class, 'createEmployer']);
Route::get("/employer/{id}", [EmployerController::class, 'readEmployer']); 
Route::post("/employer/{id}", [EmployerController::class, 'updateEmployer']);  

// User routes
Route::post("/user", [UserController::class, 'createUser']);