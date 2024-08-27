<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProdutoRequest;
use App\Http\Requests\UpdateProdutoRequest;
use App\Models\Item; // Considerando que o modelo correto é Item
use App\Models\Unidade;
use App\Models\Fornecedor;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $produtos = Item::with(['itemDetalhe', 'fornecedor'])->paginate(10);

        return view('app.produto.index', [
            'produtos' => $produtos,
            'request' => $request->all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.create', [
            'unidades' => $unidades,
            'fornecedores' => $fornecedores
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreProdutoRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreProdutoRequest $request)
    {
        Item::create($request->validated());
        return redirect()->route('produto.index')->with('success', 'Produto criado com sucesso!');
    }

    /**
     * Display the specified resource.
     *
     * @param  Item  $produto
     * @return \Illuminate\View\View
     */
    public function show(Item $produto)
    {
        return view('app.produto.show', ['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Item  $produto
     * @return \Illuminate\View\View
     */
    public function edit(Item $produto)
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.edit', [
            'produto' => $produto,
            'unidades' => $unidades,
            'fornecedores' => $fornecedores
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProdutoRequest  $request
     * @param  Item  $produto
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(UpdateProdutoRequest $request, Item $produto)
    {
        $produto->update($request->validated());
        return redirect()->route('produto.show', ['produto' => $produto->id])->with('success', 'Produto atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Item  $produto
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Item $produto)
    {
        $produto->delete();
        return redirect()->route('produto.index')->with('success', 'Produto excluído com sucesso!');
    }
}
