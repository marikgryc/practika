<template>
    <div class="account-container">
      <h2>Особистий кабінет</h2>
      <p>Вітаємо {{ username }}!</p>
      
      <div class="user-info">
        <p><strong>Email:</strong> {{ email }}</p>
        <p><strong>ID:</strong> {{ userId }}</p>
      </div>
  
      <button @click="logout" class="logout-btn">Вийти</button>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        userId: null,
        username: "",
        email: "",
      };
    },
    mounted() {
      this.checkSession();
    },
    methods: {
      checkSession() {
        const userData = JSON.parse(localStorage.getItem("user_data"));
  
        if (!userData || !userData.user_id) {
          this.$router.push("/auth"); 
        } else {
          this.userId = userData.user_id;
          this.username = userData.username;
          this.email = userData.email;
        }
      },
      logout() {
        localStorage.removeItem("user_data"); 
        this.$router.push("/auth"); 
      },
    },
  };
  </script>
  
  <style scoped>
  .account-container {
    max-width: 600px;
    margin: 50px auto;
    background: white;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    text-align: center;
  }
  
  h2 {
    color: #333;
  }
  
  .user-info {
    background: #f8f8f8;
    padding: 15px;
    border-radius: 8px;
    margin: 20px 0;
  }
  
  .user-info p {
    margin: 5px 0;
  }
  
  .logout-btn {
    background: #5a3826;
    color: white;
    padding: 10px 15px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
  }
  
  .logout-btn:hover {
    background: #c9302c;
  }
  </style>
  