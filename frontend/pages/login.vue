<template>
  <div class="container mx-auto mt-3">
    <div class="flex flex-col md:flex-row justify-center gap-3 items-start">
      <Card class="card">
        <template #content>
          <div class="card-content">
            <h2 class="text-xl font-semibold">Acesse sua conta</h2>
            <p>Informe os seus dados abaixo para acessá-la.</p>
            <form class="flex flex-col gap-3" @submit="handleSignIn">
              <div class="field">
                <InputText type="text" v-model="email" aria-labelledby="email-help" placeholder="Email" :invalid="!!errors.email" autocomplete />
                <small id="email-help" class="p-error">
                  {{ errors.email }}
                </small>
              </div>
              <div class="field">
                <Password :inputStyle="{'width': '100%'}" v-model="password" aria-labelledby="password-help" placeholder="Senha" :invalid="!!errors.password" :feedback="false" toggleMask />
                <small id="password-help" class="p-error">
                  {{ errors.password }}
                </small>
              </div>
              <div class="flex items-center">
                <Checkbox v-model="rememberMe" inputId="rememberMe" :binary="true" />
                <label for="rememberMe" class="ml-2">Lembrar minhas credenciais</label>
              </div>
              <small id="invalid-credentials" v-if="invalidCredentials" class="p-error">
                  Email e/ou senha inválidos
              </small>
              <Button type="submit" label="ACESSAR CONTA" />
              <Button as="router-link" to="#" label="Esqueci minha senha" size="small" link />
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
import * as yup from 'yup';

const schema = yup.object().shape({
  email: yup.string().email('O email informado é inválido').required('O email é obrigatório'),
  password: yup.string().required('A senha é obrigatória'),
  rememberMe: yup.boolean(),
});

const { defineField, handleSubmit, resetForm, errors } = useForm({
  validationSchema: schema,
});

const [email] = defineField('email');
const [password] = defineField('password');
const [rememberMe] = defineField('rememberMe');

const invalidCredentials = ref(false);

const handleSignIn = handleSubmit(async (values) => {
  console.log(values);
  invalidCredentials.value = true;
  resetForm();
});
</script>

<style scoped>
  .card {
    @apply md:basis-1/4 w-full;
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