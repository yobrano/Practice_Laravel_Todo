<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodoController;
use App\Http\Controllers\UserController;
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
// Basic routes
Route::get('/', function () {return view('welcome'); });
Route::get('/info', function () {return phpinfo(); });

// User Controller routes
Route::get("/dashboard", [UserController::class,"dashboard"]);
Route::post("/user-register", [UserController::class,"register"]);
Route::post("/user-login", [UserController::class,"login"]);
Route::post("/user-logout", [UserController::class,"logout"]);

// Todos Controller routes
Route::post("/todo-create", [TodoController::class,"todoCreate"]);
Route::get("/todo-read", [TodoController::class,"todoRead"]);