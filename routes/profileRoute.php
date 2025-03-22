<?php

use App\Http\Controllers\Auth\UserAuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Profile\CheckOutController;
use App\Http\Controllers\Profile\InvoiceController;
use App\Http\Controllers\Profile\UserProfileController;
use App\Http\Controllers\Profile\WishListController;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

// Views auth
Route::inertia('/register', 'Auth/Signup')->name('user.register');
Route::inertia('/login', 'Auth/Login')->name('user.login');
Route::inertia('/reset-password', 'Auth/ResetPassword')->name('user.resetpwd');
Route::inertia('/otp/verify', 'Auth/OTPVerify')->name('user.OTPPage');

// Authentication actions
Route::post('/login', [UserAuthController::class, 'login'])->name('user.login.post');
Route::post('/register/verify', [UserAuthController::class, 'registerVerification'])->name('user.register.verify');
Route::post('/register', [UserAuthController::class, 'register'])->name('user.register.post');
Route::post('/reset-password/verify', [UserAuthController::class, 'resetVerification'])->name('user.resetpwd.verify');
Route::post('/reset-password', [UserAuthController::class, 'resetPassword'])->name('user.resetpwd.post');
Route::get('/logout', [UserAuthController::class, 'logout'])->name('logout');

// Views user account info
Route::get('/profile', [UserProfileController::class, 'userOrders'])->name('profile');
Route::get('/wish-list', [WishListController::class, 'wishList'])->name('profile.wish-list');

Route::get('/profile/setting', [UserProfileController::class, 'userInfo'])->name('profile.setting');
Route::post('/profile/setting', [UserProfileController::class, 'updateProfileInfo'])->name('profile.info.update');
Route::post('/profile/setting/password-update', [UserProfileController::class, 'updateProfilePasswd'])->name('profile.passwd.update');
Route::post('/profile/setting/account-delete', [UserProfileController::class, 'profileDelete'])->name('profile.delete');

Route::get('/profile/address', [UserProfileController::class, 'userAddress'])->name('profile.address');
Route::post('/profile/address/update', [UserProfileController::class, 'userAddressUpdate'])->name('profile.address.update');
Route::get('/profile/address/default', [UserProfileController::class, 'updateDefaultAddress'])->name('addressDefault.update');
Route::get('/profile/address/delete/{id}', [UserProfileController::class, 'deleteAddress'])->name('address.delete');

// API actions for cart
Route::get('/profile/cart/info', [CartController::class, 'cartInfo'])->name('cart.info');
Route::post('/profile/cart/add', [CartController::class, 'addCart'])->name('add.cart');
Route::post('/profile/cart/delete', [CartController::class, 'deleteCartItem'])->name('delete.cart');

// Wishlist actions
Route::post('/wish-list/product/add', [WishListController::class, 'addWishList'])->name('add.wish-list');
Route::post('/wish-list/product/remove', [WishListController::class, 'removeWishListItem'])->name('remove.wish-list.item');

// Order actions
Route::get('/order/checkout', [CheckOutController::class, 'checkoutPage'])->name('checkoutPage');
Route::post('/order/checkout', [InvoiceController::class, 'createInvoice'])->name('create.invoice');

// Test email route
Route::get('/test-email', function () {
    Mail::raw('This is a test email!', function ($message) {
        $message->to('kzwen2002@gmail.com')
                ->subject('Test Email');
    });
});
