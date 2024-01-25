<template>
    <div class="container">
        <div class="item" v-for="address in list">
            <span><strong>Rua:</strong> {{ address.street }}</span>
            <span><strong>Bairro:</strong> {{ address.neighborhood }}</span>
            <span><strong>Cidade:</strong> {{ address.city }}</span>
            <span><strong>Estado:</strong> {{ address.state }}</span>
            <span><strong>Pais:</strong> {{ address.country }}</span>
            <span><strong>CEP:</strong> {{ address.zip_code }}</span>
        </div>
    </div>
</template>

<script setup>
    defineProps(['list'])
</script>

<style scoped>
.container {
    display: grid;
    grid-template-columns: 1fr 1fr;
    align-items: center;
    max-width: 620px;
    gap: 8px;
    margin: 0 auto;
}
.item {
    margin-top: 16px;
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    background-color: #fff;
    color: #000;
    padding: 16px 32px;
    border-radius: 4px;
    max-width: 220px;
    width: 100%;
}
</style>