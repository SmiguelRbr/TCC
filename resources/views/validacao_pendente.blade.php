<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validação Pendente</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #F9FAFB;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
            color: #1F2937;
        }

        .container {
            text-align: center;
            background: white;
            padding: 4rem;
            border-radius: 16px;
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .icon {
            font-size: 4rem;
            margin-bottom: 1rem;
        }

        h1 {
            font-size: 1.8rem;
            margin-bottom: 0.5rem;
        }

        p {
            color: #6B7280;
            max-width: 400px;
            margin-bottom: 2rem;
        }

        .logout-btn {
            color: #10B981;
            text-decoration: none;
            font-weight: 500;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="icon">⏳</div>
        <h1>Cadastro em Análise</h1>
        <p>Obrigado por se cadastrar! Suas credenciais profissionais foram enviadas e estão sendo analisadas pela nossa equipe. Você receberá um e-mail assim que seu perfil for validado.</p>
        <a href="{{ route('logout') }}" class="logout-btn" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Sair
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="GET" style="display: none;">
            @csrf
        </form>
    </div>
</body>

</html>