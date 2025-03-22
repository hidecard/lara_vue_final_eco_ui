<script setup>
import Search from '../Components/Search.vue';
import LoginModal from '../Modals/LoginModal.vue';
import ProductCartModal from '../Modals/ProductCartModal.vue';

import { cartList, totalAmmount, removeCartItem } from '../Components/Utils/CartWishManage';

import { ref, onMounted } from 'vue';
import axios from 'axios';
const categories = ref('');

onMounted(async () => {
    const response = await axios.get(route('category.list'));
    categories.value = ref(response.data);
})
</script>

<template>
    <div class="border-bottom pb-5">
        <nav class="navbar navbar-light py-lg-5 pt-3 px-0 pb-0">
            <div class="container">
                <div class="row w-100 align-items-center g-3">
                    <div class="col-xxl-2 col-lg-3">
                        <Link class="navbar-brand d-none d-lg-block" :href="route('index')">
                        <img :src="'/images/yha_logo.png'" class="w-25"alt="FreshCart - Grocery Shop">
                                <span class="fw-bold">YHA Online-Shop</span>
                        </Link>
                        <div class="d-flex justify-content-between w-100 d-lg-none">
                            <Link class="navbar-brand" :href="route('index')">
                            <img :src="'/images/yha_logo.png'" class="w-25"alt="FreshCart - Grocery Shop">
                                <span class="fw-bold">YHA Online-Shop</span>
                            </Link>

                            <div class="d-flex align-items-center lh-1">

                                <div class="list-inline me-2">
                                    <div class="list-inline-item">
                                        <Link :href="route('profile.wish-list')" class="text-muted position-relative">
                                            <i class="bi bi-heart" style="font-size: 20px;"></i>
                                            <span v-show="$page.props.wishlistCount"
                                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill main-theme">
                                                {{ $page.props.wishlistCount }}
                                            </span>
                                        </Link>
                                    </div>

                                    <div class="list-inline-item">
                                        <Link v-if="$page.props.isAuth" :href="route('profile')" class="text-muted">
                                            <i class="bi bi-person" style="font-size: 20px;"></i>
                                        </Link>
                                        <a v-else href="#" class="text-muted" data-bs-toggle="modal" data-bs-target="#loginModal">
                                            <i class="bi bi-person" style="font-size: 20px;"></i>
                                        </a>
                                    </div>

                                    <div class="list-inline-item">
                                        <a class="text-muted position-relative" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                                        href="#offcanvasExample" role="button" aria-controls="offcanvasRight">
                                            <i class="bi bi-bag" style="font-size: 20px;"></i>
                                            <span v-show="cartList.length"
                                                class="position-absolute top-0 start-100 translate-middle badge rounded-pill main-theme">
                                                {{ cartList.length }}
                                                <span class="visually-hidden">unread messages</span>
                                            </span>
                                        </a>
                                    </div>


                                </div>
                                <!-- Button -->
                                <button class="navbar-toggler collapsed" type="button" data-bs-toggle="offcanvas"
                                    data-bs-target="#navbar-default" aria-controls="navbar-default"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="icon-bar top-bar mt-0"></span>
                                    <span class="icon-bar middle-bar"></span>
                                    <span class="icon-bar bottom-bar"></span>
                                </button>

                            </div>
                        </div>

                    </div>
                    <div class="col-xxl-6 col-lg-5 d-none d-lg-block">

                        <Search />

                    </div>
                    <div class="col-md-2 col-xxl-3 d-none d-lg-block">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn  btn-outline-gray-400 text-muted" data-bs-toggle="modal">
                            <i class="feather-icon icon-map-pin me-2"></i>Location
                        </button>


                    </div>
                    <!-- for responsive  -->
                    <div class="col-md-2 col-xxl-1 text-end d-none d-lg-block">

                        <div class="list-inline">
                            <div class="list-inline-item">
                                <Link :href="route('profile.wish-list')" class="text-muted position-relative">
                                    <i class="bi bi-heart" style="font-size: 20px;"></i>
                                    <span v-show="$page.props.wishlistCount"
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill main-theme">
                                        {{ $page.props.wishlistCount }}
                                    </span>
                                </Link>
                            </div>
                            <div class="list-inline-item">
                                <Link v-if="$page.props.isAuth" :href="route('profile')" class="text-muted">
                                    <i class="bi bi-person" style="font-size: 20px;"></i>
                                </Link>
                                <a v-else href="#" class="text-muted" data-bs-toggle="modal" data-bs-target="#loginModal">
                                    <i class="bi bi-person" style="font-size: 20px;"></i>
                                </a>
                            </div>
                            <div class="list-inline-item">
                                <a class="text-muted position-relative" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                                href="#offcanvasExample" role="button" aria-controls="offcanvasRight">
                                    <i class="bi bi-bag" style="font-size: 20px;"></i>
                                    <span v-show="cartList.length"
                                        class="position-absolute top-0 start-100 translate-middle badge rounded-pill main-theme">
                                        {{ cartList.length }}
                                        <span class="visually-hidden">unread messages</span>
                                    </span>
                                </a>
                            </div>


                        </div>
                    </div>
                </div>
            </div>
        </nav>
        <nav class="navbar navbar-expand-lg navbar-light navbar-default pt-0 pb-0">
            <div class="container px-0 px-md-3">

                <div class="dropdown me-3 d-none d-lg-block">
                    <button class="btn px-6 main-theme"  type="button" id="dropdownMenuButton1"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="me-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-grid">
                                <rect x="3" y="3" width="7" height="7"></rect>
                                <rect x="14" y="3" width="7" height="7"></rect>
                                <rect x="14" y="14" width="7" height="7"></rect>
                                <rect x="3" y="14" width="7" height="7"></rect>
                            </svg></span> All Departments
                    </button>
                    <ul class="dropdown-menu overflow-y-scroll" aria-labelledby="dropdownMenuButton1"
                        style="max-height: 500px;">
                        <li v-for="category in categories.value">
                            <a class="dropdown-item" :href="route('category.view', category.slug)">{{ category.name
                                }}</a>
                        </li>
                    </ul>
                </div>

                <div class="offcanvas offcanvas-start p-4 p-lg-0" id="navbar-default">

                    <div class="d-flex justify-content-between align-items-center mb-2 d-block d-lg-none">
                        <div><img :src="'/images/yha_logo.png'" class="w-25"alt="FreshCart - Grocery Shop">
                        </div>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>

                    <div class="d-block d-lg-none mb-4 mt-5">

                        <Search />

                        <div class="mt-2">
                            <button type="button" class="btn btn-outline-gray-400 text-muted w-100"
                                data-bs-toggle="modal">
                                <i class="feather-icon icon-map-pin me-2"></i>
                                Pick Location
                            </button>
                        </div>
                    </div>

                    <div class="d-block d-lg-none mb-2">
                        <a class="btn main-theme w-100 d-flex justify-content-center align-items-center"
                            data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false"
                            aria-controls="collapseExample">
                            <span class="me-2"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                                    stroke-linecap="round" stroke-linejoin="round" class="feather feather-grid">
                                    <rect x="3" y="3" width="7" height="7"></rect>
                                    <rect x="14" y="3" width="7" height="7"></rect>
                                    <rect x="14" y="14" width="7" height="7"></rect>
                                    <rect x="3" y="14" width="7" height="7"></rect>
                                </svg></span> All Departments
                        </a>
                        <div class="collapse mt-2" id="collapseExample">
                            <div class="card card-body">
                                <ul class="mb-0 list-unstyled">
                                    <li><a class="dropdown-item" href="#">Dairy, Bread &amp; Eggs</a></li>
                                    <li><a class="dropdown-item" href="#">Snacks &amp; Munchies</a></li>
                                    <li><a class="dropdown-item" href="#">Fruits &amp; Vegetables</a></li>
                                    <li><a class="dropdown-item" href="#">Cold Drinks &amp; Juices</a></li>
                                    <li><a class="dropdown-item" href="#">Breakfast &amp; Instant Food</a></li>
                                    <li><a class="dropdown-item" href="#">Bakery &amp; Biscuits</a></li>

                                    <li><a class="dropdown-item" href="#">Chicken, Meat &amp; Fish</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="d-none d-lg-block">
                        <ul class="navbar-nav ">
                            <li class="nav-item dropdown">
                                <Link class="nav-link" :href="route('index')" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                Home
                                </Link>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#">
                                    Pages
                                </a>

                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">About</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                    <!-- for responsive  -->
                    <div class="d-block d-lg-none">
                        <ul class="navbar-nav ">
                            <li class="nav-item dropdown">
                                <Link class="nav-link dropdown-toggle" :href="route('index')" role="button"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                Home
                                </Link>

                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    Shop
                                </a>
                                <ul class="dropdown-menu">


                                    <li><a class="dropdown-item" href="#">Shop List - Filter</a></li>
                                    <li><a class="dropdown-item" href="#">Product Page</a></li>
                                </ul>
                            </li>

                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#">
                                    Pages
                                </a>

                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">About</a>
                            </li>
                            <li class="nav-item">
                                <a href="" class="nav-link">Contact Us</a>
                            </li>
                        </ul>
                    </div>


                </div>
            </div>

        </nav>
    </div>

    <LoginModal />
    <ProductCartModal :cartList=cartList :totalAmmount="totalAmmount" :removeCartItem="removeCartItem" />
</template>
