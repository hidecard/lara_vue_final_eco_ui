<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link rel="shortcut icon" href="{{ public_path('/images/favicon.ico') }}" type="">
    <link rel="stylesheet" href="{{ public_path('/css/theme.min.css') }}">
</head>

<body class="m-5">

    <div id="invoice" class="row invoice">
        <div class="col-12 mb-5">
            <!-- card -->
            <div class="card  card-xl">
                <div class="mt-5">
                    <img src="{{ public_path('/images/freshcart-logo.svg') }}" alt="FreshCart - Grocery Shop"
                        class="ms-5 mb-10 w-16">
                    <div class="row col-12 ps-4">
                        <!-- Customer Details -->
                        <div class="col-4">
                            <div class="mb-6">
                                <h6>Customer Details</h6>
                                <p class="mb-1 lh-lg">
                                    {{ $user->firstName }} {{ $user->lastName }} <br />
                                    {{ $user->email }} <br />
                                    {{ $user->phone }}
                                </p>
                            </div>
                        </div>
                        <!-- Shipping Address -->
                        <div class="col-4">
                            <div class="mb-6">
                                <h6>Shipping Address</h6>
                                <p class="mb-1 lh-lg">
                                    Gerg Harvell <br />
                                    568, Suite Ave. <br />
                                    Australia, 235153 <br />
                                    Contact No. +91 99999 12345
                                </p>
                            </div>
                        </div>
                        <!-- Order Details -->
                        <div class="col-4 d-flex justify-content-end">
                            <div class="mb-6">
                                <h6>Order Details</h6>
                                <p class="mb-1 lh-lg">
                                    Order ID: <span class="text-dark">#FC{{ $invoice->id }}</span> <br />
                                    Order Date: <span class="text-dark">
                                        {{ \Carbon\Carbon::parse($invoice->created_at)->format('d M, Y') }}
                                    </span> <br />
                                    Total Due: <span class="text-dark">{{ $invoice->due }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <!-- Table -->
                            <table class="table mb-0 text-nowrap table-centered">
                                <!-- Table Head -->
                                <thead class="bg-light ps-5">
                                    <tr>
                                        <th>Products</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <!-- Table Body -->
                                <tbody>
                                    @foreach ($invoiceOrders as $item)
                                        <tr>
                                            <td>
                                                <a class="text-inherit">
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <img src="{{ public_path('/images/products/' . json_decode($item->product->image)[0]) }}"
                                                                alt="" class="icon-shape icon-lg" />
                                                        </div>
                                                        <div class="ms-lg-4 mt-2 mt-lg-0">
                                                            <h5 class="mb-0 h6">{{ $item->product->name }}</h5>
                                                        </div>
                                                    </div>
                                                </a>
                                            </td>
                                            <td><span class="text-body">{{ $item->amount / $item->quantity }}</span>
                                            </td>
                                            <td>{{ $item->quantity }}</td>
                                            <td>{{ $item->amount }}</td>
                                        </tr>
                                    @endforeach
                                    <tr>
                                        <td class="border-bottom-0 pb-0"></td>
                                        <td class="border-bottom-0 pb-0"></td>
                                        <td colspan="1" class="fw-medium text-dark">Sub Total:</td>
                                        <td class="fw-medium text-dark">{{ $invoice->total }}</td>
                                    </tr>
                                    <tr>
                                        <td class="border-bottom-0 pb-0"></td>
                                        <td class="border-bottom-0 pb-0"></td>
                                        <td colspan="1" class="fw-medium text-dark">Shipping Cost</td>
                                        <td class="fw-medium text-dark">$3.00</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td colspan="1" class="fw-semibold text-dark">Grand Total</td>
                                        <td class="fw-semibold text-dark">{{ $invoice->total }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-body p-6">
                    <div class="row">
                        <div class="col-6 mb-4 mb-lg-0">
                            <h6>Payment Method</h6>
                            <span>{{ strtoupper($invoice->payment_method) }}</span>
                        </div>
                        <div class="col-6">
                            <h5>Notes</h5>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis impedit ut quis
                                facere
                                dolorem, deleniti doloribus in voluptate optio ducimus qui praesentium asperiores et
                                expedita aspernatur? Facere, voluptatem! Iure, tempora!</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>


</html>
