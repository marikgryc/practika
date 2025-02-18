<template>
    <div class="cart-container">
      <h1>Кошик</h1>
  
      <div v-if="cart.length > 0">
        <div v-for="(item, index) in cart" :key="index" class="cart-item">
          <img :src="item.image" :alt="item.name" class="cart-image" />
          <div class="cart-details">
            <h2>{{ item.name }}</h2>
            <p>Ціна: {{ item.price }} грн</p>
            <div class="quantity-controls">
              <button @click="decreaseQuantity(index)">-</button>
              <span>{{ item.quantity }}</span>
              <button @click="increaseQuantity(index)">+</button>
            </div>
            <button class="remove-button" @click="removeFromCart(index)">Видалити</button>
          </div>
        </div>
  
        <h2>Загальна сума: {{ totalPrice }} грн</h2>
        <button class="clear-cart" @click="clearCart">Очистити кошик</button>
        <button class="checkout">Оформити замовлення</button>
      </div>
  
      <p v-else>Кошик порожній</p>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        cart: JSON.parse(localStorage.getItem("cart")) || [],
      };
    },
    computed: {
      totalPrice() {
        return this.cart.reduce((sum, item) => sum + item.price * item.quantity, 0);
      },
    },
    methods: {
      increaseQuantity(index) {
        this.cart[index].quantity++;
        this.saveCart();
      },
      decreaseQuantity(index) {
        if (this.cart[index].quantity > 1) {
          this.cart[index].quantity--;
        } else {
          this.removeFromCart(index);
        }
        this.saveCart();
      },
      removeFromCart(index) {
        this.cart.splice(index, 1);
        this.saveCart();
      },
      clearCart() {
        this.cart = [];
        this.saveCart();
      },
      saveCart() {
        localStorage.setItem("cart", JSON.stringify(this.cart));
      },
    },
  };
  </script>
  
  <style scoped>
  .cart-container {
    padding: 20px;
  }
  
  .cart-item {
    display: flex;
    align-items: center;
    border-bottom: 1px solid #ccc;
    padding: 10px;
  }
  
  .cart-image {
    width: 100px;
    height: auto;
    margin-right: 20px;
  }
  
  .cart-details {
    flex-grow: 1;
  }
  
  .quantity-controls {
    display: flex;
    align-items: center;
  }
  
  .quantity-controls button {
    width: 30px;
    height: 30px;
    font-size: 18px;
    border: none;
    background-color: #6a11cb;
    color: white;
    cursor: pointer;
    margin: 0 5px;
  }
  
  .remove-button, .clear-cart, .checkout {
    background-color: #ff4d4d;
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
    margin-top: 10px;
  }
  
  .clear-cart {
    background-color: #ff9900;
  }
  
  .checkout {
    background-color: #28a745;
  }
  </style>
  