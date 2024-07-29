<script setup lang="ts">
import Image from 'primevue/image';
</script>

<template>
    <div class="layout-sidebar">
        <div class="layout-logo flex items-center justify-between">
            <Image src="/img/logo.png" alt="Logo" width="120" />
            <i class="pi pi-bars"></i>
        </div>
        <AppMenu />
    </div>
</template>