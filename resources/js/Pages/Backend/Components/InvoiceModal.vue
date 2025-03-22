<script setup>
const props = defineProps({
    invoice: Object,
})
import Badge from './Badge.vue';
import { ref, watch } from 'vue';
const user = ref('');
const invoiceOrders = ref('');

watch(() => props.invoice, async (newInvoice) => {
    const response = await axios.get(route('invoice.data', newInvoice.id));
    user.value = response.data.user;
    invoiceOrders.value = response.data.invoiceOrders;
});

const downloadInvoice = () => {
    window.location.href = route('invoiceDownload', props.invoice.id);
};

const printInvoice = () => {
    window.open(route('invoicePrint', props.invoice.id), '_blank');
};
</script>
<template>
    <div class="modal fade" id="invoiceModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content p-4">
                <div v-if="invoice" class="modal-body">
                    <div class="row mb-8">
                        <div class="col-md-12">
                            <div
                                class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-4">
                                <div>
                                    <!-- page header -->
                                    <h2>Order Single</h2>
                                    <!-- breacrumb -->
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb mb-0">
                                            <li class="breadcrumb-item"><a href="#" class="text-inherit">Dashboard</a>
                                            </li>
                                            <li class="breadcrumb-item active" aria-current="page">Order Single
                                            </li>
                                        </ol>
                                    </nav>
                                </div>
                                <!-- button -->
                                <div>
                                    <button class="btn main-theme" data-bs-dismiss="modal" aria-label="Close">Back
                                        to all orders</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- row -->
                    <div class="row">
                        <div class="col-xl-12 col-12 mb-5">
                            <!-- card -->
                            <div class="card h-100 card-lg">
                                <div class="card-body p-6">
                                    <div class="d-md-flex justify-content-between">
                                        <div class="d-flex align-items-center mb-2 mb-md-0">
                                            <h2 class="mb-0">Order ID: #FC{{ invoice.id }} </h2>
                                            <Badge :status="invoice.order_status" />
                                        </div>
                                        <!-- select option -->
                                        <div class="d-md-flex gap-1">
                                            <div class="mb-2 mb-md-0">
                                                <select class="form-select">
                                                    <option selected>Status</option>
                                                    <option value="Success">Success</option>
                                                    <option value="Pending">Pending</option>
                                                    <option value="Cancel">Cancel</option>
                                                </select>
                                            </div>
                                            <!-- button -->
                                            <div class="d-flex gap-1">
                                                <a href="#" class="btn main-theme">Save</a>
                                                <a @click="downloadInvoice" class="btn btn-secondary">Download
                                                    Invoice</a>
                                                <a @click="printInvoice" class="btn btn-secondary">Print
                                                    Invoice</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-8">
                                        <div class="row">
                                            <!-- address -->
                                            <div class="col-lg-4 col-md-4 col-12">
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
                                            <div class="col-lg-4 col-md-4 col-12">
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
                                            <div class="col-lg-4 col-md-4 col-12">
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
                                        <div class="col-md-6 mb-4 mb-lg-0">
                                            <h6>Payment Method</h6>
                                            <span>{{ invoice.payment_method.toUpperCase() }}</span>
                                        </div>
                                        <div class="col-md-6">
                                            <h5>Notes</h5>
                                            <textarea class="form-control mb-3" rows="3"
                                                placeholder="Write note for order"></textarea>
                                            <a href="#" class="btn main-theme">Save Notes</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<!-- <style scoped>
@media print {

    body>*:not(#invoice) {
        display: none;
    }

    body>#invoice {
        display: block;
    }
}
</style> -->
