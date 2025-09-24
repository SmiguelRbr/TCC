<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            // Relacionamento com usuário
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Conteúdo do post
            $table->text('content');

            // Imagem opcional
            $table->string('image_url')->nullable();

            // Distintivo opcional (ex: "Meta Alcançada")
            $table->string('badge')->nullable();

            // Tipo do post (ex: progresso, pergunta, conquista)
            $table->enum('type', ['foto', 'conquista', 'progresso', 'pergunta', 'dica'])->default('progresso');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
}
