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
            $table->unsignedBigInteger('id_order'); // Adiciona uma coluna "id_order" do tipo inteiro sem sinal
            $table->unsignedBigInteger('id_product'); // Adiciona uma coluna "id_product" do tipo inteiro sem sinal
            $table->integer('quant'); // Adiciona uma coluna "quant" do tipo inteiro
            $table->decimal('price', 8, 2); // Adiciona uma coluna "price" do tipo decimal com 8 dígitos totais e 2 casas decimais
            $table->timestamps(); // Adiciona colunas "created_at" e "updated_at"

            // Definir chaves estrangeiras
            $table->foreign('id_order')->references('id')->on('orders')->onDelete('cascade');
            $table->foreign('id_product')->references('id')->on('products')->onDelete('cascade');
        });
    }
};
