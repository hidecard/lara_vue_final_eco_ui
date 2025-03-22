<script setup>
import "simplebar";
import "simplebar/dist/simplebar.min.css";
</script>
<template>
    <nav class="navbar navbar-expand-lg navbar-glass" style="position: fixed;">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center w-100">
                <div class="d-flex align-items-center">
                    <a class="text-inherit d-block d-xl-none me-4" data-bs-toggle="offcanvas" href="#offcanvasExample"
                        role="button" aria-controls="offcanvasExample">
                        <i class="fas fa-indent"></i>
                    </a>

                    <form role="search">
                        <label for="search" class="form-label visually-hidden">Search</label>
                        <input class="form-control" type="search" placeholder="Search" aria-label="Search" id="search">
                    </form>
                </div>
                <div>
                    <ul class="list-unstyled d-flex align-items-center mb-0 ms-5 ms-lg-0">
                        <li class="dropdown-center">
                            <a class="position-relative btn-icon btn-ghost-secondary btn rounded-circle" href="#"
                                role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-bell fs-5"></i>
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger mt-2 ms-n2">
                                    2
                                    <span class="visually-hidden">unread messages</span>
                                </span>
                            </a>

                        </li>
                        <li class="dropdown ms-4">
                            <a href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img :src="'/images/users/admin_user.svg'" alt=""
                                    class="avatar avatar-md rounded-circle  border">
                            </a>

                            <div class="dropdown-menu dropdown-menu-end p-0">
                                <div class="lh-1 px-5 py-4 border-bottom">
                                    <h5 class="mb-1 h6">FreshCart Admin</h5>
                                    <small>admindemo@email.com</small>
                                </div>

                                <ul class="list-unstyled px-2 py-3">
                                    <li>
                                        <a class="dropdown-item" href="#!">Home</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="#!">Profile</a>
                                    </li>

                                    <li>
                                        <a class="dropdown-item" href="#!">Settings</a>
                                    </li>
                                </ul>
                                <div class="border-top px-5 py-3">
                                    <a :href="route('admin.logout')">Log Out</a>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>


    <div class="main-wrapper">
        <!-- navbar vertical -->
        <!-- navbar -->
        <nav class="navbar-vertical-nav d-none d-xl-block">
            <div class="navbar-vertical">
                <div class="px-4 py-5">
                    <Link :href="route('index')" class="navbar-brand">
                    <img :src="'/images/freshcart-logo.svg'" alt="" />
                    </Link>
                </div>
                <div class="navbar-vertical-content flex-grow-1" data-simplebar="">
                    <ul class="navbar-nav flex-column" id="sideNavbar">
                        <li class="nav-item">
                            <Link class="nav-link  active " :href="route('dashboard')">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"><i class="bi bi-house"></i></span>
                                <span class="nav-link-text">Dashboard</span>
                            </div>
                            </Link>
                        </li>
                        <li class="nav-item mt-6 mb-3">
                            <span class="nav-label">Store Managements</span>
                        </li>
                        <li class="nav-item">
                            <Link class="nav-link " :href="route('dash.products')">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"><i class="bi bi-cart"></i></span>
                                <span class="nav-link-text">Products</span>
                            </div>
                            </Link>
                        </li>
                        <li class="nav-item">
                            <Link class="nav-link " :href="route('dash.categories')">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"><i class="bi bi-list-task"></i></span>
                                <span class="nav-link-text">Categories</span>
                            </div>
                            </Link>
                        </li>
                        <li class="nav-item">
                            <Link class="nav-link  collapsed " href="#" data-bs-toggle="collapse"
                                data-bs-target="#navCategoriesOrders" aria-expanded="false"
                                aria-controls="navCategoriesOrders">
                            <div class="d-flex align-items-center">
                                <span class="nav-link-icon"><i class="bi bi-bag"></i></span>
                                <span class="nav-link-text">Orders</span>
                            </div>
                            </Link>
                            <div id="navCategoriesOrders" class="collapse " data-bs-parent="#sideNavbar">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <Link class="nav-link " :href="route('dash.orders')">List</Link>
                                    </li>
                                </ul>
                            </div>
                        </li>


                        <li class="nav-item">
                            <a class="nav-link  collapsed " href="#" data-bs-toggle="collapse"
                                data-bs-target="#navCustomer" aria-expanded="false" aria-controls="navCustomer">
                                <div class="d-flex align-items-center">
                                    <span class="nav-link-icon"><i class="bi bi-people"></i></span>
                                    <span class="nav-link-text">Customers</span>
                                </div>
                            </a>
                            <div id="navCustomer" class="collapse " data-bs-parent="#sideNavbar">
                                <ul class="nav flex-column">
                                    <li class="nav-item">
                                        <Link class="nav-link" :href="route('dash.customers')">Customers</Link>
                                    </li>
                                    <!-- Nav item -->

                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <slot />
    </div>
</template>
