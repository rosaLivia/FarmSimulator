<template>
    <div>
      <main :class="'distance-view'">
        <div class="content">
          <LoginComponent/>
          <TextComponent/>
        </div>
      </main>
    </div>
  </template>
  <script>
  import LoginComponent from '@/components/LoginComponent.vue'
  import TextComponent from '@/components/TextComponent.vue'
  
  export default {
    name: 'LoginView',
    components: {
      LoginComponent,
      TextComponent,
    }
  }
  </script>
  
  <style scoped>
  .distance-view {
    padding: 40px;
  }
  
  .content {
    display: grid;
    grid-template-columns: 1fr 1fr; /* duas colunas de tamanho igual */
    gap: 20px;
  }
  </style>
  