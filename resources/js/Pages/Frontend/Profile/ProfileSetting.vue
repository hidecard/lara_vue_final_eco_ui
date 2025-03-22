<script setup>
import MasterProfile from './Layout/MasterProfile.vue';
import AccDeleteConfirmModal from '../Modals/AccDeleteConfirmModal.vue';

defineOptions({
    layout: MasterProfile,
});
</script>

<template>
    <div class="col-lg-9 col-md-8 col-12">
        <div class="py-6 p-md-6 p-lg-10">
            <div class="mb-6">
                <!-- heading -->
                <h2 class="mb-0">Account Setting</h2>
            </div>
            <div>
                <!-- heading -->
                <h5 class="mb-4">Account details</h5>
                <div class="row">
                    <div class="col-lg-5">
                        <!-- form -->
                        <form>
                            <!-- input -->
                            <div class="mb-3">
                                <label class="form-label">First Name</label>
                                <input type="text" class="form-control" placeholder="John" id="fname" />
                                <small class="text-danger"></small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Last Name</label>
                                <input type="text" class="form-control" placeholder="Doe" id="lname" />
                                <small class="text-danger"></small>
                            </div>
                            <!-- input -->
                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="text" class="form-control" placeholder="john.doe@example.com" id="emailx" />
                                <small class="text-danger"></small>
                            </div>
                            <!-- input -->
                            <div class="mb-5">
                                <label class="form-label">Phone</label>
                                <input type="text" class="form-control" placeholder="1234567890" id="phone" />
                                <small class="text-danger"></small>
                            </div>
                            <!-- button -->
                            <div class="mb-3">
                                <button class="btn main-theme" type="button">Update Details</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <hr class="my-10" />
            <div class="pe-lg-14">
                <!-- heading -->
                <h5 class="mb-4">Password</h5>
                <form class="row row-cols-1 row-cols-lg-2">
                    <!-- input -->
                    <div class="mb-3 col">
                        <label class="form-label">New Password</label>
                        <input type="password" class="form-control" placeholder="New Password" />
                        <small class="text-danger"></small>
                    </div>
                    <!-- input -->
                    <div class="mb-3 col">
                        <label class="form-label">Current Password</label>
                        <input type="password" class="form-control" placeholder="Current Password" />
                        <small class="text-danger"></small>
                    </div>
                    <!-- input -->
                    <div class="col-12">
                        <button type="button" class="btn main-theme">Save Password</button>
                        <p class="mb-4">
                            Can’t remember your current password?
                            <a href="#">Reset your password.</a>
                        </p>
                    </div>
                </form>
            </div>
            <hr class="my-10" />
            <div>
                <!-- heading -->
                <h5 class="mb-4">Delete Account</h5>
                <p class="mb-2">Would you like to delete your account?</p>
                <p class="mb-5">
                    This account contains 12 orders. Deleting your account will remove all order details associated
                    with it.
                </p>
                <!-- btn -->
                <a href="#" data-bs-toggle="modal" data-bs-target="#deleteConfirmation" class="btn btn-outline-danger">
                    I want to delete my account
                </a>
            </div>
        </div>
    </div>
    <AccDeleteConfirmModal />
</template>
