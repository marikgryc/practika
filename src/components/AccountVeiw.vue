<template>
    <div class="account-container">
      <div class="account-box">
        <h2>Особистий кабінет</h2>
        <p>Ім'я користувача: {{ user.username }}</p>
        <p>Email: {{ user.email }}</p>
  
        <button @click="logout">Вийти</button>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        user: {
          username: "",
          email: "",
        },
      };
    },
    created() {
      const userId = localStorage.getItem("user_id");
  
      if (!userId) {
        this.$router.push({ name: "login" }); 
      }
  
      this.fetchUserData(userId);
    },
    methods: {
      async fetchUserData(userId) {
        try {
          const response = await fetch(`http://localhost/Antique-shop/php/getUserData.php?id=${userId}`);
          const data = await response.json();
  
          if (data.success) {
            this.user.username = data.username;
            this.user.email = data.email;
          } else {
            alert(data.message);
          }
        } catch (error) {
          console.error("Помилка при отриманні даних користувача:", error);
        }
      },
      logout() {
        localStorage.removeItem("user_id"); 
        this.$router.push({ name: "login" }); 
      },
    },
  };
  </script>
  
  <style scoped>
.account-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background: #f7f7f7;
}

.account-box {
  background: white;
  padding: 2rem;
  border-radius: 10px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
  text-align: center;
  max-width: 400px;
  width: 100%;
  color: #333;
}

h2 {
  font-size: 2rem;
  margin-bottom: 20px;
}

.account-info {
  margin-bottom: 30px;
  font-size: 1rem;
  line-height: 1.5;
}

.account-info p {
  margin-bottom: 10px;
}

.account-actions {
  display: flex;
  justify-content: center;
}

button {
  background: #2049d0;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 5px;
  font-size: 16px;
  cursor: pointer;
  transition: all 0.3s ease;
  font-weight: bold;
}

button:hover {
  background: #163bb5;
}

button:active {
  background: #102a87;
  transform: scale(0.98);
}
</style>
  