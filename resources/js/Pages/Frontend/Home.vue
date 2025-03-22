<script setup>
import MasterFrontend from './Layout/MasterFrontend.vue';
defineOptions({
    layout: MasterFrontend,
})

import HeroSlider from './HeroSlider.vue';
import Category from './Category.vue';
import BoostDiscount from './BoostDiscount.vue';
import PopularProduct from './PopularProduct.vue';
import DailyBestSell from './DailyBestSell.vue';

defineProps({
    categories: Array,
    products: Array,
});

</script>

<template>
    <HeroSlider />
    <Category :categories="categories" />
    <BoostDiscount />
    <PopularProduct :products="products" />
    <DailyBestSell />
</template>
