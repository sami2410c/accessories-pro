
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Thank You - Order Confirmed</title>

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        body {
            background: #f5f6f8;
            padding: 40px 15px;
        }

        .container {
            max-width: 900px;
            margin: auto;
        }

        .success-box {
            background: white;
            text-align: center;
            padding: 35px 20px;
            border-radius: 12px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.08);
            margin-bottom: 25px;
        }

        .check {
            width: 70px;
            height: 70px;
            background: #28a745;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 38px;
            margin: 0 auto 15px;
        }

        .success-box h1 {
            color: #222;
            margin-bottom: 8px;
        }

        .success-box p {
            color: #666;
            font-size: 16px;
        }

        .order-id {
            margin-top: 15px;
            font-weight: bold;
            color: #28a745;
        }

        .box {
            background: white;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 3px 15px rgba(0,0,0,0.08);
            margin-bottom: 20px;
        }

        .box h2 {
            font-size: 21px;
            margin-bottom: 20px;
            color: #222;
            border-bottom: 1px solid #eee;
            padding-bottom: 12px;
        }

        .customer-info {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
        }

        .info p {
            color: #777;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .info strong {
            color: #222;
            font-size: 15px;
        }

        .cart-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }

        .cart-item:last-child {
            border-bottom: none;
        }

        .product-name {
            font-weight: bold;
            color: #222;
        }

        .product-details {
            color: #777;
            font-size: 14px;
            margin-top: 5px;
        }

        .product-total {
            font-weight: bold;
            color: #222;
        }

        .grand-total {
            display: flex;
            justify-content: space-between;
            padding-top: 20px;
            font-size: 20px;
            font-weight: bold;
        }

        .buttons {
            text-align: center;
            margin-top: 25px;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            padding: 12px 25px;
            border-radius: 6px;
            margin: 5px;
            font-weight: bold;
        }

        .btn-home {
            background: #222;
            color: white;
        }

        .btn-print {
            background: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }

        @media(max-width: 600px) {
            .customer-info {
                grid-template-columns: 1fr;
            }

            .cart-item {
                gap: 15px;
            }
        }

        @media print {
            .buttons {
                display: none;
            }

            body {
                background: white;
            }

            .box,
            .success-box {
                box-shadow: none;
            }
        }
    </style>
</head>

<body>

<div class="container">

    <!-- Success Message -->
    <div class="success-box">

        <div class="check">
            ✓
        </div>

        <h1>Thank You!</h1>

        <p>Your order has been placed successfully.</p>

        <div class="order-id">
          Order ID: #{{ rand(10000, 99999) }}-{{ $checkout->checkout_id }}
        </div>

    </div>


    <!-- Customer Information -->
    <div class="box">

        <h2>Customer Information</h2>

        <div class="customer-info">

            <div class="info">
                <p>Name</p>
                <strong>{{ $checkout->user_name }}</strong>
            </div>

            <div class="info">
                <p>Email</p>
                <strong>{{ $checkout->user_email }}</strong>
            </div>

            <div class="info">
                <p>Phone</p>
                <strong>{{ $checkout->user_phone }}</strong>
            </div>

            <div class="info">
                <p>City</p>
                <strong>{{ $checkout->user_city ?? 'N/A' }}</strong>
            </div>

            <div class="info">
                <p>State</p>
                <strong>{{ $checkout->user_state ?? 'N/A' }}</strong>
            </div>

            <div class="info">
                <p>Address</p>
                <strong>{{ $checkout->user_address }}</strong>
            </div>

        </div>

    </div>


    <!-- Order Details -->
    <div class="box">

        <h2>Order Details</h2>

        @foreach($cartItems as $item)

            <div class="cart-item">

                <div>
                    <div class="product-name">
                        {{ $item->name }}
                    </div>

                    <div class="product-details">
                        Price: Rs. {{ number_format($item->price, 2) }}
                        ×
                        Quantity: {{ $item->quantity }}
                    </div>
                </div>

                <div class="product-total">
                    Rs. {{ number_format($item->totalPrice, 2) }}
                </div>

            </div>

        @endforeach


        <div class="grand-total">

            <span>Total</span>

            <span>
                Rs. {{ number_format($cartItems->sum('totalPrice'), 2) }}
            </span>

        </div>

    </div>


    <!-- Buttons -->
    <div class="buttons">

        <a href="{{ url('/') }}" class="btn btn-home">
            Back to Home
        </a>

        <button onclick="window.print()" class="btn btn-print">
            Print Receipt
        </button>

    </div>

</div>

</body>
</html>

