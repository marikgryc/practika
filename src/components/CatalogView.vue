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
        catalog: [
          { id: 1, title: "Старовинний годинник", description: "XIX століття, Франція", price: 5000, image: require('@/assets/godini.png') },
          { id: 2, title: "Срібна ложка", description: "XVIII століття, Англія", price: 1200, image: require("@/assets/loshka.jpg") },
          { id: 3, title: "Картина маслом", description: "Початок XX століття", price: 8000, image: require("@/assets/kartina.jpg") }
        ]
      };
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
  