<template>
  <div class="about-container">
    <div class="about-box">
      <h1>Про нас</h1>
      <p>Ми - магазин антикваріату, який спеціалізується на продажу унікальних і рідкісних предметів з минулого. Ми пропонуємо великий вибір антикваріатних меблів, картин, колекційних речей та інших цінних артефактів.</p>
      <h2>Наша місія</h2>
      <p>Наша місія - допомогти людям знайти справжні коштовності з історією та дарувати їм нове життя. Кожен предмет в нашому магазині має свою унікальну історію, і ми з радістю поділимося нею з вами.</p>
      <h2>Наші цінності</h2>
      <ul>
        <li class="large-text">Якість та надійність</li>
        <li class="large-text">Повага до історії та культури</li>
        <li class="large-text">Підтримка антикваріатних традицій</li>
      </ul>
      <p>Приходьте до нас і дізнайтеся більше про наші предмети!</p>
    </div>
  </div>
</template>

<script>
export default {
  name: "AboutUs",
};
</script>

<style scoped>
.about-container {
  display: flex;
  flex-direction: column;
  align-items: justify;
  padding: 20px;
}

h1 {
  font-size: 2.5rem;
  margin-bottom: 20px;
}

p {
  font-size: 1.5rem;
  margin: 10px 0;
  text-align: justify;
  max-width: 1200px;
}

ul {
  font-size: 1.5rem;
  margin: 10px 0;
}

.large-text {
  font-size: 1.8rem; /* Збільшення розміру шрифта для кожного елементу списку */
  font-weight: bold;
  margin-bottom: 10px;
}
</style>
