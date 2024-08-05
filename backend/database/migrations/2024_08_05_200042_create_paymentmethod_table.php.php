<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('paymentmethods', function (Blueprint $table) {
            $table->id(); // Adiciona uma coluna de chave primária "id"
            $table->string('nome'); // Adiciona uma coluna "nome" do tipo string
            $table->timestamps(); // Adiciona colunas "created_at" e "updated_at"
        });
    }
};