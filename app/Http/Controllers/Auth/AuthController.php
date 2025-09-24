<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed'
        ], [
            'name.required' => 'Campo Nome Faltando',
            'email.required' => 'Campo Email Faltando',
            'password.required' => 'Campo Senha Faltando',
            'password_confirmation.required' => 'Campo de Confrimação de Senha Faltando',
            'email.email' => 'Email inválido',
            'email.unique' => 'Este email já está cadastrado',
            'confirmed' => 'Senhas não conferem',
            'min' => 'A senha deve ter 8 caracteres'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        Auth::login($user);


        return redirect()->route('sobrevoce.crn');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string'
        ], [
            'email.required' => 'Campo Email Faltando',
            'password.required' => 'Campo Senha Faltando',
            'email' => 'Email inválido',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credenciais = $request->only('email', 'password');

        if (Auth::attempt($credenciais)) {
            $request->session()->regenerate();

            return redirect()->route('posts.index');
        }
        return redirect()->back()->withErrors('Credenciais inválidas')->withInput();
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('AuthView');
    }




    public function definirCarac(Request $request, User $user)
    {
        // validação dos dados
        $validated = $request->validate([
            'peso'   => 'nullable|string|max:10',   // pode ajustar para decimal se quiser
            'altura' => 'nullable|string|max:10',
            'idade'  => 'nullable|integer|min:0',
        ], [
            'idade.integer' => 'A idade deve ser um número inteiro.',
            'idade.min'     => 'A idade não pode ser negativa.',
        ]);

        // atualiza os campos
        $user->update([
            'peso'   => $validated['peso']   ?? $user->peso,
            'altura' => $validated['altura'] ?? $user->altura,
            'idade'  => $validated['idade']  ?? $user->idade,
        ]);

        return redirect()->route('posts.index');
    }
}
