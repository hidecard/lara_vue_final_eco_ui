<script setup>
import { onMounted, ref } from 'vue';
import MasterProfile from './Layout/MasterProfile.vue';
import InvoiceModal from '../Modals/InvoiceModal.vue';

defineOptions({
    layout: MasterProfile,
});

// Removes backdrop if login from login modal
onMounted(() => {
    const backdrop = document.querySelector('.modal-backdrop');
    if (backdrop) {
        backdrop.remove();
    }
});

const showModal = ref(false);
const selectedInvoice = ref(null);

const openInvoice = (invoice) => {
    selectedInvoice.value = invoice;
};

// Dummy static data for UI purposes
const orders = [
    {
        id: 'INV001',
        created_at: '2024-12-30',
        order_status: 'delivered',
        total: '$200',
        invoice_orders: [
            {
                product: {
                    name: 'Sample Product 1',
                    image: '["product-img-11.jpg"]',
                },
            },
        ],
    },
    {
        id: 'INV002',
        created_at: '2024-11-15',
        order_status: 'canceled',
        total: '$150',
        invoice_orders: [
            {
                product: {
                    name: 'Sample Product 2',
                    image: '["product-img-11.jpg"]',
                },
            },
        ],
    },
];
</script>

<template>
    <div class="col-lg-9 col-md-8 col-12">
        <div class="py-6 p-md-6 p-lg-10">
            <!-- Heading -->
            <h2 class="mb-6">Your Orders</h2>

            <div class="table-responsive-xxl border-0">
                <!-- Table -->
                <table class="table mb-0 text-nowrap table-centered">
                    <!-- Table Head -->
                    <thead class="bg-light">
                        <tr>
                            <th>&nbsp;</th>
                            <th>Product</th>
                            <th>Invoice ID</th>
                            <th>Date</th>
                            <th>Items</th>
                            <th>Order Status</th>
                            <th>Amount</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Static Data -->
                        <tr v-for="order in orders" :key="order.id">
                            <td class="align-middle border-top-0 w-0">
                                <a href="#"><img
                                        :src="`images/products/${JSON.parse(order.invoice_orders[0].product.image)[0]}`"
                                        alt="Ecommerce" class="icon-shape icon-xl" /></a>
                            </td>
                            <td class="align-middle border-top-0">
                                <a href="#" class="fw-semibold text-inherit">
                                    <h6 class="mb-0">{{ order.invoice_orders[0].product.name + '...' }}</h6>
                                </a>
                                <span><small class="text-muted">400g</small></span>
                            </td>
                            <td class="align-middle border-top-0">
                                <a href="#" class="text-inherit">{{ order.id }}</a>
                            </td>
                            <td class="align-middle border-top-0">
                                {{ new Date(order.created_at).toLocaleDateString('en-GB', {
                                    day: 'numeric',
                                    month: 'long',
                                    year: 'numeric',
                                }) }}
                            </td>
                            <td class="align-middle border-top-0">{{ order.invoice_orders.length }}</td>
                            <td class="align-middle border-top-0">
                                <span class="badge bg-warning" :class="{
                                    'bg-danger': order.order_status === 'canceled' || order.order_status === 'failed',
                                    'bg-info': order.order_status === 'shipped',
                                    'bg-success': order.order_status === 'delivered',
                                }">
                                    {{ order.order_status }}
                                </span>
                            </td>
                            <td class="align-middle border-top-0">{{ order.total }}</td>
                            <td class="text-muted align-middle border-top-0">
                                <a href="#" v-if="order.order_status != 'canceled'"
                                    @click="openInvoice(order)" data-bs-toggle="modal" data-bs-target="#invoiceModal">
                                    <i class="feather-icon icon-eye text-success"></i>
                                </a>
                                <p v-else class="text-inherit" data-bs-toggle="tooltip" data-bs-placement="top"
                                    data-bs-title="View">
                                    <i class="feather-icon icon-eye-off text-danger"></i>
                                </p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <InvoiceModal :invoice="selectedInvoice" />
</template>
