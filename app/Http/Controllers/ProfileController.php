<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ProfileController extends Controller
{
    /**
     * Exibe o perfil do usuário
     */
    public function show()
    {
        $user = User::find(Auth::id());
        $darkMode = $user->dark_mode ?? false;
        
        return view('perfil', compact('user', 'darkMode'));
    }

    /**
     * Alterna o modo escuro
     */
    public function toggleDarkMode(Request $request, User $user)
    {
        $user = Auth::user();
        
        // Método correto para Laravel 12
        User::update([
            'dark_mode' => !$user->dark_mode
        ]);
        
        return redirect()->back()->with('success', 'Modo de visualização alterado!');
    }

    /**
     * Exibe o formulário de edição do perfil
     */
    public function edit()
    {
        $user = Auth::user();
        $darkMode = $user->dark_mode ?? false;
        
        return view('profile.edit', compact('user', 'darkMode'));
    }

    /**
     * Atualiza os dados do perfil
     */
    public function update(Request $request, User $user)
    {
        $user = Auth::user();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'peso' => 'nullable|numeric|min:0|max:500',
            'altura' => 'nullable|numeric|min:0|max:300',
            'idade' => 'nullable|integer|min:0|max:150',
        ]);

        User::update($validated);
        
        return redirect()->route('profile.show')->with('success', 'Perfil atualizado com sucesso!');
    }
}