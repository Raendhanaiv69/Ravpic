<?php

use Illuminate\Support\Facades\Route;

// Halaman Dashboard Utama
Route::get('/', function () {
    return view('welcome');
})->name('dashboard');

// Halaman Template List
Route::get('/template', function () {
    return view('template');
})->name('templates.index');

// Halaman Photobooth Frame Ikan (Aquarium)
Route::get('/photobooth', function () {
    return view('photobooth');
})->name('photobooth.index');

// Halaman Photobooth Doodle Cam
Route::get('/photobooth-doodle', function () {
    return view('photoboothDoodle');
})->name('photobooth.doodle');

// Halaman Menu Lainnya
Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery.index');

Route::get('/settings', function () {
    return view('settings');
})->name('settings.index');