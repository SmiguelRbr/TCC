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
    public function register(Request $request){
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

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);


        return redirect()->route('SobreVoce');
    }

    public function login(Request $request){
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string'
        ], [
            'email.required' => 'Campo Email Faltando',
            'password.required' => 'Campo Senha Faltando',
            'email' => 'Email inválido',
        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $credenciais = $request->only('email', 'password');

        if(Auth::attempt($credenciais)){
            $request->session()->regenerate();
            return redirect()->route('Home');
        }
        return redirect()->back()->withErrors('Credenciais inválidas')->withInput();
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('AuthView');
    }
    
}
