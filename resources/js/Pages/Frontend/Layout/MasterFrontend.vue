<script setup>
import "@/css/theme.min.css";
import "@/css/use.css";

import Navigation from './Navigation.vue';
import Footer from './Footer.vue';

</script>
<template>

    <Head>
        <!-- Site Metas -->
        <meta head-key="description" name="description" content="" />
        <meta head-key="keywords" name="keywords" content="" />

        <meta head-key="og:title" property="og:title" content="">
        <meta head-key="og:description" property="og:description" content="">
        <meta head-key="og:image" property="og:image" content="">

        <title>FreshCart - Online Grocery Shopping Platform</title>
    </Head>

    <Navigation />

    <slot />

    <Footer />

</template>
