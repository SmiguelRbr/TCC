<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            // Relacionamento com usuário
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Conteúdo do post (será usado para o corpo do artigo também)
            $table->text('content');

            // Mídia opcional
            $table->string('image_url')->nullable();
            
            // --- CAMPOS ADICIONADOS ---
            $table->string('video_url')->nullable();     // Para o link do vídeo do YouTube
            $table->string('article_title')->nullable(); // Para o título do artigo

            // Distintivo opcional (ex: "Meta Alcançada")
            $table->string('badge')->nullable();

            // --- COLUNA 'type' ALTERADA ---
            // Alterado de ENUM para STRING para maior flexibilidade
            $table->string('type', 25)->default('progresso');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
}