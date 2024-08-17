<template>
    <div class="sticky flex justify-between p-2 bg-white shadow-md z-10 h-16 items-center">
        <div class="flex">
            <div class="layout-logo flex items-center justify-center">
                <Image src="/img/logo.png" alt="Logo" width="120" />
            </div>
            <button link class="ml-2" @click="onMenuToggle">
                <i class="pi pi-bars"></i>
            </button>
        </div>
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