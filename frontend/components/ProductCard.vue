<template>
  <div class="bg-white rounded-lg shadow-md p-3">
    <Tag v-if="product.discountPercentage" class="absolute" icon="pi pi-arrow-down" severity="danger">{{ product.discountPercentage.toLocaleString() }}%</Tag>
    <div class="flex flex-col gap-2">
      <img src="https://placehold.co/170x170">
      <div>
        <p class="text-color font-medium">{{ product.name }}</p>
        <p class="text-sm text-muted-color">{{ product.brand }}</p>
      </div>
      <div>
        <div class="text-sm text-muted-color line-through h-5">
          <span v-if="product.discountPercentage" >{{ formatCurrency(product.valueFrom) }}</span>
        </div>
        <p class="text-2xl text-primary font-bold">{{ formatCurrency(product.valueTo) }}</p>
      </div>
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