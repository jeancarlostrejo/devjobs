<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\DownloadCvController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VacantController;
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

Route::get('/', HomeController::class)->name('home');

Route::get('/dashboard', [VacantController::class, 'index'])->middleware(['auth', 'verified', 'role.recruiter'])->name('vacants.index');
Route::get('/vacants/create',[VacantController::class, 'create'])->middleware(['auth', 'verified'])->name('vacants.create');
Route::get('/vacants/{vacant}/edit', [VacantController::class, 'edit'])->middleware(['auth', 'verified'])->name('vacants.edit');
Route::get('/vacants/{vacant}', [VacantController::class, 'show'])->name('vacants.show');
Route::get('/candidates/{vacant}', [CandidateController::class, 'index'])->name('candidates.index');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

//Notifications
Route::get('/notifications', NotificationController::class)->middleware(['auth', 'verified', 'role.recruiter'])->name('notifications');
require __DIR__.'/auth.php';

//Download cv
Route::get('/download-cv/{vacant}/{candidate}', DownloadCvController::class)->middleware(['auth', 'verified', 'role.recruiter'])->name('download.cv');
