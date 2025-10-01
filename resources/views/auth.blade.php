<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Cadastro</title>
    <style>
        :root {
            --primary: #10B981;
            --primary-dark: #059669;
            --primary-light: #D1FAE5;
            --accent: #06D6A0;
            --secondary: #118AB2;
            --gradient: linear-gradient(135deg, #10B981 0%, #06D6A0 100%);
            --gradient-dark: linear-gradient(135deg, #059669 0%, #047857 100%);
            --text-dark: #1F2937;
            --text-gray: #6B7280;
            --bg: #F9FAFB;
            --white: #FFFFFF;
            --shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 10px 10px -5px rgb(0 0 0 / 0.04);
            --shadow-hover: 0 25px 50px -12px rgb(0 0 0 / 0.25);
            --border-radius: 16px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --max-width: 1200px;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: var(--bg);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow-x: hidden;
        }

        /* Background decorativo */
        body::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background:
                radial-gradient(circle at 25% 25%, var(--primary-light) 0%, transparent 50%),
                radial-gradient(circle at 75% 75%, var(--accent) 0%, transparent 40%);
            opacity: 0.1;
            z-index: -1;
            animation: float 20s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translate(0, 0) rotate(0deg);
            }

            33% {
                transform: translate(-20px, -20px) rotate(120deg);
            }

            66% {
                transform: translate(20px, -10px) rotate(240deg);
            }
        }

        .container {
            background: var(--white);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            width: 100%;
            max-width: 400px;
            margin: 20px;
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(10px);
        }

        .form-header {
            background: var(--gradient);
            padding: 2rem;
            text-align: center;
            position: relative;
        }

        .form-header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 20px;
            background: var(--white);
            border-radius: 20px 20px 0 0;
        }

        .logo {
            width: 60px;
            height: 60px;
            background: var(--white);
            border-radius: 50%;
            margin: 0 auto 1rem;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: var(--shadow);
        }

        .logo-icon {
            width: 30px;
            height: 30px;
            background: var(--gradient);
            border-radius: 8px;
            position: relative;
        }

        .logo-icon::after {
            content: '👤';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 16px;
        }

        .form-title {
            color: var(--white);
            font-size: 1.75rem;
            font-weight: 700;
            margin-bottom: 0.5rem;
        }

        .form-subtitle {
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.95rem;
        }

        .form-tabs {
            display: flex;
            background: var(--bg);
            margin: 0 2rem;
            border-radius: 12px;
            padding: 4px;
            position: relative;
            margin-top: -10px;
            z-index: 10;
        }

        .tab-button {
            flex: 1;
            padding: 12px;
            background: none;
            border: none;
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--text-gray);
            cursor: pointer;
            border-radius: 8px;
            transition: var(--transition);
            position: relative;
        }

        .tab-button.active {
            color: var(--white);
            background: var(--gradient);
            box-shadow: 0 2px 8px rgba(16, 185, 129, 0.3);
        }

        .form-content {
            padding: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }

        .form-input {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #E5E7EB;
            border-radius: 12px;
            font-size: 1rem;
            background: var(--white);
            color: var(--text-dark);
            transition: var(--transition);
            outline: none;
        }

        .form-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
            transform: translateY(-2px);
        }

        .form-input::placeholder {
            color: var(--text-gray);
        }

        .password-field {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--text-gray);
            cursor: pointer;
            padding: 4px;
            border-radius: 4px;
            transition: var(--transition);
        }

        .password-toggle:hover {
            color: var(--primary);
        }

        .form-button {
            width: 100%;
            padding: 16px;
            background: var(--gradient);
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            color: var(--white);
            cursor: pointer;
            transition: var(--transition);
            margin-top: 1rem;
            position: relative;
            overflow: hidden;
        }

        .form-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: var(--transition);
        }

        .form-button:hover::before {
            left: 100%;
        }

        .form-button:hover {
            background: var(--gradient-dark);
            box-shadow: var(--shadow-hover);
            transform: translateY(-2px);
        }

        .form-button:active {
            transform: translateY(0);
        }

        .form-footer {
            text-align: center;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid #E5E7EB;
        }

        .form-link {
            color: var(--primary);
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
        }

        .form-link:hover {
            color: var(--primary-dark);
            text-decoration: underline;
        }

        .form-section {
            display: none;
            animation: fadeIn 0.5s ease-in-out;
        }

        .form-section.active {
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1rem;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .checkbox-input {
            width: 18px;
            height: 18px;
            accent-color: var(--primary);
        }

        .checkbox-label {
            font-size: 0.9rem;
            color: var(--text-gray);
        }

        .forgot-link {
            font-size: 0.9rem;
            color: var(--primary);
            text-decoration: none;
            transition: var(--transition);
        }

        .forgot-link:hover {
            text-decoration: underline;
        }

        @media (max-width: 480px) {
            .container {
                margin: 10px;
            }

            .form-header {
                padding: 1.5rem;
            }

            .form-content {
                padding: 1.5rem;
            }

            .form-title {
                font-size: 1.5rem;
            }
        }

        .loading {
            display: none;
            align-items: center;
            gap: 0.5rem;
        }

        .spinner {
            width: 20px;
            height: 20px;
            border: 2px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top-color: var(--white);
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-header">
            <div class="logo">
                <div class="logo-icon"></div>
            </div>
            <h1 class="form-title">Bem-vindo!</h1>
            <p class="form-subtitle">Faça login ou crie sua conta</p>
        </div>

        <div class="form-tabs">
            <button class="tab-button active" onclick="switchTab('login')">Login</button>
            <button class="tab-button" onclick="switchTab('register')">Cadastro</button>
        </div>

        <div class="form-content">
            <!-- Formulário de Login -->
            <form class="form-section active" id="login-form" method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="login-email">E-mail</label>
                    <input type="email" class="form-input" id="login-email" name="email" placeholder="seu@email.com" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="login-password">Senha</label>
                    <div class="password-field">
                        <input type="password" class="form-input" id="login-password" name="password" placeholder="••••••••" required>
                        <button type="button" class="password-toggle" onclick="togglePassword('login-password')">👁️</button>
                    </div>
                </div>

                <button type="submit" class="form-button">
                    <span class="button-text">Entrar</span>
                    <div class="loading">
                        <div class="spinner"></div>
                        <span>Entrando...</span>
                    </div>
                </button>

                @if ($errors->any())
                <div class="error-message" style="color: #EF4444; font-size: 0.875rem; margin-top: 0.5rem; text-align: center;">
                    {{ $errors->first() }}
                </div>
                @endif
            </form>


            <!-- Formulário de Cadastro -->
            <form class="form-section" id="register-form" method="POST" action="{{ route('register') }}">
                @csrf
                <div class="form-group">
                    <label class="form-label" for="register-name">Nome Completo</label>
                    <input type="text" class="form-input" id="register-name" name="name" placeholder="Seu nome completo" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="register-email">E-mail</label>
                    <input type="email" class="form-input" id="register-email" name="email" placeholder="seu@email.com" required>
                </div>

                <div class="form-group">
                    <label class="form-label" for="register-password">Senha</label>
                    <div class="password-field">
                        <input type="password" class="form-input" id="register-password" name="password" placeholder="••••••••" required minlength="8">
                        <button type="button" class="password-toggle" onclick="togglePassword('register-password')">👁️</button>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="confirm-password">Confirmar Senha</label>
                    <div class="password-field">
                        <input type="password" class="form-input" id="confirm-password" name="password_confirmation" placeholder="••••••••" required>
                        <button type="button" class="password-toggle" onclick="togglePassword('confirm-password')">👁️</button>
                    </div>
                </div>

                <button type="submit" class="form-button">
                    <span class="button-text">Criar Conta</span>
                    <div class="loading">
                        <div class="spinner"></div>
                        <span>Criando...</span>
                    </div>
                </button>

                @if ($errors->any())
                <div class="error-message" style="color: #EF4444; font-size: 0.875rem; margin-top: 0.5rem; text-align: center;">
                    {{ $errors->first() }}
                </div>
                @endif
            </form>


            <div class="form-footer">
                <p style="color: var(--text-gray); font-size: 0.9rem;">
                    Ao continuar, você concorda com nossos
                    <a href="#" class="form-link">Termos de Uso</a> e
                    <a href="#" class="form-link">Política de Privacidade</a>
                </p>
            </div>
        </div>
    </div>

    <script>
        function switchTab(tab) {
            // Atualizar botões das abas
            document.querySelectorAll('.tab-button').forEach(btn => {
                btn.classList.remove('active');
            });
            event.target.classList.add('active');

            // Atualizar formulários
            document.querySelectorAll('.form-section').forEach(section => {
                section.classList.remove('active');
            });

            if (tab === 'login') {
                document.getElementById('login-form').classList.add('active');
            } else {
                document.getElementById('register-form').classList.add('active');
            }
        }

        function togglePassword(fieldId) {
            const field = document.getElementById(fieldId);
            const button = field.nextElementSibling;

            if (field.type === 'password') {
                field.type = 'text';
                button.textContent = '🙈';
            } else {
                field.type = 'password';
                button.textContent = '👁️';
            }
        }

        // Validação de confirmação de senha
        document.getElementById('confirm-password').addEventListener('input', function() {
            const password = document.getElementById('register-password').value;
            const confirmPassword = this.value;

            if (password !== confirmPassword && confirmPassword !== '') {
                this.style.borderColor = '#EF4444';
            } else {
                this.style.borderColor = '#E5E7EB';
            }
        });


        // Efeito de foco suave nos inputs
        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.style.transform = 'scale(1.02)';
            });

            input.addEventListener('blur', function() {
                this.parentElement.style.transform = 'scale(1)';
            });
        });
    </script>
</body>

</html>