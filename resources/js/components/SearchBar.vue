<template>
    <div class="search-area">
        <input v-model="cep" type="number" class="cep" placeholder="CEP">
        <input v-model="address" type="text" placeholder="Endereço">
        <div class="search-button" @click="handleSearch">
            Pesquisar
        </div>
    </div>
</template>
<script setup>
    import { ref } from 'vue'

    const emit = defineEmits(['search'])

    const cep = ref('')
    const address = ref('')

    const handleSearch = () => {
        const searchTerm = `${address.value} ${cep.value}`
        emit('search', searchTerm)
    }

</script>

<style scoped>
.search-area {
    max-width: 800px;
    width: 100%;
    display: flex;
    justify-content: center;
    align-items: center;
}

input {
    border: none;
    max-width: 300px;
    height: 50px;
    margin-right: 8px;
    border-radius: 4px;
    padding: 4px 8px;
}
.cep {
    max-width: 150px;
}

.search-button {
    border: none;
    height: 50px;
    width: 100px;
    padding: 4px 8px;
    border-radius: 4px;
    background-color: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
}

.search-button:hover {
    background-color: #ad5389;
    color: #fff;
}
</style>