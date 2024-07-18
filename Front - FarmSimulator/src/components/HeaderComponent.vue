<template>
    <header>
      <h1>Meu Projeto Vue</h1>
      <nav>
        <router-link to="/">Início</router-link>
        <router-link to="/login">Login</router-link>
      </nav>
    </header>
  </template>
  
  <script>
  export default {
    name: 'HeaderComponent',
  };
  </script>
  
  <style scoped>
  header {
    background-color: #4CAF50;
    color: white;
    padding: 20px;
    text-align: center;
  }
  nav {
    margin: 10px 0;
  }
  nav a {
    color: white;
    margin: 0 15px;
    text-decoration: none;
  }
  nav a:hover {
    text-decoration: underline;
  }
  </style>
  