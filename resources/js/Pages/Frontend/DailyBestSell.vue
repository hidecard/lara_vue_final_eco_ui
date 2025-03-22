<script setup>
const dailyBestSells = {
    "bannerInfo": {
        "title": "100% Organic Coffee Beans",
        "description": "Get the best deal before close.",
        "image": "images/banner/banner-deal.jpg"
    },
    "products": [
        {
            "category": "Tea, Coffee & Drinks",
            "name": "Roast Ground Coffee",
            "price": {
                "current": 13,
                "original": 18
            },
            "image": "images/products/product-img-11.jpg"
        },
        {
            "category": "Fruits & Vegetables",
            "name": "Crushed Tomatoes",
            "price": {
                "current": 13,
                "original": 18
            },
            "image": "images/products/product-img-12.jpg"
        },
        {
            "category": "Fruits & Vegetables",
            "name": "Golden Pineapple",
            "price": {
                "current": 13,
                "original": 18
            },
            "image": "images/products/product-img-13.jpg"
        }
    ]
}
</script>

<template>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 mb-6">
                    <h3 class="mb-0">Daily Best Sells</h3>
                </div>
            </div>

            <div class="row row-cols-lg-4 row-cols-1 row-cols-md-2 g-4">
                <div class="col">
                    <div class=" pt-8 px-8 rounded-3"
            :style="{ background: `url(${dailyBestSells.bannerInfo.image})`, backgroundRepeat: 'no-repeat', backgroundSize: 'cover', height: '470px' }">

                        <div>
                            <h3 class="fw-bold text-white">{{ dailyBestSells.bannerInfo.title }}
                            </h3>
                            <p class="text-white">{{ dailyBestSells.bannerInfo.description }}</p>
                            <a href="#!" class="btn main-theme">Shop Now <i
                                    class="feather-icon icon-arrow-right ms-1"></i></a>
                        </div>
                    </div>
                </div>

                <div v-for="product in dailyBestSells.products" class="col">
                    <div class="card card-product">
                        <div class="card-body">
                            <div class="text-center  position-relative "> <a href="#!"><img :src="product.image"
                                        alt="Grocery Ecommerce Template" class="mb-3 img-fluid"></a>

                                <div class="card-product-action">
                                    <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                                        title="Quick View"><i class="bi bi-eye"></i></a>
                                    <a href="#!" class="btn-action" data-bs-toggle="tooltip" data-bs-html="true"
                                        title="Wishlist"><i class="bi bi-heart"></i></a>

                                </div>
                            </div>
                            <div class="text-small mb-1"><a href="#!" class="text-decoration-none text-muted"><small>{{
                                product.category }}</small></a></div>
                            <h2 class="fs-6"><a href="#!" class="text-inherit text-decoration-none">{{ product.name
                                    }}</a></h2>

                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <div><span class="text-dark">{{ product.price.current }}</span> <span
                                        class="text-decoration-line-through text-muted">{{ product.price.original
                                        }}</span>
                                </div>
                                <div>
                                    <small class="text-warning"> <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-fill"></i>
                                        <i class="bi bi-star-half"></i>

                                    </small>
                                    <span><small>4.5</small></span>
                                </div>
                            </div>
                            <div class="d-grid mt-2">
                                <a href="#!" class="btn main-theme">
                                    <i class="fas fa-plus"></i> Add to cart
                                </a>
                            </div>
                            <div class="d-flex justify-content-start text-center mt-3">
                                <div class="deals-countdown w-100" data-countdown="2022/10/10 00:00:00"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</template>
