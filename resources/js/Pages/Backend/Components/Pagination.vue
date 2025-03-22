<script setup>
defineProps({
    paginator: Object,
    scrollPreserve: Boolean,
})
</script>
<template>
    <div class="border-top d-md-flex justify-content-between align-items-center px-6 py-6">
        <span>Showing {{ paginator.from }} to {{ paginator.to }} of {{ paginator.total }}
            entries</span>
        <nav class="mt-2 mt-md-0">
            <ul class="pagination mb-0">
                <li v-for="link in paginator.links" :key="link.label" class="page-item">
                    <Link :href="link.url" v-html="link.label" class="page-link"
                        :class="{ 'active': link.active, 'disabled': !link.url }" :preserve-scroll="scrollPreserve">
                    </Link>
                </li>
            </ul>
        </nav>
    </div>
</template>