<script setup>

import { toast } from 'vue3-toastify';
import { useForm } from '@inertiajs/vue3';
const form = useForm({
    email: '',
    password: '',
    remember: false,
})

const submit = () => {
    form.post(route('admin.login.post'), {
        onSuccess: () => {
            toast.success("Login successful!");
        },
        onError: () => {
            toast.error(form.errors.message);
        },
    });
}
</script>
<template>

    <Head>
        <title>FreshCart - Admin Login</title>
    </Head>
    <!-- navigation -->
    <div class="border-bottom shadow-sm">
        <nav class="navbar navbar-light py-2">
            <div class="container justify-content-center justify-content-lg-between">
                <Link class="navbar-brand" :href="route('index')">
                <img :src="'/images/yha_logo.png'" alt="" class="d-inline-block align-text-top w-25">
                </Link>
                <span class="navbar-text">
                    Back to Home?
                    <Link :href="route('index')" class="text-primary link-success">Home
                    </Link>

                </span>
            </div>
        </nav>
    </div>

    <!-- section -->
    <section class="my-lg-14 my-8">
        <div class="container">
            <!-- row -->
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-md-6 col-lg-4 order-lg-1 order-2">
                    <!-- img -->
                    <img :src="'/images/signin-g.svg'" alt="" class="img-fluid">
                </div>
                <!-- col -->
                <div class="col-12 col-md-6 offset-lg-1 col-lg-4 order-lg-2 order-1">
                    <div class="mb-lg-9 mb-5">
                        <h1 class="mb-1 h2 fw-bold">Sign in to FreshCart</h1>
                        <p>Welcome back to FreshCart! Enter your email to get started.</p>
                    </div>

                    <div>
                        <form @submit.prevent="submit" class="row g-3">
                            <!-- row -->

                            <div class="col-12">
                                <!-- input -->
                                <input type="email" class="form-control" id="email" placeholder="Email"
                                    v-model="form.email" required>
                                <small class=" text-danger ">{{ form.errors.name }}</small>
                            </div>
                            <div class="col-12">
                                <!-- input -->
                                <input type="password" class="form-control" id="password" placeholder="Password"
                                    v-model="form.password" required>
                                <small class=" text-danger ">{{ form.errors.password }}</small>

                            </div>
                            <div class="d-flex justify-content-between">
                                <!-- form check -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" v-model="form.remember"
                                        id="flexCheckDefault">
                                    <!-- label --> <label class="form-check-label" for="flexCheckDefault">
                                        Remember me
                                    </label>
                                </div>
                            </div>
                            <!-- btn -->
                            <div class="col-12 d-grid"> <button type="submit" class="btn main-theme">Sign In</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
