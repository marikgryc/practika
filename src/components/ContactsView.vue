<template>
  <div class="contacts-container">
    <div class="contacts-box">
      <h1>Контакти</h1>
      <p class="intro-text">
        Ми завжди раді почути ваші запитання та пропозиції! <br>
        Зв'яжіться з нами за допомогою одного з контактних способів:
      </p>

      <div class="contact-item">
        <h2>📞 Телефон</h2>
        <p><a href="tel:+380000000">+380 00 000 0000</a></p>
      </div>

      <div class="contact-item">
        <h2>📧 Email</h2>
        <p><a href="mailto:info@antiqueshop.com">info@antiqueshop.com</a></p>
      </div>

      <div class="contact-item">
        <h2>📍 Адреса</h2>
        <p>м. Коломия, вул. Антона Чехова, 20</p>
      </div>

      <div class="social-links">
        <h2>🔗 Соціальні мережі</h2>
        <a href="https://www.facebook.com" target="_blank" class="social-btn facebook">Facebook</a>
        <a href="https://www.instagram.com" target="_blank" class="social-btn instagram">Instagram</a>
      </div>
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
  background: linear-gradient(135deg, #f3e7d9, #e5c1a0);
}

.contacts-box {
  background: white;
  padding: 30px;
  border-radius: 12px;
  box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
  text-align: center;
  max-width: 500px;
}

h1 {
  font-size: 2rem;
  margin-bottom: 15px;
  color: #5a3826;
}

.intro-text {
  font-size: 1.2rem;
  color: #444;
  margin-bottom: 20px;
}

.contact-item {
  margin: 15px 0;
  padding: 10px;
  background: #f8f8f8;
  border-radius: 8px;
}

.contact-item h2 {
  font-size: 1.3rem;
  color: #333;
  margin-bottom: 5px;
}

.contact-item p {
  font-size: 1.2rem;
  color: #5a3826;
}

.contact-item a {
  text-decoration: none;
  color: #5a3826;
  font-weight: bold;
}

.contact-item a:hover {
  text-decoration: underline;
}

.social-links {
  margin-top: 20px;
}

.social-btn {
  display: inline-block;
  padding: 10px 20px;
  border-radius: 8px;
  margin: 5px;
  color: white;
  text-decoration: none;
  font-size: 1.1rem;
  font-weight: bold;
}

.facebook {
  background: #1877f2;
}

.instagram {
  background: linear-gradient(45deg, #f9ce34, #ee2a7b, #6228d7);
}

.social-btn:hover {
  opacity: 0.8;
}
</style>
