<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    PrincipalController,
    SobreNosController,
    ContatoController,
    LoginController,
    HomeController,
    FornecedorController,
    ProdutoController,
    ProdutoDetalheController,
    ClienteController,
    PedidoController,
    PedidoProdutoController,
};

// Rotas principais
Route::get('/', [PrincipalController::class, 'principal'])
    ->name('site.index')
    ->middleware('log.acesso');

Route::get('/sobre-nos', [SobreNosController::class, 'sobreNos'])
    ->name('site.sobrenos');

Route::get('/contato', [ContatoController::class, 'contato'])
    ->name('site.contato');

Route::post('/contato', [ContatoController::class, 'salvar'])
    ->name('site.contato');

Route::get('/login/{erro?}', [LoginController::class, 'index'])
    ->name('site.login');

Route::post('/login', [LoginController::class, 'autenticar'])
    ->name('site.login');

// Rotas protegidas por middleware e prefixo
Route::middleware('autenticacao:padrao,visitante,p3,p4')
    ->prefix('/app')
    ->group(function() {
        Route::get('/home', [HomeController::class, 'index'])
            ->name('app.home');

        Route::get('/sair', [LoginController::class, 'sair'])
            ->name('app.sair');

        Route::prefix('/fornecedor')->group(function() {
            Route::get('/', [FornecedorController::class, 'index'])
                ->name('app.fornecedor');

            Route::post('/listar', [FornecedorController::class, 'listar'])
                ->name('app.fornecedor.listar');

            Route::get('/adicionar', [FornecedorController::class, 'adicionar'])
                ->name('app.fornecedor.adicionar');

            Route::post('/adicionar', [FornecedorController::class, 'adicionar'])
                ->name('app.fornecedor.adicionar');

            Route::get('/editar/{id}/{msg?}', [FornecedorController::class, 'editar'])
                ->name('app.fornecedor.editar');

            Route::get('/excluir/{id}', [FornecedorController::class, 'excluir'])
                ->name('app.fornecedor.excluir');
        });

        Route::resource('produto', ProdutoController::class);
        Route::resource('produto-detalhe', ProdutoDetalheController::class);
        Route::resource('cliente', ClienteController::class);
        Route::resource('pedido', PedidoController::class);

        Route::prefix('pedido-produto')->group(function() {
            Route::get('create/{pedido}', [PedidoProdutoController::class, 'create'])
                ->name('pedido-produto.create');

            Route::post('store/{pedido}', [PedidoProdutoController::class, 'store'])
                ->name('pedido-produto.store');

            Route::delete('destroy/{pedidoProduto}/{pedido_id}', [PedidoProdutoController::class, 'destroy'])
                ->name('pedido-produto.destroy');
        });
    });

// Rota fallback
Route::fallback(function() {
    return 'A rota acessada não existe. <a href="'.route('site.index').'">clique aqui</a> para ir para página inicial';
});
