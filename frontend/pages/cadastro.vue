<template>
  <div class="container mx-auto mt-3">
    <div class="flex flex-col md:flex-row justify-center gap-3 items-start">
      <Card class="card">
        <template #content>
          <div class="card-content">
            <h2 class="text-xl font-semibold">Criar minha conta</h2>
            <p>Informe os seus dados abaixo para criar sua conta.</p>
            <form class="flex flex-col gap-3" @submit="handleSignUp">
              <InputText type="text" id="nome" v-model="nome" required placeholder="Nome" />
              <InputText type="text" id="email" v-model="email" required placeholder="Email" />
              <div class="flex gap-3">
                <InputMask id="cpf" class="grow" v-model="cpf" mask="999.999.999-99" required placeholder="CPF" />
                <InputMask id="tel" class="grow" v-model="tel" mask="(99) 99999-9999" placeholder="Telefone" />
              </div>
              <InputText type="text" id="endereco" v-model="endereco" placeholder="Endereço" />
              <div class="flex gap-3">
                <div class="field basis-1/2">
                  <Password class="w-full" :inputStyle="{'width': '100%'}" id="senha" v-model="senha" placeholder="Senha" aria-describedby="password-help" :invalid="errors.senha" :feedback="false" toggleMask />
                  <small id="password-help" class="p-error">
                    {{ errors.senha }}
                  </small>
                </div>

                <div class="field basis-1/2">
                  <Password class="w-full" :inputStyle="{'width': '100%'}" id="confirmar-senha" v-model="confirmarSenha" placeholder="Confirmar senha" aria-describedby="password-confirm-help" :invalid="errors.confirmarSenha" :feedback="false" toggleMask />
                  <small id="password-confirm-help" class="p-error">
                    {{ errors.confirmarSenha }}
                  </small>
                </div>
              </div>
              <div class="flex items-center">
                <Checkbox inputId="termo" v-model="termo" required :binary="true" />
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
import * as yup from 'yup';

const schema = yup.object({
  senha: yup.string().required('A senha é obrigatória').min(6, 'A senha deve ter no mínimo 6 caracteres').max(10, 'A senha deve ter no máximo 10 caracteres')
    .matches(/[A-Z]/, 'A senha deve conter pelo menos uma letra maiúscula')
    .matches(/[a-z]/, 'A senha deve conter pelo menos uma letra minúscula')
    .matches(/\d/, 'A senha deve conter pelo menos um número')
    .matches(/[^a-zA-Z\d]/, 'A senha deve conter pelo menos um caractere especial'),
  confirmarSenha: yup.string().oneOf([yup.ref('senha'), null], 'As senhas não conferem'),
})

const { defineField, handleSubmit, resetForm, errors } = useForm({
  validationSchema: schema,
});

const nome = ref('');
const email = ref('');
const cpf = ref('');
const tel = ref('');
const endereco = ref('');
const [senha] = defineField('senha');
const [confirmarSenha] = defineField('confirmarSenha');
const termo = ref(false);

const handleSignUp = handleSubmit(async () => {
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
});
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

.p-error {
  display: block;
  @apply text-red-500;
}
</style>