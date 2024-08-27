<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContatoRequest;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    /**
     * Display the contact form.
     *
     * @return \Illuminate\View\View
     */
    public function contato()
    {
        $motivo_contatos = MotivoContato::all();

        return view('site.contato', [
            'titulo' => 'Contato (teste)',
            'motivo_contatos' => $motivo_contatos
        ]);
    }

    /**
     * Store a newly created contact in storage.
     *
     * @param  \App\Http\Requests\StoreContatoRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function salvar(StoreContatoRequest $request)
    {
        SiteContato::create($request->validated());

        return redirect()->route('site.index')->with('success', 'Contato enviado com sucesso!');
    }
}
