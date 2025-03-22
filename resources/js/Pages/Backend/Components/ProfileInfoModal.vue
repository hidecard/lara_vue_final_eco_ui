<script setup>
import { formatDate } from './Utils/dateFormat';

const props = defineProps({
    customer: Object,
})

import { ref, watch } from 'vue';
const invoices = ref('');
const totalPurchase = ref('');
const addresses = ref('');
watch(() => props.customer, async (newProfile) => {
    const response = await axios.get(route('admin.invoice.get', newProfile.id));
    invoices.value = response.data.invoices;
    totalPurchase.value = response.data.totalPurchase;

    const response2 = await axios.get(route('address.data', newProfile.id));
    addresses.value = response2.data.addresses;
});

</script>
<template>
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title" id="offcanvasRightLabel">Customer Details</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div v-if="customer" class="offcanvas-body d-flex flex-column gap-4">
            <div class="d-flex flex-row align-items-center gap-4 w-100">
                <div class="flex-shrink-0">
                    <img :src="'/images/users/user_profile.svg'" alt="avatar" class="avatar avatar-xl rounded-circle" />
                </div>
                <div class="d-flex flex-column gap-1 flex-grow-1">
                    <h3 class="mb-0 h5 d-flex flex-row gap-3">
                        {{ customer.firstName + ' ' + customer.lastName }}
                        <span class="badge bg-light-success text-dark-success">Verified</span>
                    </h3>

                    <div class="d-md-flex align-items-center justify-content-between">
                        <div class="">#CU001</div>
                        <div class="text-black-50">
                            Last Active:
                            <span class="text-dark">31 May, 2025 3:24PM</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex flex-md-row flex-column gap-md-6 gap-2">
                <div class="d-flex flex-row gap-2">
                    <span class="text-dark fw-semibold">Email</span>
                    <span class="text-black-50">{{ customer.email }}</span>
                </div>
                <div class="d-flex flex-row gap-2">
                    <span class="text-dark fw-semibold">Phone Number</span>
                    <span class="text-black-50">{{ customer.phone }}</span>
                </div>
            </div>
            <div class="card rounded">
                <div class="card-body">
                    <div class="row">
                        <div class="border-end col-4">
                            <div class="d-flex flex-column gap-1">
                                <span class="text-black-50">Join Date</span>
                                <span class="text-dark">{{ formatDate(customer.created_at) }}</span>
                            </div>
                        </div>
                        <div class="border-end col-4">
                            <div class="d-flex flex-column gap-1">
                                <span class="text-black-50">Total Spent</span>
                                <span class="text-dark">${{ totalPurchase }}</span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="d-flex flex-column gap-1">
                                <span class="text-black-50">Total Order</span>
                                <span class="text-dark">{{ invoices.length }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="border-bottom p-4">
                    <h3 class="mb-0 h6">Details</h3>
                </div>
                <div class="card-body p-4 d-flex flex-column gap-5">
                    <div class="d-flex flex-column gap-2 lh-1">
                        <div class="h6 mb-0">Email</div>
                        <span class="text-black-50">{{ customer.email }}</span>
                    </div>
                    <div class="d-flex flex-column gap-2 lh-1">
                        <div class="h6 mb-0">Phone Number</div>
                        <span class="text-black-50">{{ customer.phone }}</span>
                    </div>

                    <div class="d-flex flex-column gap-2">
                        <div class="h6 mb-0">Address</div>
                        <div>

                            <div v-for="address in addresses" class="form-check">
                                <input :checked="address.is_default" class="form-check-input" type="radio"
                                    name="flexRadioDefault" id="flexRadioDefault1" />
                                <label class="form-check-label" for="flexRadioDefault1">
                                    {{ address.address }},
                                    {{ address.district }},
                                    {{ address.city }},
                                    {{ address.country }}
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div v-for="invoice in invoices" :key="invoice.id" class="card">
                <div class="bg-light rounded-top px-4 py-3">
                    <a href="#" class="d-flex align-items-center justify-content-between text-inherit"
                        data-bs-toggle="collapse" :data-bs-target="'#collapse' + invoice.id" aria-expanded="false"
                        :aria-controls="'#collapse' + invoice.id">
                        <div class="d-flex flex-row align-items-center gap-2">
                            <h3 class="mb-0 h5">Orders</h3>
                            <span class="text-black-50 lh-1">#00{{ invoice.id }}</span>
                        </div>
                        <div class="d-flex flex-row gap-6 align-items-center">
                            <div>
                                <span class="text-inherit">
                                    Date:
                                    <span class="text-dark">{{ formatDate(invoice.created_at) }}</span>
                                </span>
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-chevron-down chevron-down" viewBox="0 0 16 16">
                                <path fill-rule="evenodd"
                                    d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708" />
                            </svg>
                        </div>
                    </a>
                </div>
                <div class="card-body py-0 px-4">
                    <div class="accordion d-flex flex-column" id="accordionExample1">
                        <div :id="'collapse' + invoice.id" class="accordion-collapse collapse"
                            data-bs-parent="#accordionExample1">
                            <ul class="list-group list-group-flush mb-0">

                                <li v-for="item in invoice.invoice_orders" :key="item.id"
                                    class="list-group-item px-0 py-1">
                                    <a href="#!"
                                        class="text-inherit d-flex flex-row align-items-center justify-content-between">
                                        <div class="d-flex flex-row justify-content-between gap-3 align-items-center">
                                            <img :src="'/images/products/' + JSON.parse(item.product.image)[0]"
                                                class="icon-shape icon-xxl" alt="product img" />

                                            <span class="h6 mb-0">{{ item.product.name }}</span>
                                        </div>
                                        <span>{{ item.quantity }}</span>
                                        <span class="text-black-50">{{ item.amount }}</span>
                                    </a>
                                </li>

                                <li class="list-group-item px-0 py-3">
                                    <div class="d-flex flex-row justify-content-between">
                                        <span class="text-dark fw-semibold">Total Order Amount</span>
                                        <span class="text-dark fw-semibold">{{ invoice.total }}</span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>