<template>
<div class="md:container md:mx-auto"> 
  <div class="flex flex-col items-center mt-3 flex-grow">
    <div class="justify-center mb-5">
      <Stepper value="1" linear class="basis-[50rem]"> 
        <StepList>
          <Step value="1">
            <div class="flex items-center gap-3">
              <i class="pi pi-shopping-cart text-2xl"></i>
              <span>Carrinho</span>
            </div>
          </Step>
          <Step value="2">
            <div class="flex items-center gap-3">
              <i class="pi pi-user text-2xl"></i>
              <span>Identificação</span>
            </div>
          </Step>
          <Step value="3">
            <div class="flex items-center gap-3">
              <i class="pi pi-envelope text-2xl"></i>
              <span>Envio de análise</span>
            </div>
          </Step>
          <Step value="4">
            <div class="flex items-center gap-3">
              <i class="pi pi-credit-card text-2xl"></i>
              <span>Pagamento</span>
            </div>
          </Step>
          <Step value="5">
            <div class="flex items-center gap-3">
              <i class="pi pi-check text-2xl"></i>
              <span>Confirmar</span>
            </div>
          </Step>
        </StepList>
        
        <StepPanels>
            <StepPanel v-slot="{ activateCallback }" value="1">
              <div class="flex mt-2 ml-5">
                
                <Card class="card-left bg-white-200 w-[600px]">
    
                  <template #content>
                    <h2 class="font-semibold" style="margin-bottom: 15px" >PRODUTOS</h2>
                    <div v-if="cart.length">
                      <table class="w-full table-auto">
                        <thead>
                          <th></th>
                          <th></th>
                          <th class="th">Quantidade</th>
                          <th></th>
                          <th class="th">Preço</th>
                          <th></th>
                       </thead>
                      
                     
                        <tbody>
                          
                          <tr v-for="product in cart" :key="product.id" class="border-b">
                          
                            <td class="td"><img :src="product.image" class="product-image" /></td>
                            <td class="td" >{{ product.name }}</td>
                            <td class="td">{{ product.quantity }}</td>
                            <td class="td">
                              <button @click="() => addToCart(product)" class="text-orange-500 button-icons">
                                <i class="pi pi-plus"></i>
                              </button>
                
                              <button @click="() => removeProduct(product.id)" class="text-red-500 button-icons">
                                
                                <i class=" pi pi-minus"></i>
                              </button>
                            
                              
                            </td>
                            <td class="td">R$ {{ product.valueTo.toFixed(2) }}</td>
                            
                           
                            <td class="td">
                              <button @click="() => removeProduct(product.id)" class="text-red-500">
                                <i class="pi pi-trash"></i>
                              </button>
                            </td>
                           
                          </tr>
                         
                        </tbody>
                      </table>
                    </div>
                    <div v-else>
                      <p>O carrinho está vazio</p>
                    </div>
                  </template>
                </Card>

                <div class="flex flex-col flex-grow gap-4 ml-5">
                  <Card class="card bg-white-100">
                    <template #title>
                      <h2 class="font-semibold">RESUMO</h2>
                    </template>
                    <template #content>
                      <div class="card-content">
                        <fieldset>
                          <div class="flex justify-between">
                            <p class="text-left">Valor dos produtos:</p>
                            <span class="ml-auto text-right font-semibold">R$ {{ totalProductValue }}</span>
                          </div>
                          <Divider />
                          <div class="flex justify-between">
                            <p class="text-left">Frete:</p>
                            <span class="ml-auto text-right font-semibold">R$ 12,00</span>
                          </div>
                          <Divider />
                          <div class="flex justify-between">
                            <p class="text-left">Total:</p>
                            <span class="ml-auto text-right font-semibold">R$ {{ totalValue }}</span>
                          </div>
                        </fieldset>
                      </div>
                    </template>
                  </Card>
                  <Card class="card-second bg-white">
                    <template #content>
                      <div class="card-content flex flex-col h-full justify-end">
                        <Button class="mt-auto bg-yellow-400 text-black font-semibold py-2" label="CONTINUAR PEDIDO" @click="activateCallback('2')" />
                      <div class="flex justify-center mt-auto">
                        <NuxtLink to="/" class="hover:underline font-bold">Continuar comprando</NuxtLink>
                      </div>
                    </div>
                    </template>
                  </Card>
                </div>
              </div>
            </StepPanel>
        <StepPanel v-slot="{ activateCallback }" value="2">
         
          <div class="grid place-items-center">
                <Card class="card-center bg-white-400 w-[600px] h-[150px]">
                  <template #content>
                    <p class="ml-40">Você está logado?</p>
                    <NuxtLink to="/login" class="ml-40 hover:underline font-bold">Entrar </NuxtLink>
                    <br>
                    <br>
                    <Button class="ml-40 bg-yellow-400 text-black font-semibold py-2" label="CONTINUAR PEDIDO" @click="activateCallback('3')" />
                    
                  </template>
                </Card>

          </div>      
               

        </StepPanel>     
      
        <StepPanel v-slot="{ activateCallback }" value="3">
          
                
            <div class="flex mt-2 ml-5">
                
                <Card class="card-left bg-white-200 w-[600px]">
    
                  <template #content>
                    <h2 class="font-semibold" style="margin-bottom: 15px" >ENVIO DE ANÁLISE</h2>
                    <div v-if="cart.length">
                      <table class="w-full table-auto">
                        <thead>
                          <th></th>
                          <th></th>
                          <th></th>
                          <th class="th">Quantidade</th>
                          <th></th>
                          <th class="th">Preço</th>
                          <th></th>
                       </thead>
                      
                     
                        <tbody>
                          
                          <tr v-for="product in cart" :key="product.id" class="border-b">
                          
                            <td class="td"><img :src="product.image" class="product-image" /></td>
                            <td class="td" >{{ product.name }}</td>
                            <td class="td text-red-500 text-xs" style="font-size:11px;" >{{ product.prescription }}</td>
                            <td class="td">{{ product.quantity }}</td>
                            <td class="td">
                              
                              <button @click="() => addToCart(product)" class="text-orange-500 button-icons">
                                <i class="pi pi-plus"></i>
                              </button>
                              <button @click="() => removeProduct(product.id)" class="text-orange-500 button-icons">
                               
                                <i class=" pi pi-minus"></i>
                              </button>
                              
                            </td>
                            <td class="td">R$ {{ product.valueTo.toFixed(2) }}</td>
                            
                           
                            <td class="td">
                              <button @click="() => removeProduct(product.id)" class="text-blue-500">
                                <i class="pi pi-trash"></i>
                              </button>
                            </td>
                           
                          </tr>
                         
                        </tbody>
                      </table>
                    </div>
                    <div v-else>
                      <p>O carrinho está vazio</p>
                    </div>
                  </template>
                </Card>
                <div class="flex flex-col flex-grow gap-4 ml-5">
                  <Card class="card bg-white-100">
                    <template #title>
                      <h2 class="font-semibold">RESUMO</h2>
                    </template>
                    <template #content>
                      <div class="card-content">
                        <fieldset>
                          <div class="flex justify-between">
                            <p class="text-left">Valor dos produtos:</p>
                            <span class="ml-auto text-right font-semibold">R$ {{ totalProductValue }}</span>
                          </div>
                          <Divider />
                          <div class="flex justify-between">
                            <p class="text-left">Frete:</p>
                            <span class="ml-auto text-right font-semibold">R$ 12,00</span>
                          </div>
                          <Divider />
                          <div class="flex justify-between">
                            <p class="text-left">Total:</p>
                            <span class="ml-auto text-right font-semibold">R$ {{ totalValue }}</span>
                          </div>
                        </fieldset>
                      </div>
                    </template>
                  </Card>




                  <Card class="card-second bg-white">
                    <template #content>
                      <div class="card-content flex flex-col h-full justify-end">
                        <Button class="mt-auto bg-yellow-400 text-black font-semibold py-2" label="CONTINUAR PEDIDO" @click="activateCallback('4')" />
                      <div class="flex justify-center mt-auto">
                        <NuxtLink to="/" class="hover:underline font-bold">Continuar comprando</NuxtLink>
                      </div>
                    </div>
                    </template>
                  </Card>
                </div>
              </div>

              <div class="flex justify-between items-center">

                <Card class="card-pescription bg-white w-full">
                  <template #content>
                    <div class="flex items-center justify-between space-x-4">
                    
                      <p class="flex-shrink-0">Adicione a prescrição dos remédios:</p>

                  
                      <div class="flex-shrink-0"> <!--Componente de upload de arquivo prescrição-->
                        <Toast />
                        <FileUpload
                          mode="basic"
                          name="demo[]"
                          url="/api/upload"
                          accept="image/*"
                          :maxFileSize="1000000"
                          @upload="onUpload"
                          :auto="true"
                          chooseLabel="Enviar"
                        />
                      </div>
                    </div>
                  </template>
                </Card>

