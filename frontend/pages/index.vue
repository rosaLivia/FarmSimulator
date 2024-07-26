
<template>
  <Container>
    <Swiper
      :slides-per-view="1"
      :modules="[SwiperAutoplay, SwiperPagination, SwiperNavigation]"
      navigation
      :pagination="{ clickable: true }"
      :autoplay="{
        delay: 2500,
        disableOnInteraction: false,
      }"
    >
      <SwiperSlide>
        <NuxtImg src="https://placehold.co/1536x320/cornflowerblue/white" alt="Imagem 1" sizes="100vw" />
      </SwiperSlide>
      <SwiperSlide>
        <NuxtImg src="https://placehold.co/1536x320/crimson/white" alt="Imagem 2" sizes="100vw" />
      </SwiperSlide>
      <SwiperSlide>
        <NuxtImg src="https://placehold.co/1536x320/darkseagreen/white" alt="Imagem 3" sizes="100vw" />
      </SwiperSlide>
    </Swiper>
  </Container>
  <main>
    <Container>
      <Showcase :products="products">
        <template #title>
          Produtos em destaque
        </template>
      </Showcase>
      <Showcase :products="products">
        <template #title>
          Descontos da semana
        </template>
      </Showcase>
    </Container>
  </main>
</template>

<script setup>
   const products = ref([]);

for (let i = 0; i < 10; i++){
  products.value.push({
    "id": i,
    "name": `Product ${i}`,
    "valueFrom": 1000,
    "valueTo": 100,
    "discountPercentage": 90,
    "brand": "Genérico"


  });
}



</script>


<style>

</style>