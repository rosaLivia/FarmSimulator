<script setup lang="ts">
const { layoutState } = useLayout();
</script>

<template>
    <div class="md:flex flex-col fixed h-full bg-white shadow-md transition-all" :class="[layoutState.menuActive ? 'w-64' : 'w-16']">
        <div class="mt-16"></div>
        <div class="p-3 rounded-md">
            <AppMenu />
        </div>
    </div>
</template>