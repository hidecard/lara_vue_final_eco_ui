<script setup>
const props = defineProps({
    invoice: Object,
    user: Object,
    invoiceOrders: Object,
})

import { onMounted } from 'vue';
onMounted(() => {
    setTimeout(() => {
        window.print();
    }, 500);
})
</script>
<template>
    <div id="invoice" class="row invoice">
        <div class="col-12 mb-5">
            <!-- card -->
            <div class="card h-100 card-xl">
                <div class="mt-5">
                    <img :src="'/images/freshcart-logo.svg'" alt="FreshCart - Grocery Shop" class="ms-5 mb-10 w-16">
                    <div class="row col-12 ps-4">
                        <!-- address -->
                        <div class="col-4">
                            <div class="mb-6">
                                <h6>Customer Details</h6>
                                <p class="mb-1 lh-lg">
                                    {{ user.firstName + ' ' + user.lastName }}
                                    <br />
                                    {{ user.email }} <br />
                                    {{ user.phone }}
                                </p>
                                <!-- <a href="#">View Profile</a> -->
                            </div>
                        </div>
                        <!-- address -->
                        <div class="col-4">
                            <div class="mb-6">
                                <h6>Shipping Address</h6>
                                <p class="mb-1 lh-lg">
                                    Gerg Harvell
                                    <br />
                                    568, Suite Ave.
                                    <br />
                                    Austrlia, 235153
                                    <br />
                                    Contact No. +91 99999 12345
                                </p>
                            </div>
                        </div>
                        <!-- address -->
                        <div class="col-4 d-flex justify-content-end">
                            <div class="mb-6">
                                <h6>Order Details</h6>
                                <p class="mb-1 lh-lg">
                                    Order ID:
                                    <span class="text-dark">#FC{{ invoice.id }}</span>
                                    <br />
                                    Order Date:
                                    <span class="text-dark">{{ new
                                        Date(invoice.created_at).toLocaleString('en-GB', {
                                            day: '2-digit',
                                            month: 'short',
                                            year: 'numeric',
                                        })
                                        }}</span>
                                    <br />
                                    Total Due:
                                    <span class="text-dark">{{ invoice.due }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <!-- Table -->
                            <table class="table mb-0 text-nowrap table-centered">
                                <!-- Table Head -->
                                <thead class="bg-light">
                                    <tr>
                                        <th>Products</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <!-- tbody -->
                                <tbody>
                                    <tr v-for="item in invoiceOrders" :key="item.product.id">
                                        <td>
                                            <a class="text-inherit">
                                                <div class="d-flex align-items-center">
                                                    <div>
                                                        <img :src="'/images/products/' + JSON.parse(item.product.image)[0]"
                                                            alt="" class="icon-shape icon-lg" />
                                                    </div>
                                                    <div class="ms-lg-4 mt-2 mt-lg-0">
                                                        <h5 class="mb-0 h6">{{ item.product.name }}</h5>
                                                    </div>
                                                </div>
                                            </a>
                                        </td>
                                        <td><span class="text-body">{{ item.amount / item.quantity
                                                }}</span></td>
                                        <td>{{ item.quantity }}</td>
                                        <td>{{ item.amount }}</td>
                                    </tr>
                                    <tr>
                                        <td class="border-bottom-0 pb-0"></td>
                                        <td class="border-bottom-0 pb-0"></td>
                                        <td colspan="1" class="fw-medium text-dark">
                                            <!-- text -->
                                            Sub Total :
                                        </td>
                                        <td class="fw-medium text-dark">
                                            <!-- text -->
                                            {{ invoice.total }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="border-bottom-0 pb-0"></td>
                                        <td class="border-bottom-0 pb-0"></td>
                                        <td colspan="1" class="fw-medium text-dark">
                                            <!-- text -->
                                            Shipping Cost
                                        </td>
                                        <td class="fw-medium text-dark">
                                            <!-- text -->
                                            $3.00
                                        </td>
                                    </tr>

                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td colspan="1" class="fw-semibold text-dark">
                                            <!-- text -->
                                            Grand Total
                                        </td>
                                        <td class="fw-semibold text-dark">
                                            <!-- text -->
                                            {{ invoice.total }}
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-body p-6">
                    <div class="row">
                        <div class="col-6 mb-4 mb-lg-0">
                            <h6>Payment Method</h6>
                            <span>{{ invoice.payment_method.toUpperCase() }}</span>
                        </div>
                        <div class=" col-6">
                            <h5>Notes</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis impedit ut quis
                                facere dolorem, deleniti doloribus in voluptate optio ducimus qui praesentium asperiores
                                et expedita aspernatur? Facere, voluptatem! Iure, tempora!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<style scoped></style>