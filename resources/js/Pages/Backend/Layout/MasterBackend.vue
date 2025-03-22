<script setup>
import "@/back-end/css/theme.min.css";

import Navigation from './Navigation.vue';
</script>
<template>

    <Head>
        <title>FreshCart - Dashboard</title>
    </Head>
    <Navigation>
        <slot />
    </Navigation>
</template>