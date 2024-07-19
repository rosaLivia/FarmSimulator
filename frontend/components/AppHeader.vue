<script setup>
 const price = ref(0);
 const pesquisa = ref('');

	function formatCurrency(value) {
		return value.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
	}
</script>

<template>
	<header class="bg-white red-line">
		<div class="container mx-auto flex p-3 items-center justify-center">
			<NuxtLink to="/">
				<Image src="/img/logo.png" alt="Image" width="120" />
			</NuxtLink>
			<Divider layout="vertical" />
			<IconField>
				<InputIcon class="pi pi-search" />
				<InputText class="md:min-w-[48rem]" v-model="pesquisa" placeholder="O que deseja encontrar?" />
			</IconField>
			<Divider layout="vertical" />
			<div class="flex gap-3 items-center">
				<i class="pi pi-user text-2xl"></i>
				<div>
					<p>Minha conta</p>
					<NuxtLink to="/login" class="hover:underline font-bold">Entrar</NuxtLink>
				</div>
			</div>
			<Divider layout="vertical" />
			<div class="flex gap-3 items-center">
				<i class="pi pi-shopping-cart text-2xl"></i>
				<div>
					<p>Carrinho</p>
					<p class="font-bold">{{ formatCurrency(price) }}</p>
				</div>
			</div>
		</div>
	</header>
</template>

<style scoped>
.red-line {
	border-bottom: .25em solid;
	@apply border-red-500;
}
</style>