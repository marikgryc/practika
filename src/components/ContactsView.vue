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
.contacts-view {
  display: flex;
  flex-direction: column;
  align-items: center;
  padding: 20px;
}

h1 {
  font-size: 2.5rem;
  margin-bottom: 20px;
}

p {
  font-size: 1.5rem;
  margin: 10px 0;
}

.contact-methods {
  display: flex;
  flex-direction: column;
  gap: 10px;
  text-align: center;
}
</style>