</div>





        </StepPanel>
    
        <StepPanel v-slot="{ activateCallback }" value="4">
          <div class="flex mt-2 ml-5">
                
            <Card class="card-left bg-white-200 w-[600px] h-[300px]">
                  <template #content>
                
                    <Listbox 
                      v-model="pagamentos" 
                      :options="packages" 
                      optionLabel="name" 
                      class="w-full h-full "/>  
                  </template>
                </Card>

                          


                
                <div class="flex flex-col flex-grow gap-4 ml-5">
                  <Card class="card bg-white-100">
                    <template #title>
                      <h2 class="font-semibold">RESUMO</h2>
                    </template>
                    <template #content>
                      <div class="card-content">
                        <fieldset>
                          <div class="flex justify-between">
                            <p class="text-left">Valor dos produtos:</p>
                            <span class="ml-auto text-right font-semibold">R$ {{ totalProductValue }}</span>
                          </div>
                          <Divider />
                          <div class="flex justify-between">
                            <p class="text-left">Frete:</p>
                            <span class="ml-auto text-right font-semibold">R$ 12,00</span>
                          </div>
                          <Divider />
                          <div class="flex justify-between">
                            <p class="text-left">Total:</p>
                            <span class="ml-auto text-right font-semibold">R$ {{ totalValue }}</span>
                          </div>
                        </fieldset>
                      </div>
                    </template>
                  </Card>
                  <Card class="card-second bg-white">
                    <template #content>
                      <div class="card-content flex flex-col h-full justify-end">
                        <Button class="mt-auto bg-yellow-400 text-black font-semibold py-2" label="CONFIRMAR PEDIDO" @click="activateCallback('5')" />
                      <div class="flex justify-center mt-auto">
                        <NuxtLink to="/" class="hover:underline font-bold">Continuar comprando</NuxtLink>
                      </div>
                    </div>
                    </template>
                  </Card>
                </div>
              </div>
            

        </StepPanel>
                    <StepPanel v-slot="{ activateCallback }" value="5">
              <div class="flex flex-col items-center justify-start min-h-screen bg-gray-50 pt-8">
                <div class="bg-white rounded-lg shadow-md p-8 max-w-md text-center">
                  <h1 class="text-2xl font-bold mb-4">Compra realizada com sucesso!</h1>
                  <div class="flex justify-center my-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                    </svg>
                  </div>
                  <p class="text-gray-600 mb-8">Em breve você receberá em seu e-mail os detalhes referente ao pagamento e entrega.</p>
                  
                  <div class="flex justify-center space-x-4">
                    <NuxtLink to="/"class="bg-yellow-400 hover:bg-yellow-500 text-black font-semibold py-2 px-4 rounded">
                      Continuar comprando
                    </NuxtLink>
                    <button class="border border-gray-400 text-gray-800 font-semibold py-2 px-4 rounded hover:bg-gray-100">
                      Ver resumo do pedido
                    </button>
                  </div>
                </div>
              </div>
