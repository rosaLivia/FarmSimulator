<template>
    <div class="min-h-screen flex flex-col">
        <AppSidebar />
        <AppTopbar />
        <div class="transition-all grow" :class="[layoutState.menuActive ? 'ml-64' : 'ml-16']">
            <div class="p-3">
                <slot/>
            </div>
        </div>
    </div>
</template>

<script setup>
const { layoutState } = useLayout();
</script>