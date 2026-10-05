<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<style>
  .cards{
    width: auto;
    display: flex;
    gap: 10px;
    justify-content: center;
    flex-wrap: wrap;
   /* align-items: center; */

  }
  .card{
    width: 300px;
    height: auto;
    padding: 20px;
   border: 1px solid lightblue;
  
  }

  .card img{
height: 320px;
     
  }
  .card h5,p{
    text-align: center;
  }
  .card .btn{
    color: white;
    background-color:tan;
    font-size:15px; 
    font-weight: 600;


  }
  .btn-text {
    display: inline-block;
    transition: 0.3s;
}
   .btn:hover .btn-text {
      transform: translateY(-5px) rotate(-2deg);
}
.cases h1{
  text-align: center;
  background-color:burlywood;
  width: 100; 
  margin-top: 15px;
  margin-bottom:10px; 
  
}
.det{
  text-decoration: none;
}
.banner{
  width: 100%;
  height: 100vh;
}
.all_items{
  width: 100%;

  display: flex;
  
  justify-content: center;
  gap: 100px;
  margin: 50px 0px 40px 0px;
  
}
.covers{
  width: 100px;
  height: 100px;
  background-color:rgb(171, 196, 198); 
  border-radius:50%;
 
   display: flex;
  justify-content: center;
  align-items: center;

}
.icon{
  width: 80px;
  height: 110px;
  display: flex;
  justify-content: center;
  align-items: center;
  /* object-fit: cover; */
  position: relative;
  bottom: 20px;
}
.icon1{
  width: 200px;
  height: 230px;
   /* object-fit: contain; */
}
.icon2{
  width: 80px;
  height: 110px;
  /* object-fit: contain; */
  display: flex;
  justify-content: center;
  align-items: center
}
.icon3{
  width: 80px;
  height: 110px;
   /* object-fit: contain; */
   transition: 0.5s ease;
   transform: rotate(-10deg);
}
.icon4{
  width: 90px;
  height: 90px;
   /* object-fit: contain; */
}

.in{
  width: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 15px 50px;
  flex-direction: column;
}
.search{
  background-color:black;
  color: white;
  width: 100%;
  text-align: center;
  border-radius:20px;
}
.search:focus{
  box-shadow: 10px 10px 10px rgba(87, 141, 150, 0.5);
    caret-color: rgb(66, 170, 201);
}

.boxcard{
  width: 100%;
  height: 500px;
  background-color: black;
  display: none;
  border-radius:20px;
  margin-top: 20px; 
}
.in:focus-within .boxcard{
  display: block;
}


</style>
<body>

@include('home.home_navbar')
{{-- 
<div class="in">
  <form action="/search" method="GET">
    <input type="text" name="search" class="search" placeholder="Search products">
    <button type="submit">Search</button>
</form>
  <div class="boxcard">
    
  </div>
</div> --}}


<section class="text-center">
   <img src="{{ asset('img_upload/bannerimg.png') }}" class="banner" alt="Banner">
</section>


<div class="all_items">
 <div class="covers"> <a href="/mobile"><img src="{{ asset('img_upload/iconmobile.png') }}" class="icon" alt="Banner"></a>
</div>       
<div class="covers"><a href="/cover_models"><img src="{{ asset('img_upload/iconcover.png') }}" class="icon1" alt="Banner"></a></div>       
<div class="covers"> <a href="/Power_bank"><img src="{{ asset('img_upload/iconpower.png') }}" class="icon2" alt="Banner"></a></div>       
  <div class="covers"><a href="/Air_burds"><img src="{{ asset('img_upload/air.png') }}" class="icon3" alt="Banner"></a></div>       
 <div class="covers"><a href="/headphones"><img src="{{ asset('img_upload/iconhead.png') }}" class="icon4" alt="Banner"></a></div>       
      
</div>        
   
<section class="container my-5">

    <div class="text-center mb-4">
        <h2>Featured Products</h2>
        <p class="text-muted">Our popular products</p>
    </div>

    <div class="row g-4">

        @foreach($featuredProducts as $product)

            @php
                $images = is_array($product->image)
                    ? $product->image
                    : json_decode($product->image, true);

                $mainImage = $images[0] ?? null;
            @endphp

            <div class="col-lg-3 col-md-6">

                <div class="card h-100 border-0 shadow-sm">

                    <img src="{{ asset('img_upload/' . $mainImage) }}"
                         class="card-img-top"
                         style="height: 250px; object-fit: cover;"
                         alt="{{ $product->pro_name }}">

                    <div class="card-body text-center">

                        <h5 class="card-title">
                            {{ $product->pro_name }}
                        </h5>

                        <p class="text-muted mb-2">
                            {{ $product->category }}
                        </p>

                        <h5 class="mb-3">
                            Rs. {{ number_format($product->pro_price) }}
                        </h5>

                        <a href="/detail/{{ $product->id }}"
                           class="btn btn-dark">
                            View Product
                        </a>

                    </div>

                </div>

            </div>

        @endforeach

    </div>

</section>

@if(session('success'))
<script>
    alert("{{ session('success') }}");
</script>
@endif
</body>
</html>