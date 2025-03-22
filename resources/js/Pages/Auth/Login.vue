<script setup>
// UI-only code, no logic or dynamic bindings
</script>

<template>
    <Head>
        <title>FreshCart - Login</title>
    </Head>
    <!-- navigation -->
    <div class="border-bottom shadow-sm">
        <nav class="navbar navbar-light py-2">
            <div class="container justify-content-center justify-content-lg-between">
                <a class="navbar-brand" href="/">
                    <img src="/public/images/yha_logo.png" alt="FreshCart Logo" class="d-inline-block align-text-top w-25">
                </a>
                <span class="navbar-text">
                    Don't have an account?
                    <a href="/register" class="text-primary link-success">Sign Up</a>
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
                    <img src="/public/images/signin-g.svg" alt="Sign In" class="img-fluid">
                </div>
                <!-- col -->
                <div class="col-12 col-md-6 offset-lg-1 col-lg-4 order-lg-2 order-1">
                    <div class="mb-lg-9 mb-5">
                        <h1 class="mb-1 h2 fw-bold">Sign in to FreshCart</h1>
                        <p>Welcome back to FreshCart! Enter your email to get started.</p>
                    </div>

                    <div>
                        <form class="row g-3">
                            <!-- row -->
                            <div class="col-12">
                                <!-- input -->
                                <input type="email" class="form-control" id="email" placeholder="Email" required>
                                <small class="text-danger"></small>
                            </div>
                            <div class="col-12">
                                <!-- input -->
                                <input type="password" class="form-control" id="password" placeholder="Password" required>
                                <small class="text-danger"></small>
                            </div>
                            <div class="d-flex justify-content-between">
                                <!-- form check -->
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="flexCheckDefault">
                                    <!-- label -->
                                    <label class="form-check-label" for="flexCheckDefault">Remember me</label>
                                </div>
                            </div>
                            <!-- btn -->
                            <div class="col-12 d-grid">
                                <button type="button" class="btn main-theme">Sign In</button>
                            </div>
                            <!-- link -->
                            <div>
                                Forgot your password?
                                <a href="/reset-password" class="text-primary link-success">Reset Password</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>
