<script setup>
import { ref, onMounted, computed } from 'vue';

const emit = defineEmits(['close']);
const isOpen = ref(false);

onMounted(() => {
    isOpen.value = true;
});

const closeModal = () => {
    isOpen.value = false;
    setTimeout(() => emit('close'), 300); // Adjust timing to match transition duration
};
//modal logics end


const props = defineProps({
    paymentOptions: Array,
})

const filteredGateway = computed(() => {
    loader.hide();
    return props.paymentOptions.value.filter(method =>
        method.name.toLowerCase().includes('bkash') || method.name.toLowerCase().includes('dbbl')
    );
});

function redirectToGateway(url) {
    window.location.href = url;
}
</script>

<template>
    <teleport to="body">
        <transition name="modal-fade">
            <div v-if="isOpen" class="modal-overlay" @click="handleOverlayClick">
                <div class="modal-dialog modal-dialog-centered" @click.stop>
                    <div class="modal-content">
                        <div class="modal-body p-6">
                            <h4 class="text-center mb-5"> Select a payment method
                            </h4>
                            <div class="d-flex flex-row gap-10">
                                <div v-for="(method, index) in filteredGateway" :key="index"
                                    class="d-flex flex-column align-items-center">
                                    <img @click="redirectToGateway(method.redirectGatewayURL)" :src="method.logo"
                                        alt="Logo" class="payment-logo"
                                        style="cursor: pointer; height: 150px; width: 150px;" />

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </teleport>
</template>

<style scoped>
.modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    display: flex;
    justify-content: center;
    align-items: center;
    background: rgba(0, 0, 0, 0.7);
    z-index: 1000;
    transition: opacity 0.3s ease;
}

.modal-dialog {
    transition: opacity 0.3s ease;
}

.modal-content {
    background: white;
    border-radius: 8px;
    width: 100%;
    max-width: 500px;
    overflow: hidden;
}

/* Simple Fade Transition */
.modal-fade-enter-active,
.modal-fade-leave-active {
    transition: opacity 0.3s ease;
}

.modal-fade-enter-from,
.modal-fade-leave-to {
    opacity: 0;
}

.modal-fade-enter-to,
.modal-fade-leave-from {
    opacity: 1;
}
</style>
