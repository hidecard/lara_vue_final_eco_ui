<script setup>
    import MasterBackend from './Layout/MasterBackend.vue';
    defineOptions({
        layout: MasterBackend
    })

    import { useForm } from '@inertiajs/vue3';
const editCategoryForm = useForm({
    name: null,
    description: null,
    status: true,
    slug: null,
    meta_title: null,
    meta_description: null,
    image: null,
    preview: null,
});

import { toast } from 'vue3-toastify';

const submit = () => {
    editCategoryForm.post(route('dash.category.add'), {
        onSuccess: () => {
            editCategoryForm.reset();
            toast.success('Category added successfully');
        },
        onError: () => {
            if (editCategoryForm.errors.message)
                toast.error(editCategoryForm.errors.message);
        },
    });
}
function handleFileInput(event) {
    editCategoryForm.preview = URL.createObjectURL(event.target.files[0]);
    editCategoryForm.image = event.target.files[0];
}


</script>
<template>
    <main class="main-content-wrapper">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="mb-8 row">
                <div class="col-md-12">
                    <div class="d-md-flex justify-content-between align-items-center">
                        <!-- page header -->
                        <div>
                            <h2>Add Category</h2>
                            <!-- breadcrumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="mb-0 breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#" class="text-inherit">Dashboard</a>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <a href="#" class="text-inherit">Categories</a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Add Category</li>
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
                    <div class="mb-6 border-0 shadow card">
                        <!-- card body -->
                        <form class="p-6 card-body" id="form">
                            <h4 class="mb-5 h5">Category Image</h4>
                            <div class="mb-4 d-flex">
                                <div class="position-relative">
                                    <img class="image icon-shape icon-xxxl bg-light rounded-4" src="#" alt="Image" />
                                    <div class="top-0 file-upload position-absolute end-0 mt-n2 me-n1">
                                        <input type="file" accept="image/*" name="image" class="file-input" />
                                        <span class="bg-white icon-shape icon-sm rounded-circle">
                                            <i class="fas fa-pencil-alt text-muted" style="font-size: 12px;"></i>
                                        </span>
                                    </div>
                                    <div class="text-danger"></div>
                                </div>
                            </div>
                            <h4 class="mt-5 mb-4 h5">Category Information</h4>
                            <div class="row">
                                <!-- input -->
                                <div class="mb-3 col-lg-6">
                                    <label class="form-label">Category Name</label>
                                    <input type="text" class="form-control" name="name" placeholder="Category Name" />
                                    <div class="text-danger"></div>
                                </div>
                                <!-- input -->
                                <div class="mb-3 col-lg-6">
                                    <label class="form-label">Slug</label>
                                    <input type="text" class="form-control" name="slug" placeholder="Slug" />
                                    <div class="text-danger"></div>
                                </div>
                                <!-- button -->
                                <div class="col-lg-12">
                                    <button type="submit" class="btn main-theme">Create Category</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>
