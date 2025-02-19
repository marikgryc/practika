<template>
    <div class="reviews-container">
      <h2>Відгуки про товари</h2>
  
      <form @submit.prevent="addReview" class="review-form">
        <label>Ваше ім'я:</label>
        <input v-model="clientName" type="text" required />
  
        <label>Оберіть товар:</label>
        <select v-model="selectedProductId" required>
          <option v-for="product in products" :key="product.id" :value="product.id">
            {{ product.title }}
          </option>
        </select>
  
        <label>Ваш відгук:</label>
        <textarea v-model="reviewText" required></textarea>
  
        <button type="submit">Додати відгук</button>
      </form>
  
      <div v-if="reviews.length" class="reviews-list">
        <div v-for="review in reviews" :key="review.review_Id" class="review-card">
          <h3>{{ review.client_name }} про "{{ review.product_name }}"</h3>
          <p>{{ review.review_desc }}</p>
          <small>{{ new Date(review.review_date).toLocaleDateString() }}</small>
        </div>
      </div>
      <p v-else>Немає відгуків. Будьте першим!</p>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        reviews: [],
        products: [],
        clientName: "",
        selectedProductId: null,
        reviewText: "",
      };
    },
    methods: {
      async fetchReviews() {
        try {
            const response = await fetch("http://localhost/Antique-shop/php/reviews.php");
            this.reviews = await response.json();
        } catch (error) {
            console.error("Помилка завантаження відгуків:", error);
        }
      },
      
      async fetchProducts() {
        try {
            const response = await fetch("http://localhost/Antique-shop/php/products.php");
            this.products = await response.json();
        } catch (error) {
            console.error("Помилка завантаження товарів:", error);
        }
      },
        
      async addReview() {
        if (!this.clientName || !this.selectedProductId || !this.reviewText) {
          alert("Будь ласка, заповніть всі поля!");
          return;
        }
  
        const reviewData = {
          client_name: this.clientName,
          product_ID: this.selectedProductId,
          review_desc: this.reviewText,
        };
  
        try {
          const response = await fetch("http://localhost/Antique-shop/php/reviews.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(reviewData),
          });
  
          const result = await response.json();
          alert(result.message);
          if (result.success) {
            this.clientName = "";
            this.reviewText = "";
            this.selectedProductId = null;
            this.fetchReviews(); 
          }
        } catch (error) {
          console.error("Помилка при додаванні відгуку:", error);
        }
      },
    },
    mounted() {
      this.fetchReviews();
      this.fetchProducts();
    },
  };
  </script>

  
  <style scoped>
  .reviews-container {
    max-width: 800px;
    margin: auto;
    text-align: center;
  }
  
  .review-form {
    display: flex;
    flex-direction: column;
    gap: 10px;
    padding: 15px;
    background: #f9f9f9;
    border-radius: 8px;
  }
  
  .review-form input,
  .review-form select,
  .review-form textarea {
    width: 100%;
    padding: 8px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }
  
  .review-form button {
    padding: 10px;
    background: #5a3826;
    color: white;
    border: none;
    cursor: pointer;
  }
  
  .review-form button:hover {
    background: #41291b;
  }
  
  .reviews-list {
    margin-top: 20px;
  }
  
  .review-card {
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 10px;
    margin-bottom: 10px;
  }
  
  .review-card h3 {
    margin: 0;
    font-size: 1.2rem;
  }
  
  .review-card p {
    margin: 5px 0;
  }
  
  .review-card small {
    color: gray;
  }
  </style>
  