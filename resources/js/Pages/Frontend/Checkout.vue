<script setup>
import MasterFrontend from './Layout/MasterFrontend.vue';
defineOptions({
    layout: MasterFrontend,
})


</script>
<template>
    <main>
        <!-- section -->
        <section class="mb-lg-14 mb-8 mt-8">
            <div class="container">
                    <h1 class="fw-bold mb-3">Checkout</h1>
                <div>
                    <!-- row -->
                    <div class="row">
                        <div class="col-xl-7 col-lg-6 col-md-12">
                            <!-- accordion -->
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <!-- accordion item -->
                                <div class="accordion-item py-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <!-- heading one -->
                                        <a href="#" class="fs-5 text-inherit collapsed h4" data-bs-toggle="collapse"
                                            data-bs-target="#flush-collapseOne" aria-expanded="true"
                                            aria-controls="flush-collapseOne">
                                            <i class="feather-icon icon-map-pin me-2 text-muted"></i>
                                            Add delivery address
                                        </a>
                                        <!-- btn -->
                                        <a @click="openModal('new')" class="btn btn-outline-primary btn-sm">Add a new
                                            address</a>
                                        <!-- collapse -->
                                    </div>
                                    <div id="flush-collapseOne" class="accordion-collapse collapse show"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="mt-5">
                                            <div class="row">
                                                <!-- address will goes here  -->
                                            </div>
                                        </div>
                                    </div>

                                </div>


                                <!-- accordion item -->
                                <div class="accordion-item py-4">
                                    <a href="#" class="text-inherit h5" data-bs-toggle="collapse"
                                        data-bs-target="#flush-collapseFour" aria-expanded="false"
                                        aria-controls="flush-collapseFour">
                                        <i class="feather-icon icon-credit-card me-2 text-muted"></i>
                                        Payment Method
                                        <!-- collapse -->
                                    </a>
                                    <div id="flush-collapseFour" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionFlushExample">
                                        <div class="mt-5">
                                            <div class="">
                                                <div class="card card-bordered shadow-none mb-2">
                                                    <!-- card body -->
                                                    <div class="card-body p-6">
                                                        <!-- check input -->
                                                        <div class="d-flex">
                                                            <div class="form-check">
                                                                <input
                                                                    value="others" class="form-check-input" type="radio"
                                                                    name="flexRadioDefault" id="others" />
                                                                <label class="form-check-label ms-2"
                                                                    for="others"></label>
                                                            </div>
                                                            <div>
                                                                <!-- title -->
                                                                <h5 class="mb-1 h6">Pay with other Banks
                                                                </h5>
                                                                <p class="mb-0 small">You will be redirected to
                                                                    SSLCOMMERZ
                                                                    Gateway to complete your purchase securely.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- card -->
                                                <div class="card card-bordered shadow-none">
                                                    <div class="card-body p-6">
                                                        <!-- check input -->
                                                        <div class="d-flex">
                                                            <div class="form-check">
                                                                <input value="cod"
                                                                    class="form-check-input" type="radio"
                                                                    name="flexRadioDefault" id="cashonDelivery" />
                                                                <label class="form-check-label ms-2"
                                                                    for="cashonDelivery"></label>
                                                            </div>
                                                            <div>
                                                                <!-- title -->
                                                                <h5 class="mb-1 h6">Cash on Delivery</h5>
                                                                <p class="mb-0 small">Pay with cash when your order is
                                                                    delivered.</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- Button -->
                                                <div class="mt-5 d-flex justify-content-end">
                                                    <a href="#" class="btn btn-outline-gray-400 text-muted"
                                                        data-bs-toggle="collapse" data-bs-target="#flush-collapseThree"
                                                        aria-expanded="false" aria-controls="flush-collapseThree">
                                                        Prev
                                                    </a>
                                                    <button class="btn main-theme ms-2">Place Order</button>
                                                    <!-- payment method options will go here  -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- <CheckoutCart />  will goes here-->
                    </div>
                </div>
            </div>
        </section>
    </main>

</template>
