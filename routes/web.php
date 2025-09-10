<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ValidarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ValidationController;


Route::get('/auth', function () {
    return view('auth'); 
});


Route::get('/crn/formulario', function () {
    return view('crn'); 
})->name('crn.formulario');

// Validação do CRN (via POST do form)
Route::post('/crn/validar', [ValidarController::class, 'validarCrn'])->name('crn.validar');

// Salvamento do CRN (opcional, se for usar salvarCrn em outro formulário)
Route::post('/crn/salvar', [ValidarController::class, 'salvarCrn'])->name('crn.salvar');


Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::post('/user/{user}/definir-carac', [AuthController::class, 'definirCarac'])
        ->name('user.definirCarac');
});

Route::get('/sobrevoce', function () {
    return view('sobrevoce');
})->name('sobrevoce');