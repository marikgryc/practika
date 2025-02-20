<template>
    <div>
      <h2>Адмін-панель</h2>
  
      <!-- Кнопки для перегляду замовлень та клієнтів -->
      <div>
        <button @click="toggleOrders">Переглянути замовлення</button>
        <button @click="toggleClients">Переглянути клієнтів</button>
      </div>
  
      <!-- Форма додавання продукту -->
      <h3>Додати новий продукт</h3>
      <form @submit.prevent="addProduct">
        <!-- Форму додавання продукту залишаємо без змін -->
        <div>
          <label for="product_name">Назва продукту</label>
          <input type="text" v-model="product.product_name" required />
        </div>
        <div>
          <label for="product_category">Категорія</label>
          <input type="text" v-model="product.product_category" required />
        </div>
        <div>
          <label for="product_author">Автор</label>
          <input type="text" v-model="product.product_author" required />
        </div>
        <div>
          <label for="product_material">Матеріал</label>
          <input type="text" v-model="product.product_material" required />
        </div>
        <div>
          <label for="product_price">Ціна</label>
          <input type="text" v-model="product.product_price" required />
        </div>
        <div>
          <label for="product_quanity">Кількість</label>
          <input type="number" v-model="product.product_quanity" required />
        </div>
        <div>
          <label for="from_era">Епоха</label>
          <input type="text" v-model="product.from_era" required />
        </div>
        <div>
          <label for="product_state">Стан продукту</label>
          <input type="text" v-model="product.product_state" required />
        </div>
        <div>
          <label for="image_filename">Назва зображення</label>
          <input type="text" v-model="product.image_filename" required />
        </div>
        <button type="submit">Додати продукт</button>
      </form>
  
      <!-- Таблиця замовлень (показується за натисканням на кнопку) -->
      <div v-if="showOrders">
        <h3>Замовлення</h3>
        <table>
          <thead>
            <tr>
              <th>ID замовлення</th>
              <th>Продукт</th>
              <th>Клієнт</th>
              <th>Дата замовлення</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="order in orders" :key="order.order_ID">
              <td>{{ order.order_ID }}</td>
              <td>{{ order.product_name }}</td>
              <td>{{ order.client_name }} {{ order.client_surname }}</td>
              <td>{{ order.order_day }}</td>
            </tr>
          </tbody>
        </table>
      </div>
  
      <!-- Таблиця клієнтів (показується за натисканням на кнопку) -->
      <div v-if="showClients">
        <h3>Клієнти</h3>
        <table>
          <thead>
            <tr>
              <th>ID клієнта</th>
              <th>Ім'я</th>
              <th>Прізвище</th>
              <th>Адреса</th>
              <th>Номер телефону</th>
            </tr>
          </thead>
          <tbody>
            <tr v-for="client in clients" :key="client.client_ID">
              <td>{{ client.client_ID }}</td>
              <td>{{ client.client_name }}</td>
              <td>{{ client.client_surname }}</td>
              <td>{{ client.client_address }}</td>
              <td>{{ client.client_number }}</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </template>
  
  <script>
  import axios from "axios";
  
  export default {
    data() {
      return {
        product: {
          product_name: "",
          product_category: "",
          product_author: "",
          product_material: "",
          product_price: "",
          product_quanity: "",
          from_era: "",
          product_state: "",
          image_filename: "",
        },
        showOrders: false,
        showClients: false,
        orders: [],
        clients: []
      };
    },
    methods: {
      // Перемикання для показу/приховування таблиці замовлень
      toggleOrders() {
        this.showOrders = !this.showOrders;
        this.showClients = false; // приховати таблицю клієнтів
        if (this.showOrders) {
          this.fetchOrders();
        }
      },
      // Перемикання для показу/приховування таблиці клієнтів
      toggleClients() {
        this.showClients = !this.showClients;
        this.showOrders = false; // приховати таблицю замовлень
        if (this.showClients) {
          this.fetchClients();
        }
      },
      // Завантаження замовлень з бази даних
      async fetchOrders() {
        try {
          const response = await axios.get("http://localhost/Antique-shop/php/get_orders.php");
          this.orders = response.data.orders;
        } catch (error) {
          console.error("Помилка завантаження замовлень:", error);
        }
      },
      // Завантаження клієнтів з бази даних
      async fetchClients() {
        try {
          const response = await axios.get("http://localhost/Antique-shop/php/get_clients.php");
          this.clients = response.data.clients;
        } catch (error) {
          console.error("Помилка завантаження клієнтів:", error);
        }
      },
      async addProduct() {
        try {
          const response = await axios.post("http://localhost/Antique-shop/php/add_product.php", this.product);
          const result = response.data;
          if (result.success) {
            alert("Продукт додано успішно!");
            this.clearForm();
          } else {
            alert("Помилка при додаванні продукту: " + result.message);
          }
        } catch (error) {
          console.error("Помилка запиту:", error);
          alert("Сталася помилка. Спробуйте ще раз.");
        }
      },
      clearForm() {
        this.product = {
          product_name: "",
          product_category: "",
          product_author: "",
          product_material: "",
          product_price: "",
          product_quanity: "",
          from_era: "",
          product_state: "",
          image_filename: "",
        };
      },
    },
  };
  </script>
  
  <style scoped>
  form {
    display: flex;
    flex-direction: column;
    gap: 15px;
    width: 300px;
    margin: 0 auto;
  }
  
  button {
    padding: 10px 20px;
    background-color: #5a3826;
    color: white;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
  
  button:hover {
    background-color: #3d2617;
  }
  
  table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
  }
  
  th, td {
    padding: 10px;
    border: 1px solid #ccc;
    text-align: center;
  }
  
  th {
    background-color: #f4f4f4;
  }
  </style>
  