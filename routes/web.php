<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\GenerateImageUploadConfigController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::post('/generate-image-upload-config', GenerateImageUploadConfigController::class);

Route::post('/article', [ArticleController::class, 'store']);
