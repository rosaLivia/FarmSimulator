<template>
  <div class="bg-white rounded-lg shadow-md p-3 mx-2">
    <div class="flex flex-col gap-3">
      <img src="https://placehold.co/170x170">
      <p>{{ product.name }}</p>
      <p class="text-2xl font-bold">{{ formatCurrency(product.price) }}</p>
      <Button>Comprar</Button>
    </div>
  </div>
</template>

<script setup>
  const { formatCurrency } = useCurrency();
  const props = defineProps({
    product: Object
  })
</script>

<style></style>