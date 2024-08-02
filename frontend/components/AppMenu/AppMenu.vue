<template>
    <ul>
        <template v-for="(item, i) in model" :key="item">
            <AppMenuItem v-if="!item.separator" :item="item" :index="i"></AppMenuItem>
        </template>
    </ul>
</template>

<script setup>
const model = ref([
    {
        items: [
            { label: 'Dashboard', icon: 'pi pi-fw pi-home', to: '/admin/dashboard'},
            { label: 'Produtos', icon: 'pi pi-fw pi-box', to: '/admin/produtos'},
            { label: 'Fornecedeores', icon: 'pi pi-fw pi-warehouse', to: '/admin/fornecedores'},
            { label: 'Pedidos', icon: 'pi pi-fw pi-receipt', to: '/admin/pedidos'},
        ]
    }
])
</script>