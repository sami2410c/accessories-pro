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
</style>
<body>

@include('home.home_navbar')

<form method="GET">
    Sort By
   <select name="sort" onchange="this.form.submit()">

    <option value="" {{ request('sort') == 'de' ? 'selected' : '' }}>
        Default
    </option>

    <option value="a_z" {{ request('sort') == 'a_z' ? 'selected' : '' }}>
        A to Z
    </option>

    <option value="z_a" {{ request('sort') == 'z_a' ? 'selected' : '' }}>
        Z to A
    </option>

    <option value="low_high" {{ request('sort') == 'low_high' ? 'selected' : '' }}>
        Price Low to High
    </option>

    <option value="high_low" {{ request('sort') == 'high_low' ? 'selected' : '' }}>
        Price High to Low
    </option>

</select>
</form>
        <h2>There are {{ \App\Models\Product::where('category', 'powerbank')->count() }} results in total </h2>
                
        <div class="cases">
         <h1>Mobile</h1>
         </div> 
      

 <div class="cards ">
        @foreach ($powerbank as $item)
  
       

          
               <div class="card">
              <a href="{{ url('/detail', $item->id) }}" class="det">
                    <img src="{{ url('img_upload/'.($item->image[0])) }}" alt="">
                    </a> 
                    <h5 class="card-title">{{$item->pro_name}}</h5>
                    <h5 class="card-title">{{$item->pro_price}}</h5>
                    <p class="card-text">{{$item->pro_description}}</p>
               
                  <button class="btn">
    <span class="btn-text">Product Detail</span>
</button>
           
               
            </div>
         
      

   @endforeach
         </div>



</body>
</html>