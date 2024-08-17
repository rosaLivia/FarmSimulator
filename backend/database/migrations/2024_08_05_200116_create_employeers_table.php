<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id(); // Adiciona uma coluna de chave primária "id"
            $table->string('name'); // Adiciona uma coluna "name" do tipo string
            $table->string('email')->unique(); // Adiciona uma coluna "email" do tipo string com índice único
            $table->string('password'); // Adiciona uma coluna "password" do tipo string
            $table->boolean('administrator')->default(false); // Adiciona uma coluna "administrator" do tipo booleano
            $table->timestamps(); // Adiciona colunas "created_at" e "updated_at"
        });
    }
};