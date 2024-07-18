<template>
    <div class="login-container">
      <p class = "text">JÁ TEM UMA CONTA?</p>
      <p class = "text2">Informe os seus dados abaixo para acessá-la.</p>
      <form @submit.prevent="handleSubmit">
        <div>
          <input type="text" id="Email" v-model="username" required placeholder="Email">
        </div>
        <div>
          <input type="password" id="password" v-model="password" required placeholder="Senha">
        </div>
        <div class="checkbox-container">
        <label class="checkbox-label">
          <input type="checkbox" id="credenciais" class="checkbox-input">
          Lembrar minhas credenciais
        </label>
      </div>
        <button type="submit">ACESSAR CONTA</button>
      </form>
      <a href="https://exemplo.com" class= "text3">Esqueci minha senha</a> 
    </div>
  </template>
  
  <script>
  export default {
    name: 'LoginComponent',
    data() {
      return {
        username: '',
        password: ''
      };
    },
    methods: {
      handleSubmit() {
        // Lógica para lidar com o login
        console.log(`Username: ${this.username}, Password: ${this.password}`);
      }
    }
  };
  </script>
  
  <style scoped>
  .login-container {
      width: 480px; /* Largura fixa de 480 pixels */
      max-height: 310px; /* Altura máxima de 310 pixels */
      padding: 20px;
      border: 1px solid #ccc;
      border-radius: 10px;
      background-color: #fff;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Sombra suave opcional */
      margin-top: 10px; /* Margem superior ajustada conforme necessário */
      margin-left: 228px;
    }
  .text {
    font-weight: bold;
    font-size: 20px;
    margin-bottom: 12px;
  }
  .text2 {
    font-weight: normal;
    font-size: 14px;
    margin-bottom: 12px;

  }
  .text3 {
      font-weight: normal; 
      font-size: 14px;
      display: block; 
      text-align: center; 
      margin: auto; 
      text-decoration: none; 
    }
  form div {
    margin-bottom: 12px;
  }
  label {
    display: block;
    margin-bottom: 12px;
  }
  input {
    width: 100%;
    padding: 8px;
    box-sizing: border-box;
    border-radius: 5px;
    border: 1px solid #ccc;
  }
  .checkbox-container {
    display: flex;
    align-items: center;
    margin-bottom: 12px;
}
  .checkbox-input{
    width: 10px; 
    height: 10px; 
    margin-right: 2px; 
  }
  .checkbox-label{
    font-size: 14px;    
  }
  button {
    width: 100%;
    padding: 10px;
    background-color: #FEE17B;
    font-weight: bold;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
  button:hover {
    background-color: #FEE17B;
  }
  </style>
  