<template>
    <div class="account-container">
      <h2>Особистий кабінет</h2>
      <p>Вітаємо, ви успішно увійшли!</p>
      <button @click="logout">Вийти</button>
    </div>
  </template>
  
  <script>
  export default {
    methods: {
      logout() {
        localStorage.removeItem("user_id"); 
        this.$router.push("/auth"); 
      },
    },
  };
  </script>
  
  <style scoped>
  .account-container {
    text-align: center;
    padding: 50px;
  }
  </style>
  