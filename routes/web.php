<?php

use App\Http\Controllers\AssistantController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\PDFController;
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

Route::get('/', [AttendanceController::class, 'viewWelcome'])->name('viewWelcome');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');

Route::get('/assistants/inactive', [AssistantController::class, 'viewInactive'])->name('viewInactive')->middleware('auth');

Route::post('/search-user', [AssistantController::class, 'searchUser'])->name('searchUser')->middleware('auth');

Route::resource('/assistants', AssistantController::class)->middleware('auth');

Route::post('/process-entrance', [AttendanceController::class, 'input'])->name('input');

Route::post('/process-exit', [AttendanceController::class, 'output'])->name('output');

Route::get('/attendance/input', [AttendanceController::class, 'viewInput'])->name('viewInput');

Route::get('/attendance/output', [AttendanceController::class, 'viewOutput'])->name('viewOutput');

Route::get('/create-report-individual', [PDFController::class, 'reportIndividual'])->name('reportIndividual')->middleware('auth');

Route::get('/create-report-general', [PDFController::class, 'reportGeneral'])->name('reportGeneral')->middleware('auth');