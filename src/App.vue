<template>
  <div id="app">
    <!-- Шапка з навігацією -->
    <header class="header">
      <div class="container">
        <h1 class="logo">Антикварний магазин</h1>
        <nav>
          <ul class="nav">
            <li><a href="#catalog">Каталог</a></li>
            <li><a href="#about">Про нас</a></li>
            <li><a href="#contacts">Контакти</a></li>
          </ul>
        </nav>
      </div>
    </header>

    <!-- Головний банер -->
    <section class="hero">
      <div class="container">
        <h2>Вітаємо в нашому антикварному магазині</h2>
        <p>Ексклюзивні предмети з історією та душею</p>
        <a href="#catalog" class="btn">Переглянути каталог</a>
      </div>
    </section>

    <!-- Розділ "Каталог" -->
    <section id="catalog" class="section">
      <div class="container">
        <h2>Каталог</h2>
        <div class="grid">
          <div v-for="item in catalog" :key="item.id" class="card">
            <img :src="item.image" :alt="item.title" class="card-img">
            <h3>{{ item.title }}</h3>
            <p>{{ item.description }}</p>
            <span class="price">{{ item.price }} грн</span>
          </div>
        </div>
      </div>
    </section>

    <!-- Розділ "Про нас" -->
    <section id="about" class="section about">
      <div class="container">
        <h2>Про нас</h2>
        <p>Ми спеціалізуємося на продажі унікальних антикварних предметів, кожен з яких має власну історію.</p>
      </div>
    </section>

    <!-- Розділ "Контакти" -->
    <section id="contacts" class="section contacts">
      <div class="container">
        <h2>Контакти</h2>
        <p>Зателефонуйте нам: <strong>+38 (099) 123-45-67</strong></p>
        <p>Або напишіть на email: <strong>info@antique-shop.com</strong></p>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  name: "App",
  data() {
    return {
      catalog: [
        { id: 1, title: "Старовинний годинник", description: "XIX століття, Франція", price: 5000, image: "https://via.placeholder.com/150" },
        { id: 2, title: "Срібна ложка", description: "XVIII століття, Англія", price: 1200, image: "https://via.placeholder.com/150" },
        { id: 3, title: "Картина маслом", description: "Початок XX століття", price: 8000, image: "https://via.placeholder.com/150" }
      ]
    };
  }
};
</script>

<style>
/* Основні стилі */
body {
  font-family: 'Arial', sans-serif;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* Контейнер */
.container {
  width: 90%;
  max-width: 1200px;
  margin: 0 auto;
  text-align: center;
}

/* Шапка */
.header {
  background-color: #2c2c2c;
  color: white;
  padding: 1rem 0;
  position: fixed;
  width: 100%;
  top: 0;
  left: 0;
  z-index: 100;
}

.logo {
  margin: 0;
  font-size: 1.8rem;
}

.nav {
  list-style: none;
  padding: 0;
  display: flex;
  justify-content: center;
  gap: 1.5rem;
  margin-top: 10px;
}

.nav a {
  color: white;
  text-decoration: none;
  font-size: 1.2rem;
}

.nav a:hover {
  text-decoration: underline;
}

/* Головний банер */
.hero {
  background: url('https://via.placeholder.com/1200x500') no-repeat center center/cover;
  color: white;
  padding: 5rem 0;
  margin-top: 60px;
}

.hero h2 {
  font-size: 2.5rem;
}

.btn {
  display: inline-block;
  background: #b8860b;
  color: white;
  padding: 0.8rem 1.5rem;
  text-decoration: none;
  font-size: 1.2rem;
  margin-top: 1rem;
  border-radius: 5px;
}

.btn:hover {
  background: #8b6508;
}

/* Розділи */
.section {
  padding: 4rem 0;
}

/* Каталог */
.grid {
  display: flex;
  gap: 1.5rem;
  justify-content: center;
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

/* Про нас */
.about {
  background: #f4f4f4;
}

/* Контакти */
.contacts {
  background: #222;
  color: white;
}

/* Адаптивність */
@media (max-width: 768px) {
  .nav {
    flex-direction: column;
    gap: 0.5rem;
  }
  .grid {
    flex-direction: column;
    align-items: center;
  }
}
</style>
