<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name'); #nome do produto
            $table->string('codigo');   #codigo do produto
            $table->string('marca');
            $table->text('description')->nullable();    #descricao
            $table->decimal('price', 8, 2);#valor
            $table->text('recomendation')->nullable(); 
            $table->text('instruction')->nullable();
            $table->integer('stock');   #quantidade no estoque
            $table->timestamps();
        });
    }

};
