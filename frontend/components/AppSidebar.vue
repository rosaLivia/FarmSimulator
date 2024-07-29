<script setup lang="ts">
import Image from 'primevue/image';
</script>

<template>
    <div class="hidden sm:block sm:fixed h-full bg-white rounded-md shadow-md py-2 px-6 w-64 z-10">
        <div class="layout-logo flex items-center justify-center">
            <Image src="/img/logo.png" alt="Logo" width="120" />
        </div>
        <AppMenu />
    </div>
</template>