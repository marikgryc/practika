<template>
    <div class="auth-container">
      <div class="auth-box">
        <div class="toggle-buttons">
          <button :class="{ active: isLogin }" @click="isLogin = true">Увійти</button>
          <button :class="{ active: !isLogin }" @click="isLogin = false">Реєстрація</button>
        </div>
  
        <form v-if="isLogin" class="form" @submit.prevent="login">
          <h2>Вхід</h2>
          <input type="email" v-model="email" placeholder="Email" required />
          <input type="password" v-model="password" placeholder="Пароль" required />
          <button type="submit">Увійти</button>
        </form>
  
        <form v-else class="form" @submit.prevent="register">
          <h2>Реєстрація</h2>
          <input type="text" v-model="name" placeholder="Ім'я" required />
          <input type="email" v-model="email" placeholder="Email" required />
          <input type="password" v-model="password" placeholder="Пароль" required />
          <input type="password" v-model="confirmPassword" placeholder="Підтвердіть пароль" required />
          <button type="submit">Зареєструватися</button>
        </form>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        isLogin: true,
        name: "",
        email: "",
        password: "",
        confirmPassword: "",
      };
    },
    methods: {
      login() {
        if (!this.email || !this.password) {
          alert("Заповніть всі поля!");
          return;
        }
        alert(`Успішний вхід: ${this.email}`);
      },
      register() {
        if (!this.name || !this.email || !this.password || !this.confirmPassword) {
          alert("Заповніть всі поля!");
          return;
        }
        if (this.password !== this.confirmPassword) {
          alert("Паролі не співпадають!");
          return;
        }
        alert(`Акаунт створено: ${this.email}`);
      },
    },
  };
  </script>
  
  <style scoped>
.auth-container {
  display: flex;
  justify-content: center;
  align-items: first baseline;
  height: 100vh;
  background: linear-gradient(135deg, #ffffff, #f7f7f7);
}

.auth-box {
  background: white;
  padding: 2rem;
  border-radius: 10px;
  box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
  text-align: center;
  max-width: 400px;
  width: 100%;
}

.toggle-buttons {
  display: flex;
  justify-content: space-between;
  margin-bottom: 20px;
}

.toggle-buttons button {
  flex: 1;
  padding: 12px;
  border: none;
  background: none;
  font-size: 16px;
  cursor: pointer;
  font-weight: bold;
  border-bottom: 3px solid transparent;
  transition: all 0.3s ease;
  color: #333;
}

.toggle-buttons .active {
  color: #6a11cb;
  border-bottom: 3px solid #6a11cb;
}

.form {
  display: flex;
  flex-direction: column;
  gap: 20px;
}

input {
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 8px;
  font-size: 16px;
  transition: all 0.3s ease;
}

input:focus {
  border-color: #6a11cb;
  box-shadow: 0 0 8px rgba(106, 17, 203, 0.3);
}

button {
  background: #6a11cb;
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
  background: #2575fc;
}

button:active {
  background: #2049d0;
  transform: scale(0.98);
}

button:disabled {
  background: #ccc;
  cursor: not-allowed;
}

input::placeholder {
  color: #aaa;
}
</style>