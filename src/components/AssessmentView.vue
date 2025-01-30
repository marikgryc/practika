<template>
    <div class="assessment-container">
      <div class="assessment-box">
        <h1>Оцінка старовинного майна</h1>
        <p>
          Для отримання оцінки старовинного майна, будь ласка, надішліть сам предмет або його фотографії на адресу нашого магазину:
        </p>
  
        <h2>Адреса для оцінки:</h2>
        <p><strong>Антикварний магазин "Історія"</strong></p>
        <p>Вулиця Старовинна, 12, м. Київ, Україна</p>
  
        <h2>Інструкція:</h2>
        <ol>
          <li>Упакуйте предмет таким чином, щоб він не пошкодився під час транспортування.</li>
          <li>Прикріпіть до посилки чіткий опис предмета, включаючи його розміри, матеріали, рік виготовлення (якщо відомо) та інші важливі деталі.</li>
          <li>Вкажіть ваше ім'я та контактні дані (телефон або email), щоб ми могли зв'язатися з вами для подальшої оцінки.</li>
          <li>Надішліть предмет або фото на вказану адресу.</li>
        </ol>
  
        <p>Наші експерти зв'яжуться з вами після того, як оцінять ваш предмет. Якщо потрібна додаткова інформація, ми надамо її після отримання вашого предмета.</p>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: "AssessmentView",
  };
  </script>
  
  <style scoped>
  .assessment-container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: linear-gradient(135deg, #ffffff, #f7f7f7);
  }
  
  .assessment-box {
    background: white;
    padding: 2rem;
    border-radius: 10px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    text-align: center;
    max-width: 600px;
    width: 100%;
  }
  
  h1 {
    font-size: 2rem;
    color: #6a11cb;
    margin-bottom: 1rem;
  }
  
  h2 {
    font-size: 1.5rem;
    color: #2575fc;
    margin-top: 1.5rem;
  }
  
  p,
  ol {
    font-size: 1.1rem;
    color: #333;
    line-height: 1.5;
  }
  
  a {
    color: #2575fc;
    text-decoration: none;
  }
  
  a:hover {
    text-decoration: underline;
  }
  
  ol {
    text-align: left;
    margin-left: 1.5rem;
  }
  
  li {
    margin-bottom: 0.8rem;
  }
  </style>
  