<template>
    <div class="modal fade" id="invoiceModal" tabindex="-1" aria-labelledby="userModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xl">
            <div class="modal-content p-4">
                <div class="modal-body">
                    <div class="row mb-8">
                        <div class="col-md-12">
                            <div
                                class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-4">
                                <div>
                                    <!-- page header -->
                                    <h2>Order Single</h2>
                                    <!-- breadcrumb -->
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb mb-0">
                                            <li class="breadcrumb-item"><a href="#" class="text-inherit">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Order Single</li>
                                        </ol>
                                    </nav>
                                </div>
                                <!-- button -->
                                <div>
                                    <button class="btn main-theme" data-bs-dismiss="modal" aria-label="Close">Back to all orders</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- row -->
                    <div class="row">
                        <div class="col-xl-12 col-12 mb-5">
                            <!-- card -->
                            <div class="card h-100 card-lg">
                                <div class="card-body p-6">
                                    <div class="d-md-flex justify-content-between">
                                        <div class="d-flex align-items-center mb-2 mb-md-0">
                                            <h2 class="mb-0">Order ID: #FC12345 </h2>
                                            <span class="badge bg-success">Delivered</span>
                                        </div>
                                        <!-- buttons -->
                                        <div class="d-md-flex gap-1">
                                            <div class="d-flex gap-1">
                                                <a href="#" class="btn btn-secondary">Download Invoice</a>
                                                <a href="#" class="btn btn-secondary">Print Invoice</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-8">
                                        <div class="row">
                                            <!-- address -->
                                            <div class="col-lg-4 col-md-4 col-12">
                                                <div class="mb-6">
                                                    <h6>Customer Details</h6>
                                                    <p class="mb-1 lh-lg">
                                                        John Doe<br />
                                                        john.doe@example.com<br />
                                                        +1 234 567 890
                                                    </p>
                                                </div>
                                            </div>
                                            <!-- address -->
                                            <div class="col-lg-4 col-md-4 col-12">
                                                <div class="mb-6">
                                                    <h6>Shipping Address</h6>
                                                    <p class="mb-1 lh-lg">
                                                        123 Main Street<br />
                                                        Springfield, USA<br />
                                                        Contact No. +1 234 567 890
                                                    </p>
                                                </div>
                                            </div>
                                            <!-- order details -->
                                            <div class="col-lg-4 col-md-4 col-12">
                                                <div class="mb-6">
                                                    <h6>Order Details</h6>
                                                    <p class="mb-1 lh-lg">
                                                        Order ID: <span class="text-dark">#FC12345</span><br />
                                                        Order Date: <span class="text-dark">12 Dec 2024</span><br />
                                                        Total Due: <span class="text-dark">$123.45</span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- products table -->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="table-responsive">
                                            <table class="table mb-0 text-nowrap table-centered">
                                                <thead class="bg-light">
                                                    <tr>
                                                        <th>Products</th>
                                                        <th>Price</th>
                                                        <th>Quantity</th>
                                                        <th>Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            <div class="d-flex align-items-center">
                                                                <div>
                                                                    <img src="/public/images/products/product-img-11.jpg" alt="" class="icon-shape icon-lg" />
                                                                </div>
                                                                <div class="ms-lg-4 mt-2 mt-lg-0">
                                                                    <h5 class="mb-0 h6">Product Name 1</h5>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>$10.00</td>
                                                        <td>2</td>
                                                        <td>$20.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="fw-medium text-dark">Sub Total:</td>
                                                        <td class="fw-medium text-dark">$120.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="fw-medium text-dark">Shipping Cost:</td>
                                                        <td class="fw-medium text-dark">$3.00</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="3" class="fw-semibold text-dark">Grand Total:</td>
                                                        <td class="fw-semibold text-dark">$123.00</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- payment method -->
                                <div class="card-body p-6">
                                    <div class="row">
                                        <div class="col-md-6 mb-4 mb-lg-0">
                                            <h6>Payment Method</h6>
                                            <span>Credit Card</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
