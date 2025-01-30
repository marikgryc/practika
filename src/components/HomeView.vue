<template>
  <div class="home-container">
    <!-- Шапка -->
    <header class="hero-section">
      <h1>Ласкаво просимо в Антикварний магазин "Історія"</h1>
      <p>Найдокладніша колекція старовинних предметів для вашого дому та колекцій.</p>
      <router-link to="/catalog">
        <button class="btn-primary">Переглянути каталог</button>
      </router-link>
    </header>

    <!-- Наші послуги -->
    <section class="services">
      <h2>Наші послуги</h2>
      <div class="service-card">
        <h3>Оцінка старовинних предметів</h3>
        <p>Надаємо професійну оцінку старовинних предметів для продажу або колекцій.</p>
      </div>
      <div class="service-card">
        <h3>Продаж антикваріату</h3>
        <p>Пропонуємо широкий вибір старовинних меблів, картин, ювелірних виробів та інших предметів.</p>
      </div>
      <div class="service-card">
        <h3>Консультації з експертами</h3>
        <p>Консультації з експертами по всіх питаннях щодо антикваріату, інвестицій та реставрації.</p>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  name: "HomeView",
};
</script>

<style scoped>
.home-container {
  font-family: Arial, sans-serif;
}

.hero-section {
  background-color: #ffffff;
  color: rgb(0, 0, 0);
  text-align: center;
  padding: 3rem 1rem;
}

.hero-section h1 {
  font-size: 3rem;
}

.hero-section p {
  font-size: 1.2rem;
  margin: 1rem 0;
}

.hero-section .btn-primary {
  background-color: #000000;
  color: white;
  padding: 1rem 2rem;
  border: none;
  border-radius: 5px;
  font-size: 1rem;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.hero-section .btn-primary:hover {
  background-color: #000000;
}

.services {
  display: flex;
  justify-content: space-around;
  padding: 3rem 1rem;
  background-color: #ffffff;
}

.service-card {
  text-align: center;
  width: 30%;
  padding: 1rem;
  background-color: #f0f0f0;
  border-radius: 10px;
}

.service-card h3 {
  font-size: 1.5rem;
  color: #000000;
}
</style>
