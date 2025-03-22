<script setup>
import MasterBackend from './Layout/MasterBackend.vue';
defineOptions({
    layout: MasterBackend
})
const props = defineProps({
    categories: Array
});

</script>

<template>
    <main class="main-content-wrapper">
        <div class="container">
            <!-- Page Header -->
            <div class="row mb-8">
                <div class="col-md-12">
                    <div class="d-md-flex justify-content-between align-items-center">
                        <div>
                            <h2>Add Product</h2>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item">
                                        <Link :href="route('dashboard')" class="text-inherit">Dashboard</Link>
                                    </li>
                                    <li class="breadcrumb-item">
                                        <Link :href="route('dash.products')" class="text-inherit">Products</Link>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Edit Product</li>
                                </ol>
                            </nav>
                        </div>
                        <div>
                            <Link :href="route('dash.products')" class="btn btn-light">Back to Product</Link>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Product Form -->
            <div class="row">
                <div class="col-lg-8 col-12">
                    <div class="card mb-6 card-lg">
                        <div class="card-body p-6">
                            <h4 class="mb-4 h5">Product Information</h4>
                            <form>
                                <div class="row">
                                    <!-- Title -->
                                    <div class="mb-3 col-lg-6">
                                        <label class="form-label">Title</label>
                                        <input type="text" class="form-control" placeholder="Product Name" name="name"/>
                                        <div class="text-danger">error tags here</div>

                                    </div>

                                    <!-- Category -->
                                    <div class="mb-3 col-lg-6">
                                        <label class="form-label">Product Category</label>
                                        <select class="form-select"
                                            name="category_id">
                                            <option value="">Product Category</option>

                                        </select>
                                        <div class="text-danger">error tags here</div>

                                    </div>


                                    <!-- Weight -->
                                    <div class="mb-3 col-lg-6">
                                        <label class="form-label">Weight</label>
                                        <input type="text" class="form-control" placeholder="Weight" name="weight"/>
                                        <div class="text-danger">error tags here</div>

                                    </div>
                                    <div class="mb-3 col-lg-6">
                                        <label class="form-label">Slug</label>
                                        <input type="text" class="form-control" placeholder="Slug" name="slug" />
                                        <div class="text-danger">error tags here</div>

                                    </div>

                                    <div class="mb-3 col-lg-12">
                                        <label class="form-label">Status</label>
                                        <div class="form-check form-switch">
                                            <input class="form-check-input"
                                                type="checkbox" name="status" id="flexCheckDefault" />
                                            <label class="form-check-label" for="flexCheckDefault">Active</label>
                                        </div>
                                    </div>

                                    <!-- Product Images -->
                                    <div class="mb-3 col-lg-12 mt-5">
                                        <h4 class="mb-3 h5">Product Images</h4>
                                        <div class="d-flex gap-2" id="previewImg">
                                            <img src=""
                                                class="w-25 h-25" />
                                        </div>
                                        <label for="attachment"
                                            class="form-label border border-2 rounded mt-3 p-3 text-center d-col"
                                            style="border-style: dashed!important;">
                                            <img src="" class="w-25" alt="">
                                            <div>Attach Media</div>
                                        </label>
                                        <input type="file" accept="image/*" name="image[]"
                                            id="attachment" class="col-md-5 col-sm-10 d-none" multiple>
                                        <div class="text-danger">{{ ' need to fix' }}</div>


                                    </div>

                                    <!-- Product Price, Sale Price, Quantity, Code, SKU -->
                                    <div class="mb-3 col-lg-12 mt-5">
                                        <div class="mb-3">
                                            <label class="form-label">Product Price</label>
                                            <input type="text" class="form-control" placeholder="Enter Product Price"
                                                name="price"/>
                                            <div class="text-danger">error tags here</div>

                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Sale Price</label>
                                            <input type="text" class="form-control" placeholder="Enter Sale Price"
                                                name="sale_price"/>
                                            <div class="text-danger">error tags here</div>

                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Tag</label>
                                            <select class="form-select" name="tag">
                                                <option value="">Select Tag</option>
                                                <option value="Hot">Hot</option>
                                                <option value="Sale">Sale</option>
                                            </select>
                                            <div class="text-danger">error tags here</div>

                                        </div>
                                    </div>

                                    <!-- Submit Button -->
                                    <div class="mb-3 col-12">
                                        <button type="submit" class="btn main-theme">Create Product</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>
