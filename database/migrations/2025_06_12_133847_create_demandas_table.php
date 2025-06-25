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
        Schema::create('demandas', function (Blueprint $table) {
            $table->id('id_chamado');
            $table->unsignedBigInteger('id_servico');
            $table->unsignedBigInteger('id_tecnico');
            $table->boolean('presencial')->nullable();
            $table->decimal('preco', 10, 2);
            $table->timestamps();
       
            $table->primary(['id_chamado', 'id_servico', 'id_tecnico']);
            
            $table->foreign('id_chamado')->references('id_chamado')->on('chamados')->onDelete('cascade');
            $table->foreign('id_servico')->references('id_servico')->on('servicos')->onDelete('cascade');
            $table->foreign('id_tecnico')->references('id_tecnico')->on('tecnicos')->onDelete('cascade');
       
       
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('demandas');
    }
};
