<script setup>
import MasterBackend from './Layout/MasterBackend.vue';
defineOptions({
    layout: MasterBackend
})

</script>
<template>
    <main class="main-content-wrapper">
        <div class="container">
            <div class="row mb-8">
                <div class="col-md-12">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-4">
                        <div>
                            <h2>Edit Customer Name</h2>
                            <!-- breacrumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="#" class="text-inherit">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="text-inherit">Customer Name</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit</li>
                                </ol>
                            </nav>
                        </div>
                        <div>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#delete">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-8 g-5">
                <div class="col-lg-8 col-12">
                    <div class="card card-lg border-0">
                        <div class="card-body d-flex flex-column gap-8 p-7">
                            <div
                                class="d-flex flex-column flex-md-row align-items-center mb-4 file-input-wrapper gap-2">
                                <div>
                                    <img class="image avatar avatar-lg rounded-3" :src="'/images/placeholder-img.jpg'"
                                        alt="Image" />
                                </div>

                                <div class="file-upload btn btn-light ms-md-4">
                                    <input type="file" class="file-input opacity-0" disabled />
                                    Upload Photo
                                </div>

                                <span class="ms-md-2">JPG, GIF or PNG. 1MB Max.</span>
                            </div>

                            <div class="d-flex flex-column gap-4">
                                <h4 class="mb-0 h6">Customer Information</h4>
                                <form class="row g-3 needs-validation" novalidate>
                                    <div class="col-lg-6 col-12">
                                        <div>
                                            <!-- input -->
                                            <label for="customerEditName" class="form-label">
                                                Name
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input value="Old Customer Name" type="text"
                                                class="form-control" id="customerEditName" placeholder="Customer Name"
                                                required />
                                            <div class="invalid-feedback">Please enter customer name</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div>
                                            <!-- input -->
                                            <label for="customerEditEmail" class="form-label">
                                                Email
                                                <span class="text-danger">*</span>
                                            </label>
                                            <input value="Old Customer Email" type="email" class="form-control"
                                                id="customerEditEmail" placeholder="Email Address" required />
                                            <div class="invalid-feedback">Please enter email</div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-12">
                                        <div>
                                            <!-- input -->
                                            <label for="customerEditPhone" class="form-label">Phone</label>
                                            <input value="old Customer Phone" type="text" class="form-control"
                                                id="customerEditPhone" placeholder="Number" required />
                                            <div class="invalid-feedback">Please enter phone</div>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-12">
                                        <label class="form-label" for="customerEditBirthdate">Birthday</label>
                                        <input type="text" class="form-control flatpickr" id="customerEditBirthdate"
                                            placeholder="dd/mm/yyyy" required />
                                        <div class="invalid-feedback">Please enter date</div>
                                    </div>
                                    <div>
                                        <div class="col-12 mt-3">
                                            <div class="d-flex flex-column flex-md-row gap-2">
                                                <button class="btn main-theme" type="submit">Update
                                                    Customer</button>
                                                <button class="btn btn-secondary" type="submit">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-12">
                    <div class="card card-lg border-0">
                        <div class="card-body p-6 d-flex flex-column gap-6">
                            <div>
                                <h4 class="mb-0 h6">Customer Details</h4>
                            </div>
                            <div class="d-flex flex-column gap-3">
                                <div class="d-flex flex-row justify-content-between">
                                    <span class="fw-medium text-dark">Created at</span>
                                    <span class="fw-medium">2025-01-05</span>
                                </div>
                                <div class="d-flex flex-row justify-content-between">
                                    <span class="fw-medium text-dark">Last modified at</span>
                                    <span class="fw-medium">2025-02-06</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </main>

</template>
