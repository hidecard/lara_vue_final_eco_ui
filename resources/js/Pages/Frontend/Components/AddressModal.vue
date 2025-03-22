<script setup>
import { ref, onMounted } from 'vue';

const emit = defineEmits(['close']);
const isOpen = ref(false);

onMounted(() => {
    isOpen.value = true;
});

const handleOverlayClick = (event) => {
    if (event.target.classList.contains('modal-overlay')) {
        closeModal();
    }
};

const closeModal = () => {
    isOpen.value = false;
    setTimeout(() => emit('close'), 300); // Adjust timing to match transition duration
};
//modal logics end


import bdData from "@/js/bangladesh.json";
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    address: {
        type: Object,
        default: () => ({}) // Set default to an empty object
    }
})

const addressForm = useForm({
    country: props.address?.country || 'Bangladesh',
    city: props.address?.city || '',
    district: props.address?.district || '',
    address: props.address?.address || '',
    address_type: props.address?.address_type || '',
    is_default: props.address?.is_default ? true : false || false,
});

const districts = addressForm.city ? ref(bdData.divisions[addressForm.city].districts) : ref('');
function updateDistricts() {
    districts.value = bdData.divisions[addressForm.city].districts;
}

function submitForm() {
    addressForm.post(route('profile.address.update'), {
        onSuccess: () => {
            closeModal();
            toast.success("Address Updated");
        },
        onError: () => {
            if (addressForm.errors.message)
                toast.error(addressForm.errors.message);
        },
    })
}
</script>

<template>
    <teleport to="body">
        <transition name="modal-fade">
            <div v-if="isOpen" class="modal-overlay" @click="handleOverlayClick">
                <div class="modal-dialog modal-dialog-centered" @click.stop>
                    <div class="modal-content">
                        <div class="modal-body p-6">
                            <div class="d-flex justify-content-between mb-5">
                                <div>
                                    <h5 class="mb-1" id="addAddressModalLabel">Update Shipping Address</h5>
                                    <p class="small mb-0">Add new shipping address for your order delivery.</p>
                                </div>
                                <div>
                                    <button type="button" class="btn-close" @click="closeModal"></button>
                                </div>
                            </div>
                            <!-- Form fields -->
                            <form @submit.prevent="submitForm" class="row g-3">
                                <div class="col-12">
                                    <select v-model="addressForm.address_type" class="form-select">
                                        <option value="">Address Type</option>
                                        <option value="home">Home</option>
                                        <option value="office">Office</option>
                                    </select>
                                    <small class="text-danger">{{ addressForm.errors.address_type }}</small>
                                </div>
                                <div class="col-12">
                                    <select v-model="addressForm.country" class="form-select">
                                        <option value="">Country</option>
                                        <option value="Bangladesh">Bangladesh</option>
                                        <option value="Bangladesh">Dubai</option>
                                        <option value="Bangladesh">Canada</option>
                                    </select>
                                    <small class="text-danger">{{ addressForm.errors.country }}</small>

                                </div>

                                <div class="col-12">
                                    <select @change="updateDistricts" v-model="addressForm.city" class="form-select">
                                        <option value="">Select City</option>
                                        <option v-for="city in bdData.divisions" :key="city.name" :value="city.name">{{
                                            city.name }}</option>
                                    </select>
                                    <small class="text-danger">{{ addressForm.errors.city }}</small>

                                </div>

                                <div class="col-12">

                                    <select :disabled="!addressForm.city" v-model="addressForm.district"
                                        class="form-select">
                                        <option value="">Select District</option>
                                        <option v-for="district in districts" :key="district.name"
                                            :value="district.name">{{
                                                district.name }}</option>
                                    </select>
                                    <small class="text-danger">{{ addressForm.errors.district }}</small>

                                </div>

                                <div class="col-12">
                                    <input v-model="addressForm.address" type="text" class="form-control"
                                        placeholder="Road, House Number" />
                                    <small class="text-danger">{{ addressForm.errors.address }}</small>

                                </div>

                                <div class="col-12">
                                    <div class="form-check">
                                        <input v-model="addressForm.is_default" class="form-check-input" type="checkbox"
                                            value="" id="flexCheckDefault" />
                                        <label class="form-check-label" for="flexCheckDefault">Set as Default</label>
                                    </div>
                                    <small class="text-danger">{{ addressForm.errors.is_default }}</small>

                                </div>

                                <div class="d-flex justify-content-end gap-2">
                                    <button type="button" class="btn btn-outline-primary"
                                        @click="closeModal">Cancel</button>
                                    <button class="btn main-theme" type="submit">Save Address</button>
                                </div>
                            </form>
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
