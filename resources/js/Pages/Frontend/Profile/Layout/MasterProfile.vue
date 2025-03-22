<script setup>
import Navigation from '../../Layout/Navigation.vue';
import Footer from '../../Layout/Footer.vue';
import ProfileSideNav from './ProfileSideNav.vue';
</script>
<template>

    <Head>
        <title>FreshCart - Profile</title>
    </Head>

    <Navigation />
    <ProfileSideNav>

        <slot />
    </ProfileSideNav>

    <Footer />

</template>