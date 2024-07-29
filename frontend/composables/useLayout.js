const layoutState = reactive({
    menuActive: true,
});

export const useLayout = () => {
    const onMenuToggle = () => {
        layoutState.menuActive = !layoutState.menuActive;
    };

    const isSidebarActive = computed(() => layoutState.menuActive);

    return {
        layoutState: readonly(layoutState),
        onMenuToggle,
        isSidebarActive
    };
}