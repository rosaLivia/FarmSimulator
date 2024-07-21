<template>
  <h2 class="text-2xl font-bold text-primary">
    <slot name="title"></slot>
  </h2>
  <div class="relative">
    <Swiper
      :slides-per-view="1"
      navigation
      :modules="[SwiperNavigation, SwiperPagination, SwiperFreeMode]"
      :pagination="{ clickable: true }"
      freeMode
    >
      <SwiperSlide v-for="n in chunks.length">
        <div class="grid grid-cols-5 mx-1">
          <ProductCard v-for="product in chunks[n - 1]" :product="product" />
        </div>
      </SwiperSlide>
    </Swiper>
  </div>
</template>

<script setup>
  const props = defineProps({
    products: Array,
    groupSize: {
      type: Number,
      default: 5
    }
  })

  const { products, groupSize } = props;
  const chunks = [];

  for (let i = 0; i < products.length; i += groupSize) {
    chunks.push(products.slice(i, i + groupSize));
  }
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