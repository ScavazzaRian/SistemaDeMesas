<?php

use App\Http\Controllers\AssinaturaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MarmitasController;
use Illuminate\Routing\RouteRegistrar;

//Rota inicial, Primeira pagina quando o cliente entra no site.
Route::get('/', [IndexController::class, 'showIndex']) ->name('index');

//Rota para assinar o site
// Rota que ira receber a api do mercadopago
Route::get('/assinatura', [AssinaturaController::class, 'showAssinatura'])->name('assinatura');

//Rota de login
//Guest -> caso o usuário já esteja autenticado ele redireciona por padrao para o endereco /home
Route::middleware('guest')->group(function () {
    Route::get('/login', [UsersController::class, 'showLogin'])->name('login');
    Route::post('/login', [UsersController::class, 'login'])->name('login.post');
});

//Rota de logout
Route::post('/logout', [UsersController::class, 'logout'])->name('logout.post');

//Rota principal do site
Route::prefix('/home')->middleware('auth')->group(function(){

    Route::get('/', [HomeController::class, 'showMesas'])->name('home');
    Route::get('/create', [HomeController::class, 'showCadastroMesas'])->name('mesas.create');
    Route::delete('/{id}/delete', [HomeController::class, 'destroyMesas'])->name('mesas.destroy');

    Route::prefix('/produtos')->group(function(){
        Route::get('/', [ProdutosController::class, 'showProdutos'])->name('produtos');
        Route::get('/create', [ProdutosController::class, 'showCadastro'])->name('produtos.create');
        Route::post('/create', [ProdutosController::class, 'create'])->name('produto.create');
        Route::get('/{produto}/update', [ProdutosController::class, 'showUpdate'])->name('produtos.update');
        Route::put('/{produto}/update', [ProdutosController::class, 'update'])->name('produto.update');
        Route::delete('/{id}/delete', [ProdutosController::class, 'destroy'])->name('produtos.destroy');
    });

    Route::prefix('/marmitas')->group(function(){
        Route::get('/', [MarmitasController::class, 'showMarmitas'])->name('marmitas');
        Route::get('/create', [MarmitasController::class, 'showCadastro'])->name('marmitas.create');
        Route::post('/create', [MarmitasController::class, 'create'])->name('marmita.create');
        Route::get('/{marmita}/update', [MarmitasController::class, 'showUpdate'])->name('marmitas.update');
        Route::put('/{marmita}/update', [MarmitasController::class, 'update'])->name('marmita.update');
        Route::delete('/{id}/delete', [MarmitasController::class, 'destroy'])->name('marmitas.destroy');
        });

    Route::prefix('/reservas')->group(function(){
        Route::get('/', function(){
            return 'CRUD reservas';
        });
    });

    Route::get('/relatorios', function(){
        return view('app.relatorio.relatorio');
    })->name('relatorios');
});
