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
    Schema::create('transactions', function (Blueprint $table) {
        $table->id(); // ID único
        $table->foreignId('user_id')->constrained()->onDelete('cascade'); // O "dono" da transação
        $table->string('description'); // Descrição
        $table->decimal('amount', 10, 2); // Valor
        $table->enum('type', ['receita', 'despesa']); // Tipo
        $table->date('date'); // Data
        $table->text('justificativa')->nullable(); // Justificativa (opcional)
        $table->timestamps(); // Colunas created_at e updated_at
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
