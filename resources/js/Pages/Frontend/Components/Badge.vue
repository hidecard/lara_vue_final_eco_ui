<script setup>
const props = defineProps({
    status: String,
})
const classes = {
    'pending': 'bg-light-warning text-dark-warning',
    'delivered': 'bg-light-success text-dark-success',
    'success': 'bg-light-success text-dark-success',
    'shipped': 'bg-light-info text-dark-info',
    'failed': 'bg-light-danger text-dark-danger',
    'canceled': 'bg-light-danger text-dark-danger',
}
</script>
<template>
    <span class="badge" :class="classes[status]">
        {{ status.toUpperCase() }}
    </span>
</template>