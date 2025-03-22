<script setup>
import { toast } from 'vue3-toastify';
import { useForm } from '@inertiajs/vue3';
const form = useForm({
    email: '',
    password: '',
    remember: false,
})

const submit = () => {
    form.post(route('user.login.post'), {
        onSuccess: () => {
            toast.success("Login successful!");
        },
        onError: () => {
            toast.error(form.errors.message);
        },
    });
}
</script>

<!-- login form  -->
<template>
    <!-- Modal -->
    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-4">
                <div class="modal-header border-0">
                    <h5 class="modal-title fs-3 fw-bold" id="userModalLabel">Log In</h5>

                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form @submit.prevent="submit">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" placeholder="Email" v-model="form.email"
                                required>
                            <small class=" text-danger ">{{ form.errors.name }}</small>
                        </div>

                        <div class="mb-5">
                            <!-- input -->
                            <label for="password" class="form-label">Password</label>

                            <input type="password" class="form-control" id="password" placeholder="Password"
                                v-model="form.password" required>
                            <small class=" text-danger ">{{ form.errors.password }}</small>
                        </div>
                        <div class="d-flex justify-content-between">
                            <!-- form check -->
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                                <!-- label -->
                                <label class="form-check-label" for="flexCheckDefault">
                                    Remember me
                                </label>
                            </div>
                        </div>
                        <!-- btn -->
                        <div class="col-12 d-grid my-2"> <button type="submit" class="btn main-theme">Sign
                                In</button>
                        </div>
                        <!-- link -->
                        <div>Forgot your password?
                            <a :href="route('user.resetpwd')" class="text-main">Reset Password
                            </a>
                        </div>
                    </form>
                </div>
                <div class="modal-footer border-0 justify-content-center">
                    Don't have an account?
                    <a :href="route('user.register')" class="text-main">Sign Up
                    </a>
                </div>
            </div>
        </div>
    </div>
</template>
