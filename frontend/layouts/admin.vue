<template>
    <div class="min-h-screen flex flex-col">
        <AppSidebar />
        <AppTopbar />
        <div class="layout-main-container">
            <slot/>
        </div>
    </div>
</template>