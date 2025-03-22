<script setup>
import MasterFrontend from './Layout/MasterFrontend.vue';
defineOptions({
    layout: MasterFrontend,
})

defineProps({
    category: Object,
    products: Array
})

import ProductComponent from './Components/ProductComponent.vue';

import ProductModal from './Modals/ProductModal.vue';
import { ref } from 'vue';
const selectedProduct = ref({});
function handleEmit(item) {
    selectedProduct.value = item;
}
</script>

<template>

    <Head>
        <!-- Site Metas -->
        <meta head-key="description" name="description" :content="category.meta_description" />
        <meta head-key="keywords" name="keywords" content="" />

        <meta head-key="og:title" property="og:title" :content="category.meta_title">
        <meta head-key="og:description" property="og:description" :content="category.meta_description">
        <meta head-key="og:image" property="og:image" :content="'/images/categories/' + category.image">

        <title>Category {{ category.name }} - FreshCart</title>
    </Head>

    <main>
        <!-- section-->
        <div class="mt-4">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- col -->
                    <div class="col-12">
                        <!-- breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="#!">Home</a></li>
                                <li class="breadcrumb-item"><a href="#!">Shop</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ category.name }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <!-- section -->
        <div class="mt-8 mb-lg-14 mb-8">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row gx-10">
                    <section class="col-lg-12 col-md-12">
                        <!-- card -->
                        <div class="card mb-4 bg-light border-0">
                            <!-- card body -->
                            <div class="card-body p-9">
                                <h2 class="mb-0 fs-1">{{ category.name }}</h2>
                            </div>
                        </div>
                        <!-- list icon -->
                        <div class="d-lg-flex justify-content-between align-items-center">
                            <div class="mb-3 mb-lg-0">
                                <p class="mb-0">
                                    <span class="text-dark">{{ products.length }}</span>
                                    Products found
                                </p>
                            </div>

                            <!-- icon -->
                            <div class="d-md-flex justify-content-between align-items-center">
                                <div class="d-flex align-items-center justify-content-between">
                                    <div>
                                        <a href="#" class="text-muted me-3"><i class="bi bi-list-ul"></i></a>
                                        <a href="#" class="me-3 active"><i class="bi bi-grid"></i></a>
                                        <a href="#" class="me-3 text-muted"><i class="bi bi-grid-3x3-gap"></i></a>
                                    </div>
                                    <div class="ms-2 d-lg-none">
                                        <a class="btn btn-outline-gray-400 text-muted" data-bs-toggle="offcanvas"
                                            href="#offcanvasCategory" role="button" aria-controls="offcanvasCategory">
                                            <i class="fas fa-filter me-2"></i>
                                            Filters
                                        </a>
                                    </div>
                                </div>

                                <div class="d-flex mt-2 mt-lg-0">
                                    <div class="me-2 flex-grow-1">
                                        <!-- select option -->
                                        <select class="form-select">
                                            <option selected="">Show: 50</option>
                                            <option value="10">10</option>
                                            <option value="20">20</option>
                                            <option value="30">30</option>
                                        </select>
                                    </div>
                                    <div>
                                        <!-- select option -->
                                        <select class="form-select">
                                            <option selected="">Sort by: Featured</option>
                                            <option value="Low to High">Price: Low to High</option>
                                            <option value="High to Low">Price: High to Low</option>
                                            <option value="Release Date">Release Date</option>
                                            <option value="Avg. Rating">Avg. Rating</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- row -->
                        <div class="row g-4 row-cols-xl-4 row-cols-lg-3 row-cols-2 row-cols-md-2 mt-2">
                            <!-- col -->
                            <ProductComponent @selected-product="handleEmit" v-for="product in products"
                                :key="product.slug" :product="product" />

                        </div>
                        <div class="row mt-8">
                            <div class="col">
                                <!-- nav -->
                                <nav>
                                    <ul class="pagination">
                                        <li class="page-item disabled">
                                            <a class="page-link mx-1" href="#" aria-label="Previous">
                                                <i class="feather-icon icon-chevron-left"></i>
                                            </a>
                                        </li>
                                        <li class="page-item"><a class="page-link mx-1 active" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link mx-1" href="#">2</a></li>

                                        <li class="page-item"><a class="page-link mx-1" href="#">...</a></li>
                                        <li class="page-item"><a class="page-link mx-1" href="#">12</a></li>
                                        <li class="page-item">
                                            <a class="page-link mx-1" href="#" aria-label="Next">
                                                <i class="feather-icon icon-chevron-right"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </main>

    <ProductModal :product="selectedProduct" />
</template>
