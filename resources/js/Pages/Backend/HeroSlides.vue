<script setup>
</script>
<template>
    <div class="container">
        <h1>Manage Hero Slider</h1>

        <!-- Hero Slider Display -->
        <div id="hero-slider" class="row mb-5">
            <div class="col-md-4 mb-4" v-for="slide in heroSlides" :key="slide.id">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Slide Title</h5>
                        <p class="card-text">Slide description goes here. This is a placeholder for the slide text.</p>
                        <div class="d-flex justify-content-between">
                            <button class="btn main-theme">Edit</button>
                            <button class="btn btn-danger">Delete</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Add New Slide Button -->
        <button class="btn btn-success mb-4">Add New Slide</button>

        <!-- Form for Adding/Editing Slides -->
        <div id="slide-form" class="card p-4">
            <h2 id="form-title">Add/Edit Slide</h2>

            <div class="mb-3">
                <label for="slide-title" class="form-label">Title</label>
                <input type="text" id="slide-title" class="form-control" placeholder="Enter slide title">
            </div>

            <div class="mb-3">
                <label for="slide-description" class="form-label">Description</label>
                <textarea id="slide-description" class="form-control" placeholder="Enter slide description"></textarea>
            </div>

            <div class="mb-3">
                <label for="slide-image" class="form-label">Upload Image</label>
                <input type="file" id="slide-image" class="form-control" accept="image/*">
            </div>

            <div class="d-flex justify-content-between">
                <button class="btn main-theme">Save Slide</button>
                <button class="btn btn-secondary">Cancel</button>
            </div>
        </div>
    </div>


</template>
