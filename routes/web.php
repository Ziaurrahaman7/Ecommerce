<?php

use Illuminate\Http\Request;
use Spatie\FlareClient\Http\Client;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategorieController;
use App\Http\Controllers\Admin\ProductController;

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
// ================admin=============
Route::get('/dashboard', function () {
    return view('admin/dashboard');
})->middleware(['auth'])->name('dashboard');
Route::Resource('admin/category', CategorieController::class)->middleware(['auth']);
Route::Resource('admin/product', ProductController::class)->middleware(['auth']);

require __DIR__.'/auth.php';
