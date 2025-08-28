    <?php

    // database/migrations/xxxx_xx_xx_create_cref_registros_table.php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        public function up(): void {
            Schema::create('cref_registros', function (Blueprint $table) {
                $table->id();
                $table->string('cref_numero', 6);
                $table->string('cref_categoria', 1); // G, C, E etc.
                $table->string('cref_uf', 2);
                $table->timestamps();
                $table->foreignId('user_id')->constrained()->onDelete('cascade');

            });
        }

        public function down(): void {
            Schema::dropIfExists('cref_registros');
        }
    };

