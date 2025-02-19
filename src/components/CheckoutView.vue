<template>
    <div class="checkout-container">
      <h1>Оформлення замовлення</h1>
      <form @submit.prevent="submitOrder">
        <label>Ім'я:</label>
        <input type="text" v-model="name" required>
  
        <label>Прізвище:</label>
        <input type="text" v-model="surname" required>
  
        <label>Адреса доставки:</label>
        <input type="text" v-model="address" required>
  
        <label>Телефон:</label>
        <input type="tel" v-model="phone" required>

        <h2>До сплати: {{ totalPrice }} грн</h2>
  
        <button type="submit">Підтвердити замовлення</button>
      </form>
    </div>
  </template>
  
  <script>
  export default {
    data() {
      return {
        name: "",
        surname: "",
        address: "",
        phone: "",
        cart: []
      };
    },
    computed: {
      totalPrice() {
        return this.cart.reduce((total, item) => total + item.price * item.quantity, 0);
      }
    },
    created() {
      this.loadCart();
    },
    methods: {
      loadCart() {
        this.cart = JSON.parse(localStorage.getItem("cart")) || [];
      },
      async submitOrder() {
        if (!this.name || !this.surname || !this.address || !this.phone) {
          alert("Будь ласка, заповніть всі поля!");
          return;
        }
  
        try {
          const response = await fetch("http://localhost/Antique-shop/php/place_order.php", {
            method: "POST",
            headers: {
              "Content-Type": "application/json",
            },
            body: JSON.stringify({
              name: this.name,
              surname: this.surname,
              address: this.address,
              phone: this.phone,
              cart: this.cart,
            }),
          });
  
          const result = await response.json();
  
          if (result.success) {
            alert("Ваше замовлення оформлено!");
            localStorage.removeItem("cart");
            this.$router.push("/");
          } else {
            alert("Помилка при оформленні замовлення!");
          }
        } catch (error) {
          console.error("Помилка відправки замовлення:", error);
        }
      },
    },
  };
  </script>
  
  <style scoped>
  .checkout-container {
    max-width: 400px;
    margin: auto;
    padding: 20px;
    background: white;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
  }
  
  h1 {
    text-align: center;
  }
  
  form {
    display: flex;
    flex-direction: column;
  }
  
  label {
    margin-top: 10px;
    font-weight: bold;
  }
  
  input, select {
    padding: 8px;
    margin-top: 5px;
    border: 1px solid #ccc;
    border-radius: 5px;
  }
  
  button {
    margin-top: 20px;
    background: #5a3826;
    color: white;
    padding: 10px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
  }
  
  button:hover {
    background: #000000;
  }
  
  </style>
  