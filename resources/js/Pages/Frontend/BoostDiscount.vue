<script setup>
const categoryBoost = [
    {
        "title": "Fruits & Vegetables",
        "description": "Get Upto 30% Off",
        "image": "images/banner/grocery-banner.png",
        "discount": "30%",
        "buttonText": "Shop Now",
        "link": "#!"
    },
    {
        "title": "Freshly Baked Buns",
        "description": "Get Upto 25% Off",
        "image": "images/banner/grocery-banner-2.jpg",
        "discount": "25%",
        "buttonText": "Shop Now",
        "link": "#!"
    }
]
</script>

<template>
    <section>
        <div class="container">
            <div class="row">
                <div v-for="category in categoryBoost" class="col-12 col-lg-6 mb-3 mb-lg-0">
                    <div>
                        <div class="py-10 px-8 rounded-3" :style="{
                            backgroundImage: `url(${category.image})`,
                            backgroundRepeat: 'no-repeat', backgroundSize: 'cover', backgroundPosition: 'center'
                        }">
                            <div>
                                <h3 class="fw-bold mb-1"> {{ category.title }}
                                </h3>
                                <p class="mb-4">Get Upto <span class="fw-bold">{{ category.discount }}</span> Off</p>
                                <a href="" class="btn btn-dark">Shop Now</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

</template>