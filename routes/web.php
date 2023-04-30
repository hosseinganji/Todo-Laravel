<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [TodoController::class , "index"])->name("todos.index");

Route::get('/todo/create', [TodoController::class , "create"])->name("todos.create");

Route::post('/todo', [TodoController::class , "store"])->name("todos.store");

Route::get('/todo/{todo}', [TodoController::class , "show"])->name("todos.show");

Route::get('/todo/{todo}/edit', [TodoController::class , "edit"])->name("todos.edit");

Route::put('/todo/{todo}', [TodoController::class , "update"])->name("todos.update");

Route::delete('/todo/{todo}', [TodoController::class , "delete"])->name("todos.delete");

Route::get('/todo/{todo}/completed', [TodoController::class , "completed"])->name("todos.completed");

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

