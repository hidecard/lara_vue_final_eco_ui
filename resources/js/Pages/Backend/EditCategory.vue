<script setup>
import MasterBackend from './Layout/MasterBackend.vue';
defineOptions({
    layout: MasterBackend
});
</script>

<template>
    <main class="main-content-wrapper">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row mb-8">
                <div class="col-md-12">
                    <div class="d-md-flex justify-content-between align-items-center">
                        <!-- page header -->
                        <div>
                            <h2>Edit Category</h2>
                            <!-- breadcrumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="#" class="text-inherit">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="#" class="text-inherit">Categories</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Category</li>
                                </ol>
                            </nav>
                        </div>
                        <div>
                            <a href="#" class="btn btn-light">Back to Categories</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 col-12">
                    <!-- card -->
                    <div class="card mb-6 shadow border-0">
                        <!-- card body -->
                        <form class="card-body p-6" id="form">
                            <h4 class="mb-5 h5">Category Image</h4>
                            <div class="mb-4 d-flex">
                                <div class="position-relative">
                                    <img class="image icon-shape icon-xxxl bg-light rounded-4" src="#" alt="Image" />
                                    <div class="file-upload position-absolute end-0 top-0 mt-n2 me-n1">
                                        <input type="file" accept="image/*" name="image" class="file-input" />
                                        <span class="icon-shape icon-sm rounded-circle bg-white">
                                            <i class="fas fa-pencil-alt text-muted" style="font-size: 12px;"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <h4 class="mb-4 h5 mt-5">Category Information</h4>

                            <div class="row">
                                <!-- input -->
                                <div class="mb-3 col-lg-6">
                                    <label class="form-label">Category Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Category Name" />
                                </div>
                                <!-- input -->
                                <div class="mb-3 col-lg-6">
                                    <label class="form-label">Slug</label>
                                    <input type="text" class="form-control" name="slug" placeholder="Slug" id="attachment" />
                                </div>
                                <!-- input -->
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label">Descriptions</label>
                                    <div class="py-8" id="editor"></div>
                                </div>

                                <!-- input -->
                                <div class="mb-3 col-lg-12">
                                    <label class="form-label">Status</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" name="status" id="flexCheckDefault" />
                                        <label class="form-check-label" for="flexCheckDefault">Active</label>
                                    </div>
                                </div>
                               
                                <div class="col-lg-12">
                                    <button type="submit" class="btn main-theme">Update Category</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>
