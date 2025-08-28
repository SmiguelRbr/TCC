<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('crn_registros', function (Blueprint $table) {
            $table->id();
            $table->string('numero', 10); // ex: 12345
            $table->string('regiao', 5);  // ex: CRN-3
            $table->foreignId('user_id')->constrained()->onDelete('cascade')->unique();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crn_registros');
    }
};
