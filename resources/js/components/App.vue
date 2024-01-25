<template>
    <div class="main-content">
        <div class="content">
            <SearchBar />
            <AddressList />
        </div>
    </div>
</template>

<script setup>
import SearchBar from './SearchBar.vue'
import AddressList from './AddressList.vue'


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