<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    public function up()
    {
        Schema::create('recipes', function (Blueprint $table) {
            $table->id(); // Adiciona uma coluna de chave primária "id"
            $table->string('arquivo'); // Adiciona uma coluna "arquivo" do tipo string
            $table->unsignedBigInteger('id_autorizador'); // Adiciona uma coluna "id_autorizador" do tipo inteiro sem sinal
            $table->timestamps(); // Adiciona colunas "created_at" e "updated_at"
            //Chave estrangeira 
            $table->foreign('id_autorizador')->references('id')->on('employees')->onDelete('cascade');
        });
    }
};

