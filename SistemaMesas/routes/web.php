<?php

use App\Http\Controllers\AssinaturaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\MarmitasController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\TarefaController;
use App\Http\Controllers\PedidoProdutoController;

//Rota inicial, Primeira pagina quando o cliente entra no site.
Route::get('/', [IndexController::class, 'showIndex']) ->name('index');

//Rota de login
//Guest -> caso o usuário já esteja autenticado ele redireciona por padrao para o endereco /home
Route::middleware('guest')->group(function () {
    Route::get('/login', [UsersController::class, 'showLogin'])->name('login');
    Route::post('/login', [UsersController::class, 'login'])->name('login.post');
});

//Rota de logout
Route::post('/logout', [UsersController::class, 'logout'])->name('logout.post');

//Rota para assinar o site
// Rota que ira receber a api do mercadopago
// web.php
Route::middleware('auth')->group(function(){
    Route::get('/pagar', [AssinaturaController::class, 'criarPix'])->name('assinatura');
});
Route::post('/webhook/pagamento', [AssinaturaController::class, 'webhook']);

Route::get('/assinatura/status', function () {
    $user = auth()->user();

    if (!$user) {
        return response()->json(['status' => 'unauthenticated']);
    }

    return response()->json([
        'status' => $user->pagamento_ativo ? 'approved' : 'pending'
    ]);
})->middleware('auth');

//Rota principal do site
Route::middleware(['auth'])->prefix('home')->group(function(){

    Route::prefix('/mesas')->group(function(){
        Route::get('/', [HomeController::class, 'showMesas'])->name('home');
        Route::get('/create', [HomeController::class, 'showCadastroMesas'])->name('mesas.show.create');
        Route::get('/{mesa}/update', [HomeController::class, 'showEditMesa'])->name('mesas.show.update');
        Route::put('/{mesa}/update', [HomeController::class, 'updateMesas'])->name('mesas.update');
        Route::post('/create', [HomeController::class, 'createMesas'])->name('mesas.create');
        Route::delete('/{id}/delete', [HomeController::class, 'destroyMesas'])->name('mesas.destroy');
    });

    Route::prefix('pedidos')->group(function(){
        Route::get('/', [PedidoController::class, 'showPedidos'])->name('pedidos');
        Route::put('/{pedido}/concluir', [PedidoController::class, 'concluirPedido'])->name('pedidos.concluir');
        Route::delete('/{id}/delete', [PedidoController::class, 'destroyPedido'])->name('pedidos.destroy');
        Route::get('pedido-produto/create', [PedidoProdutoController::class, 'create'])->name('pedido-produto.create');
        Route::post('pedido-produto', [PedidoProdutoController::class, 'store'])->name('pedido-produto.store');
    });

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

    Route::prefix('/relatorios')->group(function(){
        Route::get('/', [TarefaController::class, 'showRelatorio'])->name('relatorios');
        Route::get('relatorios/exportar/produtos', [TarefaController::class, 'exportarProdutos'])->name('exportar.produtos.pdf');
        Route::get('relatorios/exportar/vendasdia', [TarefaController::class, 'exportarVendasDoDia'])->name('exportar.vendas.dodia.pdf');
        Route::get('relatorios/exportar/vendasmes', [TarefaController::class, 'exportarVendasDoMes'])->name('exportar.vendas.mes.pdf');
        Route::post('relatorios/exportar/periodo', [TarefaController::class, 'relPorPeriodo'])->name('exportar.periodo.pdf');        
    });
    
    Route::get('/dashboard', function(){
        return view('app.relatorio.dashboard');
    })->name('dashboard');
});
