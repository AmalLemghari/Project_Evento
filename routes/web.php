<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\OrganiserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SearchController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'role:organiser'])->group(function(){
    Route::get('/organiser/dashboard', [OrganiserController::class, 'OrganiserDashboard'])->name('organiser.dashboard');
}); 

Route::middleware(['auth', 'role:admin'])->group(function(){
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
});

Route::post('/search', [SearchController::class, 'search'])->name('search');

Route::put('/user/update/photo', [ProfileController::class, 'updatePhoto'])->name('updatePhoto');

Route::get('/myEvents', [EventController::class, 'myEvents'])->name('organiser.myEvents');
Route::get('/organiser/displayEvents', [OrganiserController::class, 'organiser_dashboard'])->name('organiser.organiser_dashboard');
Route::get('/events/display/all', [EventController::class, 'displayEvents'])->name('displayEvents');
Route::get('/createEvent', [EventController::class, 'createEvents'])->name('createEvents');
Route::post('/createEvent/store', [EventController::class, 'store'])->name('createEvents.store');
Route::get('/updateEvent{id}', [EventController::class, 'updateEvents'])->name('updateEvents');
Route::post('/updateEvent/edit{id}', [EventController::class, 'update'])->name('updateEvents.edit');
Route::delete('/deleteEvent{id}', [EventController::class, 'deleteEvent'])->name('eventDelete');
Route::get('/organiser/eventsDetails{id}', [EventController::class, 'eventsDetails'])->name('eventsDetails');

// Route::get('/admin-dashboard', [CategoryController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/displayCategories', [CategoryController::class, 'admin_dashboard'])->name('admin.admin_dashboard');
Route::get('/categories/display/all', [CategoryController::class, 'dispalyCategories'])->name('dispalyCategories');
Route::get('/createCategory', [CategoryController::class, 'createCategories'])->name('createCategories');
Route::post('/createCategory/store', [CategoryController::class, 'store'])->name('createCategories.store');
Route::get('/updateCategory{id}', [CategoryController::class, 'updateCategories'])->name('updateCategories');
Route::post('/updateCategory/edit{id}', [CategoryController::class, 'update'])->name('updateCategories.edit');
Route::delete('/deleteCategory{id}', [CategoryController::class, 'delete'])->name('delete');

Route::get('/user/apply{id}', [EventController::class, 'apply'])->name('apply');
Route::post('/user/applyEvent', [EventController::class, 'applyForTheEvent'])->name('applyEvent');

Route::get('/invoice', [InvoiceController::class, 'generate']);
