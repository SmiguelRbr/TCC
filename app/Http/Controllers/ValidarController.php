<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\CrefRegistros;
use App\Models\CrnRegistro;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ValidarController extends Controller
{

    public function salvarCref(Request $request)
    {
        $validated = $request->validate([
            'cref_numero'    => 'required|digits_between:5,6',
            'cref_categoria' => 'required|in:G,C,E,M,D',
            'cref_uf'        => 'required|size:2',
            'user_id'        => 'required|exists:users,id|unique:cref_registros,user_id',
        ], [ /* ... mensagens de erro ... */]);

        CrefRegistros::create($validated);

        // --- CORREÇÃO DEFINITIVA APLICADA AQUI ---
        // Atualiza a 'role' do usuário logado diretamente no banco de dados.
        User::where('id', Auth::id())->update(['role' => 'Personal']);

        return redirect()->route('posts.index')->with('success', 'Cadastro profissional finalizado com sucesso!');
    }

    public function salvarCrn(Request $request)
    {
        $validated = $request->validate([
            'numero'  => 'required|string|max:10|unique:crn_registros,numero',
            'regiao'  => 'required|string|in:CRN-1,CRN-2,CRN-3',
            'user_id' => 'required|exists:users,id|unique:crn_registros,user_id',
        ], [ /* ... mensagens de erro ... */]);

        CrnRegistro::create($validated);

        // --- CORREÇÃO DEFINITIVA APLICADA AQUI ---
        // Atualiza a 'role' do usuário logado diretamente no banco de dados.
        User::where('id', Auth::id())->update(['role' => 'Nutricionista']);

        return redirect()->route('posts.index')->with('success', 'Cadastro profissional finalizado com sucesso!');
    }


    public function validarCrn(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'numero' => 'required|string|max:10',
            'regiao' => 'required|string|in:CRN-1,CRN-2,CRN-3,CRN-4,CRN-5,CRN-6,CRN-7,CRN-8,CRN-9,CRN-10',
        ], [
            'numero.required' => 'O número do CRN é obrigatório para validação.',
            'regiao.required' => 'A região do CRN é obrigatória para validação.',
            'regiao.in' => 'A região do CRN é inválida.',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $existe = CrnRegistro::where('numero', $request->numero)
            ->where('regiao', $request->regiao)
            ->exists();

        if ($existe) {
            return response()->json(['valid' => true, 'message' => 'Registro CRN válido.']);
        } else {
            return response()->json(['valid' => false, 'message' => 'Registro CRN não encontrado.']);
        }
    }
}
