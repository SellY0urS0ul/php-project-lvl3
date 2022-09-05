<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UrlController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('main-page');
});

Route::get('/', [UrlController::class,'addUrl'])->name('url.add');

Route::post('/', [UrlController::class,'addUrlSubmit'])->name('url.addsubmit');

Route::get('/urls', [UrlController::class,'getAllUrls'])->name('url.getallurls');
