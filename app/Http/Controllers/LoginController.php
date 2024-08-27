<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display the login view.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $erro = '';

        if ($request->get('erro') == 1) {
            $erro = 'Usuário e ou senha não existe';
        }

        if ($request->get('erro') == 2) {
            $erro = 'Necessário realizar login para ter acesso à página';
        }

        return view('site.login', [
            'titulo' => 'Login',
            'erro' => $erro
        ]);
    }

    /**
     * Authenticate the user.
     *
     * @param  \App\Http\Requests\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function autenticar(LoginRequest $request)
    {
        $credentials = $request->only('usuario', 'senha');

        if (Auth::attempt([
            'email' => $credentials['usuario'],
            'password' => $credentials['senha']
        ])) {
            // Autenticação bem-sucedida
            return redirect()->route('app.home');
        } else {
            // Falha na autenticação
            return redirect()->route('site.login', ['erro' => 1]);
        }
    }

    /**
     * Log the user out and destroy the session.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function sair()
    {
        Auth::logout(); // Usando o método de logout do Laravel
        return redirect()->route('site.index');
    }
}
