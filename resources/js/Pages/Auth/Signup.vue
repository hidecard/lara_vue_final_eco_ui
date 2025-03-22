<script setup>
// UI-only version, no logic or dynamic bindings
</script>

<template>
    <Head>
        <title>FreshCart - SignUp</title>
    </Head>

    <div class="border-bottom shadow-sm">
        <nav class="navbar navbar-light py-2">
            <div class="container justify-content-center justify-content-lg-between">
                <a class="navbar-brand" href="#">
                    <img src="/public/images/yha_logo.png" alt="" class="d-inline-block align-text-top w-25" />
                </a>
                <span class="navbar-text">
                    Already have an account?
                    <a href="#" class="text-main" style="color: #ff6c0f;">Sign in</a>
                </span>
            </div>
        </nav>
    </div>

    <!-- Section -->
    <section class="my-lg-14 my-8">
        <!-- Container -->
        <div class="container">
            <!-- Row -->
            <div class="row justify-content-center align-items-center">
                <div class="col-12 col-md-6 col-lg-4 order-lg-1 order-2">
                    <!-- Image -->
                    <img src="/public/images/yha_logo.png" alt="" class="img-fluid" />
                </div>
                <!-- Form Column -->
                <div class="col-12 col-md-6 offset-lg-1 col-lg-4 order-lg-2 order-1">
                    <div class="mb-lg-9 mb-5">
                        <h1 class="mb-1 h2 fw-bold">Get Start Shopping</h1>
                        <p>Welcome to FreshCart! Enter your email to get started.</p>
                    </div>
                    <!-- Form -->
                    <form class="row g-3">
                        <div class="row g-3">
                            <!-- First Name -->
                            <div class="col">
                                <input type="text" class="form-control" placeholder="First name" id="fname" required />
                            </div>
                            <!-- Last Name -->
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Last name" id="lname" required />
                            </div>
                            <!-- Email -->
                            <div class="col-12">
                                <input type="email" class="form-control" id="email" placeholder="Email" required />
                            </div>
                            <!-- Phone -->
                            <div class="col-12">
                                <input
                                    type="text"
                                    class="form-control"
                                    id="phone"
                                    placeholder="Phone Number"
                                    maxlength="11"
                                    required
                                />
                            </div>
                            <!-- Password -->
                            <div class="col-12">
                                <input
                                    type="password"
                                    class="form-control"
                                    id="password"
                                    placeholder="Password"
                                    required
                                />
                            </div>
                            <!-- Register Button -->
                            <div class="col-12 d-grid">
                                <button type="button" class="btn main-theme">Register</button>
                            </div>
                            <!-- Terms and Policy -->
                            <p>
                                <small>
                                    By continuing, you agree to our
                                    <a href="#!">Terms of Service</a> & <a href="#!">Privacy Policy</a>
                                </small>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</template>
