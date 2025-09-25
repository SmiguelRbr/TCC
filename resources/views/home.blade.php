<!DOCTYPE html>
<html lang="pt-BR" class="{{ auth()->check() && auth()->user()->dark_mode ? 'dark' : '' }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Grovy - Transforme sua vida com saúde</title>
  <style>
    /* Reset e estilos globais */
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
      --shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 10px 10px -5px rgb(0 0 0 / 0.04);
      --shadow-hover: 0 25px 50px -12px rgb(0 0 0 / 0.25);
      --border-radius: 16px;
      --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
      --max-width: 1200px;
    }

    :root.dark {
    --primary: #059669;
    --primary-dark: #047857;
    --primary-light: #064e3b;
    --accent: #06b6d4;
    --secondary: #0e7490;
    --gradient: linear-gradient(135deg, #059669 0%, #06b6d4 100%);
    --gradient-dark: linear-gradient(135deg, #047857 0%, #0e7490 100%);
    --text-dark: #f3f4f6;
    --text-gray: #d1d5db;
    --bg: #111827;
    --white: #1f2937;
    --shadow: 0 20px 25px -5px rgb(0 0 0 / 0.3), 0 10px 10px -5px rgb(0 0 0 / 0.2);
    --shadow-hover: 0 25px 50px -12px rgb(0 0 0 / 0.5);
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

    /* Header com glassmorphism */
    header {
      background: rgba(255, 255, 255, 0.95);
      backdrop-filter: blur(20px);
      border-bottom: 1px solid rgba(16, 185, 129, 0.1);
    
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
      opacity: 0;
      animation: slideInLeft 0.8s ease-out 0.2s forwards;
    }

    .logo-icon {
      width: 100px;
      height: 100px;
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

    .logo-text h1 {
      font-size: 24px;
      font-weight: 700;
      background: var(--gradient);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
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
      opacity: 0;
      animation: slideInRight 0.8s ease-out 0.4s forwards;
    }

    nav a {
      color: var(--text-dark);
      text-decoration: none;
      font-weight: 500;
      padding: 12px 18px;
      border-radius: 10px;
      transition: var(--transition);
      position: relative;
      overflow: hidden;
    }

    nav a:not(.btn):hover {
      color: var(--primary);
      background: rgba(16, 185, 129, 0.1);
      transform: translateY(-2px);
    }

    nav .btn {
      background: var(--gradient);
      color: white;
      font-weight: 600;
      box-shadow: 0 4px 15px rgba(16, 185, 129, 0.4);
    }

    nav .btn:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 25px rgba(16, 185, 129, 0.6);
    }

    /* Hero section com animações */
    .hero {
      padding: 80px 0;
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 60px;
      align-items: center;
      min-height: 600px;
    }

    .hero-text {
      opacity: 0;
      animation: slideInUp 1s ease-out 0.6s forwards;
    }

    .hero-text h2 {
      font-size: clamp(32px, 5vw, 52px);
      font-weight: 700;
      line-height: 1.2;
      margin-bottom: 24px;
      background: linear-gradient(135deg, var(--text-dark) 0%, var(--primary) 100%);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .hero-text p {
      font-size: 18px;
      color: var(--text-gray);
      margin-bottom: 32px;
      line-height: 1.8;
    }

    .hero-buttons {
      display: flex;
      gap: 16px;
      flex-wrap: wrap;
    }

    .btn,
    .btn-outline {
      padding: 16px 32px;
      border-radius: 12px;
      font-weight: 600;
      text-decoration: none;
      transition: var(--transition);
      font-size: 16px;
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }

    .btn {
      background: var(--gradient);
      color: white;
      box-shadow: 0 8px 25px rgba(16, 185, 129, 0.4);
    }

    .btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 12px 35px rgba(16, 185, 129, 0.6);
    }

    .btn-outline {
      background: transparent;
      border: 2px solid var(--primary);
      color: var(--primary);
    }

    .btn-outline:hover {
      background: var(--primary);
      color: white;
      transform: translateY(-3px);
      box-shadow: 0 12px 35px rgba(16, 185, 129, 0.4);
    }

    /* Hero visual */
    .hero-visual {
      display: flex;
      justify-content: center;
      align-items: center;
      position: relative;
      opacity: 0;
      animation: slideInUp 1s ease-out 0.8s forwards;
    }

    .hero-card {
      background: linear-gradient(145deg, white 0%, rgba(255, 255, 255, 0.9) 100%);
      backdrop-filter: blur(20px);
      padding: 40px;
      border-radius: 24px;
      box-shadow: var(--shadow);
      text-align: center;
      border: 1px solid rgba(255, 255, 255, 0.2);
      position: relative;
      overflow: hidden;
      transform: rotate(3deg);
      transition: var(--transition);
    }

    .hero-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      bottom: 0;
      background: var(--gradient);
      opacity: 0.1;
      z-index: -1;
    }

    .hero-card:hover {
      transform: rotate(0deg) scale(1.05);
      box-shadow: var(--shadow-hover);
    }

    .hero-card h3 {
      font-size: 28px;
      font-weight: 700;
      background: var(--gradient);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
      margin-bottom: 8px;
    }

    .hero-card span {
      color: var(--text-gray);
      font-size: 16px;
      font-weight: 500;
    }

    /* Floating elements */
    .floating-element {
      position: absolute;
      border-radius: 50%;
      background: var(--gradient);
      opacity: 0.1;
      animation: float 6s ease-in-out infinite;
    }

    .floating-1 {
      width: 60px;
      height: 60px;
      top: 10%;
      right: 10%;
      animation-delay: 0s;
    }

    .floating-2 {
      width: 40px;
      height: 40px;
      top: 60%;
      right: 5%;
      animation-delay: 2s;
    }

    .floating-3 {
      width: 80px;
      height: 80px;
      top: 30%;
      left: 5%;
      animation-delay: 4s;
    }

    /* Cards section */
    .cards-section {
      padding: 80px 0;
      background: linear-gradient(135deg, rgba(16, 185, 129, 0.05) 0%, rgba(6, 214, 160, 0.05) 100%);
    }

    .cards {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
      gap: 32px;
    }

    .card {
      background: white;
      padding: 32px;
      border-radius: var(--border-radius);
      text-decoration: none;
      color: var(--text-dark);
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
      transition: var(--transition);
      border: 1px solid rgba(16, 185, 129, 0.1);
      position: relative;
      overflow: hidden;
      opacity: 0;
      transform: translateY(30px);
    }

    .card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: var(--gradient);
      transform: scaleX(0);
      transition: var(--transition);
    }

    .card:hover {
      transform: translateY(-8px);
      box-shadow: var(--shadow);
      border-color: var(--primary);
    }

    .card:hover::before {
      transform: scaleX(1);
    }

    .card-icon {
      width: 48px;
      height: 48px;
      background: var(--gradient);
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      font-size: 20px;
      margin-bottom: 20px;
    }

    .card h3 {
      font-size: 20px;
      font-weight: 600;
      margin-bottom: 12px;
      color: var(--text-dark);
    }

    .card p {
      color: var(--text-gray);
      line-height: 1.6;
    }

    /* Tips section */
    .tips {
      padding: 80px 0;
    }

    .tips h2 {
      font-size: 36px;
      font-weight: 700;
      text-align: center;
      margin-bottom: 24px;
      background: var(--gradient);
      -webkit-background-clip: text;
      -webkit-text-fill-color: transparent;
      background-clip: text;
    }

    .tips-subtitle {
      text-align: center;
      color: var(--text-gray);
      font-size: 18px;
      margin-bottom: 60px;
      max-width: 600px;
      margin-left: auto;
      margin-right: auto;
    }

    .tips-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
      gap: 32px;
    }

    .tip {
      background: white;
      padding: 32px;
      border-radius: var(--border-radius);
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
      transition: var(--transition);
      border: 1px solid rgba(16, 185, 129, 0.1);
      opacity: 0;
      transform: translateY(30px);
    }

    .tip:hover {
      transform: translateY(-4px);
      box-shadow: var(--shadow);
    }

    .tip-icon {
      font-size: 32px;
      margin-bottom: 16px;
      display: block;
    }

    .tip h3 {
      font-size: 20px;
      font-weight: 600;
      margin-bottom: 12px;
      color: var(--text-dark);
    }

    .tip p {
      color: var(--text-gray);
      line-height: 1.6;
    }

    /* Footer */
    footer {
      background: var(--text-dark);
      color: white;
      text-align: center;
      padding: 40px 0;
      margin-top: 80px;
    }

    footer p {
      opacity: 0.8;
    }

    /* Animations */
    @keyframes slideInLeft {
      from {
        opacity: 0;
        transform: translateX(-30px);
      }

      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    @keyframes slideInRight {
      from {
        opacity: 0;
        transform: translateX(30px);
      }

      to {
        opacity: 1;
        transform: translateX(0);
      }
    }

    @keyframes slideInUp {
      from {
        opacity: 0;
        transform: translateY(50px);
      }

      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    @keyframes float {

      0%,
      100% {
        transform: translateY(0) rotate(0deg);
      }

      50% {
        transform: translateY(-20px) rotate(180deg);
      }
    }

    /* Intersection Observer Animation */
    .fade-in-up {
      opacity: 0;
      transform: translateY(30px);
      transition: opacity 0.6s ease-out, transform 0.6s ease-out;
    }

    .fade-in-up.visible {
      opacity: 1;
      transform: translateY(0);
    }

    /* Responsive */
    @media (max-width: 768px) {
      .header-content {
        flex-direction: column;
        gap: 20px;
        text-align: center;
      }

      .hero {
        grid-template-columns: 1fr;
        gap: 40px;
        padding: 40px 0;
        text-align: center;
      }

      .hero-buttons {
        justify-content: center;
      }

      .btn,
      .btn-outline {
        flex: 1;
        min-width: 140px;
        justify-content: center;
      }

      .cards {
        grid-template-columns: 1fr;
      }

      .tips-grid {
        grid-template-columns: 1fr;
      }

      nav {
        flex-wrap: wrap;
        justify-content: center;
      }

      .floating-element {
        display: none;
      }
    }
  </style>
</head>


  <header>

    <div class="container header-content">
      <div class="logo">
        <div class="logo-icon">
          <img src="https://encurtador.com.br/JO1pP" alt="">
        </div>
        <div class="logo-text">
          <span>Saúde & Aconselhamento</span>
        </div>
      </div>
      <nav>
        <a href="perfil.html">Perfil</a>
        <a href="dicas.html">Dicas</a>
        <a href="calculadora.html">Calculadora</a>
        <a href="{{ route('posts.index') }}">Feed</a>
        @guest
        <a href="{{ route('login') }}" class="btn">Entrar</a>
        @endguest

      </nav>
    </div>
  </header>

  <main>
    <!-- Floating Elements -->
    <div class="floating-element floating-1"></div>
    <div class="floating-element floating-2"></div>
    <div class="floating-element floating-3"></div>

    <!-- Hero Section -->
    <section class="hero container">
      <div class="hero-text">
        <h2>Transforme sua vida com ajuda de especialistas</h2>
        <p>Conecte-se com profissionais qualificados, receba dicas personalizadas, calcule suas metas de saúde e acompanhe seu progresso — tudo em uma plataforma moderna e intuitiva.</p>
        <div class="hero-buttons">
          @guest
          <a href="{{ route('login') }}" class="btn">
            ✨ Começar agora
          </a>
          @endguest

        </div>
      </div>

      <div class="hero-visual">
        <div class="hero-card">
          <h3>Grovy</h3>
          <span>Sua jornada de saúde começa aqui</span>
        </div>
      </div>
    </section>

    <!-- Cards Section -->
    <section class="cards-section">
      <div class="container">
        <div class="cards">
          <a href="perfil.html" class="card fade-in-up">
            <div class="card-icon">👨‍⚕️</div>
            <h3>Perfil de Profissional</h3>
            <p>Encontre e conecte-se com especialistas em saúde, nutrição e bem-estar verificados.</p>
          </a>

          <a href="dicas.html" class="card fade-in-up">
            <div class="card-icon">💡</div>
            <h3>Dicas Personalizadas</h3>
            <p>Conteúdos exclusivos e dicas práticas baseadas no seu perfil e objetivos.</p>
          </a>

          <a href="calculadora.html" class="card fade-in-up">
            <div class="card-icon">📊</div>
            <h3>Calculadoras Inteligentes</h3>
            <p>Calcule IMC, TMB, metas calóricas e acompanhe seu progresso com precisão.</p>
          </a>

          <a href="feed.html" class="card fade-in-up">
            <div class="card-icon">📱</div>
            <h3>Feed Interativo</h3>
            <p>Compartilhe conquistas, receba motivação e conecte-se com a comunidade.</p>
          </a>
        </div>
      </div>
    </section>

    <!-- Tips Section -->
    <section class="tips container">
      <h2>Dicas de Especialistas</h2>
      <p class="tips-subtitle">Conselhos baseados em evidências científicas para transformar seus hábitos</p>

      <div class="tips-grid">
        <div class="tip fade-in-up">
          <span class="tip-icon">🥗</span>
          <h3>Alimentação Inteligente</h3>
          <p>Construa um prato balanceado com 50% vegetais, 25% proteínas magras e 25% carboidratos complexos para energia sustentada.</p>
        </div>

        <div class="tip fade-in-up">
          <span class="tip-icon">💧</span>
          <h3>Hidratação Estratégica</h3>
          <p>Beba 35ml de água por kg de peso corporal. Comece o dia com um copo de água para ativar o metabolismo.</p>
        </div>

        <div class="tip fade-in-up">
          <span class="tip-icon">🚫</span>
          <h3>Redução Inteligente</h3>
          <p>Substitua ultraprocessados gradualmente. Troque refrigerantes por água com limão e doces por frutas secas.</p>
        </div>

        <div class="tip fade-in-up">
          <span class="tip-icon">🏃‍♂️</span>
          <h3>Movimento + Nutrição</h3>
          <p>Combine 150min de exercício moderado por semana com alimentação adequada para resultados duradouros.</p>
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
    // Smooth scroll reveal animation
    const observerOptions = {
      threshold: 0.1,
      rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          entry.target.classList.add('visible');
        }
      });
    }, observerOptions);

    // Observe all fade-in elements
    document.querySelectorAll('.fade-in-up').forEach(el => {
      observer.observe(el);
    });

    // Stagger animation for cards
    setTimeout(() => {
      document.querySelectorAll('.card').forEach((card, index) => {
        setTimeout(() => {
          card.style.opacity = '1';
          card.style.transform = 'translateY(0)';
        }, index * 100);
      });
    }, 500);

    // Stagger animation for tips
    setTimeout(() => {
      document.querySelectorAll('.tip').forEach((tip, index) => {
        setTimeout(() => {
          tip.style.opacity = '1';
          tip.style.transform = 'translateY(0)';
        }, index * 150);
      });
    }, 1000);

    // Header background change on scroll
    window.addEventListener('scroll', () => {
      const header = document.querySelector('header');
      if (window.scrollY > 100) {
        header.style.background = 'rgba(255, 255, 255, 0.98)';
        header.style.boxShadow = '0 4px 20px rgba(0, 0, 0, 0.1)';
      } else {
        header.style.background = 'rgba(255, 255, 255, 0.95)';
        header.style.boxShadow = 'none';
      }
    });
  </script>
</body>

</html>