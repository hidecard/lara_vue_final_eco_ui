<script setup>
// UI-only code, no logic or dynamic bindings
</script>

<template>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card p-4 text-center shadow col-sm-12 col-md-4 py-10 px-10">
            <!-- Logo and Header -->
            <div class="mb-3">
                <img src="/public/images/freshcart-logo.svg" alt="Your Logo" class="img-fluid mb-2">
                <p class="text-muted">Enter the OTP sent to your email</p>
            </div>

            <!-- OTP Input Form -->
            <form>
                <div class="d-flex justify-content-center mb-3">
                    <input
                        type="text"
                        maxlength="6"
                        class="form-control text-center fs-3"
                        placeholder="# # # # # #"
                    />
                </div>
                <button type="button" class="btn main-theme w-100" disabled>
                    Verify Now
                </button>
            </form>

            <!-- Countdown Timer -->
            <div
                class="mt-3 bg-secondary-subtle rounded d-flex flex-col justify-content-center align-items-center"
                style="height: 100px;"
            >
                <p class="text-muted">Time remaining: 2:00</p>
                <!-- Uncomment the following block for expired state -->
                <!--
                <p>
                    Didn’t receive the code?
                    <button type="button" class="btn btn-link text-success">Resend OTP</button>
                </p>
                -->
            </div>
        </div>
    </div>
</template>
