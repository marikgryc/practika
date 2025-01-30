<template>
  <div class="contacts-container">
    <div class="contacts-box">
      <h1>Контакти</h1>
      <p>Ми завжди раді почути ваші запитання та пропозиції! Зв'яжіться з нами за допомогою одного з контактних способів:</p>

      <h2>Телефон</h2>
      <p>+380000000</p>

      <h2>Email</h2>
      <p>info@antiqueshop.com</p>

      <h2>Адреса</h2>
      <p>м. Колмия, вул. Антона чехова, 20</p>

      <h2>Соціальні мережі</h2>
      <p>
        <a href="https://www.facebook.com" target="_blank">Facebook</a> |
        <a href="https://www.instagram.com" target="_blank">Instagram</a>
      </p>
    </div>
  </div>
</template>

<script>
export default {
  name: "ContactsView",
};
</script>

<style scoped>
.contacts-container {
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  background: linear-gradient(135deg, #ffffff, #f7f7f7);
}

.contacts-box {
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

a {
  color: #000000;
  text-decoration: none;
}

a:hover {
  text-decoration: underline;
}
</style>