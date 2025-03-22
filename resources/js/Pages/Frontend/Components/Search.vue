<script setup>
import { ref, onMounted, onUnmounted } from 'vue';

const searchText = ref('');
const searchResult = ref(null);
const dropdownRef = ref(null);

function handleInput() {
    // Simulate search results for UI testing
    const dummyProducts = [
        { name: 'Product 1', slug: 'product-1', category: { slug: 'category-1' }, image: '["product1.jpg"]' },
        { name: 'Product 2', slug: 'product-2', category: { slug: 'category-2' }, image: '["product2.jpg"]' },
    ];
    searchResult.value = searchText.value ? dummyProducts : null;
}

function handleClickOutside(event) {
    if (dropdownRef.value && !dropdownRef.value.contains(event.target)) {
        searchResult.value = null;
    }
}

onMounted(() => {
    document.addEventListener('click', handleClickOutside);
});
onUnmounted(() => {
    document.removeEventListener('click', handleClickOutside);
});
</script>

<template>
    <div class="nav-item dropdown" ref="dropdownRef">
        <div class="input-group">
            <input v-model="searchText" @input="handleInput" @focus="handleInput" class="form-control rounded"
                type="search" placeholder="Search for products">
            <span class="input-group-append">
                <button class="btn bg-white border border-start-0 ms-n10 rounded-0 rounded-end" type="button">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                        class="feather feather-search">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </button>
            </span>
        </div>
        <ul v-if="searchResult" class="dropdown-menu show" aria-labelledby="searchDropdown" style="width: 100%;">
            <li v-for="product in searchResult" :key="product.slug">
                <a href="#" class="dropdown-item d-flex align-items-center">
                    <img :src="'/images/products/' + JSON.parse(product.image)[0]" class="me-5 img-thumbnail"
                        style="max-width: 50px;">
                    {{ product.name }}
                </a>
            </li>
        </ul>
    </div>
</template>
