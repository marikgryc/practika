<template>
    <div class="about-container">
      <div class="about-box">
        <h1>Про нас</h1>
        <p>Ми - магазин антикваріату, який спеціалізується на продажу унікальних і рідкісних предметів з минулого. Ми пропонуємо великий вибір антикваріатних меблів, картин, колекційних речей та інших цінних артефактів.</p>
        <h2>Наша місія</h2>
        <p>Наша місія - допомогти людям знайти справжні коштовності з історією та дарувати їм нове життя. Кожен предмет в нашому магазині має свою унікальну історію, і ми з радістю поділимося нею з вами.</p>
        <h2>Наші цінності</h2>
        <ul>
          <li>Якість та надійність</li>
          <li>Повага до історії та культури</li>
          <li>Підтримка антикваріатних традицій</li>
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
    justify-content: center;
    align-items: center;
    height: 100vh;
    background: linear-gradient(135deg, #ffffff, #f7f7f7);
  }
  
  .about-box {
    background: white;
    padding: 2rem;
    border-radius: 10px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    text-align: center;
    max-width: 800px;
    width: 100%;
  }
  
  h1 {
    font-size: 2rem;
    color: #000000;
    margin-bottom: 1rem;
  }
  
  h2 {
    font-size: 1.5rem;
    color: #000000;
    margin-top: 1.5rem;
  }
  
  p {
    font-size: 1.1rem;
    color: #000000;
    line-height: 1.5;
  }
  
  ul {
    list-style-type: none;
    padding-left: 0;
  }
  
  ul li {
    font-size: 1.1rem;
    color: #000000;
    margin-bottom: 10px;
  }
  </style>
  