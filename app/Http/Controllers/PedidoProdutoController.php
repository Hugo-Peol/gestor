<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePedidoProdutoRequest;
use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\Produto;
use App\Models\PedidoProduto;

class PedidoProdutoController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @param  Pedido  $pedido
     * @return \Illuminate\View\View
     */
    public function create(Pedido $pedido)
    {
        $produtos = Produto::all();
        return view('app.pedido_produto.create', [
            'pedido' => $pedido,
            'produtos' => $produtos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePedidoProdutoRequest  $request
     * @param  Pedido  $pedido
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StorePedidoProdutoRequest $request, Pedido $pedido)
    {
        $pedido->produtos()->attach(
            $request->get('produto_id'),
            ['quantidade' => $request->get('quantidade')]
        );

        return redirect()->route('pedido-produto.create', ['pedido' => $pedido->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  PedidoProduto  $pedidoProduto
     * @param  int  $pedido_id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(PedidoProduto $pedidoProduto, $pedido_id)
    {
        $pedidoProduto->delete();

        return redirect()->route('pedido-produto.create', ['pedido' => $pedido_id]);
    }
}
