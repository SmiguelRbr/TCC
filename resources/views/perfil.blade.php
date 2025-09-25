<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/perfilperso.css">
    <title>Grovy - Perfil</title>
</head>

<body>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }


        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Inter', sans-serif;
            background: linear-gradient(135deg, #ffffff 0%, #e8f7e8 100%);
            min-height: 100vh;
            padding: 20px;
            position: relative;
            overflow-x: hidden;
        }


        /* Animated background particles */
        .bg-particles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            overflow: hidden;
            z-index: 0;
        }


        .particle {
            position: absolute;
            width: 4px;
            height: 4px;
            background: rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            animation: float 6s ease-in-out infinite;
        }


        .particle:nth-child(1) {
            left: 10%;
            animation-delay: 0s;
        }

        .particle:nth-child(2) {
            left: 20%;
            animation-delay: 1s;
        }

        .particle:nth-child(3) {
            left: 30%;
            animation-delay: 2s;
        }

        .particle:nth-child(4) {
            left: 40%;
            animation-delay: 3s;
        }

        .particle:nth-child(5) {
            left: 50%;
            animation-delay: 4s;
        }

        .particle:nth-child(6) {
            left: 60%;
            animation-delay: 5s;
        }

        .particle:nth-child(7) {
            left: 70%;
            animation-delay: 0.5s;
        }

        .particle:nth-child(8) {
            left: 80%;
            animation-delay: 1.5s;
        }


        @keyframes float {

            0%,
            100% {
                transform: translateY(100vh) rotate(0deg);
                opacity: 0;
            }

            10% {
                opacity: 1;
            }

            90% {
                opacity: 1;
            }

            100% {
                transform: translateY(-10px) rotate(360deg);
                opacity: 0;
            }
        }


        .container {
            max-width: 800px;
            margin: 0 auto;
            background: rgba(255, 255, 255, 0.05);
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            position: relative;
            z-index: 1;
            animation: slideUp 0.6s ease-out;
        }


        @keyframes slideUp {
            from {
                transform: translateY(50px);
                opacity: 0;
            }

            to {
                transform: translateY(0);
                opacity: 1;
            }
        }


        .header {
            text-align: center;
            padding: 30px 0 20px;
            background: linear-gradient(135deg, #2AFF8A 0%, #00b894 100%);
            position: relative;
            overflow: hidden;
        }


        .header::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: linear-gradient(45deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            animation: shine 3s infinite;
        }


        @keyframes shine {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }


        .logo-image {
            width: 140px;
            height: 140px;
            margin: 0 auto;
            position: relative;
        }


        .logo-image:hover {
            transform: scale(1.05);
        }


        .profile-section {
            background: rgba(255, 255, 255, 0.95);
            padding: 40px;
            position: relative;
            backdrop-filter: blur(10px);
        }


        .profile-avatar {
            width: 100px;
            height: 100px;
            background: linear-gradient(135deg, #2AFF8A, #00b894);
            border-radius: 50%;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            border: 4px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 10px 30px rgba(42, 255, 138, 0.3);
            position: relative;
            transition: all 0.3s ease;
            cursor: pointer;
        }


        .profile-avatar:hover {
            transform: scale(1.1);
            box-shadow: 0 15px 40px rgba(42, 255, 138, 0.5);
        }


        .profile-avatar::after {
            content: '';
            position: absolute;
            top: -4px;
            left: -4px;
            right: -4px;
            bottom: -4px;
            background: linear-gradient(45deg, #2AFF8A, #00b894, #2AFF8A);
            border-radius: 50%;
            z-index: -1;
            animation: rotate 3s linear infinite;
        }


        @keyframes rotate {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }


        .profile-avatar svg {
            width: 50px;
            height: 50px;
            fill: white;
        }


        .profile-info {
            text-align: center;
            margin-bottom: 30px;
        }


        .profile-info h2 {
            font-size: 28px;
            color: #2d3436;
            margin-bottom: 10px;
            font-weight: 700;
            background: linear-gradient(135deg, #2d3436, #636e72);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }


        .profile-details {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }


        .detail-item {
            display: flex;
            align-items: center;
            gap: 8px;
            color: #636e72;
            font-size: 14px;
            padding: 8px 16px;
            background: rgba(42, 255, 138, 0.1);
            border-radius: 20px;
            border: 1px solid rgba(42, 255, 138, 0.2);
            transition: all 0.3s ease;
        }


        .detail-item:hover {
            background: rgba(42, 255, 138, 0.2);
            transform: translateY(-2px);
        }


        .stats {
            display: flex;
            justify-content: center;
            gap: 40px;
            margin-bottom: 30px;
        }


        .stat-item {
            text-align: center;
        }


        .stat-number {
            font-size: 24px;
            font-weight: 700;
            color: #2AFF8A;
            display: block;
        }


        .stat-label {
            font-size: 12px;
            color: #636e72;
            text-transform: uppercase;
            letter-spacing: 1px;
        }


        .action-buttons {
            display: flex;
            gap: 15px;
            justify-content: center;
            flex-wrap: wrap;
        }


        .btn {
            padding: 14px 28px;
            border: none;
            border-radius: 50px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            min-width: 120px;
        }


        .btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s;
        }


        .btn:hover::before {
            left: 100%;
        }


        .btn-follow {
            background: linear-gradient(135deg, #2AFF8A, #00b894);
            color: white;
            box-shadow: 0 4px 15px rgba(42, 255, 138, 0.4);
        }


        .btn-follow:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(42, 255, 138, 0.6);
        }


        .btn-message {
            background: transparent;
            color: #2AFF8A;
            border: 2px solid #2AFF8A;
        }


        .btn-message:hover {
            background: #2AFF8A;
            color: white;
            transform: translateY(-2px);
        }


        .btn-hire {
            background: linear-gradient(135deg, #fd79a8, #e84393);
            color: white;
            box-shadow: 0 4px 15px rgba(253, 121, 168, 0.4);
        }


        .btn-hire:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(253, 121, 168, 0.6);
        }


        .gallery {
            padding: 30px;
            background: #fffffff2;
            box-shadow: inset 0 0 20px rgba(16, 185, 129, 0.03);
            border-top: 3px solid rgba(0, 0, 0, 0.05);
            border-top-left-radius: 30px;
            border-top-right-radius: 30px;

        }


        .gallery h3 {
            color: #2d3436;
            font-size: 20px;
            font-weight: 600;
            margin-bottom: 20px;
            text-align: center;
        }


        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(150px, 1fr));
            gap: 20px;
        }


        .gallery-item {
            aspect-ratio: 1;
            background: linear-gradient(135deg, #667eea, #764ba2);
            border-radius: 20px;
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            cursor: pointer;
        }


        .gallery-item:hover {
            transform: scale(1.05) rotate(2deg);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.3);
        }


        .gallery-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(45deg, transparent 30%, rgba(255, 255, 255, 0.1) 50%, transparent 70%);
            background-size: 200% 200%;
            animation: shimmer 3s infinite;
        }


        @keyframes shimmer {
            0% {
                background-position: -200% -200%;
            }

            100% {
                background-position: 200% 200%;
            }
        }


        .gallery-item.large {
            grid-row: span 2;
            aspect-ratio: 1/2;
        }


        .gallery-item::after {
            content: '📸';
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 2rem;
            opacity: 0.7;
        }


        /* Responsive design */
        @media (max-width: 768px) {
            .container {
                margin: 10px;
                border-radius: 20px;
            }

            .profile-section {
                padding: 30px 20px;
            }

            .profile-details {
                flex-direction: column;
                align-items: center;
                gap: 10px;
            }

            .stats {
                gap: 20px;
            }

            .action-buttons {
                flex-direction: column;
            }

            .btn {
                width: 100%;
            }
        }


        /* Success animation for interactions */
        .btn.clicked {
            animation: pulse 0.6s ease;
        }


        @keyframes pulse {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }

            100% {
                transform: scale(1);
            }
        }
    </style>
    <!-- Animated background particles -->
    <div class="bg-particles">
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
        <div class="particle"></div>
    </div>


    <div class="container">
        <div class="header">
            <div>
                <img src="../images/unnamed-removebg-preview.png" alt="Logo" class="logo-image">
            </div>
        </div>


        <div class="profile-section">
            <div class="profile-avatar">
                <svg viewBox="0 0 24 24">
                    <path d="M12 12c2.21 0 4-1.79 4-4s-1.79-4-4-4-4 1.79-4 4 1.79 4 4 4zm0 2c-2.67 0-8 1.34-8 4v2h16v-2c0-2.66-5.33-4-8-4z" />
                </svg>
            </div>

            <div class="profile-info">
                <h2>Tung Tung Tung Sahur</h2>

                <div class="profile-details">
                    <div class="detail-item">
                        <span>🎂</span>
                        <span>24 anos</span>
                    </div>
                    <div class="detail-item">
                        <span>🥗</span>
                        <span>Nutricionista</span>
                    </div>
                    <div class="detail-item">
                        <span>📍</span>
                        <span>Jundiaí - SP</span>
                    </div>
                </div>


                <div class="stats">
                    <div class="stat-item">
                        <span class="stat-number">1.2k</span>
                        <span class="stat-label">Seguidores</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">340</span>
                        <span class="stat-label">Seguindo</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">95</span>
                        <span class="stat-label">Posts</span>
                    </div>
                </div>
            </div>


            <div class="action-buttons">
                <button class="btn btn-follow" onclick="animateButton(this)">Seguir</button>
                <button class="btn btn-message" onclick="animateButton(this)">Enviar mensagem</button>
                <button class="btn btn-hire" onclick="animateButton(this)">Contratar</button>
            </div>
        </div>


        <div class="gallery">
            <h3>🖼️ Galeria</h3>
            <div class="gallery-grid">
                <div class="gallery-item" onclick="openImage(this)"></div>
                <div class="gallery-item large" onclick="openImage(this)"></div>
                <div class="gallery-item" onclick="openImage(this)"></div>
                <div class="gallery-item" onclick="openImage(this)"></div>
                <div class="gallery-item" onclick="openImage(this)"></div>
            </div>
        </div>
    </div>


    <script>
        function animateButton(button) {
            button.classList.add('clicked');
            setTimeout(() => {
                button.classList.remove('clicked');
            }, 600);
        }


        function openImage(item) {
            item.style.transform = 'scale(1.1) rotate(5deg)';
            setTimeout(() => {
                item.style.transform = '';
            }, 300);
        }


        // Add some interactive hover effects
        document.addEventListener('DOMContentLoaded', function() {
            const avatar = document.querySelector('.profile-avatar');
            avatar.addEventListener('click', function() {
                this.style.animation = 'none';
                setTimeout(() => {
                    this.style.animation = 'rotate 3s linear infinite';
                }, 100);
            });
        });
    </script>
</body>

</html>