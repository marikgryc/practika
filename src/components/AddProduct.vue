<template>
    <div class="add-product">
      <h2>Додати продукт</h2>
      <form @submit.prevent="addProduct">
        <input type="text" v-model="product.product_name" placeholder="Назва продукту" required />
        <input type="text" v-model="product.product_category" placeholder="Категорія продукту" required />
        <input type="text" v-model="product.product_author" placeholder="Автор" />
        <input type="text" v-model="product.product_material" placeholder="Матеріал" />
        <input type="text" v-model="product.from_era" placeholder="Ера" />
        <input type="text" v-model="product.product_state" placeholder="Стан продукту" />
        <input type="number" v-model="product.product_price" placeholder="Ціна" required />
        <input type="number" v-model="product.product_quanity" placeholder="Кількість" required />
        <input type="text" v-model="product.image_filename" placeholder="Назва зображення (наприклад, image.jpg)" />
        <button type="submit">Додати продукт</button>
      </form>
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
          from_era: "",
          product_state: "",
          product_price: "",
          product_quanity: "",
          image_filename: "",
        },
      };
    },
    methods: {
      async addProduct() {
        try {
          const response = await axios.post("http://localhost/Antique-shop/php/addProduct.php", this.product);
  
          const result = response.data;
          if (result.success) {
            alert(result.message);
            this.clearForm();  // Очищаємо форму після успішного додавання
          } else {
            alert(result.message);
          }
        } catch (error) {
          console.error("Помилка додавання продукту:", error);
          alert("Сталася помилка. Спробуйте ще раз.");
        }
      },
      clearForm() {
        this.product = {
          product_name: "",
          product_category: "",
          product_author: "",
          product_material: "",
          from_era: "",
          product_state: "",
          product_price: "",
          product_quanity: "",
          image_filename: "",
        };
      },
    },
  };
  </script>
  
  <style scoped>
  .add-product {
    display: flex;
    flex-direction: column;
    gap: 20px;
    width: 300px;
    margin: 0 auto;
  }
  
  input {
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 8px;
    font-size: 16px;
  }
  
  button {
    background: #5a3826;
    color: white;
    padding: 12px;
    border: none;
    border-radius: 5px;
    font-size: 16px;
    cursor: pointer;
    transition: all 0.3s ease;
  }
  
  button:hover {
    background: #6a442b;
  }
  </style>
  