<!DOCTYPE html>
<html lang="pt-BR" class="{{ auth()->check() && auth()->user()->dark_mode ? 'dark' : '' }}">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NutriConnect - Feed da Comunidade</title>
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
            --text-light: #9CA3AF;
            --bg: #F9FAFB;
            --white: #FFFFFF;
            --card-bg: #FFFFFF;
            --header-bg: rgba(255, 255, 255, 0.95);
            --header-border: rgba(16, 185, 129, 0.1);
            --card-border: rgba(16, 185, 129, 0.1);
            --section-bg: linear-gradient(135deg, rgba(16, 185, 129, 0.05) 0%, rgba(6, 214, 160, 0.05) 100%);
            --input-bg: #FFFFFF;
            --input-border: rgba(16, 185, 129, 0.2);
            --sidebar-bg: #FFFFFF;
            --backdrop: rgba(0, 0, 0, 0.3);
            --red: #EF4444;
            --red-light: #FEE2E2;
            --shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 10px 10px -5px rgb(0 0 0 / 0.04);
            --shadow-hover: 0 25px 50px -12px rgb(0 0 0 / 0.25);
            --shadow-sm: 0 4px 6px rgba(0, 0, 0, 0.05);
            --border-radius: 16px;
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --max-width: 1200px;
            --pro-nutri-bg: #e0ffe0;
            /* Fundo verde claro para Nutricionista */
            --pro-nutri-color: #228B22;
            /* Texto verde escuro */
            --pro-personal-bg: #e0f2ff;
            /* Fundo azul claro para Personal */
            --pro-personal-color: #1E90FF;
            /* Texto azul vibrante */
            --pro-artigo-bg: #fffbe0;
            /* Fundo amarelo claro para Artigo */
            --pro-artigo-color: #b8860b;
            /* Texto amarelo escuro */
            --pro-video-bg: #ffe0e0;
            /* Fundo vermelho claro para Vídeo */
            --pro-video-color: #CC0000;
            /* Texto vermelho */
            --pro-dica-bg: #e6e6fa;
            /* Fundo roxo claro para Dica */
            --pro-dica-color: #8A2BE2;
            /* Texto roxo */
            --pro-nutri-bg: #1A361A;
            --pro-nutri-color: #6B8E23;
            --pro-personal-bg: #1A2B3D;
            --pro-personal-color: #4682B4;
            --pro-artigo-bg: #3D351A;
            --pro-artigo-color: #DAA520;
            --pro-video-bg: #3D1A1A;
            --pro-video-color: #FF6347;
            --pro-dica-bg: #2B1A3D;
            --pro-dica-color: #BA55D3;

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
            --text-light: #6B7280;
            --bg: #0F172A;
            --white: #1E293B;
            --card-bg: #1E293B;
            --header-bg: rgba(30, 41, 59, 0.95);
            --header-border: rgba(139, 92, 246, 0.2);
            --card-border: rgba(139, 92, 246, 0.2);
            --section-bg: linear-gradient(135deg, rgba(139, 92, 246, 0.05) 0%, rgba(236, 72, 153, 0.05) 100%);
            --input-bg: #0F172A;
            --input-border: rgba(139, 92, 246, 0.3);
            --sidebar-bg: #1E293B;
            --backdrop: rgba(0, 0, 0, 0.5);
            --red: #EF4444;
            --red-light: #7F1D1D;
            --shadow: 0 20px 25px -5px rgb(139 92 246 / 0.15), 0 10px 10px -5px rgb(0 0 0 / 0.3);
            --shadow-hover: 0 25px 50px -12px rgb(139 92 246 / 0.25);
            --shadow-sm: 0 4px 6px rgba(139, 92, 246, 0.1);
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: var(--bg);
            color: var(--text-dark);
            line-height: 1.6;
            width: 100%;
            overflow-x: hidden;
        }

        .professional-badge {
            color: gold;
            /* Cor da estrela */
            margin-left: 5px;
            font-size: 1.1em;
            vertical-align: middle;
        }

        /* ADICIONADO: Estilos para as opções de post de profissionais */
        .post-option.pro-option-nutri {
            background-color: var(--pro-nutri-bg);
            color: var(--pro-nutri-color);
            border-color: var(--pro-nutri-color);
        }

        .post-option.pro-option-nutri:hover,
        .post-option.pro-option-nutri.active {
            background-color: var(--pro-nutri-color);
            color: white;
        }

        .post-option.pro-option-personal {
            background-color: var(--pro-personal-bg);
            color: var(--pro-personal-color);
            border-color: var(--pro-personal-color);
        }

        .post-option.pro-option-personal:hover,
        .post-option.pro-option-personal.active {
            background-color: var(--pro-personal-color);
            color: white;
        }

        .post-option.pro-option-artigo {
            background-color: var(--pro-artigo-bg);
            color: var(--pro-artigo-color);
            border-color: var(--pro-artigo-color);
        }

        .post-option.pro-option-artigo:hover,
        .post-option.pro-option-artigo.active {
            background-color: var(--pro-artigo-color);
            color: white;
        }

        /* ADICIONADO: Estilos para os novos badges de tipo de post */
        .achievement-badge.badge-dica {
            background: var(--pro-dica-color);
            /* Usa a cor definida para dica */
            color: white;
        }

        .achievement-badge.badge-video {
            background: var(--pro-video-color);
            /* Usa a cor definida para vídeo */
            color: white;
        }

        .achievement-badge.badge-artigo {
            background: var(--pro-artigo-color);
            /* Usa a cor definida para artigo */
            color: white;
        }

        /* ADICIONADO: Estilos para o Título do Artigo */
        .article-title-display {
            font-size: 1.4rem;
            font-weight: bold;
            margin-bottom: 1rem;
            color: var(--primary-dark);
            /* Ou outra cor que combine */
        }

        /* ADICIONADO: Estilos para o embed de vídeo */
        .video-embed-wrapper {
            position: relative;
            padding-bottom: 56.25%;
            /* 16:9 Aspect Ratio */
            height: 0;
            overflow: hidden;
            margin-bottom: 1rem;
            border-radius: 12px;
            background-color: black;
            /* Fundo preto enquanto o vídeo não carrega */
        }

        .video-container {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            background-color: black;
            border-radius: 12px;
            overflow: hidden;
        }

        .video-thumbnail {
            width: 100%;
            height: 100%;
            object-fit: cover;
            filter: brightness(0.7);
            /* Escurece a thumbnail para o botão se destacar */
            transition: filter 0.3s ease;
        }

        .video-container:hover .video-thumbnail {
            filter: brightness(0.5);
        }

        .video-play-btn {
            position: absolute;
            font-size: 3rem;
            color: white;
            background: rgba(0, 0, 0, 0.6);
            border: none;
            border-radius: 50%;
            width: 80px;
            height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            transition: background 0.3s ease, transform 0.3s ease;
            z-index: 2;
        }

        .video-play-btn:hover {
            background: rgba(255, 0, 0, 0.8);
            /* Cor de hover do YouTube */
            transform: scale(1.1);
        }

        .video-iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border-radius: 12px;
        }

        .header {
            background: var(--gradient);
            padding: 1.5rem 0;
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .header-content {
            max-width: var(--max-width);
            margin: 0 auto;
            padding: 0 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            color: white;
            font-size: 1.8rem;
            font-weight: bold;
            text-decoration: none;
        }

        .user-menu {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: white;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            color: var(--primary);
            cursor: pointer;
            transition: var(--transition);
        }

        .user-avatar:hover {
            transform: scale(1.1);
        }

        .main-container {
            max-width: var(--max-width);
            margin: 2rem auto;
            padding: 0 2rem;
            display: grid;
            grid-template-columns: 1fr 380px;
            gap: 2rem;
            position: relative;
        }

        .feed-section {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            max-width: 100%;
        }

        .create-post {
            background: var(--card-bg);
            border-radius: var(--border-radius);
            padding: 2rem;
            box-shadow: var(--shadow);
            border: 1px solid var(--card-border);
        }

        .create-post-header {
            display: flex;
            align-items: center;
            gap: 1rem;
            margin-bottom: 1.5rem;
            width: 100%;
        }

        .create-avatar {
            min-width: 50px;
            min-height: 50px;
            border-radius: 50%;
            background: var(--gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            flex-shrink: 0;
        }

        .post-input {
            flex: 1;
            padding: 1rem 1.5rem;
            border: 2px solid var(--input-border);
            border-radius: 50px;
            outline: none;
            font-size: 1rem;
            transition: var(--transition);
            background: var(--input-bg);
            color: var(--text-dark);
        }

        .post-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px var(--card-border);
        }

        .post-actions {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1rem;
            flex-wrap: wrap;
        }

        .post-options {
            display: flex;
            gap: 1rem;
            flex-wrap: wrap;
            flex-grow: 1;
        }

        .post-option {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            padding: 0.5rem 1rem;
            border: none;
            background: transparent;
            color: var(--text-gray);
            border-radius: 8px;
            cursor: pointer;
            transition: var(--transition);
            border: 2px solid transparent;
        }

        .post-option:hover {
            background: var(--card-border);
            color: var(--primary);
        }

        .post-option.active {
            background: var(--card-border);
            color: var(--primary);
            border-color: var(--primary);
        }

        .post-btn {
            background: var(--gradient);
            color: white;
            border: none;
            padding: 0.8rem 2rem;
            border-radius: 50px;
            font-weight: bold;
            cursor: pointer;
            transition: var(--transition);
            flex-shrink: 0;
        }

        .post-btn:hover {
            transform: translateY(-2px);
            box-shadow: var(--shadow-hover);
        }

        .additional-inputs {
            width: 100%;
            margin-top: 1rem;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .additional-input {
            padding: 0.5rem 1rem;
            border: 1px solid var(--input-border);
            border-radius: 8px;
            outline: none;
            font-size: 1rem;
            transition: var(--transition);
            display: none;
            background: var(--input-bg);
            color: var(--text-dark);
        }

        .additional-input:focus {
            border-color: var(--primary);
        }

        .additional-input.show {
            display: block;
        }

        .feed-post {
            background: var(--card-bg);
            border-radius: var(--border-radius);
            box-shadow: var(--shadow);
            overflow: hidden;
            transition: var(--transition);
            border: 1px solid var(--card-border);
            position: relative;
        }

        .feed-post:hover {
            border-color: var(--primary);
            transform: translateY(-2px);
        }

        .post-header {
            display: flex;
            align-items: center;
            padding: 1.5rem;
            gap: 1rem;
        }

        .post-avatar {
            min-width: 50px;
            min-height: 50px;
            border-radius: 50%;
            background: var(--gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            flex-shrink: 0;
        }

        .post-user-info {
            flex-grow: 1;
        }

        .post-user-info h3 {
            font-size: 1.1rem;
            margin-bottom: 0.2rem;
            color: var(--text-dark);
        }

        .post-meta {
            color: var(--text-gray);
            font-size: 0.9rem;
        }

        .achievement-badge {
            background: var(--gradient);
            color: white;
            padding: 0.3rem 0.8rem;
            border-radius: 50px;
            font-size: 0.8rem;
            font-weight: bold;
            flex-shrink: 0;
        }

        .post-content {
            padding: 0 1.5rem 1rem;
        }

        .post-text {
            margin-bottom: 1rem;
            line-height: 1.6;
            color: var(--text-dark);
        }

        .post-image {
            width: 100%;
            height: 300px;
            object-fit: cover;
            border-radius: 12px;
            margin-bottom: 1rem;
            cursor: pointer;
        }

        .post-interactions {
            padding: 0 1.5rem 1.5rem;
            border-top: 1px solid var(--card-border);
            margin-top: 1rem;
        }

        .post-actions-bar {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem 0;
        }

        .action-btn {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            background: none;
            border: none;
            cursor: pointer;
            padding: 0.5rem;
            border-radius: 8px;
            color: var(--text-gray);
            font-size: 0.95rem;
            transition: var(--transition);
        }

        .action-btn:hover {
            background: var(--card-border);
            color: var(--primary);
        }

        .action-btn.active {
            color: var(--primary);
            background: var(--card-border);
        }

        .like-btn {
            outline: none;
            border: none;
            background: none;
            cursor: pointer;
            font: inherit;
            padding: 0.5rem;
            margin: 0;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            border-radius: 8px;
            color: var(--text-gray);
            transition: var(--transition);
        }

        .like-btn:hover {
            background: var(--card-border);
            color: var(--primary);
        }

        .like-btn:focus {
            outline: none;
        }

        .likes-count {
            color: var(--text-gray);
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .likes-count strong {
            color: var(--text-dark);
        }

        .comment-form {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-top: 0.5rem;
            padding-top: 0.5rem;
            border-top: 1px solid var(--card-border);
        }

        .comment-input {
            flex: 1;
            padding: 0.5rem 1rem;
            border: 1px solid var(--input-border);
            border-radius: 50px;
            outline: none;
            font-size: 0.9rem;
            transition: var(--transition);
            background: var(--input-bg);
            color: var(--text-dark);
        }

        .comment-input:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 2px var(--card-border);
        }

        .comment-btn {
            padding: 0.5rem 1rem;
            background: var(--primary);
            color: white;
            border: none;
            border-radius: 50px;
            font-size: 0.9rem;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
        }

        .comment-btn:hover {
            background: var(--primary-dark);
        }

        .comments-preview {
            margin-top: 0.5rem;
        }

        .comment-preview {
            padding: 0.5rem 0;
            font-size: 0.9rem;
            line-height: 1.4;
            color: var(--text-dark);
        }

        .comment-preview strong {
            color: var(--text-dark);
            margin-right: 0.3rem;
        }

        .comment-preview .comment-time {
            color: var(--text-gray);
            font-size: 0.8rem;
            margin-left: 0.5rem;
        }

        .view-all-comments {
            color: var(--text-gray);
            font-size: 0.9rem;
            cursor: pointer;
            padding: 0.25rem 0;
            transition: var(--transition);
        }

        .view-all-comments:hover {
            color: var(--primary);
        }

        .comments-sidebar {
            position: fixed;
            top: 0;
            right: 0;
            width: 420px;
            height: 100vh;
            background: var(--sidebar-bg);
            box-shadow: -4px 0 20px var(--shadow);
            transform: translateX(100%);
            transition: transform 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            z-index: 1000;
            display: flex;
            flex-direction: column;
        }

        .comments-sidebar.open {
            transform: translateX(0);
        }

        .sidebar-backdrop {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: var(--backdrop);
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 999;
        }

        .sidebar-backdrop.show {
            opacity: 1;
            visibility: visible;
        }

        .sidebar-header {
            padding: 1.5rem 2rem;
            border-bottom: 1px solid var(--card-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: var(--gradient);
            color: white;
        }

        .sidebar-header h3 {
            font-size: 1.2rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .sidebar-close {
            background: none;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            color: white;
            padding: 0.5rem;
            line-height: 1;
            border-radius: 8px;
            transition: var(--transition);
        }

        .sidebar-close:hover {
            background: rgba(255, 255, 255, 0.1);
            transform: scale(1.1);
        }

        .sidebar-comments {
            flex: 1;
            overflow-y: auto;
            padding: 1.5rem 2rem;
        }

        .sidebar-comment {
            display: flex;
            gap: 1rem;
            margin-bottom: 1.5rem;
            animation: slideInComment 0.3s ease-out;
        }

        @keyframes slideInComment {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .comment-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: var(--gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.85rem;
            font-weight: bold;
            flex-shrink: 0;
        }

        .comment-content {
            flex: 1;
            min-width: 0;
        }

        .comment-user {
            font-weight: 600;
            font-size: 0.95rem;
            margin-bottom: 0.3rem;
            color: var(--text-dark);
        }

        .comment-text {
            font-size: 0.95rem;
            line-height: 1.5;
            margin-bottom: 0.5rem;
            word-wrap: break-word;
            color: var(--text-dark);
        }

        .comment-meta {
            display: flex;
            align-items: center;
            gap: 1rem;
            font-size: 0.85rem;
            color: var(--text-gray);
        }

        .comment-delete {
            background: none;
            border: none;
            color: var(--red);
            cursor: pointer;
            font-size: 0.85rem;
            padding: 0;
            transition: var(--transition);
        }

        .comment-delete:hover {
            text-decoration: underline;
        }

        .sidebar-comment-form {
            padding: 1.5rem 2rem;
            border-top: 1px solid var(--card-border);
            background: var(--card-bg);
            display: flex;
            gap: 0.75rem;
            align-items: flex-end;
        }

        .form-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: var(--gradient);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 0.85rem;
            font-weight: bold;
            flex-shrink: 0;
        }

        .comment-input-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            gap: 0.5rem;
        }

        .delete-form {
            display: flex;
            justify-content: flex-end;
            padding: 0 1.5rem 1rem;
        }

        .delete-btn {
            background: var(--red-light);
            color: var(--red);
            border: none;
            padding: 0.5rem 1rem;
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.9rem;
            transition: var(--transition);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .delete-btn:hover {
            background: var(--red);
            color: white;
            transform: scale(1.05);
        }

        .sidebar {
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
        }

        .sidebar-card {
            background: var(--card-bg);
            border-radius: var(--border-radius);
            padding: 1.5rem;
            box-shadow: var(--shadow);
            border: 1px solid var(--card-border);
        }

        .sidebar-title {
            font-size: 1.2rem;
            font-weight: bold;
            margin-bottom: 1rem;
            color: var(--text-dark);
        }

        .motivational-quote {
            background: var(--gradient);
            color: white;
            text-align: center;
            font-style: italic;
            line-height: 1.8;
        }

        .motivational-quote .sidebar-title {
            color: white;
        }

        .floating-btn {
            position: fixed;
            bottom: 2rem;
            right: 2rem;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background: var(--gradient);
            color: white;
            border: none;
            font-size: 1.5rem;
            cursor: pointer;
            box-shadow: var(--shadow-hover);
            transition: var(--transition);
            z-index: 50;
        }

        .floating-btn:hover {
            transform: scale(1.1) rotate(90deg);
        }

        .empty-comments {
            text-align: center;
            color: var(--text-gray);
            padding: 3rem 1rem;
            font-style: italic;
        }

        .empty-comments-icon {
            font-size: 3rem;
            margin-bottom: 1rem;
            opacity: 0.3;
        }

        .sidebar-comments::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar-comments::-webkit-scrollbar-track {
            background: var(--card-border);
            border-radius: 3px;
        }

        .sidebar-comments::-webkit-scrollbar-thumb {
            background: var(--primary);
            border-radius: 3px;
        }

        .sidebar-comments::-webkit-scrollbar-thumb:hover {
            background: var(--primary-dark);
        }

        @media (max-width: 1115px) {
            .main-container {
                grid-template-columns: 1fr;
                padding: 0 1rem;
                gap: 1rem;
            }

            .header {
                padding: 1rem 0;
            }

            .header-content {
                padding: 0 1rem;
            }

            .comments-sidebar {
                top: auto;
                bottom: 0;
                left: 0;
                right: 0;
                width: 100%;
                height: 70vh;
                max-height: 600px;
                border-radius: 24px 24px 0 0;
                transform: translateY(100%);
            }

            .comments-sidebar.open {
                transform: translateY(0);
            }

            .sidebar-header {
                border-radius: 24px 24px 0 0;
                position: relative;
            }

            .sidebar-header::before {
                content: '';
                position: absolute;
                top: 8px;
                left: 50%;
                transform: translateX(-50%);
                width: 40px;
                height: 4px;
                background: rgba(255, 255, 255, 0.5);
                border-radius: 2px;
            }

            .floating-btn {
                bottom: 6rem;
                right: 1rem;
                width: 56px;
                height: 56px;
            }
        }

        @media (max-width: 768px) {

            .create-post,
            .feed-post,
            .sidebar-card {
                padding: 1rem;
            }

            .post-actions {
                flex-direction: column;
                align-items: stretch;
            }

            .post-options {
                justify-content: center;
                margin-bottom: 1rem;
            }

            .post-btn {
                align-self: center;
            }

            .sidebar-comments {
                padding: 1rem;
            }

            .sidebar-comment-form {
                padding: 1rem;
            }

            .comments-sidebar {
                height: 80vh;
            }
        }

        @media (max-width: 650px) {
            .post-option {
                flex: 1;
                justify-content: center;
                min-width: 0;
            }
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="header-content">
            <a href="{{ route('posts.index') }}" class="logo">Grovy</a>
            <div class="user-menu">
                <div class="user-avatar">{{ strtoupper(auth()->user()->name[0] . auth()->user()->name[1]) }}</div>
            </div>
        </div>
    </header>

    <div class="main-container">
        <main class="feed-section">
            <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" class="create-post">
                @csrf

                <div class="create-post-header">
                    <div class="create-avatar">{{ strtoupper(auth()->user()->name[0] . auth()->user()->name[1]) }}</div>
                    <input
                        type="text"
                        name="content"
                        id="mainContentInput"
                        class="post-input"
                        placeholder="Compartilhe sua conquista ou peça motivação..."
                        required>
                </div>

                <div class="post-actions">
                    <div class="post-options">
                        <label class="post-option">
                            <input type="radio" name="type" value="foto" hidden required>
                            <span>📸</span> Foto
                        </label>
                        <label class="post-option">
                            <input type="radio" name="type" value="conquista" hidden>
                            <span>🏆</span> Conquista
                        </label>
                        <label class="post-option">
                            <input type="radio" name="type" value="progresso" hidden>
                            <span>💪</span> Progresso
                        </label>
                        <label class="post-option">
                            <input type="radio" name="type" value="pergunta" hidden>
                            <span>❓</span> Pergunta
                        </label>
                        
                        @if(in_array(auth()->user()->role, ['Nutricionista', 'Personal']))
                            <label class="post-option pro-option-nutri">
                                <input type="radio" name="type" value="dica" hidden>
                                <span>📝</span> Dica Rápida
                            </label>
                            <label class="post-option pro-option-personal">
                                <input type="radio" name="type" value="video" hidden>
                                <span>🎬</span> Vídeo
                            </label>
                             <label class="post-option pro-option-artigo">
                                <input type="radio" name="type" value="artigo" hidden>
                                <span>📖</span> Artigo
                            </label>
                        @endif
                    </div>

                    <div class="additional-inputs">
                        <input
                            type="file"
                            name="image"
                            accept="image/*"
                            id="imageInput"
                            class="additional-input"
                            style="display: none; margin-top: 10px;">
                            
                        <input 
                            type="text" 
                            name="video_url" 
                            id="videoUrlInput" 
                            class="additional-input" 
                            placeholder="Cole o link do YouTube aqui..." 
                            style="display: none;">

                        <input 
                            type="text" 
                            name="article_title" 
                            id="articleTitleInput" 
                            class="additional-input" 
                            placeholder="Título do seu artigo..." 
                            style="display: none;">
                        
                        <textarea 
                            name="article_content" 
                            id="articleContentTextarea" 
                            class="additional-input" 
                            placeholder="Escreva seu artigo aqui..." 
                            rows="5" 
                            style="display: none;"></textarea>
                    </div>

                    <button type="submit" class="post-btn">Publicar</button>
                </div>
            </form>

            <div class="posts-container">
                @foreach ($posts as $post)
                <article class="feed-post">
                    <header class="post-header">
                        <div class="post-avatar">
                            {{ strtoupper(substr($post->user->name, 0, 2)) }}
                        </div>
                        <div class="post-user-info">
                            <h3>
                                {{ $post->user->name }}
                                @if(in_array($post->user->role, ['Nutricionista', 'Personal']))
                                    <span class="professional-badge" title="Profissional">⭐</span>
                                @endif
                            </h3>
                            <div class="post-meta">
                                {{ $post->user->role ?? 'Cliente' }} • {{ $post->created_at->diffForHumans() }}
                            </div>
                        </div>
                        
                        @if ($post->type === 'dica')
                            <div class="achievement-badge badge-dica">📝 Dica</div>
                        @elseif ($post->type === 'video')
                            <div class="achievement-badge badge-video">🎬 Vídeo</div>
                        @elseif ($post->type === 'artigo')
                            <div class="achievement-badge badge-artigo">📖 Artigo</div>
                        @elseif ($post->type === 'conquista')
                            <div class="achievement-badge">🏆 Conquista</div>
                        @elseif ($post->type === 'progresso')
                            <div class="achievement-badge">💪 Progresso</div>
                        @elseif ($post->type === 'pergunta')
                            <div class="achievement-badge">❓ Pergunta</div>
                        @elseif ($post->badge)
                            <div class="achievement-badge">{{ $post->badge }}</div>
                        @endif
                    </header>

                    <div class="post-content">
                        @if($post->type === 'artigo')
                            <h4 class="article-title-display">{{ $post->article_title }}</h4>
                            <p class="post-text">{{ $post->content }}</p>
                        @elseif($post->type === 'video' && $post->video_url)
                            <p class="post-text">{{ $post->content }}</p>
                            <div class="video-embed-wrapper">
                                <div class="video-container" data-video-id="{{ \App\Http\Controllers\PostController::getYouTubeId($post->video_url) }}">
                                    <img src="https://img.youtube.com/vi/{{ \App\Http\Controllers\PostController::getYouTubeId($post->video_url) }}/hqdefault.jpg" class="video-thumbnail">
                                    <button class="video-play-btn">▶</button>
                                </div>
                            </div>
                        @else
                            <p class="post-text">{{ $post->content }}</p>
                        @endif

                        @if ($post->image_url && $post->type !== 'video')
                            <div class="image-wrapper">
                                <img src="{{ asset($post->image_url) }}" alt="Imagem do post" class="post-image" style="display: block;">
                            </div>
                        @endif
                    </div>

                    <div class="post-interactions">
                        <div class="post-actions-bar">
                            <form method="POST" action="{{ route('posts.like', $post) }}" style="display: inline;">
                                @csrf
                                <button
                                    type="button"
                                    class="like-btn"
                                    data-post-id="{{ $post->id }}"
                                    data-liked="{{ $post->likes->contains('user_id', auth()->id()) ? '1' : '0' }}">

                                    @if ($post->likes->contains('user_id', auth()->id()))
                                    ❤️
                                    @else
                                    🤍
                                    @endif
                                    Curtir
                                </button>
                            </form>
                            <button class="action-btn" onclick="openCommentsSidebar('{{ $post->id }}')">
                                💬 Comentar
                            </button>
                        </div>
                        @if ($post->likes->count() > 0)
                        <div class="likes-count">
                            <strong>{{ $post->likes->count() }}</strong>
                            {{ $post->likes->count() == 1 ? 'curtida' : 'curtidas' }}
                        </div>
                        @endif
                        @if ($post->comments->count() > 0)
                        <div class="comments-preview">
                            @if ($post->comments->count() > 2)
                            <div class="view-all-comments" onclick="openCommentsSidebar('{{ $post->id }}')">
                                Ver todos os {{ $post->comments->count() }} comentários
                            </div>
                            @endif
                            @foreach ($post->comments->take(2) as $comment)
                            <div class="comment-preview">
                                <strong>{{ $comment->user->name }}</strong>{{ $comment->content }}
                                <span class="comment-time">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                            @endforeach
                        </div>
                        @endif
                    </div>

                    @if ($post->user_id === auth()->id())
                    <div class="delete-form">
                        <form method="POST" action="{{ route('posts.destroy', $post) }}">
                            @csrf
                            @method('DELETE')
                            <button
                                type="submit"
                                onclick="return confirm('Tem certeza que deseja deletar este post?')"
                                class="delete-btn">
                                🗑️ Deletar Post
                            </button>
                        </form>
                    </div>
                    @endif
                </article>
                @endforeach
            </div>
        </main>

        <aside class="sidebar">
            @if(in_array(auth()->user()->role, ['Nutricionista', 'Personal']))
            <div class="sidebar-card professional-panel">
                <h3 class="sidebar-title">Painel do Profissional</h3>
                <ul>
                    <li><a href="#">Meus Pacientes/Alunos</a></li>
                    <li><a href="#">Criar Plano de Treino</a></li>
                    <li><a href="#">Criar Plano Alimentar</a></li>
                </ul>
            </div>
            @endif

            <div class="sidebar-card motivational-quote">
                <h3 class="sidebar-title" style="color: white;">💫 Motivação do Dia</h3>
                <p id="motivation-text">"O sucesso é a soma de pequenos esforços repetidos dia após dia."</p>
            </div>
        </aside>
    </div>

    <div class="sidebar-backdrop" id="sidebarBackdrop" onclick="closeCommentsSidebar()"></div>

    @foreach ($posts as $post)
    <div class="comments-sidebar" id="commentsSidebar-{{ $post->id }}">
        <div class="sidebar-header">
            <h3>💬 Comentários</h3>
            <button class="sidebar-close" onclick="closeCommentsSidebar('{{ $post->id }}')">&times;</button>
        </div>

        <div class="sidebar-comments">
            @if ($post->comments->count() === 0)
            <div class="empty-comments">
                <div class="empty-comments-icon">💬</div>
                <p>Seja o primeiro a comentar!</p>
            </div>
            @else
            @foreach ($post->comments as $comment)
            <div class="sidebar-comment">
                <div class="comment-avatar">
                    {{ strtoupper(substr($comment->user->name, 0, 2)) }}
                </div>
                <div class="comment-content">
                    <div class="comment-user">{{ $comment->user->name }}</div>
                    <div class="comment-text">{{ $comment->content }}</div>
                    <div class="comment-meta">
                        <span>{{ $comment->created_at->diffForHumans() }}</span>
                        @if ($comment->user_id === auth()->id())
                        <form method="POST" action="{{ route('comments.destroy', $comment) }}" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="comment-delete" onclick="return confirm('Deletar comentário?')">
                                Deletar
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>

        <form method="POST" action="{{ route('comments.store', $post) }}" class="sidebar-comment-form" onsubmit="event.preventDefault(); saveScrollPositionAndSubmit(event, this);">
            @csrf
            <div class="form-avatar">{{ strtoupper(auth()->user()->name[0] . auth()->user()->name[1]) }}</div>
            <div class="comment-input-wrapper">
                <input
                    type="text"
                    name="content"
                    class="comment-input"
                    placeholder="Adicione um comentário..."
                    required>
            </div>
            <button type="submit" class="comment-btn">Publicar</button>
        </form>
    </div>
    @endforeach

    <button class="floating-btn" title="Nova publicação">+</button>

    <script>
        // SCRIPT CONSOLIDADO: Todos os event listeners de DOMContentLoaded em um só
        document.addEventListener('DOMContentLoaded', function() {
            const scrollY = localStorage.getItem('scrollY');
            if (scrollY !== null) {
                window.scrollTo(0, parseInt(scrollY));
                localStorage.removeItem('scrollY');
            }

            // Lógica para Curtir
            document.querySelectorAll('.like-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const postId = this.getAttribute('data-post-id');
                    const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
                    
                    fetch(`/posts/${postId}/like-ajax`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': token
                        },
                        body: JSON.stringify({})
                    })
                    .then(res => res.json())
                    .then(data => {
                        // Atualiza ícone e texto do botão
                        this.innerHTML = (data.liked ? '❤️' : '🤍') + ' Curtir';
                        this.setAttribute('data-liked', data.liked ? '1' : '0');

                        // Atualiza o contador de curtidas
                        const likesContainer = this.closest('.post-interactions').querySelector('.likes-count');
                        if (data.likes_count > 0) {
                            if (!likesContainer) {
                                // Se não existe, cria o contador de likes
                                const newDiv = document.createElement('div');
                                newDiv.className = 'likes-count';
                                newDiv.innerHTML = `<strong>${data.likes_count}</strong> ${data.likes_count === 1 ? 'curtida' : 'curtidas'}`;
                                // Insere após a barra de ações
                                this.closest('.post-actions-bar').insertAdjacentElement('afterend', newDiv);
                            } else {
                                likesContainer.innerHTML = `<strong>${data.likes_count}</strong> ${data.likes_count === 1 ? 'curtida' : 'curtidas'}`;
                            }
                        } else {
                            if (likesContainer) likesContainer.remove(); // Remove se não houver likes
                        }
                    })
                    .catch(error => console.error('Erro ao curtir/descurtir:', error));
                });
            });

            // Lógica para as novas funcionalidades de postagem (dica, vídeo, artigo)
            const options = document.querySelectorAll('.post-option');
            const mainContentInput = document.getElementById('mainContentInput');
            
            const imageInput = document.getElementById('imageInput');
            const videoUrlInput = document.getElementById('videoUrlInput');
            const articleTitleInput = document.getElementById('articleTitleInput');
            const articleContentTextarea = document.getElementById('articleContentTextarea');

            options.forEach(option => {
                option.addEventListener('click', function() {
                    options.forEach(o => o.classList.remove('active'));
                    this.classList.add('active');
                    this.querySelector('input').checked = true;

                    const selectedType = this.querySelector('input').value;

                    // Reseta e esconde todos os inputs adicionais
                    imageInput.style.display = 'none';
                    videoUrlInput.style.display = 'none';
                    articleTitleInput.style.display = 'none';
                    articleContentTextarea.style.display = 'none';
                    
                    // Reseta os valores dos inputs adicionais ao esconder
                    imageInput.value = '';
                    videoUrlInput.value = '';
                    articleTitleInput.value = '';
                    articleContentTextarea.value = '';

                    // Mostra o input principal por padrão e ajusta o placeholder
                    mainContentInput.style.display = 'block'; 
                    mainContentInput.placeholder = "Compartilhe sua conquista ou peça motivação...";
                    mainContentInput.removeAttribute('required'); // Remove required por padrão

                    // Exibe inputs/placeholders específicos para o tipo selecionado
                    // e adiciona 'required' conforme necessário
                    if (selectedType === 'foto') {
                        imageInput.style.display = 'block';
                        imageInput.setAttribute('required', 'required');
                        mainContentInput.setAttribute('required', 'required');
                    } else if (selectedType === 'video') {
                        videoUrlInput.style.display = 'block';
                        videoUrlInput.setAttribute('required', 'required');
                        mainContentInput.placeholder = "Adicione uma descrição para o seu vídeo...";
                        mainContentInput.setAttribute('required', 'required');
                    } else if (selectedType === 'dica') {
                        mainContentInput.placeholder = "Escreva sua dica aqui...";
                        mainContentInput.setAttribute('required', 'required');
                    } else if (selectedType === 'artigo') {
                        mainContentInput.style.display = 'none'; // Esconde o input de uma linha para artigo
                        articleTitleInput.style.display = 'block';
                        articleTitleInput.setAttribute('required', 'required');
                        articleContentTextarea.style.display = 'block';
                        articleContentTextarea.setAttribute('required', 'required');
                    } else { // Para tipos como 'conquista', 'progresso', 'pergunta'
                         mainContentInput.setAttribute('required', 'required');
                    }
                });
            });

            // SCRIPT PARA O PLAYER DE VÍDEO (carrega iframe ao clicar)
            document.querySelectorAll('.video-container').forEach(container => {
                container.addEventListener('click', function() {
                    const videoId = this.getAttribute('data-video-id');
                    if (videoId) {
                        const iframe = document.createElement('iframe');
                        iframe.setAttribute('src', `https://www.youtube.com/embed/${videoId}?autoplay=1`);
                        iframe.setAttribute('frameborder', '0');
                        iframe.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture');
                        iframe.setAttribute('allowfullscreen', '');
                        iframe.classList.add('video-iframe');
                        
                        this.parentNode.replaceChild(iframe, this); // Substitui a miniatura pelo player
                    }
                });
            });

            // Lógica para o botão flutuante e foco no input principal
            const floatingBtn = document.querySelector('.floating-btn');
            if (floatingBtn) { // Verifica se o botão existe antes de adicionar o listener
                floatingBtn.addEventListener('click', function() {
                    const postInput = document.querySelector('.post-input');
                    postInput.focus();
                    postInput.scrollIntoView({
                        behavior: 'smooth',
                        block: 'center'
                    });
                });
            }

            // Placeholder dinâmico do input principal
            const postInputPlaceholder = document.querySelector('.post-input');
            if (postInputPlaceholder) { // Verifica se o input existe
                postInputPlaceholder.addEventListener('focus', function() {
                    this.placeholder = 'O que você gostaria de compartilhar hoje?';
                });
                postInputPlaceholder.addEventListener('blur', function() {
                    this.placeholder = 'Compartilhe sua conquista ou peça motivação...';
                });
            }

            // Atualização de citação motivacional
            const motivationalQuotes = [
                "O sucesso é a soma de pequenos esforços repetidos dia após dia.",
                "Sua única limitação é você mesmo.",
                "Grandes conquistas requerem grandes ambições.",
                "O que não te desafia, não te transforma.",
                "Cada dia é uma nova oportunidade para ser melhor.",
                "Disciplina é liberdade.",
                "Você é mais forte do que imagina."
            ];

            function updateMotivation() {
                const motivationTextElement = document.getElementById('motivation-text');
                if (motivationTextElement) { // Verifica se o elemento existe
                    const randomQuote = motivationalQuotes[Math.floor(Math.random() * motivationalQuotes.length)];
                    motivationTextElement.textContent = `"${randomQuote}"`;
                }
            }

            updateMotivation(); // Chama a função uma vez no carregamento
            setInterval(updateMotivation, 30000); // Depois, a cada 30 segundos

            // Lógica de abertura e fechamento da sidebar de comentários
            function openCommentsSidebar(postId) {
                const sidebar = document.getElementById('commentsSidebar-' + postId);
                const backdrop = document.getElementById('sidebarBackdrop');

                if (sidebar && backdrop) { // Verifica se os elementos existem
                    document.querySelectorAll('.comments-sidebar').forEach(s => s.classList.remove('open'));
                    sidebar.classList.add('open');
                    backdrop.classList.add('show');
                    document.body.style.overflow = 'hidden';

                    setTimeout(() => {
                        const commentInput = sidebar.querySelector('.comment-input');
                        if (commentInput) {
                            commentInput.focus();
                        }
                    }, 300);
                }
            }
            window.openCommentsSidebar = openCommentsSidebar; // Disponibiliza globalmente

            function closeCommentsSidebar(postId = null) {
                const backdrop = document.getElementById('sidebarBackdrop');

                if (backdrop) { // Verifica se o backdrop existe
                    if (postId) {
                        const sidebar = document.getElementById('commentsSidebar-' + postId);
                        if (sidebar) sidebar.classList.remove('open');
                    } else {
                        document.querySelectorAll('.comments-sidebar').forEach(s => s.classList.remove('open'));
                    }

                    backdrop.classList.remove('show');
                    document.body.style.overflow = '';
                }
            }
            window.closeCommentsSidebar = closeCommentsSidebar; // Disponibiliza globalmente

            document.addEventListener('keydown', function(event) {
                if (event.key === 'Escape') {
                    closeCommentsSidebar();
                }
            });
            
            // Impede fechamento ao clicar dentro da sidebar
            document.querySelectorAll('.comments-sidebar').forEach(sidebar => {
                 sidebar.addEventListener('click', function(e) {
                    e.stopPropagation();
                });
            });
           
            function saveScrollPositionAndSubmit(event, form) {
                localStorage.setItem('scrollY', window.scrollY);
                form.submit();
            }
            window.saveScrollPositionAndSubmit = saveScrollPositionAndSubmit; // Disponibiliza globalmente

        }); // Fim do único DOMContentLoaded
    </script>
</body>

</html>