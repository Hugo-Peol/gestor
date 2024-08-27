<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFornecedorRequest;
use App\Http\Requests\UpdateFornecedorRequest;
use Illuminate\Http\Request;
use App\Models\Fornecedor;

class FornecedorController extends Controller
{
    /**
     * Display the index view.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('app.fornecedor.index');
    }

    /**
     * List the fornecedores based on search criteria.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function listar(Request $request)
    {
        $fornecedores = Fornecedor::with(['produtos'])
            ->where('nome', 'like', '%'.$request->input('nome').'%')
            ->where('site', 'like', '%'.$request->input('site').'%')
            ->where('uf', 'like', '%'.$request->input('uf').'%')
            ->where('email', 'like', '%'.$request->input('email').'%')
            ->paginate(5);

        return view('app.fornecedor.listar', [
            'fornecedores' => $fornecedores,
            'request' => $request->all()
        ]);
    }

    /**
     * Add or update a fornecedor.
     *
     * @param  \App\Http\Requests\StoreFornecedorRequest|\App\Http\Requests\UpdateFornecedorRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function adicionar(StoreFornecedorRequest $request)
    {
        $data = $request->validated();

        if ($request->input('id')) {
            $fornecedor = Fornecedor::find($request->input('id'));
            $fornecedor->update($data);
            $msg = 'Atualização realizada com sucesso';
        } else {
            Fornecedor::create($data);
            $msg = 'Cadastro realizado com sucesso';
        }

        return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id')])->with('msg', $msg);
    }

    /**
     * Show the form to edit a fornecedor.
     *
     * @param  int  $id
     * @param  string  $msg
     * @return \Illuminate\View\View
     */
    public function editar($id, $msg = '')
    {
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar', [
            'fornecedor' => $fornecedor,
            'msg' => $msg
        ]);
    }

    /**
     * Delete a fornecedor.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function excluir($id)
    {
        Fornecedor::find($id)->delete();

        return redirect()->route('app.fornecedor')->with('msg', 'Fornecedor excluído com sucesso');
    }
}
