<script setup>
// Import necessary components for UI layout
import MasterFrontend from './Layout/MasterFrontend.vue';
defineOptions({
    layout: MasterFrontend,
});

// Static data for demonstration
const product = {
    name: "Product Name",
    meta_title: "Meta Title",
    sale_price: "$15.00",
    price: "$20.00",
    category: {
        name: "Category Name",
        slug: "category-slug",
    },
    images: ["/images/products/product1.jpg", "/images/products/product2.jpg"],
};
</script>

<template>
    <Head>
        <meta head-key="og:title" property="og:title" content="Meta Title">
        <title>Product Name - FreshCart</title>
    </Head>

    <main>
        <section class="mt-8">
            <div class="container">
                <div class="row">
                    <div class="col-md-5 col-xl-6">
                        <!-- Image slider -->
                        <div class="product" id="product">
                            <div v-for="(image, index) in product.images" :key="index">
                                <div class="d-flex justify-content-center">
                                    <img class="w-50" :src="image" alt="Product Image" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7 col-xl-6">
                        <div class="ps-lg-10 mt-6 mt-md-0">
                            <!-- Product category -->
                            <a href="#" class="mb-4 d-block">Category Name</a>
                            <!-- Product name -->
                            <h1 class="mb-1">Product Name</h1>
                            <!-- Ratings -->
                            <div class="mb-4">
                                <small class="text-warning">
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-fill"></i>
                                    <i class="bi bi-star-half"></i>
                                </small>
                                <a href="#" class="ms-2">(30 reviews)</a>
                            </div>
                            <!-- Pricing -->
                            <div class="fs-4">
                                <span class="fw-bold text-dark">$15.00</span>
                                <span class="text-decoration-line-through text-muted">$20.00</span>
                                <span><small class="fs-6 ms-2 text-danger">26% Off</small></span>
                            </div>
                            <!-- Divider -->
                            <hr class="my-6" />
                            <!-- Weight options -->
                            <div class="mb-5">
                                <button type="button" class="btn btn-outline-secondary">250g</button>
                                <button type="button" class="btn btn-outline-secondary">500g</button>
                                <button type="button" class="btn btn-outline-secondary">1kg</button>
                            </div>
                            <!-- Quantity selector -->
                            <div>
                                <div class="input-group input-spinner">
                                    <input type="button" value="-" class="button-minus btn btn-sm" />
                                    <input type="number" name="quantity" value="1" class="quantity-field form-control-sm form-input" />
                                    <input type="button" value="+" class="button-plus btn btn-sm" />
                                </div>
                            </div>
                            <!-- Action buttons -->
                            <div class="mt-3 row justify-content-start g-2 align-items-center">
                                <div class="col-xxl-4 col-lg-4 col-md-5 col-5 d-grid">
                                    <button type="button" class="btn main-theme">
                                        <i class="feather-icon icon-shopping-bag me-2"></i>
                                        Add to cart
                                    </button>
                                </div>
                                <div class="col-md-4 col-4">
                                    <a class="btn btn-light" href="#">
                                        <i class="feather-icon icon-heart"></i>
                                    </a>
                                </div>
                            </div>
                            <!-- Divider -->
                            <hr class="my-6" />
                            <!-- Shipping details -->
                            <div>
                                <span>Shipping: </span>
                                <small>
                                    01 day shipping.
                                    <span class="text-muted">( Free pickup today)</span>
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>
