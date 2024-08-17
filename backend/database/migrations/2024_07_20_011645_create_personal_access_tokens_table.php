<?php #Indica que o código está escrito em php

#Importe de classes que serão utilizadas
use Illuminate\Database\Migrations\Migration; #Classe base que é usada em todas as migrações.
use Illuminate\Database\Schema\Blueprint; #Classe usada para definir estrutura de tabelas.
use Illuminate\Support\Facades\Schema; #Classe para manipulação de banco de dados.

return new class extends Migration #Aqui criamos uma migração sem nome definido.
{
    /**
     * Run the migrations.
     */
    public function up(): void #Quando a migração for exectuada, execute:
    {
        Schema::create('personal_access_tokens', function (Blueprint $table) { #Cria uma tabela chamada personal_access_tokens, o que é a instância de classe blueprint?
            $table->id(); #Cria uma chave primária auto incrementada chamada id.
            $table->morphs('tokenable'); #Cria duas colunas, uma com string e uma com inteiros que armazenam dados polimóficos.
            $table->string('name'); #Cria uma coluna para armazenar o nome do token
            $table->string('token', 64)->unique(); #Cria uma coluna chamada token que armazena 64 caracteres (sequência única).
            $table->text('abilities')->nullable(); #Cria uma coluna chamada abilities que armazena habilidades e permissões relacionadas ao token (pode ser nulo)
            $table->timestamp('last_used_at')->nullable(); #Cria uma coluna que nullable para armazenar o último uso desse token
            $table->timestamp('expires_at')->nullable(); #Cria outra coluna que armazena a data de expiração do token.
            $table->timestamps(); #Cria uma coluna automatica que armazena data de modificação dos registros.
        });
    }

    /**
     * Reverse the migrations.
     */
    #Caso a migração seja revertida, faça:
    public function down(): void
    {
        Schema::dropIfExists('personal_access_tokens'); #Exclui o token
    }
};
