<template>
    <div class="col">
        <div class="card card-product">
            <div class="card-body">

                <div class="text-center position-relative">
                    <div class="position-absolute top-0 start-0">
                        <span class="badge bg-danger">New</span>
                    </div>
                    <a href="#">
                        <img src="/public/images/products/product-img-11.jpg" alt="Product Image" class="mb-3 img-fluid">
                    </a>

                    <div class="card-product-action">
                        <a href="#" class="btn-action" data-bs-toggle="modal" data-bs-target="#productViewModal">
                            <i class="bi bi-eye" title="Quick View"></i>
                        </a>
                        <a href="#" class="btn-action" title="Wishlist">
                            <i class="bi bi-heart"></i>
                        </a>
                    </div>
                </div>

                <div class="text-small mb-1">
                    <a href="#" class="text-decoration-none text-muted"><small>Category Name</small></a>
                </div>
                <h2 class="fs-6">
                    <a href="#" class="text-inherit text-decoration-none">Sample Product Name</a>
                </h2>
                <div>
                    <small class="text-warning">
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-fill"></i>
                        <i class="bi bi-star-half"></i>
                    </small>
                </div>

                <div class="d-flex justify-content-between align-items-center mt-3">
                    <div>
                        <span class="text-dark">$50</span>
                        <span class="text-decoration-line-through text-muted">$70</span>
                    </div>
                    <div>
                        <a href="#" class="btn main-theme btn-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-plus">
                                <line x1="12" y1="5" x2="12" y2="19"></line>
                                <line x1="5" y1="12" x2="19" y2="12"></line>
                            </svg> Add
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
