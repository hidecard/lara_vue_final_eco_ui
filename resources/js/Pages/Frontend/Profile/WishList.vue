<script setup>
import MasterProfile from './Layout/MasterProfile.vue';

defineOptions({
    layout: MasterProfile,
});
</script>

<template>
    <div class="col-lg-9 col-md-8 col-12">
        <div class="py-6 p-md-6 p-lg-10">
            <div class="mb-8">
                <!-- Heading -->
                <h2 class="mb-0">My Wishlist</h2>
                <p>There are 3 products in this wishlist.</p>
            </div>
            <div>
                <!-- Table -->
                <div class="table-responsive">
                    <table class="table text-nowrap">
                        <thead class="table-light">
                            <tr>
                                <th>
                                    <!-- Form Check -->
                                    <div class="form-check">
                                        <!-- Input -->
                                        <input class="form-check-input" type="checkbox" value="" id="chechboxOne" />
                                        <!-- Label -->
                                        <label class="form-check-label" for="chechboxOne"></label>
                                    </div>
                                </th>
                                <th></th>
                                <th>Product</th>
                                <th>Amount</th>
                                <th>Remove</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                            <!-- Static Wishlist Items -->
                            <tr>
                                <td class="align-middle">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="chechboxTwo" />
                                        <label class="form-check-label" for="chechboxTwo"></label>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <a href="#">
                                        <img src="/public/images/products/product-img-11.jpg" alt="Product 1"
                                            class="img-fluid icon-shape icon-xxl" />
                                    </a>
                                </td>
                                <td class="align-middle">
                                    <div>
                                        <h5 class="fs-6 mb-0">
                                            <a href="#" class="text-inherit">Product 1 Name</a>
                                        </h5>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    $50.00
                                </td>
                                <td class="align-middle text-center">
                                    <a class="text-muted" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                        <i class="feather-icon icon-trash-2"></i>
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="align-middle">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="chechboxThree" />
                                        <label class="form-check-label" for="chechboxThree"></label>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    <a href="#">
                                        <img src="/public/images/products/product-img-12.jpg" alt="Product 2"
                                            class="img-fluid icon-shape icon-xxl" />
                                    </a>
                                </td>
                                <td class="align-middle">
                                    <div>
                                        <h5 class="fs-6 mb-0">
                                            <a href="#" class="text-inherit">Product 2 Name</a>
                                        </h5>
                                    </div>
                                </td>
                                <td class="align-middle">
                                    $70.00
                                </td>
                                <td class="align-middle text-center">
                                    <a class="text-muted" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete">
                                        <i class="feather-icon icon-trash-2"></i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>
