<script setup>
import { ref } from 'vue';

// Mock cart list with static data
const cartList = ref([
  { id: 1, name: 'Product 1', price: 10.99, quantity: 2 },
  { id: 2, name: 'Product 2', price: 15.49, quantity: 1 },
  { id: 3, name: 'Product 3', price: 8.75, quantity: 3 },
]);


</script>

<template>
  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header border-bottom">
      <div class="text-start">
        <h5 id="offcanvasRightLabel" class="mb-0 fs-4">Shop Cart</h5>
      </div>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <div class="alert alert-danger" role="alert">
        You’ve got FREE delivery. Start checkout now!
      </div>
      <div>
        <div class="py-3">
          <ul class="list-group list-group-flush" id="productList">
            <li v-for="product in cartList" :key="product.id" class="list-group-item py-3 px-0 border-top">
              <div class="row align-items-center">
                <div class="col-2">
                  <img src="/public/images/products/product-img-11.jpg" alt="Ecommerce" class="img-fluid" />
                </div>
                <div class="col-5">
                  <h6 class="mb-0">{{ product.name }}</h6>
                  <span><small class="text-muted">{{ product.price }} / unit</small></span>
                  <div class="mt-2 small">
                    <button @click="removeCartItem(product.id)" class="bg-none btn btn-sm text-danger">
                      <span class="me-1">
                        <i class="fas fa-trash"></i>
                      </span>
                      Remove
                    </button>
                  </div>
                </div>
                <div class="col-3">
                  <div class="input-group input-spinner">
                    <button
                      @click="quantityUpdate(product, 0)"
                      type="button"
                      class="button-minus btn btn-sm"
                      :disabled="product.quantity === 1"
                    >
                      -
                    </button>
                    <input
                      type="text"
                      v-model="product.quantity"
                      readonly
                      class="quantity-field form-control-sm form-input"
                    />
                    <button @click="quantityUpdate(product, 1)" type="button" class="button-plus btn btn-sm">
                      +
                    </button>
                  </div>
                </div>
                <div class="col-2 text-end">
                  <span class="fw-bold">{{ (product.price * product.quantity).toFixed(2) }}</span>
                </div>
              </div>
            </li>
          </ul>
        </div>
        <div class="d-grid">
          <a
            v-if="totalAmmount > 0"
            href="#"
            class="btn main-theme btn-lg d-flex justify-content-between align-items-center"
          >
            Go to Checkout <span class="fw-bold" id="totalAmmount">{{ totalAmmount }}</span>
          </a>
        </div>
      </div>
    </div>
  </div>
</template>
