<template>
    <div class="main-content">
        <div class="content">
            <SearchBar @search="searchAddress" />
            <AddressList :list="addresList"/>
        </div>
    </div>
</template>

<script setup>
import SearchBar from './SearchBar.vue'
import AddressList from './AddressList.vue'
import api from '../utils/apiService.js'
import { ref } from 'vue';
const addresList = ref([])
const searchAddress = async (searchTerm) => {
    const response = await api.get('/address/fuzzy-search', {
        params: {
            search_term: searchTerm,
        }
    })

    addresList.value = response.data.data
}
</script>


<style scoped>
.main-content {
    width: 100%;
    height: 100vh;
    background: #3c1053;  /* fallback for old browsers */
    display: flex;
    justify-content: center;
    align-items: center;
}

.content {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}
</style>