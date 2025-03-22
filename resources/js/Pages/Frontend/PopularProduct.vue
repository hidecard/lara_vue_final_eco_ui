<script setup>
defineProps({
    products: String,
})

import ProductComponent from './Components/ProductComponent.vue';

import ProductModal from './Modals/ProductModal.vue';
import { ref } from 'vue';
const selectedProduct = ref({});
function handleEmit(item) {
    selectedProduct.value = item;
}
</script>
<template>
    <AddProduct />
    <section class="my-lg-14 my-8">
        <div class="container">
            <div class="row">
                <div class="col-12 mb-6">

                    <h3 class="mb-0">Popular Products</h3>

                </div>
            </div>

            <div class="row g-4 row-cols-lg-5 row-cols-2 row-cols-md-3">
                <ProductComponent @selected-product="handleEmit" v-for="product in products" :key="product.id"
                    :product="product" />
            </div>
        </div>
    </section>

    <ProductModal :product="selectedProduct" />
</template>