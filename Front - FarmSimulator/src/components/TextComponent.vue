<template>
    <div class="container">
      <b>NOVO?</b>
      <p>Criar uma conta é fácil! Informe seus dados e uma senha para aproveitar todos os benefícios de ter uma conta</p>
      <button class="button" @click="handleSignUp">CADASTRE-SE</button>
    </div>
  </template>
  
  <script>
  export default {
    name: 'FormattedDiv',
    methods: {
      handleSignUp() {
        // Lógica botão cadastro para redirecionar para pagina de registro
        console.log('Botão de cadastro clicado!');
        
      }
    }
  };
  </script>
  
  <style scoped>
  .container {
    font-family: Arial, sans-serif;
    max-height: 166px;
    max-width: 480px;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    text-align: center;
    margin-top: 10px;
    margin-left: 24;
  }
  
  .container b {
    display: block;
    font-size: 20px;
    font-weight: bold;
    margin-bottom: 10px;
  }
  
  .container p {
    font-size: 14px;
    margin-bottom: 20px;
  }
  
  .button {
    padding: 10px 150px;
    font-size: 16px;
    font-weight: bold;
    color: black;
    background-color: #FEE17B;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    white-space: nowrap;
  }
  
  .button:hover {
    background-color: darkgoldenrod;
  }
  </style>
  