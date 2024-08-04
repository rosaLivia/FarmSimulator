
// src/composables/cart.js
import { reactive, ref } from 'vue';

const cart = reactive({
  items: []
});

const products = ref([
  { id: 1, name: 'Dipirona', image: '/img/dipirona-monoidratada.jpg', valueFrom: 10, valueTo: 5.25, discountPercentage: 10, brand: 'Marca A' },
  { id: 2, name: 'Produto B', image: '/img/esp.webp', valueFrom: 100, valueTo: 60.00, discountPercentage: 10, brand: 'Marca B' },
  { id: 3, name: 'Trembolona', image: '/img/TREMBOLONA.jpg', valueFrom: 1500, valueTo: 1350, discountPercentage: 10, brand: 'Marca C' },
  { id: 4, name: 'Dipirona', image: '/img/dipirona-monoidratada.jpg', valueFrom: 10, valueTo: 5.25, discountPercentage: 10, brand: 'Marca A' },
  { id: 5, name: 'Produto B', image: '/img/esp.webp', valueFrom: 100, valueTo: 60.00, discountPercentage: 10, brand: 'Marca B' },
  { id: 6, name: 'Trembolona', image: '/img/TREMBOLONA.jpg', valueFrom: 1500, valueTo: 1350, discountPercentage: 10, brand: 'Marca C' },
]);


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
