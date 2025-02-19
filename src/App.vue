<template>
  <div id="app">
    
    <header class="header">
      <div class="container">
        <h1 class="logo">Антикварний магазин</h1>
        <nav>
          <ul class="nav">
            <li><router-link to="/">Головна</router-link></li>
            <li><router-link to="/catalog">Каталог</router-link></li>
            <li><router-link to="/cart">Кошик</router-link></li>
            <li><router-link to="/about">Про нас</router-link></li>
            <li><router-link to="/contacts">Контакти</router-link></li>
            <li><router-link to="/account">Особистий кабінет</router-link></li>
            <li><router-link to="/auth">Увійти / Реєстрація</router-link></li>
          </ul>
        </nav>
      </div>
    </header>


    <main>
      <router-view></router-view>
    </main>
  </div>
  <footer class="footer">
      <p>© Антикварний магазин 2025</p>
    </footer>
</template>

<script>
export default {
  name: "App"
};

</script>

<style>
body {
  font-family: 'Arial', sans-serif;
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}


.container {
  width: 90%;
  max-width: 1200px;
  margin: 0 auto;
  text-align: center;
}


.header {
  background-color: #5a3826;
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


main {
  margin-top: 80px;
  padding: 20px;
}

.footer {
  background-color: #5a3826;
  color: white;
  text-align: center;
  padding: 0.3rem;
  position: fixed;
  bottom: 0;
  width: 100%;
}

@media (max-width: 768px) {
  .nav {
    flex-direction: column;
    gap: 0.5rem;
  }
}

</style>
