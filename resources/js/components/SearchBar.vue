<template>
    <div class="search-area">
        <input type="text" class="cep" placeholder="CEP">
        <input type="text" placeholder="Endereço">
        <div class="search-button">
            Pesquisar
        </div>
    </div>
</template>

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