<template>
  <div class="container mx-auto mt-3">
    <div class="flex flex-col md:flex-row justify-center gap-3 items-start">
      <Card class="card">
        <template #content>
          <div class="card-content">
            <h2 class="text-xl font-semibold">Acesse sua conta</h2>
            <p>Informe os seus dados abaixo para acessá-la.</p>
            <form class="flex flex-col gap-3">
              <InputText type="text" id="Email" v-model="email" required placeholder="Email" />
              <InputText type="password" id="password" v-model="password" required placeholder="Senha" />
              <div class="flex items-center">
                <Checkbox v-model="lembrar" inputId="lembrar" name="lembrar" :binary="true" />
                <label for="lembrar" class="ml-2"> Lembrar minhas credenciais </label>
              </div>
              <Button type="submit" label="ACESSAR CONTA" />
              <Button as="router-link" label="Esqueci minha senha" to="/" class="text-sm" link/>
            </form>
          </div>
        </template>
      </Card>
      <Card class="card">
        <template #content>
          <div class="card-content">
            <h2 class="text-xl font-semibold">Novo por aqui?</h2>
            <p>Criar uma conta é fácil! Informe seus dados e uma senha para aproveitar todos os benefícios de ter uma conta.</p>
            <Button as="router-link" label="CADASTRE-SE" to="/cadastro" />
          </div>
        </template>
      </Card>
    </div>
  </div>
</template>

<script setup>
  const email = ref('');
  const password = ref('');
  const lembrar = ref(false);
</script>

<style scoped>
  .card {
    @apply md:basis-1/2 w-full;
  }
  /*
  O código acima é equivalente a:
  .card {
    flex-basis: 50%;
    width: 100%; 
   */
  .card-content {
    @apply flex flex-col gap-2;
  }
</style>