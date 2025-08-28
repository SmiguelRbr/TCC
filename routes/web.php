<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ValidarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ValidationController;


Route::get('/', function () {
    return view('auth');
})->name('AuthView');

// Página com o formulário de validação do CRN
Route::get('/crn/formulario', function () {
    return view('crn'); // nome do seu arquivo Blade (ex: resources/views/crn-formulario.blade.php)
})->name('crn.formulario');

// Validação do CRN (via POST do form)
Route::post('/crn/validar', [ValidarController::class, 'validarCrn'])->name('crn.validar');

// Salvamento do CRN (opcional, se for usar salvarCrn em outro formulário)
Route::post('/crn/salvar', [ValidarController::class, 'salvarCrn'])->name('crn.salvar');


Route::post('/register', [AuthController::class, 'register'])->name('cadastro');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'login'])->name('login')->middleware('auth');
