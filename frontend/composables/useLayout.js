const layoutState = reactive({
    menuActive: true,
    isMobile: false
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