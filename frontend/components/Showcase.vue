<template>
  <h2 class="text-2xl font-bold text-primary mb-1">
    <slot name="title"></slot>
  </h2>
  <div class="relative">
    <div v-if="!products || products.length == 0" class="flex justify-center h-60 items-center ">
      <p class="font-medium">Lamentamos, nenhum produto encontrado.</p>
    </div>
    <Swiper v-else
      :slides-per-view="5"
      :slides-per-group="5"
      :spaceBetween="16"
      :modules="[SwiperNavigation, SwiperPagination, SwiperFreeMode]"
      navigation
      :pagination="{ clickable: true}"
    >
      <SwiperSlide v-for="product in products">
        <ProductCard :key="product.id" :product="product" />
      </SwiperSlide>
    </Swiper>
  </div>
</template>

<script setup>
  const props = defineProps({
    products: Array,
  })
</script>

<style>
  .swiper-pagination {
    @apply mt-3;
    position: relative;
  }

  .swiper-pagination-bullet-active {
    @apply bg-primary;
  }

  .swiper-button-prev,
  .swiper-button-next {
    @apply text-primary;
  }
</style>