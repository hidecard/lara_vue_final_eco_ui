<script setup>
import MasterProfile from './Layout/MasterProfile.vue';

defineOptions({
    layout: MasterProfile,
});
</script>

<template>
    <div class="col-lg-9 col-md-8 col-12">
        <div class="py-6 p-md-6 p-lg-10">
            <div class="d-flex justify-content-between mb-6">
                <!-- Heading -->
                <h2 class="mb-0">Address</h2>
                <!-- Button -->
                <a class="btn btn-outline-primary btn-sm">Add a new address</a>
            </div>
            <div class="row">
                <!-- Static Home Address -->
                <div class="col-xl-5 col-lg-6 col-xxl-4 col-12 mb-4">
                    <div class="card card-body p-6">
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="homeRadio" />
                            <label class="form-check-label text-dark" for="homeRadio">Home</label>
                        </div>
                        <address>
                            <br />
                            123 Main Street,
                            <br />
                            District Name, City Name, Country Name,
                            <br />
                        </address>
                        <div class="mt-4">
                            <a class="text-inherit">Edit</a>
                            <a class="text-danger ms-3">Delete</a>
                        </div>
                    </div>
                </div>

                <!-- Static Office Address -->
                <div class="col-xl-5 col-lg-6 col-xxl-4 col-12 mb-4">
                    <div class="card card-body p-6">
                        <div class="form-check mb-4">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="officeRadio" />
                            <label class="form-check-label text-dark" for="officeRadio">Office</label>
                        </div>
                        <address>
                            <br />
                            456 Office Street,
                            <br />
                            District Name, City Name, Country Name,
                            <br />
                        </address>
                        <div class="mt-4">
                            <a class="text-inherit">Edit</a>
                            <a class="text-danger ms-3">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
