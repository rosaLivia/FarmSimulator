
// src/composables/cart.js
import { reactive, ref } from 'vue';

const cart = reactive({
  items: []
});

const products = await $fetch('http://localhost/api/products');


const addToCart = (product) => {
  if (!product || !product.id) {
    console.error("Product is undefined or missing 'id' property", product);
    return;
  }

  const item = cart.items.find(item => item.id === product.id);
  if (item) {
    item.quantity += 1;
  } else {
    cart.items.push({ ...product, quantity: 1 });
  }
};

const removeProduct = (productId) => {
  const itemIndex = cart.items.findIndex(item => item.id === productId);
  if (itemIndex !== -1) {
    cart.items[itemIndex].quantity -= 1;
    if (cart.items[itemIndex].quantity === 0) {
      cart.items.splice(itemIndex, 1);
    }
  }
};

const clearCart = () => {
  cart.items = [];
};

export const useCart = () => {
  return {
    cart: cart.items,
    products,
    addToCart,
    removeProduct,
    clearCart
  };
};
