<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ValidarController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ValidationController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;


Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('auth');
})->name('login');


Route::get('/crn/formulario', function () {
    return view('crn');
})->name('crn.formulario');

// Validação do CRN (via POST do form)
Route::post('/crn/validar', [ValidarController::class, 'validarCrn'])->name('crn.validar');

// Salvamento do CRN (opcional, se for usar salvarCrn em outro formulário)
Route::post('/crn/salvar', [ValidarController::class, 'salvarCrn'])->name('crn.salvar');


Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware('auth')->group(function () {
    Route::post('/user/{user}/definir-carac', [AuthController::class, 'definirCarac'])
        ->name('user.definirCarac');
});

Route::get('/sobrevoce', function () {
    return view('sobrevoce');
})->name('sobrevoce.form');

// POST para salvar o CRN
Route::post('/sobrevoce', [ValidarController::class, 'salvarCrn'])->name('sobrevoce.crn');


Route::middleware(['auth'])->group(function () {
    Route::get('/feed', [PostController::class, 'index'])->name('posts.index');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
});


Route::post('/posts/{post}/like-ajax', [PostController::class, 'likeAjax'])->name('posts.like.ajax');

Route::post('/posts/{post}/like', [LikeController::class, 'toggle'])->name('posts.like');
Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');


Route::middleware(['auth'])->group(function () {
    // Exibir perfil
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');

    // Exibir formulário de edição do perfil
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');

    // Atualizar perfil
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');



    // Alternar modo escuro
    Route::post('/profile/dark-mode', [ProfileController::class, 'toggleDarkMode'])->name('profile.toggle-dark-mode');
});

Route::post('/toggle-theme', function () {
    $current = session('theme', 'light');
    $new = $current === 'light' ? 'dark' : 'light';
    session(['theme' => $new]);
    return back();
})->name('toggle.theme');


use App\Http\Controllers\CalculatorController;

Route::middleware(['auth'])->group(function () {
    Route::get('/calculadoras/imc', [CalculatorController::class, 'imc'])->name('calculators.imc');
    Route::get('/calculadoras/calorias', [CalculatorController::class, 'calorias'])->name('calculators.calorias');
    Route::get('/calculadoras/agua', [CalculatorController::class, 'agua'])->name('calculators.agua');
    Route::get('/calculadoras/composicao', [CalculatorController::class, 'composicao'])->name('calculators.composicao');
    Route::get('/calculadoras/macros', [CalculatorController::class, 'macros'])->name('calculators.macros');
    Route::get('/calculadoras/vo2max', [CalculatorController::class, 'vo2max'])->name('calculators.vo2max');
    Route::get('/calculadoras/bf-avancado', [CalculatorController::class, 'bfAvancado'])->name('calculators.bf-avancado');
    Route::get('/calculadoras/periodizacao', [CalculatorController::class, 'periodizacao'])->name('calculators.periodizacao');
});
