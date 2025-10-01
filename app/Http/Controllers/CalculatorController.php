<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function imc() {
        return view('calculators.imc');
    }

    public function calorias() {
        return view('calculators.calorias');
    }

    public function agua() {
        return view('calculators.agua');
    }

    public function composicao() {
        return view('calculators.composicao');
    }

    public function macros() {
        return view('calculators.macros');
    }

    public function vo2max() {
        return view('calculators.vo2max');
    }

    public function bfAvancado() {
        return view('calculators.bf-avancado');
    }

    public function periodizacao() {
        return view('calculators.periodizacao');
    }
}
