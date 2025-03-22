<script setup>
import MasterBackend from './Layout/MasterBackend.vue';
import Pagination from './Components/Pagination.vue';
defineOptions({
    layout: MasterBackend
})

const props = defineProps({
    categories: Array
})



</script>

<template>
    <main class="main-content-wrapper">
        <div class="container">
            <!-- row -->
            <div class="row mb-8">
                <div class="col-md-12">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-4">
                        <!-- pageheader -->
                        <div>
                            <h2>Categories</h2>
                            <!-- breacrumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <Link :href="route('dashboard')" class="text-inherit">Dashboard</Link>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Categories</li>
                                </ol>
                            </nav>
                        </div>
                        <!-- button -->
                        <div>
                            <a :href="route('dash.category.add')" class="btn main-theme">Add New Category</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-12 mb-5">
                    <!-- card -->
                    <div class="card h-100 card-lg">
                        <div class="px-6 py-6">
                            <div class="row justify-content-between">
                                <div class="col-lg-4 col-md-6 col-12 mb-2 mb-md-0">
                                    <!-- form -->
                                    <form class="d-flex" role="search">
                                        <input v-model="search" class="form-control" type="search"
                                            placeholder="Search Category" aria-label="Search" />
                                    </form>
                                </div>
                                <!-- select option -->
                                <div class="col-xl-2 col-md-4 col-12">
                                    <select v-model="selectedStatus" class="form-select">
                                        <!-- <option value="">Status</option> -->
                                        <option value="1">Active</option>
                                        <option value="0">Deactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <!-- card body -->
                        <div class="card-body p-0">
                            <!-- table -->
                            <div class="table-responsive">
                                <table
                                    class="table table-centered table-hover mb-0 text-nowrap table-borderless table-with-checkbox text-center">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>Icon</th>
                                            <th>Name</th>
                                            <th>Proudcts Count</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="#!"><img src="/public/images/categories/category-fruits.png" alt=""
                                                        class="icon-shape icon-md" /></a>
                                            </td>

                                            <td>Apple</td>
                                            <td>10</td>


                                            <td>
                                                <div class="dropdown">
                                                    <a href="#" class="text-reset" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="feather-icon icon-more-vertical fs-5"></i>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="dropdown-item">
                                                                <i class="bi bi-trash me-3"></i>
                                                                Delete
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <Link class="dropdown-item" :href="route('dash.category.editPage', 1)">
                                                            <i class="bi bi-pencil-square me-3"></i>
                                                            Edit
                                                            </Link>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <Pagination :paginator="categories" :scrollPreserve="false" />
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>
