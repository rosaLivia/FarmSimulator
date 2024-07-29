<template>
    <li :class="{ 'layout-root-menuitem': root, 'active-menuitem': isActiveMenu }">
        <div v-if="root && item.visible !== false" class="layout-menuitem-root-text">{{ item.label }}</div>
        <a v-if="(!item.to || item.items) && item.visible !== false" :href="item.url" @click="itemClick($event, item, index)" :class="item.class" :target="item.target" tabindex="0">
            <i :class="item.icon" class="layout-menuitem-icon"></i>
            <span class="layout-menuitem-text">{{ item.label }}</span>
            <i class="pi pi-fw pi-angle-down layout-submenu-toggler" v-if="item.items"></i>
        </a>
        <NuxtLink v-if="item.to && !item.items && item.visible !== false" @click="itemClick($event, item, index)" :class="[item.class, { 'active-route': checkActiveRoute(item) }]" tabindex="0" :to="item.to">
            <i :class="item.icon" class="layout-menuitem-icon"></i>
            <span class="layout-menuitem-text">{{ item.label }}</span>
            <i class="pi pi-fw pi-angle-down layout-submenu-toggler" v-if="item.items"></i>
        </NuxtLink>
        <Transition v-if="item.items && item.visible !== false" name="layout-submenu">
            <ul v-show="root ? true : isActiveMenu" class="layout-submenu">
                <AppMenuItem v-for="(child, i) in item.items" :key="i" :item="child" :index="i" :parentItemKey="itemKey" :root="false"></AppMenuItem>
            </ul>
        </Transition>
    </li>
</template>

<script setup>
    const route = useRoute();

    const props = defineProps({
        item: {
            type: Object,
            default: () => ({})
        },
        index: {
            type: Number,
            default: 0
        },
        root: {
            type: Boolean,
            default: true
        },
        parentItemKey: {
            type: String,
            default: null
        }
    })

    const isActiveMenu = ref(false);
    const itemKey = ref(null);

    // onBeforeMount(() => {
    //     itemKey.value = props.parentItemKey ? props.parentItemKey + '-' + props.index : String(props.index);

    //     const activeItem = layoutState.activeMenuItem;

    //     isActiveMenu.value = activeItem === itemKey.value || activeItem ? activeItem.startsWith(itemKey.value + '-') : false;
    // });

    const itemClick = (event, item) => {
        if (item.disabled) {
            event.preventDefault();
            return;
        }

        // const { overlayMenuActive, staticMenuMobileActive } = layoutState;

        // if ((item.to || item.url) && (staticMenuMobileActive.value || overlayMenuActive.value)) {
        //     onMenuToggle();
        // }

        // if (item.command) {
        //     item.command({ originalEvent: event, item: item });
        // }

        // const foundItemKey = item.items ? (isActiveMenu.value ? props.parentItemKey : itemKey) : itemKey.value;

        // setActiveMenuItem(foundItemKey);
    };

    const checkActiveRoute = (item) => {
        return route.path === item.to;
    };
</script>