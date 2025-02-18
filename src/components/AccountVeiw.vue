<template>
  <div class="account-container">
    <div class="account-box">
      <h2>Особистий кабінет</h2>
      <div class="account-info">
        <p><strong>Ім'я користувача:</strong> {{ user.name }}</p>
        <p><strong>Email:</strong> {{ user.email }}</p>
        <p><strong>Дата реєстрації:</strong> {{ user.registrationDate }}</p>
      </div>
      <div class="account-actions">
        <button @click="logout">Вийти</button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      user: {
        name: "Іван Іванов", // Отримуєте з сервера після логіну
        email: "ivan@example.com", // Отримуєте з сервера після логіну
        registrationDate: "2025-02-01", // Отримуєте з сервера після логіну
      },
    };
  },
  methods: {
    logout() {
      // Логіка для виходу з кабінету, видалення даних з localStorage
      localStorage.removeItem("user_id");
      this.$router.push({ name: "login" }); // Перенаправлення на сторінку логіну
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