</StepPanel>



    </StepPanels>
      </Stepper>
    </div>
  </div>

  </div> 
</template>

<script setup>
  import Button from 'primevue/button';
  import { useToast } from "primevue/usetoast";
  import { computed } from 'vue';
  const {cart, products, removeProduct, addToCart} = useCart();
  const totalProductValue = computed(() => {
  return cart.reduce((total, product) => total + (product.valueTo * product.quantity), 0).toFixed(2)
})

const totalValue = computed(() => {
  // frete fixo de R$ 12,00
  const shippingCost = 12.00
  return (parseFloat(totalProductValue.value) + shippingCost).toFixed(2)
})

const toast = useToast();

const onUpload = () => {
    toast.add({ severity: 'info', summary: 'Success', detail: 'File Uploaded', life: 3000 });
};

const pagamentos = ref();
const packages = ref([
    { name: 'PIX', code: 'PX' },
    { name: 'CARTÃO DE CRÉDITO', code: 'CDC' },
    { name: 'DINHEIRO', code: 'DD' },
    { name: 'BITCOIN', code: 'BIT' },
    { name: 'EURO', code: 'ER' },
    { name: 'V-BUCKS', code: 'VB' },
    { name: 'RIOT-POINTS', code: 'RP' },
    { name: 'VALORANT POINTS', code: 'VP' }
]);

</script>

<style scoped>

.card {
  @apply w-80 p-4 rounded-lg shadow-md;
}

.card-second {
  @apply w-80 p-4 rounded-lg shadow-md;
}
.card-pescription {
  
  @apply w-[600px] p-4 rounded-lg shadow-md;
  margin-top: 20px;
  margin-left: 20px;
  height: 100px;
  padding-inline-start: 30px;
}


.card-content {
  @apply flex flex-col gap-2 h-full;
}

.card-left {
  border: 1px solid #ddd;
  border-radius: 8px;
  padding: 16px;
}

.cart-item {
  display: flex;
  justify-content: space-between;
  align-items: center;
  margin-bottom: 8px;
}
.th{
  font-weight: normal;
  color: black;
  font-size: small;
  
}

.td{

  
  text-align: center;
  width: 200px;
  padding-top: 10px;
  padding-bottom: 10px;
}

.product-image {
  width: auto; 
  height: auto; 
}

.button-icons {
  display: flex;
  flex-direction: column; 
  align-items: center; 
}

.button-icons i {
  margin: 0px 0; 
}
.border-b {
    border-bottom: 1px solid #ddd; 
  }
  
.th-vertical {
    writing-mode: vertical-rl;
    transform: rotate(180deg);
    text-align: center;
  }
</style>
