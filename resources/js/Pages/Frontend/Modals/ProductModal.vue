<script setup>
import { ref } from 'vue';
import "tiny-slider/dist/tiny-slider.css";

// Static product data
const product = {
    name: "Apple",
    categoryName: "Fruits",
    price: 50,
    sale_price: 40,
    images: ["product-img-11.jpg"], // Example images
    id: 1
};

// Static images array
const images = ref(product.images);

// Quantity management
const quantity = ref(1);
function quantitySelect(incOrDec) {
    if (incOrDec) quantity.value++;
    else if (quantity.value > 1) quantity.value--; // Prevent quantity below 1
}

</script>

<template>
    <!-- Modal -->
    <div class="modal fade" id="productViewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body p-8">
                    <div class="position-absolute top-0 end-0 me-3 mt-3">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="row" id="productData">
                        <div class="col-lg-6">
                            <!-- Image Slider -->
                            <div class="product productModal" id="productModal">
                                <div v-for="(image, index) in images" :key="index">
                                    <div>
                                        <img :src="'/images/products/' + image" alt="Product Image" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="ps-lg-8 mt-6 mt-lg-0">
                                <a href="#" class="mb-4 d-block" id="categoryTitle">{{ product.categoryName }}</a>
                                <h2 class="mb-1 h1" id="productTitle">{{ product.name }}</h2>
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
                                <div class="fs-4">
                                    <span v-if="product.sale_price" class="text-dark me-2">
                                        {{ product.sale_price }}
                                    </span>
                                    <span
                                        :class="product.sale_price ? 'text-decoration-line-through text-muted' : 'text-dark'">
                                        {{ product.price }}
                                    </span>
                                    <span>
                                        <small class="fs-6 ms-2 text-danger">26% Off</small>
                                    </span>
                                </div>
                                <hr class="my-6" />
                                <div>
                                    <div class="input-group input-spinner">
                                        <input @click="quantitySelect(0)" type="button" value="-"
                                            class="button-minus btn btn-sm" />
                                        <input v-model="quantity" id="quantity" type="text" name="quantity"
                                            class="quantity-field form-control-sm form-input" />
                                        <input @click="quantitySelect(1)" type="button" value="+"
                                            class="button-plus btn btn-sm" />
                                    </div>
                                </div>
                                <hr class="my-6" />
                                <div>
                                    <table class="table table-borderless">
                                        <tbody>
                                            <tr>
                                                <td>Type:</td>
                                                <td>{{ product.categoryName }}</td>
                                            </tr>
                                            <tr>
                                                <td>Shipping:</td>
                                                <td>
                                                    <small>
                                                        01 day shipping.
                                                        <span class="text-muted">(Free pickup today)</span>
                                                    </small>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
