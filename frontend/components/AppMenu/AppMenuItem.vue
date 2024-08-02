<template>
    <li>
        <div v-if="root && item.visible !== false && layoutState.menuActive" class="font-bold mx-2 text-sm uppercase">{{ item.label }}</div>
        <!---->
        <!-- <a v-if="(!item.to || item.items) && item.visible !== false" :href="item.url" @click="itemClick($event, item, index)" :class="item.class, { 'hidden': root }" class="flex items-center relative cursor-pointer hover:bg-primary/10" :target="item.target" tabindex="0">
            <i :class="item.icon" class="mr-2"></i>
            <span v-if="layoutState.menuActive">{{ item.label }}</span>
            <i class="pi pi-fw pi-angle-down" v-if="item.items"></i>
        </a> -->
        <!---->
        <NuxtLink v-if="item.to && !item.items && item.visible !== false" @click="itemClick($event, item, index)" class="group rounded-md p-2 flex justify-center relative cursor-pointer hover:bg-primary/10 h-10" :class="[item.class, { 'font-bold text-primary': checkActiveRoute(item) }]" tabindex="0" :to="item.to">
            <div class="flex items-center gap-2 w-full">
                <i :class="item.icon" style="font-size: 1.25rem"></i>
                <span :class="[!layoutState.menuActive ? 'hidden group-hover:block absolute left-full ml-6' : '' ]">{{ item.label }}</span>
                <i class="pi pi-fw pi-angle-down" v-if="item.items"></i>
            </div>
        </NuxtLink>
        <!---->
        <Transition v-if="item.items && item.visible !== false" name="layout-submenu">
            <ul v-show="root ? true : isActiveMenu">
                <AppMenuItem v-for="(child, i) in item.items" :key="i" :item="child" :index="i" :parentItemKey="itemKey" :root="false"></AppMenuItem>
            </ul>
        </Transition>
    </li>
</template>

<script setup>
    const route = useRoute();

    const { layoutState } = useLayout();

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