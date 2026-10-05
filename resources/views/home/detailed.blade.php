












@php
$images = $detailed->image;
$mainImage = $img ?? $images[0];
@endphp

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
       .product_sec{
    width: 100%;
    margin-top: 100px;
}
       .product_container{
    display: flex;
    justify-content: center;
    gap: 40px;
    padding: 30px;
}
.left{
    width: 50%; 
    text-align: center;
}

.product_image{
    width: 350px;
    height: auto;
    border-radius: 10px;
}

/* RIGHT SIDE */
.right{
    width: 50%;
    padding-left: 20px;
}
.title_row{
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.price{
    color: green;
    font-size: 22px;
    margin: 0;
    font-weight:700; 
}

.des{
    margin-top: 30px;
    display: flex;
    align-items: center;
    gap: 10px;
  color: rgb(170, 169, 169);
  font-size: 19px;
}

.line{
    width: 15px;
    height: 2px;
    margin-top:4px; 
  background-color: rgb(170, 169, 169);
}
.d{
    color: black;
    font-size:20px;
    font-weight:700;  
}
.text_rel{
    text-align: center;
   margin: 10px 0px 60px 0px;
}
.rel_card{
    overflow: hidden;
    width: 100%;
}

.track{
    display: flex;
    gap: 10px;
    width: max-content;
    animation: scroll 12s linear infinite;
}

.det{
    text-decoration: none;
    color: black;
    flex: 0 0 auto;
}

.relcards{
    width: 300px;
    padding: 20px;
    border: 1px solid lightblue;
}
.track:hover{
    animation-play-state: paused;
}

.relcards img{
    height: 320px;
    width: 250px;
}

.relcards h5{
    text-align: center;
    margin-top: 20px;
}
@keyframes scroll{
    0%{
        transform: translateX(0)

    }
    100%{
        transform: translateX(-50%)
    }
}

/* .det{
    text-decoration: none;
    color: black;
}
.relcards{
     width: 300px;
    height: auto;
    padding: 20px;
   border: 1px solid lightblue;

}
.relcards img{
    height: 320px;
    width: 250px;
}
.relcards h5{
    text-align: center;
    margin-top:20px; 
} */
.btns{
    display: flex;
    flex-direction: column;
    gap: 20px;
    margin-top:70px; 
    
}
.btns .btn1{
    background-color:black;
    color: white;
    padding: 6px;
    border-radius:10px;
    transition: 1s ease;
    border: none;
    width: 300px;
     animation: shakeBtn 3s ease-in-out infinite;
} 

@keyframes shakeBtn {
    0%, 80%, 100% { transform: translateX(0); }

    85% { transform: translateX(8px); }
    90% { transform: translateX(-8px); }
    95% { transform: translateX(6px); }
}
.btns .btn2{
    background-color:black;
    color: white;
    padding: 6px;
    border-radius:10px;
    transition: 1s ease;
    border: none;
        width: 300px
} 
.btns .btn2:hover{
    transform: translateY(-10px);
    box-shadow: 10px 10px 10px black;
} 

    </style>
</head>
<body>

@include('home.home_navbar')

<section class="product_container">

    <!-- MAIN IMAGE -->
    <div class="left">

        <img src="{{ asset('img_upload/'.$mainImage) }}" class="product_image">

        <!-- THUMBNAILS (COLORS) -->
        <div class="thumbs" style="margin-top:15px; display:flex; gap:10px; flex-wrap:wrap;">

            @foreach($images as $image)
                <a href="{{ url('/detail/'.$detailed->id.'/'.$image) }}">
                    <img src="{{ asset('img_upload/'.$image) }}" width="70">
                </a>
            @endforeach

        </div>

    </div>

    <!-- PRODUCT INFO -->
    <div class="right">

        <h2>{{ $detailed->pro_name }}</h2>
        <h3 style="color:green;">Rs. {{ $detailed->pro_price }}</h3>

        <p style="margin-top:20px;">
            {{ $detailed->pro_description }}
        </p>

        <div style="margin-top:30px;">
            <a href="{{ url('/add', $detailed->id.'/'.$mainImage) }}" class="btn btn-dark">Add to Cart</a>
            <a href="{{ url('/buy', $detailed->id) }}"><button class="btn btn-warning" >Buy Now</button></a>
        </div>

    </div>

</section>
<h3 class="text_rel">Related Products</h3>

<div class="rel_card">
    <div class="track">

        @foreach($related as $item)
        <a href="{{ url('/detail', $item->id) }}" class="det">
            <div class="relcards">
                <img src="{{ asset('img_upload/'.$item->image[0]) }}">
                <h5>{{ $item->pro_name }}</h5>
            </div>
        </a>
        @endforeach

        <!-- duplicate for smooth infinite scroll -->
        @foreach($related as $item)
        <a href="{{ url('/detail', $item->id) }}" class="det">
            <div class="relcards">
                <img src="{{ asset('img_upload/'.$item->image[0]) }}">
                <h5>{{ $item->pro_name }}</h5>
            </div>
        </a>
        @endforeach

    </div>
</div>
</body>
</html>