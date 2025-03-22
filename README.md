# Online Grocery Shop

An e-commerce platform for shopping groceries online, built with `Laravel 11` for the backend, and **Vue.js** with **Inertia.js** for the frontend. The platform allows users to browse, add products to their cart, and make secure payments online. The frontend layouts are based on the **FreshCart** template, which I adapted to fit the project's needs.

## Key Features:
- **User Management**: Users can register with `OTP-based email verification`, authenticate using `JWT`, and recover their password via email OTP. They can manage profile settings, update their home or office address, view order history, and delete their account (soft deletion to maintain data consistency).
- **Product Management**: Users can browse products, add them to their cart (stored in local storage), or wishlist (stored in the database).
- **Admin Panel**: Admins can create and manage product categories, add products, and control stock availability. They can also track orders, manage invoices, and check total sales.
- **Payment Integration**: `SSLCOMMERZ` payment gateway supports online payments, with both **COD** and `SSLCOMMERZ` options for checkout.
- **Responsive UI**: The frontend is built with `Vue.js` and `Inertia.js`, providing a dynamic, single-page application experience, with layouts adapted from the **FreshCart** template.

## Tech Stack:
- **Backend**: `PHP`, `Laravel 11`
- **Frontend**: `Vue 3`, `Inertia.js`, `Bootstrap`
- **Database**: `MySQL`
- **Authentication**: `JWT`
- **Payment Gateway**: `SSLCOMMERZ`
- **Libraries**: `Quill`, `Slick Carousel`, `Vue 3 Toastify`, and more.

The platform is designed to provide a modern, secure, and seamless online grocery shopping experience, combining easy navigation, secure authentication, and smooth order management.

___

## Installation Instructions

### Requirements
- PHP 8.2 or higher
- Composer
- Node.js 20 or higher
- MySQL Database

### Setup Guide

1. **Clone the Repository**
   ```bash
   git clone https://github.com/NahidHassanOfficial/GroceryShop-Ecommerce.git
   cd GroceryShop-Ecommerce
   ```
2. **Install Backend Dependencies**
   ```bash
   composer install
   ```
3. **Install Frontend Dependencies**
   ```bash
   npm install
   ```
4. **Environment Configuration**
   > Copy the .env.example file and rename it to .env
   ```bash
   cp .env.example .env
   ```
5. **Generate Key**
   ```bash
    php artisan key:generate
   ```
6. **Update the .env file with your configuration**
   > - Database credentials <br>
   > * Mail settings for OTP-based email verification<br>
   > + Set JWT Key:
   ```bash
   JWT_KEY=your_random_generated_key
   ```
___

### Running Guide

1. **Migrate DB Tables**
   > The --seed will generate some fake data in DB, you can skip that if you don't want to.
   ```bash
   php artisan migrate --seed
   ```
2. **Start the application**
   ```bash
   composer run dev
   ```
   or,
   ```bash
   php artisan serve
   npm run dev
   ```
Hopefully the application is running smoothly on http://127.0.0.1:8000
> [!NOTE]
> If you’re not a developer, ensure you have a local server environment (e.g., XAMPP, WAMP, or Laragon) installed. Start the Apache and MySQL services before running the application.

![Hits](https://hits.seeyoufarm.com/api/count/incr/badge.svg?url=https://github.com/NahidHassanOfficial/GroceryShop-Ecommerce)
