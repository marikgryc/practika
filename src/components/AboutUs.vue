<template>
  <div class="container">
    <div class="about-box">
      <h1>Про нас</h1>
      <p>Ми - магазин антикваріату, що спеціалізується на продажу унікальних і рідкісних предметів з минулого.</p>
      <h2>Наша місія</h2>
      <p>Наша місія - допомогти людям знайти справжні коштовності з історією та дарувати їм нове життя.</p>
      <h2>Наші цінності</h2>
      <ul>
        <li>Якість та надійність</li>
        <li>Повага до історії та культури</li>
        <li>Підтримка антикваріатних традицій</li>
      </ul>
      <p>Приходьте до нас і дізнайтеся більше!</p>
    </div>

    <div class="assessment-box">
      <h1>Оцінка старовинного майна</h1>
      <p>
        Для отримання оцінки старовинного майна, будь ласка, надішліть сам предмет або його фотографії на адресу нашого магазину:
      </p>
      <h2>Адреса для оцінки:</h2>
      <p><strong>Антикварний магазин "Історія"</strong></p>
      <p>м. Колмия, вул. Антона Чехова, 20</p>
      <h2>Інструкція:</h2>
      <ol>
        <li>Упакуйте предмет таким чином, щоб він не пошкодився під час транспортування.</li>
        <li>Прикріпіть до посилки чіткий опис предмета, включаючи його розміри, матеріали, рік виготовлення (якщо відомо) та інші важливі деталі.</li>
        <li>Вкажіть ваше ім'я та контактні дані (телефон або email).</li>
        <li>Надішліть предмет або фото на вказану адресу.</li>
      </ol>
      <p>Наші експерти зв'яжуться з вами після оцінки предмета.</p>
    </div>

    <div class="map-container">
      <iframe 
      src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d13278.843180909109!2d25.03799150573737!3d48.533075016529274!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x4736d29057abf5b3%3A0xbe99f0c2dee6921f!2z0JrQvtC70L7QvNC40LnRgdGM0LrQuNC5INC_0L7Qu9GW0YLQtdGF0L3RltGH0L3QuNC5INGE0LDRhdC-0LLQuNC5INC60L7Qu9C10LTQtiDQndCw0YbRltC-0L3QsNC70YzQvdC-0LPQviDRg9C90ZbQstC10YDRgdC40YLQtdGC0YMgwqvQm9GM0LLRltCy0YHRjNC60LAg0L_QvtC70ZbRgtC10YXQvdGW0LrQsMK7!5e1!3m2!1sru!2sua!4v1739962607782!5m2!1sru!2sua"        width="600"
        height="450"
        style="border:0;"
        allowfullscreen=""
        loading="lazy"
        referrerpolicy="no-referrer-when-downgrade">
      </iframe> 
    </div>
  </div>
</template>

<script>
export default {
  name: "AntiqueAssessment",
};
</script>

<style scoped>
.container {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 40px;
  background-color: #ffffff;
  font-family: 'Georgia', serif;
}

.assessment-box, .about-box {
  max-width: 850px;
  background: #fff8f0;
  padding: 35px;
  border-radius: 15px;
  box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
  margin-bottom: 35px;
}

h1 {
  font-size: 2.4rem;
  color: #4a2c2a;
  text-align: center;
  margin-bottom: 25px;
}

p, li {
  font-size: 1.3rem;
  color: #3b3b3b;
  line-height: 1.8;
}

ul {
  list-style: disc;
  padding-left: 25px;
}

.map-container {
  max-width: 600px;
  margin: 20px auto;
  border-radius: 8px;
  overflow: hidden;
}
</style>
