<script>
export default {
    data() {
        return {
            price: 0
        }
    },
    methods: {
        formatCurrency(value) {
            return value.toLocaleString('pt-BR', { style: 'currency', currency: 'BRL' });
        }
    }
}
</script>

<template>
    <header>
        <!-- TODO: Logo -->
        <h2>DrograFarma</h2>
        <hr>
        <input id="search-input" type="text" placeholder="O que deseja encontrar?">
        <hr>
        <div>
            <!-- TODO: Icon -->
            <p>Minha conta</p>
            <p><b>Entrar</b></p>
        </div>
        <hr>
        <div>
            <!-- TODO: Icon -->
            <p>Carrinho</p>
            <p><b>{{ formatCurrency(price) }}</b></p>
        </div>
    </header>
</template>

<style scoped>
    header {
        background-color: white;
        padding: 1em;
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 1em;
        border-bottom: .5em solid red;
    }

    #search-input {
        padding: .75em;
        font-size: 1em;
        border: 1px solid #ccc;
        border-radius: .5em;
        min-width: 30em;
    }

    hr {
        height: 2rem;
    }
</style>