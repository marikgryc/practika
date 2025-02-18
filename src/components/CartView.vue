<template>
  <div>
    <h1>Кошик</h1>

    <div v-if="cart.length > 0">
      <div v-for="item in cart" :key="item.id" class="cart-item">
        <img :src="item.image" :alt="item.title" class="cart-img">
        <div class="item-details">
          <h3>{{ item.title }}</h3>
          <p>Ціна: {{ item.price }} грн</p>
          <p>Кількість: 
            <button @click="decreaseQuantity(item)">-</button>
            {{ item.quantity }}
            <button @click="increaseQuantity(item)">+</button>
          </p>
          <button @click="removeFromCart(item)">Видалити</button>
        </div>
      </div>

      <h2>Загальна сума: {{ totalPrice }} грн</h2>
      <router-link to="/checkout" class="btn">Оформити замовлення</router-link>
    </div>

    <p v-else>Кошик порожній.</p>
    <router-link to="/catalog" class="btn">Повернутись до каталогу</router-link>
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
  border-bottom: 1px solid #ccc;
  padding: 10px;
}

.cart-img {
  width: 100px;
  height: auto;
  margin-right: 15px;
}

.item-details {
  flex-grow: 1;
}

button {
  margin-left: 10px;
  cursor: pointer;
}

.btn {
  display: inline-block;
  padding: 10px 15px;
  background-color: #000000;
  color: white;
  text-decoration: none;
  border-radius: 5px;
  margin-top: 20px;
}

.btn:hover {
  background-color: #2575fc;
}
</style>
