<script setup>
// UI-only code, no logic or dynamic bindings
</script>

<template>
    <Head>
        <title>FreshCart - Forget Password</title>
    </Head>
    <!-- Navigation -->
    <div class="border-bottom shadow-sm">
        <nav class="navbar navbar-light py-2">
            <div class="container justify-content-center justify-content-lg-between">
                <a class="navbar-brand" href="#">
                    <img src="/public/images/freshcart-logo.svg" alt="" class="d-inline-block align-text-top" />
                </a>
                <span class="navbar-text">
                    Don't have an account?
                    <a href="#" class="text-primary link-success">Sign Up</a>
                </span>
            </div>
        </nav>
    </div>

    <main>
        <!-- Section -->
        <section class="my-lg-14 my-8">
            <!-- Container -->
            <div class="container">
                <!-- Row -->
                <div class="row justify-content-center align-items-center">
                    <div class="col-12 col-md-6 col-lg-4 order-lg-1 order-2">
                        <!-- Image -->
                        <img src="/public/images/reset-pwd-g.svg" alt="" class="img-fluid" />
                    </div>
                    <div class="col-12 col-md-6 offset-lg-1 col-lg-4 order-lg-2 order-1 d-flex align-items-center">
                        <div>
                            <div class="mb-lg-9 mb-5">
                                <!-- Heading -->
                                <h1 class="mb-2 h2 fw-bold">Forgot your password?</h1>
                                <p>
                                    Please enter the email address associated with your account, and we will email you a
                                    link to reset your password.
                                </p>
                            </div>
                            <!-- Form -->
                            <form>
                                <!-- Row -->
                                <div class="row g-3">
                                    <!-- Input -->
                                    <div class="col-12">
                                        <label for="formForgetEmail" class="form-label visually-hidden">Email
                                            address</label>
                                        <input
                                            type="email"
                                            class="form-control"
                                            id="formForgetEmail"
                                            placeholder="Email"
                                            required
                                        />
                                        <div class="text-danger"></div>
                                    </div>

                                    <!-- Buttons -->
                                    <div class="col-12 d-grid gap-2">
                                        <button type="button" class="btn main-theme">Reset Password</button>
                                        <a href="#" class="btn btn-light">Back</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>
