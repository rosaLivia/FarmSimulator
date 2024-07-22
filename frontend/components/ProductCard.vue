<template>
  <div class="bg-white rounded-lg shadow-md p-3 h-full">
    <div class="flex flex-col gap-2 relative h-full">
      <NuxtLink :to="{ name: 'produto-id', params: { id: product.id } }" class="flex flex-col gap-2 h-full">
        <Tag v-if="product.discountPercentage" class="absolute left-0" icon="pi pi-arrow-down" severity="danger">{{ product.discountPercentage.toLocaleString() }}%</Tag>
        <NuxtImg src="https://placehold.co/170x170" class="object-contain h-40" />
        <div class="grow">
          <p class="text-color font-medium line-clamp-2">{{ product.name }}</p>
          <p class="text-sm text-muted-color">{{ product.brand }}</p>
        </div>
        <div>
          <div class="text-sm text-muted-color line-through h-5">
            <span v-if="product.discountPercentage" >{{ formatCurrency(product.valueFrom) }}</span>
          </div>
          <p class="text-2xl text-primary font-bold">{{ formatCurrency(product.valueTo) }}</p>
        </div>
      </NuxtLink>
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