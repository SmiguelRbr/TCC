<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete seu Perfil</title>
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
            max-width: 500px;
            margin: 20px;
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(10px);
            min-height: 600px;
        }

        .progress-bar {
            height: 4px;
            background: var(--bg);
            position: relative;
            overflow: hidden;
        }

        .progress-fill {
            height: 100%;
            background: var(--gradient);
            width: 33.33%;
            transition: width 0.5s ease;
            position: relative;
        }

        .progress-fill::after {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.4), transparent);
            animation: shimmer 2s ease-in-out infinite;
        }

        @keyframes shimmer {
            0% {
                left: -100%;
            }

            100% {
                left: 100%;
            }
        }

        .screen {
            display: none;
            padding: 2rem;
            text-align: center;
            animation: slideIn 0.5s ease-out;
        }

        .screen.active {
            display: block;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateX(30px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .screen-icon {
            width: 80px;
            height: 80px;
            margin: 0 auto 2rem;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            background: var(--gradient);
            box-shadow: var(--shadow);
            position: relative;
        }

        .screen-icon::after {
            content: '';
            position: absolute;
            inset: -4px;
            border-radius: 50%;
            padding: 4px;
            background: var(--gradient);
            mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            mask-composite: exclude;
            opacity: 0.3;
            animation: pulse 2s ease-in-out infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
                opacity: 0.3;
            }

            50% {
                transform: scale(1.1);
                opacity: 0.1;
            }
        }

        .screen-title {
            font-size: 2rem;
            font-weight: 700;
            color: var(--text-dark);
            margin-bottom: 1rem;
            background: var(--gradient);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .screen-subtitle {
            color: var(--text-gray);
            font-size: 1.1rem;
            margin-bottom: 2rem;
            line-height: 1.6;
        }

        .choice-buttons {
            display: flex;
            flex-direction: column;
            gap: 1rem;
            margin: 2rem 0;
        }

        .choice-button {
            background: var(--white);
            border: 2px solid #E5E7EB;
            border-radius: var(--border-radius);
            padding: 1.5rem;
            cursor: pointer;
            transition: var(--transition);
            text-align: left;
            position: relative;
            overflow: hidden;
        }

        .choice-button::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--gradient);
            opacity: 0.05;
            transition: var(--transition);
        }

        .choice-button:hover {
            border-color: var(--primary);
            box-shadow: var(--shadow-hover);
            transform: translateY(-2px);
        }

        .choice-button:hover::before {
            left: 0;
        }

        .choice-button-icon {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            display: block;
        }

        .choice-button-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }

        .choice-button-desc {
            color: var(--text-gray);
            font-size: 0.95rem;
            line-height: 1.4;
        }

        .form-section {
            text-align: left;
            margin-top: 2rem;
        }

        .form-row {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .form-group {
            flex: 1;
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-size: 0.9rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }

        .form-input,
        .form-select {
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

        .form-input:focus,
        .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1);
            transform: translateY(-2px);
        }

        .form-input::placeholder {
            color: var(--text-gray);
        }

        .input-unit {
            position: relative;
        }

        .input-unit::after {
            content: attr(data-unit);
            position: absolute;
            right: 16px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-gray);
            font-size: 0.9rem;
            font-weight: 500;
            pointer-events: none;
        }

        .input-unit .form-input {
            padding-right: 50px;
        }

        .action-buttons {
            margin-top: 2rem;
            display: flex;
            gap: 1rem;
        }

        .btn {
            flex: 1;
            padding: 16px 24px;
            border: none;
            border-radius: 12px;
            font-size: 1rem;
            font-weight: 600;
            cursor: pointer;
            transition: var(--transition);
            position: relative;
            overflow: hidden;
        }

        .btn-primary {
            background: var(--gradient);
            color: var(--white);
        }

        .btn-primary::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: var(--transition);
        }

        .btn-primary:hover::before {
            left: 100%;
        }

        .btn-primary:hover {
            background: var(--gradient-dark);
            box-shadow: var(--shadow-hover);
            transform: translateY(-2px);
        }

        .btn-secondary {
            background: var(--white);
            color: var(--text-gray);
            border: 2px solid #E5E7EB;
        }

        .btn-secondary:hover {
            border-color: var(--primary);
            color: var(--primary);
            transform: translateY(-2px);
        }

        .professional-choices {
            display: flex;
            gap: 1rem;
            margin: 2rem 0;
        }

        .professional-card {
            flex: 1;
            background: var(--white);
            border: 2px solid #E5E7EB;
            border-radius: var(--border-radius);
            padding: 2rem 1rem;
            cursor: pointer;
            transition: var(--transition);
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .professional-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: var(--gradient);
            opacity: 0.05;
            transition: var(--transition);
        }

        .professional-card:hover {
            border-color: var(--primary);
            box-shadow: var(--shadow);
            transform: translateY(-4px);
        }

        .professional-card:hover::before {
            left: 0;
        }

        .professional-card.selected {
            border-color: var(--primary);
            background: var(--primary-light);
        }

        .professional-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            display: block;
        }

        .professional-title {
            font-size: 1.2rem;
            font-weight: 600;
            color: var(--text-dark);
            margin-bottom: 0.5rem;
        }

        .professional-desc {
            color: var(--text-gray);
            font-size: 0.9rem;
        }

        .loading {
            display: none;
            align-items: center;
            justify-content: center;
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

        @media (max-width: 480px) {
            .container {
                margin: 10px;
                max-width: calc(100vw - 20px);
            }

            .form-row {
                flex-direction: column;
                gap: 0;
            }

            .professional-choices {
                flex-direction: column;
            }

            .action-buttons {
                flex-direction: column;
            }

            .screen {
                padding: 1.5rem;
            }

            .screen-title {
                font-size: 1.7rem;
            }
        }

        .hidden {
            display: none !important;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="progress-bar">
            <div class="progress-fill" id="progress"></div>
        </div>

        <!-- Tela 1: Escolha do Perfil -->
        <div class="screen active" id="screen1">
            <div class="screen-icon">🎯</div>
            <h1 class="screen-title">Qual é seu objetivo?</h1>
            <p class="screen-subtitle">Escolha a opção que melhor descreve você para personalizarmos sua experiência</p>

            <div class="choice-buttons">
                <div class="choice-button" onclick="selectProfile('client')">
                    <span class="choice-button-icon">🌟</span>
                    <div class="choice-button-title">Quero Mudar de Vida</div>
                    <div class="choice-button-desc">Busco orientação para ter uma vida mais saudável e equilibrada</div>
                </div>

                <div class="choice-button" onclick="selectProfile('professional')">
                    <span class="choice-button-icon">👨‍⚕️</span>
                    <div class="choice-button-title">Sou um Profissional</div>
                    <div class="choice-button-desc">Trabalho na área da saúde e quero oferecer meus serviços</div>
                </div>
            </div>
        </div>

        <!-- Tela 2a: Dados Pessoais (Cliente) -->
        <div class="screen" id="screen2a">
            <div class="screen-icon">📊</div>
            <h1 class="screen-title">Seus Dados Pessoais</h1>
            <p class="screen-subtitle">Precisamos de algumas informações para criar um plano personalizado para você</p>

            <form method="POST" action="{{ route('user.definirCarac', ['user' => Auth::user()->id]) }}" class="form-section">
                @csrf
                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label" for="altura">Altura</label>
                        <div class="input-unit" data-unit="cm">
                            <input type="number" class="form-input" id="altura" name="altura" placeholder="175" min="100" max="250" value="{{ old('altura', Auth::user()->altura) }}" required>
                        </div>
                        @error('altura')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="peso">Peso</label>
                        <div class="input-unit" data-unit="kg">
                            <input type="number" class="form-input" id="peso" name="peso" placeholder="70.5" min="30" max="300" step="0.1" value="{{ old('peso', Auth::user()->peso) }}" required>
                        </div>
                        @error('peso')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="idade">Idade</label>
                    <div class="input-unit" data-unit="anos">
                        <input type="number" class="form-input" id="idade" name="idade" placeholder="25" min="12" max="120" value="{{ old('idade', Auth::user()->idade) }}" required>
                    </div>
                    @error('idade')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="action-buttons">
                    <button type="button" class="btn btn-secondary" onclick="goBack()">Voltar</button>
                    <button type="submit" class="btn btn-primary">Continuar</button>
                </div>
            </form>
        </div>

        <!-- Tela 2b: Tipo de Profissional -->
        <div class="screen" id="screen2b">
            <div class="screen-icon">🩺</div>
            <h1 class="screen-title">Sua Especialidade</h1>
            <p class="screen-subtitle">Selecione sua área de atuação profissional</p>

            <div class="professional-choices">
                <div class="professional-card" onclick="selectProfessional('nutricionista')">
                    <span class="professional-icon">🥗</span>
                    <div class="professional-title">Nutricionista</div>
                    <div class="professional-desc">Especialista em alimentação e nutrição</div>
                </div>

                <div class="professional-card" onclick="selectProfessional('personal')">
                    <span class="professional-icon">💪</span>
                    <div class="professional-title">Personal Trainer</div>
                    <div class="professional-desc">Profissional de educação física</div>
                </div>
            </div>

            <div class="action-buttons">
                <button type="button" class="btn btn-secondary" onclick="goBack()">Voltar</button>
                <button type="button" class="btn btn-primary" id="continueBtn" onclick="showProfessionalForm()" disabled>Continuar</button>
            </div>
        </div>

        <!-- Tela 3: Dados do Profissional -->
        <div class="screen" id="screen3">
            <div class="screen-icon">📋</div>
            <h1 class="screen-title" id="screen3Title">Dados Profissionais</h1>
            <p class="screen-subtitle" id="screen3Subtitle">Complete seu registro profissional</p>

            <!-- Formulário Nutricionista (CRN) -->
            <form method="POST" action="{{ route('sobrevoce.crn') }}" class="form-section">
                @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                <div class="form-group">
                    <label class="form-label" for="crn_numero">Número do CRN</label>
                    <input type="text" class="form-input" id="crn_numero" name="numero" value="{{ old('numero') }}" maxlength="10" required>
                    @error('numero')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <label class="form-label" for="crn_regiao">Região do CRN</label>
                    <select class="form-select" id="crn_regiao" name="regiao" required>
                        <option value="">Selecione a região</option>
                        <option value="CRN-1" {{ old('regiao') == 'CRN-1' ? 'selected' : '' }}>CRN-1 - RJ, ES</option>
                        <option value="CRN-2" {{ old('regiao') == 'CRN-2' ? 'selected' : '' }}>CRN-2 - RS</option>
                        <option value="CRN-3" {{ old('regiao') == 'CRN-3' ? 'selected' : '' }}>CRN-3 - SP, MS</option>
                        <!-- restante das opções -->
                    </select>
                    @error('regiao')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="action-buttons">
                    <button type="button" class="btn btn-secondary" onclick="goBack()">Voltar</button>
                    <button type="submit" class="btn btn-primary">Finalizar Cadastro</button>
                </div>
            </form>

            <!-- Formulário Personal Trainer (CREF) -->
            <form method="POST" action="{{ route('user.definirCarac', ['user' => Auth::id()]) }}" class="form-section">
    @csrf
                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">

                <div class="form-row">
                    <div class="form-group">
                        <label class="form-label" for="cref_numero">Número do CREF</label>
                        <input type="text" class="form-input" id="cref_numero" name="cref_numero" value="{{ old('cref_numero') }}" maxlength="6" required>
                        @error('cref_numero')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="cref_categoria">Categoria</label>
                        <select class="form-select" id="cref_categoria" name="cref_categoria" required>
                            <option value="">Selecione</option>
                            <option value="G" {{ old('cref_categoria') == 'G' ? 'selected' : '' }}>G - Graduado</option>
                            <option value="C" {{ old('cref_categoria') == 'C' ? 'selected' : '' }}>C - Licenciatura</option>
                            <option value="E" {{ old('cref_categoria') == 'E' ? 'selected' : '' }}>E - Especialização</option>
                            <option value="M" {{ old('cref_categoria') == 'M' ? 'selected' : '' }}>M - Mestrado</option>
                            <option value="D" {{ old('cref_categoria') == 'D' ? 'selected' : '' }}>D - Doutorado</option>
                        </select>
                        @error('cref_categoria')
                        <span class="text-red-500">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="cref_uf">Estado (UF)</label>
                    <select class="form-select" id="cref_uf" name="cref_uf" required>
                        <option value="">Selecione o estado</option>
                        <option value="SP" {{ old('cref_uf') == 'SP' ? 'selected' : '' }}>São Paulo</option>
                        <option value="RJ" {{ old('cref_uf') == 'RJ' ? 'selected' : '' }}>Rio de Janeiro</option>
                        <option value="MG" {{ old('cref_uf') == 'MG' ? 'selected' : '' }}>Minas Gerais</option>
                        <!-- restante das opções -->
                    </select>
                    @error('cref_uf')
                    <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>

                <div class="action-buttons">
                    <button type="button" class="btn btn-secondary" onclick="goBack()">Voltar</button>
                    <button type="submit" class="btn btn-primary">Finalizar Cadastro</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        let currentScreen = 1;
        let userType = null;
        let professionalType = null;

        function updateProgress() {
            const progress = document.getElementById('progress');
            const percentage = (currentScreen / 3) * 100;
            progress.style.width = percentage + '%';
        }

        function showScreen(screenNumber) {
            document.querySelectorAll('.screen').forEach(screen => {
                screen.classList.remove('active');
            });

            document.getElementById(`screen${screenNumber}`).classList.add('active');
            currentScreen = screenNumber;
            updateProgress();
        }

        function selectProfile(type) {
            userType = type;

            if (type === 'client') {
                showScreen('2a');
            } else {
                showScreen('2b');
            }
        }

        function selectProfessional(type) {
            professionalType = type;

            // Remove seleção anterior
            document.querySelectorAll('.professional-card').forEach(card => {
                card.classList.remove('selected');
            });

            // Adiciona seleção atual
            event.currentTarget.classList.add('selected');

            // Habilita botão continuar
            document.getElementById('continueBtn').disabled = false;
        }

        function showProfessionalForm() {
            const title = document.getElementById('screen3Title');
            const subtitle = document.getElementById('screen3Subtitle');
            const nutricionistaForm = document.getElementById('nutricionistaForm');
            const personalForm = document.getElementById('personalForm');

            if (professionalType === 'nutricionista') {
                title.textContent = 'Registro CRN';
                subtitle.textContent = 'Complete seu registro no Conselho Regional de Nutricionistas';
                nutricionistaForm.classList.remove('hidden');
                personalForm.classList.add('hidden');
            } else {
                title.textContent = 'Registro CREF';
                subtitle.textContent = 'Complete seu registro no Conselho Regional de Educação Física';
                nutricionistaForm.classList.add('hidden');
                personalForm.classList.remove('hidden');
            }

            showScreen(3);
        }

        function goBack() {
            if (currentScreen === '2a' || currentScreen === '2b') {
                showScreen(1);
                userType = null;
                professionalType = null;
            } else if (currentScreen === 3) {
                showScreen('2b');
            }
        }

        // Manipulação dos formulários
        document.getElementById('clientForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const button = this.querySelector('.btn-primary');
            const buttonText = button.querySelector('.button-text');
            const loading = button.querySelector('.loading');

            buttonText.style.display = 'none';
            loading.style.display = 'flex';
            button.disabled = true;

            const formData = {
                altura: document.getElementById('altura').value,
                peso: document.getElementById('peso').value,
                idade: document.getElementById('idade').value
            };

            setTimeout(() => {
                console.log('Dados do cliente:', formData);
                alert('Cadastro realizado com sucesso!');
                buttonText.style.display = 'block';
                loading.style.display = 'none';
                button.disabled = false;
            }, 2000);
        });

        document.getElementById('nutricionistaForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const button = this.querySelector('.btn-primary');
            const buttonText = button.querySelector('.button-text');
            const loading = button.querySelector('.loading');

            buttonText.style.display = 'none';
            loading.style.display = 'flex';
            button.disabled = true;

            const formData = {
                numero: document.getElementById('crn_numero').value,
                regiao: document.getElementById('crn_regiao').value
            };

            setTimeout(() => {
                console.log('Dados CRN:', formData);
                alert('Cadastro profissional finalizado!');
                buttonText.style.display = 'block';
                loading.style.display = 'none';
                button.disabled = false;
            }, 2000);
        });

        document.getElementById('personalForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const button = this.querySelector('.btn-primary');
            const buttonText = button.querySelector('.button-text');
            const loading = button.querySelector('.loading');

            buttonText.style.display = 'none';
            loading.style.display = 'flex';
            button.disabled = true;

            const formData = {
                cref_numero: document.getElementById('cref_numero').value,
                cref_categoria: document.getElementById('cref_categoria').value,
                cref_uf: document.getElementById('cref_uf').value
            };

            setTimeout(() => {
                console.log('Dados CREF:', formData);
                alert('Cadastro profissional finalizado!');
                buttonText.style.display = 'block';
                loading.style.display = 'none';
                button.disabled = false;
            }, 2000);
        });

        // Inicializar
        updateProgress();
    </script>
</body>

</html>