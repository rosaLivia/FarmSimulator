<template>
  <div id="app">
    <HeaderComponent />
    <router-view />
  </div>
</template>

<script>
import HeaderComponent from './components/HeaderComponent.vue';

export default {
  name: 'App',
  components: {
    HeaderComponent,
  },
};
</script>

<style>
/* Estilos globais */
body {
  font-family: Arial, sans-serif;
}
</style>
