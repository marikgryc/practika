<template>
  <div class="auth-container">
    <div class="auth-box">
      <div class="toggle-buttons">
        <button :class="{ active: isLogin }" @click="isLogin = true">Увійти</button>
        <button :class="{ active: !isLogin }" @click="isLogin = false">Реєстрація</button>
      </div>

      <!-- Форма входу -->
      <form v-if="isLogin" class="form" @submit.prevent="login">
        <h2>Вхід</h2>
        <input type="email" v-model="email" placeholder="Email" required autocomplete="email" />
        <input type="password" v-model="password" placeholder="Пароль" required autocomplete="current-password" />
        <button type="submit">Увійти</button>
      </form>

      <!-- Форма реєстрації -->
      <form v-else class="form" @submit.prevent="register">
        <h2>Реєстрація</h2>
        <input type="text" v-model="name" placeholder="Ім'я" required autocomplete="name" />
        <input type="email" v-model="email" placeholder="Email" required autocomplete="email" />
        <input type="password" v-model="password" placeholder="Пароль" required autocomplete="new-password" />
        <input type="password" v-model="confirmPassword" placeholder="Підтвердіть пароль" required autocomplete="new-password" />
        <button type="submit">Зареєструватися</button>
      </form>
    </div>
  </div>
</template>

<script>
import axios from "axios";

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
    async register() {
      if (!this.name || !this.email || !this.password || !this.confirmPassword) {
        alert("Заповніть всі поля!");
        return;
      }
      if (this.password !== this.confirmPassword) {
        alert("Паролі не співпадають!");
        return;
      }

      try {
        const response = await axios.post("http://localhost/Antique-shop/php/register.php", {
          name: this.name,
          email: this.email,
          password: this.password,
          role: "user", // Додаємо роль user за замовчуванням
        });

        const result = response.data;
        alert(result.message);

        if (result.success) {
          this.isLogin = true; 
        }
      } catch (error) {
        console.error("Помилка реєстрації:", error);
        alert("Сталася помилка. Спробуйте ще раз.");
      }
    },

    async login() {
  if (!this.email || !this.password) {
    alert("Заповніть всі поля!");
    return;
  }

  try {
    const response = await axios.post("http://localhost/Antique-shop/php/login.php", {
      email: this.email,
      password: this.password,
    });

    console.log("Отримана відповідь сервера:", response.data); // Додано для налагодження

    if (response.data.success) {
      alert("Вхід успішний!");

      localStorage.setItem("user_data", JSON.stringify({
        user_id: response.data.user_id,
        username: response.data.username,
        email: this.email,
        role: response.data.role, // Переконайтеся, що це не undefined
      }));

      this.$router.push("/account");
    } else {
      alert(response.data.message);
    }
  } catch (error) {
    console.error("Помилка входу:", error);
    alert("Сталася помилка. Спробуйте ще раз.");
  }

    },
  },
};
</script>
<style scoped>
.auth-container {
  display: flex;
  justify-content: center;
  align-items:first baseline;
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
  color: #000000;
}

.toggle-buttons .active {
  color: #000000;
  border-bottom: 3px solid #5a3826;
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
  background: #5a3826;
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
  background: #5a3826;
  color: white;
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