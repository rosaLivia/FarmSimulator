<template>
    <div class="layout-topbar flex justify-between p-3">
        <IconField>
          <InputIcon class="pi pi-search" />
          <InputText class="md:min-w-[48rem]" placeholder="Pesquisar?" />
        </IconField>
        <div class="layout-topbar-menu flex items-center gap-3">
            <i class="pi pi-bell" style="font-size: 1.25rem" />
            <Avatar label="P" class="mr-2" shape="circle" />
        </div>
    </div>
</template>