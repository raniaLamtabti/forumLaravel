<?php

use Illuminate\Support\Facades\Route;
use App\Models\Question;
use App\Http\Livewire\QuestionDisplay;

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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/question/{id_question}', QuestionDisplay::class)->name('question');

Route::group(['middleware' => [
    'auth:sanctum',
    'verified',
]], function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/questions', function () {
        return view('user.questions');
    })->name('questions');

    Route::get('/reponses', function () {
        return view('user.reponses');
    })->name('reponses');
});
