<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ResolvedController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EnquireController;
use App\Http\Controllers\ConsultationsController;
use App\Http\Controllers\clientcontroller;
use App\Http\Controllers\Sectorcontroller;
// namespace App\Http\Controllers;
use App\Http\Controllers\ServiceController;

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

// Dashboard

Route::get('/home', function () {
    return view('adminDashboard');
})->middleware(['auth', 'verified'])->name('home');

Route::get('/admin', function () {
    return view('adminDashboard');
})->middleware(['auth', 'verified'])->name('adminDashboard');

Route::middleware(['auth', 'verified'])->group(function () {
});



Route::middleware('auth')->group(function () {

    route::get('/home', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::post('logout', [WebController::class, 'logout'])->name('logout');


    // for Enquires

    Route::any('enquireslist', [EnquireController::class, 'enquireslist'])->name('enquireslist');
    Route::any('enquire-delete', [EnquireController::class, 'destroy'])->name('enquire.delete');
    Route::delete('delete-enquire', [EnquireController::class, 'removeMulti']);

    Route::get('enquiresview/{id}', [EnquireController::class, 'enquiresview'])->name('enquiresview');

    
});

//route::get('/register', [DashboardController::class, 'register'])->name('register');

// enquire filtre
Route::get('/enquires', [EnquireController::class, 'enquiresfiltrelist'])->name('enquires.list');
Route::get('/enquires/filter', [EnquireController::class, 'filterEnquires'])->name('enquire.filter');

Route::post('enquires', [EnquireController::class, 'store'])->name('enquires');

Route::get('/', [WebController::class, 'index'])->name('index');
Route::get('/error', [WebController::class, 'errorpage'])->name('errorpage');
//Route::get('/login', [WebController::class, 'login'])->name('login');

Route::get('/thankyou', [WebController::class, 'thankyou'])->name('thankyou');

Route::get('/download/{filename}', [EnquireController::class, 'download'])->name('IBOP-Brochure.pdf');



    

require __DIR__ . '/auth.php';