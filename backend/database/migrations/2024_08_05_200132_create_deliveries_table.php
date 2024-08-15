<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->id(); // Adiciona uma coluna de chave primária "id"
            $table->string('deliveries'); // Adiciona uma coluna de chave primária "deliveries"
            $table->dateTime('arrived_date'); // Adiciona uma coluna "arrived_date" para armazenar a previsão de entrega
            $table->string('codigo'); // Adiciona uma coluna "codigo" do tipo string para armazenar o código de rastreio
            $table->timestamps(); // Adiciona colunas "created_at" e "updated_at"
        });
    }
};