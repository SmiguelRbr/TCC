<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Meu App')</title>
  <link rel="stylesheet" href="{{ asset('css/app.css') }}">

  <style>
    /* Tema Claro */
    body.light {
      background: #f9f9f9;
      color: #222;
    }

    /* Tema Escuro */
    body.dark {
      background: #121212;
      color: #eee;
    }

    .btn-toggle {
      padding: 8px 16px;
      border: none;
      cursor: pointer;
      background: #4cafef;
      color: white;
      border-radius: 6px;
    }
  </style>
</head>
<body class="{{ session('theme', 'light') }}">
  <header>
    <nav>
      <a href="/">Home</a>
      <a href="/sobre">Sobre</a>
      <a href="/contato">Contato</a>

      {{-- Botão Dark Mode em TODAS as telas --}}
      <form action="{{ route('toggle.theme') }}" method="POST" style="display:inline">
        @csrf
        <button type="submit" class="btn-toggle">
          {{ session('theme', 'light') === 'light' ? '🌙 Dark' : '☀️ Light' }}
        </button>
      </form>
    </nav>
  </header>

  <main>
    @yield('content')
  </main>
</body>
</html>
