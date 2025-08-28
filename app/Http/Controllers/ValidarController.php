<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\CrefRegistros;
use App\Models\CrnRegistro;


class ValidarController extends Controller
{

    public function salvarCref(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'cref_numero' => 'required|digits_between:5,6',
            'cref_categoria' => 'required|in:G,C,E',
            'cref_uf' => 'required|size:2|in:SP,RJ,MG,ES,BA,PR,RS,SC,PE,CE,GO,DF',
        ], [
            'cref_numero.required' => 'O número do CREF é obrigatório.',
            'cref_numero.digits_between' => 'O número do CREF deve ter entre 5 e 6 dígitos.',

            'cref_categoria.required' => 'A categoria do CREF é obrigatória.',
            'cref_categoria.in' => 'A categoria deve ser uma das seguintes: G, C ou E.',

            'cref_uf.required' => 'O estado (UF) do CREF é obrigatório.',
            'cref_uf.size' => 'O UF deve ter exatamente 2 letras.',
            'cref_uf.in' => 'O UF informado não é válido. Escolha um estado válido.',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $registro = CrefRegistros::create($validator->validated());

        return response()->json(['success' => true, 'data' => $registro]);
    }

    public function salvarCrn(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'numero' => 'required|string|max:10|unique:crn_registros,numero',
            'regiao' => 'required|string|in:CRN-1,CRN-2,CRN-3,CRN-4,CRN-5,CRN-6,CRN-7,CRN-8,CRN-9,CRN-10',
            'user_id' => 'required|exists:users,id|unique:crn_registros,user_id'
        ], [
            'numero.required' => 'O número do CRN é obrigatório.',
            'numero.unique' => 'Este número de CRN já está cadastrado.',
            'regiao.required' => 'A região do CRN é obrigatória.',
            'regiao.in' => 'A região do CRN é inválida.',
            'user_id.required' => 'O ID do usuário é obrigatório.',
            'user_id.exists' => 'Usuário inválido.',
            'user_id.unique' => 'Este usuário já possui um CRN cadastrado.',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $crnRegistro = CrnRegistro::create($validator->validated());

        return response()->json(['success' => true, 'data' => $crnRegistro]);
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
