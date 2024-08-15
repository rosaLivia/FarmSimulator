<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('carts', function (Blueprint $table) {
            $table->id(); // Adiciona uma coluna de chave primária "id"
            $table->unsignedBigInteger('id_buy'); // Adiciona uma coluna "id_buy" do tipo inteiro sem sinal
            $table->unsignedBigInteger('id_drug'); // Adiciona uma coluna "id_drug" do tipo inteiro sem sinal
            $table->integer('quant'); // Adiciona uma coluna "quant" do tipo inteiro
            $table->decimal('preco_unitario', 8, 2); // Adiciona uma coluna "price" do tipo decimal com 8 dígitos totais e 2 casas decimais
            $table->timestamps(); // Adiciona colunas "created_at" e "updated_at"

            // Definir chaves estrangeiras
            $table->foreign('id_buy')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('id_drug')->references('id')->on('products')->onDelete('cascade');
            // o codigo abaixo está comentado pois a adição do preco do produto sera diretamente na tabela
            //$table->foreign('preco_unitario')->references('price')->on('products')->onDelete('cascade');
        });
    }
};
