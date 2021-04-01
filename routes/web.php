<?php

use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CategoryController;
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
require __DIR__.'/auth.php';

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//Produtos
Route::resource('/produto', ProdutosController::class);
Route::get('/lixeira/produto', [ProdutosController::class, 'trash']) -> name('produto.trash');
Route::patch('/produto/restaura/{id}', [ProdutosController::class, 'restore']) -> name('produto.restore');


Route::resource('/tag', TagController::class);
Route::resource('/category', CategoryController::class);
