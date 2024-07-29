<template>
    <div class="sticky flex justify-between sm:ml-64 p-3 bg-white shadow-md">
        <button link class="ml-2" @click="onMenuToggle">
            <i class="pi pi-bars"></i>
        </button>
        <IconField>
          <InputIcon class="pi pi-search" />
          <InputText class="" placeholder="Pesquisar..." />
        </IconField>
        <div class="layout-topbar-menu flex items-center gap-3">
            <i class="pi pi-bell" style="font-size: 1.25rem" />
            <Avatar label="P" class="mr-2" shape="circle" />
        </div>
    </div>
</template>

<script setup>
const { onMenuToggle } = useLayout();
</script>