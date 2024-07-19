<template>
  <div class="container mx-auto mt-3">
    <div class="flex flex-col md:flex-row justify-center gap-3 items-start">
      <Card class="card">
        <template #content>
          <div class="card-content">
            <h2 class="text-xl font-semibold">Criar minha conta</h2>
            <p>Informe os seus dados abaixo para criar sua conta.</p>
            <form class="flex flex-col gap-3" v-on:submit.prevent="handleSignUp">
              <InputText type="text" id="nome" v-model="nome" required placeholder="Nome" />
              <InputText type="text" id="email" v-model="email" required placeholder="Email" />
              <div class="flex gap-3">
                <InputMask id="cpf" class="grow" v-model="cpf" mask="999.999.999-99" required placeholder="CPF" />
                <InputMask id="tel" class="grow" v-model="tel" mask="(99) 99999-9999" placeholder="Telefone" />
              </div>
              <InputText type="text" id="endereco" v-model="endereco" placeholder="Endereço" />
              <InputText type="password" id="senha" v-model="senha" required placeholder="Senha" />
              <InputText type="password" id="confirmar-senha" v-model="senha" required placeholder="Confirmar senha" />
              <div class="flex items-center">
                <Checkbox inputId="termo" v-model="termo" :binary="true" />
                <label for="termo" class="ml-2">Estou ciente e CONCORDO com os termos de aceite e políticas de privacidade da MegaFarma.</label>
              </div>
              <Button type="submit" label="CRIAR CONTA" />
              <Button as="router-link" label="Esqueci minha senha" to="/" class="text-sm" link />
            </form>
          </div>
        </template>
      </Card>
    </div>
  </div>
</template>

<script setup>
const nome = ref('');
const email = ref('');
const cpf = ref('');
const tel = ref('');
const endereco = ref('');
const senha = ref('');
const termo = ref(false);


async function handleSignUp() {
  let formData = {
    nome: nome.value,
    email: email.value,
    cpf: cpf.value,
    tel: tel.value,
    endereco: endereco.value,
    senha: senha.value,
    termo: termo.value,
  };

  console.log(formData);
}
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