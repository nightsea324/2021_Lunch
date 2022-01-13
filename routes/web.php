<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;


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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/',[RecipeController::class,'index']);
Route::resource('recipe',RecipeController::class);
Route::resource('member',MemberController::class);
Route::post('login', [LoginController::class,'login']);
Route::get('login', [LoginController::class,'index']);
Route::get('logout', [LoginController::class,'logout']);
Route::resource('register',RegisterController::class);