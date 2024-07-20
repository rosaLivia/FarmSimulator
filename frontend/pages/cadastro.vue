<template>
  <div class="container mx-auto mt-3">
    <div class="flex flex-col md:flex-row justify-center gap-3 items-start">
      <Card class="card">
        <template #content>
          <div class="card-content">
            <h2 class="text-xl font-semibold">Criar minha conta</h2>
            <p>Informe os seus dados abaixo para criar sua conta.</p>
            <form class="flex flex-col gap-3" @submit.prevent="handleSignUp">
              <div class="field">
                <InputText type="text" v-model="name" aria-describedby="name-help" placeholder="Nome*" :invalid="!!errors.name" />
                <small id="name-help" class="p-error">
                  {{ errors.name }}
                </small>
              </div>
              <div class="field">
                <InputText type="text" v-model="email" aria-describedby="email-help" placeholder="Email*" :invalid="!!errors.email" />
                <small id="email-help" class="p-error">
                  {{ errors.email }}
                </small>
              </div>
              <div class="flex flex-col md:flex-row gap-3">
                <div class="field basis-1/2">
                  <InputMask v-model="cpf" mask="999.999.999-99" aria-describedby="cpf-help" :autoClear="false" placeholder="CPF*" :invalid="!!errors.cpf" />
                  <small id="cpf-help" class="p-error">
                    {{ errors.cpf }}
                  </small>
                </div>
                <div class="field basis-1/2">
                  <InputMask v-model="tel" mask="(99) 99999-9999" aria-describedby="tel-help" :autoClear="false" placeholder="Telefone" :invalid="!!errors.tel" />
                  <small id="tel-help" class="p-error">
                    {{ errors.tel }}
                  </small>
                </div>
              </div>
              <div class="field">
                <InputText type="text" v-model="addres" aria-describedby="address" placeholder="Endereço" :invalid="!!errors.address" />
                <small id="addres-help" class="p-error">
                  {{ errors.addres }}
                </small>
              </div>
              <div class="flex flex-col md:flex-row gap-3">
                <div class="field basis-1/2">
                  <Password :inputStyle="{'width': '100%'}" v-model="password" placeholder="Senha*" aria-describedby="password-help" :invalid="!!errors.password" :feedback="false" toggleMask />
                  <small id="password-help" class="p-error">
                    {{ errors.password }}
                  </small>
                </div>

                <div class="field basis-1/2">
                  <Password :inputStyle="{'width': '100%'}" v-model="passwordConfirm" placeholder="Confirmar senha*" aria-describedby="password-confirm-help" :invalid="!!errors.passwordConfirm" :feedback="false" toggleMask />
                  <small id="password-confirm-help" class="p-error">
                    {{ errors.passwordConfirm }}
                  </small>
                </div>
              </div>
              <div class="flex items-center">
                <div class="field">
                  <div class="flex items-center">
                    <Checkbox inputId="terms_accepted" v-model="terms_accepted" aria-describedby="term-help" :binary="true" :invalid="errors.terms_accepted === null" />
                    <label for="terms_accepted" class="ml-2">Estou ciente e CONCORDO com os termos de aceite e políticas de privacidade da MegaFarma.</label>
                  </div>
                  <small id="term-help" class="p-error">
                    {{ errors.terms_accepted }}
                  </small>
                </div>
              </div>              
              <Button type="submit" label="CRIAR CONTA" />
              <Button as="router-link" label="Esqueci minha senha" to="/" class="text-sm" link />
            </form>
          </div>
        </template>
      </Card>
    </div>
  </div>
  <div class="absolute top-0 left-0 flex w-full h-full items-center bg-slate-900/50" v-if="loading">
    <ProgressSpinner />
  </div>
</template>

<script setup>
import * as yup from 'yup';

const toast = useToast();
const router = useRouter()

const schema = yup.object({
  name: yup.string().required('O nome é obrigatório'),
  email: yup.string().email('O email informado é inválido').required('O email é obrigatório'),
  cpf: yup.string().required('O CPF é obrigatório').matches(/^\d{3}\.\d{3}\.\d{3}-\d{2}$/, 'O CPF informado é inválido'),
  tel: yup.string(),
  address: yup.string(),
  password: yup.string().required('A senha é obrigatória').min(6, 'A senha deve ter no mínimo 6 caracteres').max(10, 'A senha deve ter no máximo 10 caracteres')
    .matches(/[A-Z]/, 'A senha deve conter pelo menos uma letra maiúscula')
    .matches(/[a-z]/, 'A senha deve conter pelo menos uma letra minúscula')
    .matches(/\d/, 'A senha deve conter pelo menos um número')
    .matches(/[^a-zA-Z\d]/, 'A senha deve conter pelo menos um caractere especial'),
  passwordConfirm: yup.string().required('A confirmação de senha é obrigatória').oneOf([yup.ref('password'), null], 'As senhas não conferem'),
  terms_accepted: yup.boolean().required('É necessário aceitar os termos').isTrue('Você deve aceitar os termos de aceite e políticas de privacidade'),
})

const { defineField, handleSubmit, resetForm, errors } = useForm({
  validationSchema: schema,
});

const [name] = defineField('name');
const [email] = defineField('email');
const [cpf] = defineField('cpf');
const [tel] = defineField('tel');
const [addres] = defineField('address');
const [password] = defineField('password');
const [passwordConfirm] = defineField('passwordConfirm');
const [terms_accepted] = defineField('terms_accepted');

const loading = ref(false);

const handleSignUp = handleSubmit(async (values) => {
  try {
    const data = await $fetch('http://localhost/api/users', {
      method: 'POST',
      body: values,
      onRequest: () => {
        loading.value = true;
      },
      onResponse: () => {
        loading.value = false;
      }
    });

    if(data.error) {
      throw new Error(data.message);
    }

    toast.add({severity:'success', summary: 'Cadastro realizado com sucesso', life: 5000});

    router.push('/login');
  } catch (error) {
    toast.add({severity:'error', summary: 'Erro ao cadastrar', detail: error.message, life: 5000});
  }
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
</style>