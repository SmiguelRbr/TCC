<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Mostra os dados do perfil do usuário autenticado.
     */
    public function show()
    {
        $user = Auth::user();

        return view('perfil', compact('user'));
    }
}
