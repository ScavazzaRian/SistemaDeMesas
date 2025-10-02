<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;


//Rota de login
//Guest -> caso o usuário já esteja autenticado ele redireciona por padrao para o endereco /home
Route::middleware('guest')->group(function () {
    Route::get('/login', [UsersController::class, 'showLogin'])->name('login');
    Route::post('/login', [UsersController::class, 'login'])->name('login');
});

//Rota de logout
Route::post('/logout', [UsersController::class, 'logout'])->name('logout');

//Rota principal do site
Route::prefix('/home')->middleware('auth')->group(function(){

    Route::get('/', function(){
        return 'Oi tudo bom';
    });

    Route::prefix('/mesas')->group(function(){
        Route::get('/', function(){
            return 'CRUD mesas';
        });
    });

    Route::prefix('/produtos')->group(function(){
        Route::get('/', function(){
            return 'CRUD produtos';
        });
    });

    Route::prefix('/marmitas')->group(function(){
        Route::get('/', function(){
            return 'CRUD marmitas';
        });
    });

    Route::prefix('/reservas')->group(function(){
        Route::get('/', function(){
            return 'CRUD reservas';
        });
    });

});