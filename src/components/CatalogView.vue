<template>
  <div>
    <h1>Каталог антикваріату</h1>
    <div class="grid">
      <div v-for="item in catalog" :key="item.id" class="card">
        <img :src="item.image" :alt="item.title" class="card-img">
        <h3>{{ item.title }}</h3>
        <p>{{ item.description }}</p>
        <span class="price">{{ item.price }} грн</span>
      </div>
    </div>
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
        // Make the HTTP request to get the products data
        const response = await fetch('http://localhost/Antique-shop/php/products.php'); // Update with your server path

        // Check if the response is OK (status 200)
        if (!response.ok) {
          throw new Error('Failed to fetch data');
        }

        // Parse the JSON response data
        const productsData = await response.json();

        // Assign the fetched products to the catalog array
        this.catalog = productsData;
      } catch (error) {
        console.error('Error fetching catalog:', error);
      }
    }
  }
};
</script>

<style>
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
</style>
