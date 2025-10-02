<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ValidarController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CalculatorController;

// --- Rotas Públicas (Visitantes) ---
Route::get('/', function () {
    return view('home');
});

Route::get('/login', function () {
    return view('auth');
})->name('login');

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login']); // O name 'login' já estava na rota GET

// --- Rotas de Autenticação e Onboarding (requerem login) ---
Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

    // Formulário de Onboarding (Cliente ou Profissional)
    Route::get('/sobrevoce', function () {
        return view('sobrevoce');
    })->name('sobrevoce.form');

    // Rota para salvar dados do CLIENTE (peso, altura, etc.)
    Route::post('/user/{user}/definir-carac', [AuthController::class, 'definirCarac'])
        ->name('user.definirCarac');

    // Rota para salvar dados do NUTRICIONISTA (CRN)
    Route::post('/sobrevoce/crn', [ValidarController::class, 'salvarCrn'])
        ->name('sobrevoce.crn.salvar');

    // Rota para salvar dados do PERSONAL TRAINER (CREF)
    Route::post('/sobrevoce/cref', [ValidarController::class, 'salvarCref'])
        ->name('sobrevoce.cref.salvar');
});

// --- Rotas do Feed e Interações (requerem login) ---
Route::middleware('auth')->group(function () {
    Route::get('/feed', [PostController::class, 'index'])->name('posts.index');
    Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');

    Route::post('/posts/{post}/like', [LikeController::class, 'toggle'])->name('posts.like');
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');
});

// --- Rotas de Perfil (requerem login) ---
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::put('/perfil/update-info', [ProfileController::class, 'updateInfo'])->name('profile.updateInfo');
    Route::post('/perfil/toggle-dark-mode', [ProfileController::class, 'toggleDarkMode'])->name('profile.toggleDarkMode');
});

// --- Rotas das Calculadoras (requerem login) ---
Route::middleware('auth')->group(function () {
    Route::get('/calculadoras/imc', [CalculatorController::class, 'imc'])->name('calculators.imc');
    // ... e as outras rotas de calculadora
});

// --- Outras Rotas ---
Route::post('/toggle-theme', function () {
    session(['theme' => session('theme', 'light') === 'light' ? 'dark' : 'light']);
    return back();
})->name('toggle.theme');

// routes/web.php

Route::middleware('auth')->group(function () {
    // ... suas outras rotas ...

    // Rota para a página de validação pendente
    Route::get('/aguardando-validacao', function () {
        return view('validacao_pendente');
    })->name('validacao.pendente');
});

// routes/web.php

// A rota que seu JavaScript já está chamando
Route::post('/posts/{post}/like-ajax', [PostController::class, 'likeAjax'])->name('posts.like.ajax');
