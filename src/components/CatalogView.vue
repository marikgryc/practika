<template>
  <div>
    <h1>Каталог антикваріату</h1>

    <div class="grid">
      <div v-for="item in catalog" :key="item.id" class="card">
        <img :src="item.image" :alt="item.title" class="card-img">
        <h3>{{ item.title }}</h3>
        <p>{{ item.description }}</p>
        <span class="price">{{ item.price }} грн</span>
        <button @click="addToCart(item)">Додати в кошик</button>
      </div>
    </div>

    <router-link to="/cart" class="btn">Перейти в кошик </router-link>
    <router-link to="/" class="btn">Повернутись на головну</router-link>
  </div>
</template>

<script>
export default {
  data() {
    return {
      catalog: []
    };
  },
  created() {
    this.fetchCatalog();
  },
  methods: {
    async fetchCatalog() {
      try {
        const response = await fetch('http://localhost/Antique-shop/php/products.php');
        if (!response.ok) {
          throw new Error('Failed to fetch data');
        }
        const productsData = await response.json();
        this.catalog = productsData;
      } catch (error) {
        console.error('Помилка при завантаженні каталогу:', error);
      }
    },
    addToCart(product) {
      let cart = JSON.parse(localStorage.getItem("cart")) || [];
      let existingProduct = cart.find(item => item.id === product.id);

      if (existingProduct) {
        existingProduct.quantity++;
      } else {
        cart.push({ ...product, quantity: 1 });
      }

      localStorage.setItem("cart", JSON.stringify(cart));
      alert("Товар додано в кошик!");
    }
  }
};
</script>

<style scoped>
.grid {
  display: flex;
  gap: 1.5rem;
  justify-content: space-evenly;
  flex-wrap: wrap;
}

.card {
  background: white;
  padding: 1rem;
  border-radius: 8px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
  width: 250px;
  text-align: center;
}

.card-img {
  width: 100%;
  border-radius: 5px;
}

.price {
  display: block;
  font-weight: bold;
  margin-top: 10px;
}

button {
  background-color: #000000;
  color: white;
  border: none;
  padding: 10px;
  cursor: pointer;
  margin-top: 10px;
  border-radius: 5px;
}

button:hover {
  background-color: #2575fc;
}

.btn {
  display: inline-block;
  margin-top: 20px;
  padding: 10px 15px;
  background-color: #000000;
  color: white;
  text-decoration: none;
  border-radius: 5px;
}

.btn:hover {
  background-color: #2575fc;
}
</style>
