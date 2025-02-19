<template>
<div class="cart-container">
  <h1>Кошик</h1>

  <div v-if="cart.length > 0">
    <div v-for="item in cart" :key="item.id" class="cart-item">
      <img :src="item.image" :alt="item.title" class="cart-img">
      <div class="item-details">
        <h3>{{ item.title }}</h3>
        <p>Ціна: <strong>{{ item.price }} грн</strong></p>
        <div class="cart-buttons">
          <button @click="decreaseQuantity(item)">−</button>
          <span class="quantity">{{ item.quantity }}</span>
          <button @click="increaseQuantity(item)">+</button>
        </div>
        <button class="delete-button" @click="removeFromCart(item)">🗑 Видалити</button>
      </div>
    </div>

    <h2> Загальна сума: <strong>{{ totalPrice }} грн</strong></h2>
    <router-link to="/checkout" class="checkout-button"> Оформити замовлення</router-link>
  </div>

  <p v-else> Кошик порожній.</p>
  <router-link to="/catalog" class="btn"> Повернутись до каталогу</router-link>
</div>
</template>

<script>
export default {
  data() {
    return {
      cart: []
    };
  },
  computed: {
    totalPrice() {
      return this.cart.reduce((total, item) => total + item.price * item.quantity, 0);
    }
  },
  created() {
    this.loadCart();
  },
  methods: {
    loadCart() {
      this.cart = JSON.parse(localStorage.getItem("cart")) || [];
    },
    removeFromCart(item) {
      this.cart = this.cart.filter(i => i.id !== item.id);
      localStorage.setItem("cart", JSON.stringify(this.cart));
    },
    increaseQuantity(item) {
      item.quantity++;
      localStorage.setItem("cart", JSON.stringify(this.cart));
    },
    decreaseQuantity(item) {
      if (item.quantity > 1) {
        item.quantity--;
      } else {
        this.removeFromCart(item);
      }
      localStorage.setItem("cart", JSON.stringify(this.cart));
    }
  }
};
</script>

<style scoped>
.cart-item {
  display: flex;
  align-items: center;
  gap: 20px;
  padding: 20px;
  background: #ffffff;
  border-radius: 15px;
  box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.1);
  transition: transform 0.2s ease-in-out;
}

.cart-item:hover {
  transform: scale(1.02);
}

.cart-item img {
  width: 150px;
  height: auto;
  border-radius: 10px;
  object-fit: cover;
}

.item-details {
  flex: 1;
}

h1 {
  text-align: center;
  font-size: 2rem;
  color: #333;
}

h2 {
  text-align: left;
  color: #5a3826;
}

p {
  margin: 5px 0;
  color: #555;
  font-size: 1.1rem;
}

.cart-buttons {
  display: flex;
  align-items: center;
  gap: 10px;
  margin-top: 10px;
}

.cart-buttons button {
  background: #5a3826;
  color: white;
  border: none;
  padding: 10px 14px;
  border-radius: 8px;
  font-size: 1rem;
  font-weight: bold;
  transition: background 0.3s, transform 0.1s;
  box-shadow: 0px 3px 8px rgba(0, 0, 0, 0.2);
  cursor: pointer;
}

.cart-buttons button:hover {
  background: #000000;
}

.cart-buttons button:active {
  transform: scale(0.95);
}

.delete-button {
  background: #ff4d4d;
}

.delete-button:hover {
  background: #d63030;
}

.checkout-button {
  margin-top: 20px;
  background: #5a3826;
  color: white;
  padding: 15px 25px;
  border: none;
  cursor: pointer;
  border-radius: 10px;
  font-size: 1.2rem;
  font-weight: bold;
  transition: background 0.3s, transform 0.1s;
  box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
  text-align: center;
  display: inline-block;
  text-decoration: none;
}

.checkout-button:hover {
  background: #000000;
}

.checkout-button:active {
  transform: scale(0.98);
}

@media (max-width: 768px) {
  .cart-item {
    flex-direction: column;
    text-align: center;
  }

  .cart-item img {
    width: 100%;
    max-width: 200px;
  }

  .cart-buttons {
    justify-content: center;
  }
}
.btn {
  display: inline-block;
  margin-top: 20px;
  padding: 12px 20px;
  background: #5a3826;
  color: white;
  border: none;
  cursor: pointer;
  border-radius: 8px;
  font-size: 1.1rem;
  font-weight: bold;
  text-decoration: none;
  transition: background 0.3s, transform 0.1s;
  box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.2);
  text-align: center;
}

.btn:hover {
  background: #000000;
  color: #ffffff;
}

.btn:active {
  transform: scale(0.98);
}
</style>
