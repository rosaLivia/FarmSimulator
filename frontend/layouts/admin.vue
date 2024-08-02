<template>
    <div class="min-h-screen flex flex-col">
        <AppSidebar />
        <AppTopbar />
        <div class="transition-all" :class="[layoutState.menuActive ? 'ml-64' : 'ml-16']">
            <slot/>
        </div>
    </div>
</template>

<script setup>
const { layoutState } = useLayout();
</script>