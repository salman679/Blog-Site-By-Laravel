<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\Back\BlogController;
use App\Http\Controllers\Back\UserController;
use App\Http\Controllers\Back\SliderController;
use App\Http\Controllers\Back\CategoryController;
use App\Http\Controllers\Back\DashboardController;

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


Route::middleware('auth')->group(function () {
    Route::prefix('/admin')->group(function () {

        // dashboard section
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('back.dashboard');


        // category section
        Route::middleware('admin')->group(function () {
            Route::get('/category', [CategoryController::class, 'category'])->name('back.category.index')->middleware('admin');
            Route::get('/category/create', [CategoryController::class, 'create'])->name('back.category.create');
            Route::post('/category/store', [CategoryController::class, 'store'])->name('back.category.store');
            Route::get('/category/{slug}', [CategoryController::class, 'edit'])->name('back.category.edit');
            Route::post('/category/update/{slug}', [CategoryController::class, 'update'])->name('back.category.update');
            Route::post('/category/delete', [CategoryController::class, 'delete'])->name('back.category.delete');
        });


        // slider section
        Route::get('/slider', [SliderController::class, 'slider'])->name('back.slider.index');
        Route::get('/slider/create', [SliderController::class, 'create'])->name('back.slider.create');
        Route::post('/slider/store', [SliderController::class, 'store'])->name('back.slider.store');

        Route::get('/slider/edit/{id}', [SliderController::class, 'edit'])->name('back.slider.edit');
        Route::post('/slider/update/{id}', [SliderController::class, 'update'])->name('back.slider.update');

        Route::post('/slider/delete', [SliderController::class, 'delete'])->name('back.slider.delete');


        // users section
        Route::resource('users', UserController::class)->except('show');

        // blog section
        Route::get('/blog', [BlogController::class, 'index'])->name('back.blog.index');
        Route::get('/blog/create', [BlogController::class, 'create'])->name('back.blog.create');
        Route::post('/blog/store', [BlogController::class, 'store'])->name('back.blog.store');
        Route::get('/blog/edit/{slug}', [BlogController::class, 'edit'])->name('back.blog.edit');
        Route::post('/blog/update/{slug}', [BlogController::class, 'update'])->name('back.blog.update');
        Route::post('/blog/delete', [BlogController::class, 'delete'])->name('back.blog.delete');

        // Role;
        Route::get('/roles', [RolesController::class, 'index'])->name('roles.index');
        Route::get('/roles/create', [RolesController::class, 'create'])->name('roles.create');
        Route::get('/roles/store', [RolesController::class, 'store'])->name('roles.store');
        Route::get('/roles/edit/{id}', [RolesController::class, 'edit'])->name('roles.edit');
        Route::get('/roles/update{id}', [RolesController::class, 'update'])->name('roles.update');
        Route::get('/roles/destroy', [RolesController::class, 'destroy'])->name('roles.destroy');
    });
});




// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// require __DIR__.'/auth.php';
