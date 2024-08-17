<template>
    <h1>Categoria {{ id }}</h1>
</template>

<script setup>
const route = useRoute()
const id = ref(route.params.id)
</script>

<style>

</style>