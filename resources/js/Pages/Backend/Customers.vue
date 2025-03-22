<script setup>
import MasterBackend from './Layout/MasterBackend.vue';
import Pagination from './Components/Pagination.vue';
import { formatDate } from './Components/Utils/dateFormat';
defineOptions({
    layout: MasterBackend
})
let props = defineProps({
    customers: Array,
})


import ProfileInfoModal from './Components/ProfileInfoModal.vue';
import { ref } from 'vue';
const selectedCustomer = ref(null)

const openProfile = (customer) => {
    selectedCustomer.value = customer;
}
</script>

<template>
    <main class="main-content-wrapper">
        <div class="container">
            <div class="row mb-8">
                <div class="col-md-12">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-4">
                        <div>
                            <h2>Customers</h2>
                            <!-- breacrumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="#" class="text-inherit">Dashboard</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Customers</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-12 mb-5">
                    <div class="card h-100 card-lg">
                        <div class="p-6">
                            <div class="row justify-content-between">
                                <div class="col-md-4 col-12">
                                    <form class="d-flex" role="search">
                                        <label for="searchCustomers" class="visually-hidden">Search Customers</label>
                                        <input class="form-control" type="search" id="searchCustomers"
                                            placeholder="Search Customers" aria-label="Search" />
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="table-responsive">
                                <table
                                    class="table table-centered table-hover table-borderless mb-0 table-with-checkbox text-nowrap">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="checkAll" />
                                                    <label class="form-check-label" for="checkAll"></label>
                                                </div>
                                            </th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Last Purchase Date</th>
                                            <th>Phone</th>
                                            <th>Spent</th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" value=""
                                                        id="customerOne" />
                                                    <label class="form-check-label" for="customerOne"></label>
                                                </div>
                                            </td>

                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img src="" alt=""
                                                        class="avatar avatar-xs rounded-circle" />
                                                    <div class="ms-2">
                                                        <a href="#" class="text-inherit"
                                                            data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                                                            aria-controls="offcanvasRight">Customer Name</a>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>customer@gmail.com</td>

                                            <td>2025-01-05</td>
                                            <td>09987234983</td>
                                            <td>45000</td>

                                            <td>
                                                <div class="dropdown">
                                                    <a href="#" class="text-reset" data-bs-toggle="dropdown"
                                                        aria-expanded="false">
                                                        <i class="feather-icon icon-more-vertical fs-5"></i>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="dropdown-item" href="#">
                                                                <i class="bi bi-trash me-3"></i>
                                                                Delete
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <Link class="dropdown-item" :href="route('dash.customers.editPage', 1)">
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
                            <Pagination :paginator="customers" :scrollPreserve="false" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <!--offcanvas-->
    <ProfileInfoModal :customer=selectedCustomer />

</template>
