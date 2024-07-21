
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
        <img src="https://placehold.co/1536x320/cornflowerblue/white" alt="Imagem 1" />
      </SwiperSlide>
      <SwiperSlide>
        <img src="https://placehold.co/1536x320/crimson/white" alt="Imagem 2" />
      </SwiperSlide>
      <SwiperSlide>
        <img src="https://placehold.co/1536x320/darkseagreen/white" alt="Imagem 3" />
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
  const { data: products } = await useFetch('http://localhost:3001/produtos');
</script>


<style>

</style>