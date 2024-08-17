<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

return new class extends Migration
{
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Adiciona uma coluna de chave primária "id"
            $table->unsignedBigInteger('user_id'); // Adiciona uma coluna "id_cliente" do tipo inteiro sem sinal
            $table->dateTime('dt'); // Adiciona uma coluna "dt" para armazenar a data da compra
            $table->unsignedBigInteger('id_payment_method'); // Adiciona uma coluna "id_payment_method" do tipo inteiro sem sinal
            $table->unsignedBigInteger('id_recipe'); // Adiciona uma coluna "id_recipe" do tipo inteiro sem sinal
            $table->unsignedBigInteger('id_entrega'); // Adiciona uma coluna "id_entrega" do tipo inteiro sem sinal
            $table->timestamps(); // Adiciona colunas "created_at" e "updated_at"

            // Definir chaves estrangeiras
            //->onDelete('cascade') especifica que se um registro nas tabelas referenciadas for deletado,  todos os registros relecionados a tabela orders sera deletado
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('id_payment_method')->references('id')->on('paymentmethods')->onDelete('cascade');
            $table->foreign('id_recipe')->references('id')->on('recipes')->onDelete('cascade');
            $table->foreign('id_entrega')->references('id')->on('deliveries')->onDelete('cascade');
        });
    }

    
    
};

