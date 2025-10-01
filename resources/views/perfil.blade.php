<!DOCTYPE html>
<html lang="pt-BR" class="{{ auth()->check() && auth()->user()->dark_mode ? 'dark' : '' }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Perfil - Grovy</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

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
      --card-bg: #FFFFFF;
      --header-bg: rgba(255, 255, 255, 0.95);
      --header-border: rgba(16, 185, 129, 0.1);
      --card-border: rgba(16, 185, 129, 0.1);
      --section-bg: linear-gradient(135deg, rgba(16, 185, 129, 0.05) 0%, rgba(6, 214, 160, 0.05) 100%);
      --shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 10px 10px -5px rgb(0 0 0 / 0.04);
      --shadow-hover: 0 25px 50px -12px rgb(0 0 0 / 0.25);
      --shadow-sm: 0 4px 6px rgba(0, 0, 0, 0.05);
      --border-radius: 16px;
      --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      --max-width: 1200px;
    }

    :root.dark {
      --primary: #8B5CF6;
      --primary-dark: #7C3AED;
      --primary-light: #6D28D9;
      --accent: #EC4899;
      --secondary: #3B82F6;
      --gradient: linear-gradient(135deg, #8B5CF6 0%, #EC4899 100%);
      --gradient-dark: linear-gradient(135deg, #7C3AED 0%, #DB2777 100%);
      --text-dark: #F9FAFB;
      --text-gray: #9CA3AF;
      --bg: #0F172A;
      --white: #1E293B;
      --card-bg: #1E293B;
      --header-bg: rgba(30, 41, 59, 0.95);
      --header-border: rgba(139, 92, 246, 0.2);
      --card-border: rgba(139, 92, 246, 0.2);
      --section-bg: linear-gradient(135deg, rgba(139, 92, 246, 0.05) 0%, rgba(236, 72, 153, 0.05) 100%);
      --shadow: 0 20px 25px -5px rgb(139 92 246 / 0.15), 0 10px 10px -5px rgb(0 0 0 / 0.3);
      --shadow-hover: 0 25px 50px -12px rgb(139 92 246 / 0.25);
      --shadow-sm: 0 4px 6px rgba(139, 92, 246, 0.1);
    }

    body {
      font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
      color: var(--text-dark);
      line-height: 1.7;
      background: var(--bg);
      -webkit-font-smoothing: antialiased;
      -moz-osx-font-smoothing: grayscale;
      overflow-x: hidden;
    }

    .container {
      width: 90%;
      max-width: var(--max-width);
      margin: 0 auto;
      padding: 0 20px;
    }

    /* Header */
    header {
      background: var(--header-bg);
      backdrop-filter: blur(20px);
      border-bottom: 1px solid var(--header-border);
      position: sticky;
      top: 0;
      z-index: 100;
      transition: var(--transition);
    }

    .header-content {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 20px 0;
      min-height: 80px;
    }

    .logo {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .logo-icon {
      width: 50px;
      height: 50px;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-weight: bold;
      font-size: 20px;
      box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3);
    }

    .logo-icon img {
      width: 100%;
      height: 100%;
      object-fit: cover;
      border-radius: 12px;
    }

    .logo-text span {
      font-size: 13px;
      color: var(--text-gray);
      font-weight: 500;
    }

    nav {
      display: flex;
      align-items: center;
      gap: 8px;
    }

    nav a {
      color: var(--text-dark);
      text-decoration: none;
      font-weight: 500;
      padding: 12px 18px;
      border-radius: 10px;
      transition: var(--transition);
    }

    nav a:not(.btn):hover {
      color: var(--primary);
      background: var(--card-border);
    }

    nav .btn {
      background: var(--gradient);
      color: white;
      font-weight: 600;
      box-shadow: var(--shadow-sm);
    }

    nav .btn:hover {
      transform: translateY(-2px);
      box-shadow: var(--shadow);
    }

    /* Profile Section */
    .profile-section {
      padding: 60px 0 40px;
    }

    .profile-header {
      background: var(--card-bg);
      border-radius: var(--border-radius);
      padding: 40px;
      box-shadow: var(--shadow-sm);
      border: 1px solid var(--card-border);
      display: flex;
      align-items: center;
      gap: 30px;
      margin-bottom: 40px;
    }

    .profile-avatar {
      width: 120px;
      height: 120px;
      border-radius: 50%;
      background: var(--gradient);
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 48px;
      font-weight: bold;
      flex-shrink: 0;
      box-shadow: var(--shadow);
    }

    .profile-info h1 {
      font-size: 32px;
      font-weight: 700;
      margin-bottom: 8px;
      background: var(--gradient);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .profile-info p {
      color: var(--text-gray);
      font-size: 16px;
      margin-bottom: 20px;
    }

    .profile-stats {
      display: flex;
      gap: 30px;
    }

    .stat {
      text-align: center;
    }

    .stat-value {
      font-size: 24px;
      font-weight: 700;
      color: var(--primary);
      display: block;
    }

    .stat-label {
      font-size: 14px;
      color: var(--text-gray);
      margin-top: 4px;
    }

    /* Calculators Grid */
    .calculators-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
      gap: 30px;
      margin-bottom: 60px;
    }

    .calculator-card {
      background: var(--card-bg);
      border-radius: var(--border-radius);
      padding: 32px;
      box-shadow: var(--shadow-sm);
      border: 1px solid var(--card-border);
      transition: var(--transition);
    }

    .calculator-card:hover {
      transform: translateY(-4px);
      box-shadow: var(--shadow);
    }

    .calculator-header {
      display: flex;
      align-items: center;
      gap: 12px;
      margin-bottom: 24px;
    }

    .calculator-icon {
      width: 48px;
      height: 48px;
      background: var(--gradient);
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 24px;
    }

    .calculator-header h2 {
      font-size: 22px;
      font-weight: 600;
      color: var(--text-dark);
    }

    .form-group {
      margin-bottom: 20px;
    }

    .form-group label {
      display: block;
      font-weight: 500;
      margin-bottom: 8px;
      color: var(--text-dark);
      font-size: 14px;
    }

    .form-group input,
    .form-group select {
      width: 100%;
      padding: 12px 16px;
      border: 2px solid var(--card-border);
      border-radius: 10px;
      font-size: 16px;
      background: var(--bg);
      color: var(--text-dark);
      transition: var(--transition);
    }

    .form-group input:focus,
    .form-group select:focus {
      outline: none;
      border-color: var(--primary);
    }

    .form-row {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 16px;
    }

    .calc-button {
      width: 100%;
      padding: 14px;
      background: var(--gradient);
      color: white;
      border: none;
      border-radius: 10px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      transition: var(--transition);
      margin-top: 10px;
    }

    .calc-button:hover {
      transform: translateY(-2px);
      box-shadow: var(--shadow);
    }

    .result-box {
      margin-top: 20px;
      padding: 20px;
      background: var(--section-bg);
      border-radius: 12px;
      border: 2px solid var(--card-border);
      display: none;
    }

    .result-box.show {
      display: block;
      animation: slideIn 0.3s ease-out;
    }

    .result-value {
      font-size: 32px;
      font-weight: 700;
      background: var(--gradient);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      margin-bottom: 8px;
    }

    .result-label {
      color: var(--text-gray);
      font-size: 14px;
      margin-bottom: 12px;
    }

    .result-info {
      color: var(--text-dark);
      font-size: 14px;
      line-height: 1.6;
    }

    /* Footer */
    footer {
      background: var(--card-bg);
      color: var(--text-dark);
      text-align: center;
      padding: 40px 0;
      margin-top: 80px;
      border-top: 1px solid var(--card-border);
    }

    footer p {
      opacity: 0.8;
    }

    @keyframes slideIn {
      from {
        opacity: 0;
        transform: translateY(10px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Responsive */
    @media (max-width: 768px) {
      .header-content {
        flex-direction: column;
        gap: 20px;
      }

      .profile-header {
        flex-direction: column;
        text-align: center;
      }

      .profile-stats {
        justify-content: center;
      }

      .calculators-grid {
        grid-template-columns: 1fr;
      }

      .form-row {
        grid-template-columns: 1fr;
      }

      nav {
        flex-wrap: wrap;
        justify-content: center;
      }
    }
  </style>
</head>

<body>
  <header>
    <div class="container header-content">
      <div class="logo">
        <div class="logo-icon">
          <img src="https://encurtador.com.br/JO1pP" alt="Grovy">
        </div>
        <div class="logo-text">
          <span>Saúde & Aconselhamento</span>
        </div>
      </div>
      <nav>

        <a href="{{ route('posts.index') }}">Feed</a>
        @guest
        <a href="{{ route('login') }}" class="btn">Entrar</a>
        @else
        <a href="{{ route('logout') }}" class="btn">Sair</a>
        @endguest
      </nav>
    </div>
  </header>

  <main>
    <section class="profile-section container">
      <!-- Profile Header -->
      <div class="profile-header">
        <div class="profile-avatar">
          @auth
          {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
          @else
          U
          @endauth
        </div>
        <div class="profile-info">
          <h1>@auth {{ auth()->user()->name }} @else Usuário @endauth</h1>
          <p>@auth {{ auth()->user()->email }} @else Entre para ver suas informações @endauth</p>
          <div class="profile-stats">
            <div class="stat">
              <span class="stat-value">12</span>
              <span class="stat-label">Dias ativos</span>
            </div>
            <div class="stat">
              <span class="stat-value">8</span>
              <span class="stat-label">Metas alcançadas</span>
            </div>
            <div class="stat">
              <span class="stat-value">24</span>
              <span class="stat-label">Dicas salvas</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Calculators -->
      <div class="calculators-grid">
        <!-- IMC Calculator -->
        <div class="calculator-card">
          <div class="calculator-header">
            <div class="calculator-icon">📊</div>
            <h2>Calculadora de IMC</h2>
          </div>
          <form id="imcForm" onsubmit="calcularIMC(event)">
            <div class="form-row">
              <div class="form-group">
                <label>Peso (kg)</label>
                <input type="number" id="peso" step="0.1" required placeholder="Ex: 70">
              </div>
              <div class="form-group">
                <label>Altura (m)</label>
                <input type="number" id="altura" step="0.01" required placeholder="Ex: 1.75">
              </div>
            </div>
            <button type="submit" class="calc-button">Calcular IMC</button>
          </form>
          <div id="imcResult" class="result-box">
            <div class="result-value" id="imcValue"></div>
            <div class="result-label">Seu IMC</div>
            <div class="result-info" id="imcInfo"></div>
          </div>
        </div>

        <!-- TMB Calculator -->
        <div class="calculator-card">
          <div class="calculator-header">
            <div class="calculator-icon">🔥</div>
            <h2>Taxa Metabólica Basal</h2>
          </div>
          <form id="tmbForm" onsubmit="calcularTMB(event)">
            <div class="form-row">
              <div class="form-group">
                <label>Peso (kg)</label>
                <input type="number" id="pesoTMB" step="0.1" required placeholder="Ex: 70">
              </div>
              <div class="form-group">
                <label>Altura (cm)</label>
                <input type="number" id="alturaTMB" required placeholder="Ex: 175">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label>Idade</label>
                <input type="number" id="idade" required placeholder="Ex: 30">
              </div>
              <div class="form-group">
                <label>Sexo</label>
                <select id="sexo" required>
                  <option value="">Selecione</option>
                  <option value="masculino">Masculino</option>
                  <option value="feminino">Feminino</option>
                </select>
              </div>
            </div>
            <button type="submit" class="calc-button">Calcular TMB</button>
          </form>
          <div id="tmbResult" class="result-box">
            <div class="result-value" id="tmbValue"></div>
            <div class="result-label">Calorias/dia em repouso</div>
            <div class="result-info" id="tmbInfo"></div>
          </div>
        </div>

        <!-- Water Calculator -->
        <div class="calculator-card">
          <div class="calculator-header">
            <div class="calculator-icon">💧</div>
            <h2>Hidratação Diária</h2>
          </div>
          <form id="aguaForm" onsubmit="calcularAgua(event)">
            <div class="form-group">
              <label>Peso (kg)</label>
              <input type="number" id="pesoAgua" step="0.1" required placeholder="Ex: 70">
            </div>
            <div class="form-group">
              <label>Nível de atividade</label>
              <select id="atividade" required>
                <option value="">Selecione</option>
                <option value="sedentario">Sedentário</option>
                <option value="leve">Atividade leve</option>
                <option value="moderado">Atividade moderada</option>
                <option value="intenso">Atividade intensa</option>
              </select>
            </div>
            <button type="submit" class="calc-button">Calcular Hidratação</button>
          </form>
          <div id="aguaResult" class="result-box">
            <div class="result-value" id="aguaValue"></div>
            <div class="result-label">Litros de água por dia</div>
            <div class="result-info" id="aguaInfo"></div>
          </div>
        </div>

        <!-- Calorie Goal Calculator -->
        <div class="calculator-card">
          <div class="calculator-header">
            <div class="calculator-icon">🎯</div>
            <h2>Meta Calórica</h2>
          </div>
          <form id="metaForm" onsubmit="calcularMeta(event)">
            <div class="form-group">
              <label>TMB (calorias/dia)</label>
              <input type="number" id="tmbMeta" required placeholder="Ex: 1800">
            </div>
            <div class="form-group">
              <label>Objetivo</label>
              <select id="objetivo" required>
                <option value="">Selecione</option>
                <option value="perder">Perder peso</option>
                <option value="manter">Manter peso</option>
                <option value="ganhar">Ganhar peso</option>
              </select>
            </div>
            <div class="form-group">
              <label>Nível de atividade</label>
              <select id="atividadeMeta" required>
                <option value="">Selecione</option>
                <option value="1.2">Sedentário</option>
                <option value="1.375">Levemente ativo</option>
                <option value="1.55">Moderadamente ativo</option>
                <option value="1.725">Muito ativo</option>
                <option value="1.9">Extremamente ativo</option>
              </select>
            </div>
            <button type="submit" class="calc-button">Calcular Meta</button>
          </form>
          <div id="metaResult" class="result-box">
            <div class="result-value" id="metaValue"></div>
            <div class="result-label">Calorias diárias recomendadas</div>
            <div class="result-info" id="metaInfo"></div>
          </div>
        </div>
      </div>
    </section>
  </main>

  <footer>
    <div class="container">
      <p>© 2025 Grovy — Transformando vidas através da saúde e bem-estar</p>
    </div>
  </footer>

  <script>
    // IMC Calculator
    function calcularIMC(event) {
      event.preventDefault();
      const peso = parseFloat(document.getElementById('peso').value);
      const altura = parseFloat(document.getElementById('altura').value);
      const imc = peso / (altura * altura);
      
      let categoria = '';
      if (imc < 18.5) categoria = 'Abaixo do peso';
      else if (imc < 25) categoria = 'Peso normal';
      else if (imc < 30) categoria = 'Sobrepeso';
      else if (imc < 35) categoria = 'Obesidade grau I';
      else if (imc < 40) categoria = 'Obesidade grau II';
      else categoria = 'Obesidade grau III';

      document.getElementById('imcValue').textContent = imc.toFixed(1);
      document.getElementById('imcInfo').textContent = `Categoria: ${categoria}. ${getIMCRecomendacao(categoria)}`;
      document.getElementById('imcResult').classList.add('show');
    }

    function getIMCRecomendacao(categoria) {
      const recomendacoes = {
        'Abaixo do peso': 'Consulte um nutricionista para ganhar peso de forma saudável.',
        'Peso normal': 'Continue mantendo seus hábitos saudáveis!',
        'Sobrepeso': 'Considere aumentar a atividade física e melhorar a alimentação.',
        'Obesidade grau I': 'Recomendamos acompanhamento profissional para perda de peso.',
        'Obesidade grau II': 'Procure orientação médica e nutricional.',
        'Obesidade grau III': 'Busque acompanhamento médico urgente.'
      };
      return recomendacoes[categoria] || '';
    }

    // TMB Calculator
    function calcularTMB(event) {
      event.preventDefault();
      const peso = parseFloat(document.getElementById('pesoTMB').value);
      const altura = parseFloat(document.getElementById('alturaTMB').value);
      const idade = parseFloat(document.getElementById('idade').value);
      const sexo = document.getElementById('sexo').value;

      let tmb;
      if (sexo === 'masculino') {
        tmb = 88.362 + (13.397 * peso) + (4.799 * altura) - (5.677 * idade);
      } else {
        tmb = 447.593 + (9.247 * peso) + (3.098 * altura) - (4.330 * idade);
      }

      document.getElementById('tmbValue').textContent = Math.round(tmb) + ' kcal';
      document.getElementById('tmbInfo').textContent = 'Esta é a quantidade de calorias que seu corpo queima em repouso. Multiplique por seu fator de atividade para obter o gasto calórico total diário.';
      document.getElementById('tmbResult').classList.add('show');
    }

    // Water Calculator
    function calcularAgua(event) {
      event.preventDefault();
      const peso = parseFloat(document.getElementById('pesoAgua').value);
      const atividade = document.getElementById('atividade').value;

      const fatores = {
        'sedentario': 35,
        'leve': 40,
        'moderado': 45,
        'intenso': 50
      };

      const agua = (peso * fatores[atividade]) / 1000;

      document.getElementById('aguaValue').textContent = agua.toFixed(1) + 'L';
      document.getElementById('aguaInfo').textContent = `Beba aproximadamente ${Math.round(agua * 4)} copos de 250ml por dia. Distribua ao longo do dia e aumente em dias quentes ou durante exercícios.`;
      document.getElementById('aguaResult').classList.add('show');
    }

    // Calorie Goal Calculator
    function calcularMeta(event) {
      event.preventDefault();
      const tmb = parseFloat(document.getElementById('tmbMeta').value);
      const objetivo = document.getElementById('objetivo').value;
      const fatorAtividade = parseFloat(document.getElementById('atividadeMeta').value);

      let tdee = tmb * fatorAtividade;
      let meta;

      if (objetivo === 'perder') {
        meta = tdee - 500;
      } else if (objetivo === 'ganhar') {
        meta = tdee + 300;
      } else {
        meta = tdee;
      }

      const objetivoTexto = {
        'perder': 'para perda de peso saudável (aproximadamente 0.5kg por semana)',
        'manter': 'para manutenção do peso atual',
        'ganhar': 'para ganho de massa muscular gradual'
      };

      document.getElementById('metaValue').textContent = Math.round(meta) + ' kcal';
      document.getElementById('metaInfo').textContent = `Meta calórica diária ${objetivoTexto[objetivo]}. Combine com exercícios regulares e alimentação balanceada para melhores resultados.`;
      document.getElementById('metaResult').classList.add('show');
    }

    // Header scroll effect
    window.addEventListener('scroll', () => {
      const header = document.querySelector('header');
      if (window.scrollY > 100) {
        header.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.1)';
      } else {
        header.style.boxShadow = 'none';
      }
    });
  </script>
</body>

</html>