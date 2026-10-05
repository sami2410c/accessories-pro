
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Cart Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
@include('home.home_navbar')

  @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
<div class="container mt-5">
  <h3 class="text-center mb-4">Cart</h3>

  <div class="row">

    <!-- LEFT SIDE (Products) -->
    <div class="col-md-8">
       
@php
    $TotalAmmount = 0;
    $TotalQty = 0;
@endphp
@if($cartview != null)

@foreach ($cartview as $cart)    
      <!-- Product Card -->
      <div class="card mb-3 p-3 shadow-sm">
        <div class="d-flex align-items-center">

          <img src="{{asset("img_upload/".$cart["image"])}}" alt="" width="100px" height="100px">

          <div class="flex-grow-1">
            <h5>{{$cart["name"]}}</h5>
            <p class="mb-0">Price: {{$cart["price"]}}</p>
          </div>

          <!-- Quantity -->
          <div class="d-flex align-items-center">
            <a href="{{url('/decrease',$cart["id"])}}"><button class="btn btn-outline-danger btn-sm">-</button></a>
            <span class="mx-2">{{$cart["Quantity"]}}</span>
            <a href="{{url('/increase',$cart["id"])}}"><button class="btn btn-outline-info btn-sm">+</button></a>
            <a href="{{url('/cartde',$cart["id"])}}"><button class="btn btn-danger btn-sm ms-2">🗑</button></a>
          </div>

        </div>
      </div>
 @php
        $TotalAmmount += $cart["totalprice"];
        $TotalQty += $cart["Quantity"];
    @endphp
      @endforeach
      @else{{"Cart is Empty"}}
@endif
    </div>

    <!-- RIGHT SIDE (Cart Info) -->
    <div class="col-md-4">
      <div class="card p-3 shadow-sm">

        <h5>Cart Information</h5>
        <hr>

        <p>Qty: <span class="float-end">{{$TotalQty}}</span></p>
        <p>Total Amount: <span class="float-end">Rs: {{$TotalAmmount}}</span></p>

        <!-- Coupon -->
        <div class="d-flex mb-3">
          <input type="text" class="form-control" placeholder="Add Coupon...">
          <button class="btn btn-primary ms-2">Add</button>
        </div>

        <!-- Checkout -->
        <a href="/checkout"><button class="btn btn-dark w-100">Checkout</button></a>

      </div>
    </div>

  </div>
</div>

</body>
</html>