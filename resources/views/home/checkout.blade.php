<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Checkout</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
.summary-box {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 10px;
}

.product-box {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background: #0d6efd;
    color: white;
    padding: 8px 12px;
    border-radius: 6px;
    margin-bottom: 8px;
}

.product-box small {
    background: white;
    color: #0d6efd;
    padding: 2px 8px;
    border-radius: 5px;
    font-weight: bold;
}

</style>

</head>
<body>
@include('home.home_navbar')
<div class="container my-5">
<div class="row">

    <!-- LEFT SIDE: CHECKOUT FORM -->
    <div class="col-md-7">
        <h3 class="mb-4">Checkout</h3>

       <form action="/final" method="POST">
    @csrf


    <div class="mb-3">
        <label>Full Name</label>
        <input type="text" 
            name="user_name" class="form-control" placeholder="Enter full name" value="{{ $user ? $user->name : '' }}"
        >
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input 
            type="email" 
            name="user_email"
            class="form-control" 
            placeholder="Enter email"
            value="{{ $user ? $user->email : '' }}"
        >
    </div>
    <div class="mb-3">
        <label>Phone Num</label>
        <input 
            type="tel" 
            name="user_phone"
            class="form-control" 
            placeholder="Enter Phone"
            value="{{ $user ? $user->phone : '' }}"
        >
    </div>

    <div class="mb-3">
        <label>Shipping Address</label>
        <textarea 
            name="user_address"
            class="form-control" 
            rows="3"
            placeholder="Enter shipping address"
        >{{ $user ? $user->address ?? '' : '' }}</textarea>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label>City</label>
            <input 
                type="text" 
                name="user_city"
                class="form-control"
                value="{{ $user ? $user->city ?? '' : '' }}"
            >
        </div>


        <div class="col-md-6 mb-3">
           <div class="col-md-6 mb-3">
    <label>City</label>

    <select name="user_state" class="form-control">
        <option value="">Select City</option>

        <option value="Karachi">Karachi</option>
        <option value="Hyderabad">Hyderabad</option>
        <option value="Lahore">Lahore</option>
        <option value="Islamabad">Islamabad</option>
        <option value="Rawalpindi">Rawalpindi</option>
        <option value="Faisalabad">Faisalabad</option>
        <option value="Multan">Multan</option>
        <option value="Peshawar">Peshawar</option>
        <option value="Quetta">Quetta</option>
        <option value="Sialkot">Sialkot</option>
        <option value="Gujranwala">Gujranwala</option>
        <option value="Bahawalpur">Bahawalpur</option>
        <option value="Sukkur">Sukkur</option>
    </select>
</div>
        </div>
    </div>

    <button class="btn btn-success w-100">
        Place Order
    </button>
</form>
    </div>

    <!-- RIGHT SIDE: CART SUMMARY -->
    <div class="col-md-5">
        <h3 class="mb-4">Cart Summary</h3>

        <div class="summary-box">
            @php
            $sub = 0;
            $total = 200;
            @endphp
@foreach ($check as $c)

            <!-- PRODUCT 1 -->
            <div class="product-box">
                <div>{{$c["name"]}}</div>
                <small>{{$c["Quantity"]}} x {{$c["price"]}}</small>
            </div>
            @php
            $sub += $c["totalprice"];
            $total += $c["totalprice"];
            @endphp
            @endforeach


          

 <div class="d-flex justify-content-between">
    <h5>Sub Total</h5>
    <h5>RS.{{$sub}}</h5>
</div>

           <div class="d-flex justify-content-between">
    <h5>DeliveryCharges</h5>
    <h5>RS.200</h5>
</div>
<br>
           <div class="d-flex justify-content-between">
    <h5>Total(PKR)</h5>
    <h5>RS.{{$total}}</h5>
</div>
        </div>
    </div>

</div>
</div>

</body>
</html>


