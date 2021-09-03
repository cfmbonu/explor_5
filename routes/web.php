<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/sections/create', [App\Http\Controllers\SectionController::class, 'create']);

Route::post('/sections', [App\Http\Controllers\SectionController::class, 'store']);

Route::get('/sections/{section}', [App\Http\Controllers\SectionController::class, 'show']);

Route::get('/sections/{section}/questions/create', [App\Http\Controllers\QuestionController::class, 'create']);

Route::post('/sections/{section}/questions', [App\Http\Controllers\QuestionController::class, 'store']);
Route::delete('/sections/{section}/questions/{question}', [App\Http\Controllers\QuestionController::class, 'destroy']);

Route::get('/explor5/{participant}/{section}-{slug}', [App\Http\Controllers\SurveyController::class, 'show']);
Route::post('/explor5/{participant}/{section}-{slug}', [App\Http\Controllers\SurveyController::class, 'store']);

Route::get('/explor5', [App\Http\Controllers\SurveyController::class, 'index']);

Route::get('/explor5/participant_details', [App\Http\Controllers\SurveyController::class, 'createParticipant']);
Route::post('/explor5/participant_details/save', [App\Http\Controllers\SurveyController::class, 'storeParticipant']);

Route::get('/responses/show/all', [App\Http\Controllers\ViewResponseController::class, 'showAll']);
Route::get('/responses/show', [App\Http\Controllers\ViewResponseController::class, 'show']);
Route::get('/responses/search', [App\Http\Controllers\ViewResponseController::class, 'search']);

Route::get('/responses/show/{participant}', [App\Http\Controllers\ViewResponseController::class, 'showResponse']);
Route::get('/responses/generate_report/all', [App\Http\Controllers\ViewResponseController::class, 'generateAllCSVReport']);
Route::get('/responses/generate_report/{participant}', [App\Http\Controllers\ViewResponseController::class, 'generateCSVReport']);
