<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PostController as AdminPostController;
use App\Http\Controllers\Admin\TeacherController as AdminTeacherController;
use App\Http\Controllers\Admin\GalleryController as AdminGalleryController;
use App\Http\Controllers\Admin\DocumentController as AdminDocumentController;
use App\Http\Controllers\Admin\ExtracurricularController as AdminExtracurricularController;
use App\Http\Controllers\Admin\AchievementController as AdminAchievementController;

// Frontend Controllers
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\ExtracurricularController;
use App\Http\Controllers\AchievementController;

use Illuminate\Support\Facades\Route;

// Guest Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

// Auth Routes (Global)
Route::middleware('auth')->group(function () {
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

// Auth Routes (Admin Panel)
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', DashboardController::class)->name('dashboard');
    
    // Resource Routes
    Route::resource('posts', AdminPostController::class);
    Route::resource('teachers', AdminTeacherController::class);
    Route::resource('galleries', AdminGalleryController::class);
    Route::delete('/galleries/photo/{photo}', [AdminGalleryController::class, 'destroyPhoto'])->name('galleries.photo.destroy');
    Route::resource('documents', AdminDocumentController::class);
    Route::resource('extracurriculars', AdminExtracurricularController::class);
    Route::resource('achievements', AdminAchievementController::class);
});

// Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/profil-sekolah', function () { return view('pages.profile'); })->name('profile');
Route::get('/guru', [TeacherController::class, 'index'])->name('teachers.index');
Route::get('/guru/{teacher}', [TeacherController::class, 'show'])->name('teachers.show');
Route::get('/ekstrakurikuler', [ExtracurricularController::class, 'index'])->name('extracurriculars.index');
Route::get('/galeri', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/galeri/{gallery}', [GalleryController::class, 'show'])->name('gallery.show');
Route::get('/prestasi', [AchievementController::class, 'index'])->name('achievements.index');
Route::get('/download', [DocumentController::class, 'index'])->name('documents.index');
Route::get('/kontak', function () { return view('pages.contact'); })->name('contact');
Route::get('/berita', [PostController::class, 'index'])->name('posts.index');
Route::get('/berita/{slug}', [PostController::class, 'show'])->name('posts.show');
