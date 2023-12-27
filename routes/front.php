<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;



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


Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/blog/{slug}', [FrontController::class, 'blog'])->name('front.blog');
Route::get('/contact', [FrontController::class, 'contact'])->name('front.contact');
Route::get('/single-blog/{slug}', [FrontController::class, 'single_blog'])->name('front.single_blog');

Route::post('/comment', [FrontController::class , 'comment_area'])->name('front.comment');
