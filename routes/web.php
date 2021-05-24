<?php

use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\CarrinhoController;
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
    return view('homeProduto');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//Acesso somente para os Admins
Route::group(['middleware' => 'IsAdmin'], function(){

    //Produtos
    Route::resource('/produto', ProdutosController::class, ['except' => ['show']]);
    Route::get('/lixeira/produto', [ProdutosController::class, 'trash']) -> name('produto.trash');
    Route::patch('/produto/restaura/{id}', [ProdutosController::class, 'restore']) -> name('produto.restore');

    //tags
    Route::resource('/tag', TagController::class);
    Route::get('/lixeira/tag', [TagController::class, 'trash'])->name('tag.trash');
    Route::patch('/tag/restaura/{id}', [TagController::class, 'restore'])->name('tag.restore');

    //Categorias
    Route::resource('/category', CategoryController::class);
    Route::get('/lixeira/category', [CategoryController::class, 'trash'])->name('category.trash');
    Route::patch('/category/restaura/{id}', [CategoryController::class, 'restore'])->name('category.restore');
});

//Acesso só de quem está logado
Route::group(['middleware' => 'auth'], function(){

    //Carrinho
    Route::get('/carrinho/add/{produto}', [CarrinhoController::class, 'add'])->name('carrinho.add');
    Route::get('/carrinho/remove/{produto}', [CarrinhoController::class, 'remove'])->name('carrinho.remove');
    Route::get('/carrinho', [CarrinhoController::class, 'show'])->name('carrinho.show');
    Route::get('/carrinho/pagamento', [CarrinhoController::class, 'pagamento'])->name('carrinho.pagamento');

    //Pedido
    Route::post('/pedido/add', [OrderController::class, 'add'])->name('pedido.add');
    Route::get('/pedido', [OrderController::class, 'show'])->name('pedido.show');
});

//Coisas que todos podem acessar (Sendo Admin ou não)
Route::resource('/produto', ProdutosController::class, ['only' => ['show']]);
Route::resource('/tag', TagController::class, ['only' => ['show']]);
Route::resource('/category', CategoryController::class, ['only' => ['show']]);


