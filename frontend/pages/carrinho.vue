<template>

<div class="md:container md:mx-auto"> 
  <div class="flex flex-col items-center mt-3 flex-grow">
    <div class="justify-center mb-5">
      <Stepper v-model:activeStep="activeStep" class="basis-[50rem]">
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
                    <p>Informações adicionais ou outro conteúdo pode ir aqui.</p>
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
                          <p>Valor dos produtos: <span class="font-semibold">R$ 3250,00</span></p>
                          <Divider /> 
                          <p>Frete: <span class="font-semibold">R$ 12,00</span></p>
                          <Divider />
                          <p>Total: <span class="font-semibold">R$ 3262,00</span></p>
                        </fieldset>
                      </div>
                    </template>
                  </Card>
                  <Card class="card-second bg-white">
                    <template #content>
                      <div class="card-content flex flex-col h-full justify-end">
                        <Button class="mt-auto bg-yellow-400 text-black font-semibold py-2" label="CONTINUAR PEDIDO" @click="activateCallback('2')" />
                        <p class="text-center mt-2">Continuar comprando</p>
                      </div>
                    </template>
                  </Card>
                </div>
              </div>
            
            
        </StepPanel>
        <StepPanel v-slot="{ activateCallback }" value="2">
          <div class="flex mt-2 ml-5">
                
                <Card class="card-left bg-white-200 w-[600px]">
                  <template #content>
                    <p>Informações adicionais ou outro conteúdo pode ir aqui.</p>
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
                          <p>Valor dos produtos: <span class="font-semibold">R$ 3250,00</span></p>
                          <Divider /> 
                          <p>Frete: <span class="font-semibold">R$ 12,00</span></p>
                          <Divider />
                          <p>Total: <span class="font-semibold">R$ 3262,00</span></p>
                        </fieldset>
                      </div>
                    </template>
                  </Card>
                  <Card class="card-second bg-white">
                    <template #content>
                      <div class="card-content flex flex-col h-full justify-end">
                        <Button class="mt-auto bg-yellow-400 text-black font-semibold py-2" label="CONTINUAR PEDIDO" @click="activateCallback('3')" />
                        <p class="text-center mt-2">Continuar comprando</p>
                      </div>
                    </template>
                  </Card>
                </div>
              </div>
            

        </StepPanel>     
      
        <StepPanel v-slot="{ activateCallback }" value="3">
          <div class="flex mt-2 ml-5">
                
                <Card class="card-left bg-white-200 w-[600px]">
                  <template #content>
                    <p>Informações adicionais ou outro conteúdo pode ir aqui.</p>
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
                          <p>Valor dos produtos: <span class="font-semibold">R$ 3250,00</span></p>
                          <Divider /> 
                          <p>Frete: <span class="font-semibold">R$ 12,00</span></p>
                          <Divider />
                          <p>Total: <span class="font-semibold">R$ 3262,00</span></p>
                        </fieldset>
                      </div>
                    </template>
                  </Card>
                  <Card class="card-second bg-white">
                    <template #content>
                      <div class="card-content flex flex-col h-full justify-end">
                        <Button class="mt-auto bg-yellow-400 text-black font-semibold py-2" label="CONTINUAR PEDIDO" @click="activateCallback('4')" />
                        <p class="text-center mt-2">Continuar comprando</p>
                      </div>
                    </template>
                  </Card>
                </div>
              </div>
            

        </StepPanel>
    
        <StepPanel v-slot="{ activateCallback }" value="4">
          <div class="flex mt-2 ml-5">
                
                <Card class="card-left bg-white-200 w-[600px]">
                  <template #content>
                    <p>Informações adicionais ou outro conteúdo pode ir aqui.</p>
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
                          <p>Valor dos produtos: <span class="font-semibold">R$ 3250,00</span></p>
                          <Divider /> 
                          <p>Frete: <span class="font-semibold">R$ 12,00</span></p>
                          <Divider />
                          <p>Total: <span class="font-semibold">R$ 3262,00</span></p>
                        </fieldset>
                      </div>
                    </template>
                  </Card>
                  <Card class="card-second bg-white">
                    <template #content>
                      <div class="card-content flex flex-col h-full justify-end">
                        <Button class="mt-auto bg-yellow-400 text-black font-semibold py-2" label="CONTINUAR PEDIDO" @click="activateCallback('5')" />
                        <p class="text-center mt-2">Continuar comprando</p>
                      </div>
                    </template>
                  </Card>
                </div>
              </div>
            

        </StepPanel>
        <StepPanel v-slot="{ activateCallback }" value="5">
          <div class="flex mt-2 ml-5">
                
                <Card class="card-left bg-white-200 w-[600px]">
                  <template #content>
                    <p>conteúdo compra</p>
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
                          <p>Valor dos produtos: <span class="font-semibold">R$ 3250,00</span></p>
                          <Divider /> 
                          <p>Frete: <span class="font-semibold">R$ 12,00</span></p>
                          <Divider />
                          <p>Total: <span class="font-semibold">R$ 3262,00</span></p>
                        </fieldset>
                      </div>
                    </template>
                  </Card>
                  <Card class="card-second bg-white">
                    <template #content>
                      <div class="card-content flex flex-col h-full justify-end">
                        <Button class="mt-auto bg-yellow-400 text-black font-semibold py-2" label="CONTINUAR PEDIDO" @click="activateCallback('1')" />
                        <p class="text-center mt-2">Continuar comprando</p>
                      </div>
                    </template>
                  </Card>
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

</script>

<style scoped>

.card {
  @apply w-80 p-4 rounded-lg shadow-md;
}

.card-second {
  @apply w-80 p-4 rounded-lg shadow-md;
}

.card-content {
  @apply flex flex-col gap-2 h-full;
}
</style>
