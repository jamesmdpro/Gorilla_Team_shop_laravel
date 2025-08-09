<?php

use App\Http\Controllers\OrderController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\SitemapController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RetoController;

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/reto-30dias', [RetoController::class, 'show'])->name('reto-30dias');
Route::post('/submit-reto', [RetoController::class, 'submitForm'])->name('submit-reto');

Route::resource('orders', OrderController::class);
Route::resource('leads', LeadController::class);
Route::patch('/leads/{lead}/status', [LeadController::class, 'updateStatus'])->name('leads.updateStatus');

// SEO Routes
Route::get('/sitemap.xml', [SitemapController::class, 'index'])->name('sitemap');
Route::get('/robots.txt', [SitemapController::class, 'robots'])->name('robots');

// Páginas adicionales para SEO
Route::get('/suplementos-deportivos', function () {
    return view('productos.index');
})->name('productos.index');

Route::get('/proteina-whey', function () {
    return view('productos.proteina');
})->name('productos.proteina');

Route::get('/creatina', function () {
    return view('productos.creatina');
})->name('productos.creatina');

Route::get('/pre-entreno', function () {
    return view('productos.pre-entreno');
})->name('productos.pre-entreno');

Route::get('/bcaa', function () {
    return view('productos.bcaa');
})->name('productos.bcaa');

Route::get('/sobre-nosotros', function () {
    return view('pages.about');
})->name('about');

Route::get('/contacto', function () {
    return view('pages.contact');
})->name('contact');

Route::get('/blog', function () {
    return view('blog.index');
})->name('blog.index');

Route::get('/politica-privacidad', function () {
    return view('legal.privacy');
})->name('privacy');

Route::get('/terminos-condiciones', function () {
    return view('legal.terms');
})->name('terms');