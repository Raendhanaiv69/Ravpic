<?php

use Illuminate\Support\Facades\Route;

// Halaman Dashboard Utama
Route::get('/', function () {
    return view('welcome');
})->name('dashboard');

// Halaman Template
Route::get('/templates', function () {
    return view('template');
})->name('templates.index');

// Halaman Menu Lainnya (Dummy View)
Route::get('/photobooth', function () {
    return view('photobooth');
})->name('photobooth.index');

Route::get('/gallery', function () {
    return view('gallery');
})->name('gallery.index');

Route::get('/settings', function () {
    return view('settings');
})->name('settings.index');