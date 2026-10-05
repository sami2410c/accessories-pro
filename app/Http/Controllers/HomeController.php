<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Checkout;
use App\Models\Cart;

class HomeController extends Controller
{
public function index()
{
    $featuredProducts = collect([
        Product::where('category', 'headphones')->first(),
        Product::where('category', 'powerbank')->first(),
        Product::where('category', 'mobile')->first(),
        Product::where('category', 'airburds`')->first(),
    ])->filter();

    return view('home.home', compact('featuredProducts'));
}


// sorting work:

public function mobile(Request $request){
  $query = Product::where('category', 'mobile');   
   if($request->sort == 'a_z'){
        $query->orderBy('pro_name', 'asc');
    }
    
    elseif($request->sort == 'z_a'){
        $query->orderBy('pro_name', 'desc');
    }
    elseif($request->sort == 'low_high'){
        $query->orderBy('pro_price', 'asc');
    }
    elseif($request->sort == 'high_low'){
        $query->orderBy('pro_price', 'desc');
    }

   $mobiles = $query->get();

    return view('home.mobile', compact('mobiles'));
}

public function cover_models(){
      
    return view('home.cover_models');
}


public function Power_bank(Request $request){
    $query = Product::where('category', 'powerbank');   
   if($request->sort == 'a_z'){
        $query->orderBy('pro_name', 'asc');
    }
    
    elseif($request->sort == 'z_a'){
        $query->orderBy('pro_name', 'desc');
    }
    elseif($request->sort == 'low_high'){
        $query->orderBy('pro_price', 'asc');
    }
    elseif($request->sort == 'high_low'){
        $query->orderBy('pro_price', 'desc');
    }

   $powerbank = $query->get();

    return view('home.power_bank', compact('powerbank'));
}


public function Air_burds(Request $request){
    $query = Product::where('category', 'airburds');   
   if($request->sort == 'a_z'){
        $query->orderBy('pro_name', 'asc');
    }
    
    elseif($request->sort == 'z_a'){
        $query->orderBy('pro_name', 'desc');
    }
    elseif($request->sort == 'low_high'){
        $query->orderBy('pro_price', 'asc');
    }
    elseif($request->sort == 'high_low'){
        $query->orderBy('pro_price', 'desc');
    }

   $airburds = $query->get();

    return view('home.airburds', compact('airburds'));
}


public function headphones(Request $request){
    $query = Product::where('category', 'headphones');   
   if($request->sort == 'a_z'){
        $query->orderBy('pro_name', 'asc');
    }
    
    elseif($request->sort == 'z_a'){
        $query->orderBy('pro_name', 'desc');
    }
    elseif($request->sort == 'low_high'){
        $query->orderBy('pro_price', 'asc');
    }
    elseif($request->sort == 'high_low'){
        $query->orderBy('pro_price', 'desc');
    }

   $headphone = $query->get();

    return view('home.headphone', compact('headphone'));
}






   public function detail($id,  $img = null){
    $detailed = Product::find($id);

    if(!$detailed){
        return redirect()->route('home');
    }

    $related = Product::where('category', $detailed->category)
                ->where('id', '!=', $id)
                ->take(7)
                ->get();

    return view("home.detailed", compact('detailed', 'related','img'));
}


// Add to Cart:
public function AddToCart($id,$img){
    
 session()->forget('buy_now');

    $findproduct = Product::find($id);
    
    if(!$findproduct){
        return redirect("/detail");
    }else{
        $cart = session()->get("cart", []); 

        // [jo last mai ] array agar card na ho tu simple array show karwade khali

        if(isset($cart[$id])){
            $cart[$id]["Quantity"] += 1; 
            $cart[$id]["totalprice"] = $cart[$id]["price"] * $cart[$id]["Quantity"]; 
        }
      else{$cart[$id]=[
        "id" => $findproduct->id,
        "name" => $findproduct->pro_name,
        "price" => $findproduct->pro_price,
        "Quantity" => 1,
        "image" => $img,
        "totalprice" => $findproduct->pro_price *1
        ];}
        
        }
   session()->put("cart", $cart);
   return redirect()->back();
}

public function Cart(){
    $cartview = session()->get("cart");
   return view ("home.cart",compact("cartview"));
}

public function increase($id){
    $Cart = session()->get("cart");
    if(isset($Cart[$id])){
        $Cart[$id]["Quantity"] += 1;
         $Cart[$id]["totalprice"] = $Cart[$id]["price"] * $Cart[$id]["Quantity"]; 
    }
    else{
        return redirect("/cart");
    }
     session()->put("cart", $Cart);
    return redirect("/cart");
}
public function decrease($id){
  $Cart = session()->get("cart");
    if(isset($Cart[$id])){
       if($Cart[$id]["Quantity"] > 1){
         $Cart[$id]["Quantity"] -= 1;
         $Cart[$id]["totalprice"] = $Cart[$id]["price"] * $Cart[$id]["Quantity"]; 
       }
       else{
        unset($Cart[$id]);
       }
    }
    else{
        return redirect("/cart");
    }
     session()->put("cart", $Cart);
    return redirect("/cart");
}


public function cartdelete($id)
{
    $Cart = session()->get("cart");

    if(isset($Cart[$id])){
        unset($Cart[$id]); // 👈 item delete
         // 👈 updated cart save
    }
session()->put("cart", $Cart);
    return redirect("/cart");
}



// public function search(Request $request){
//      $query = $request->input('search');

//     $products = Product::where('pro_name', 'like', '%' . $query . '%')->get();

//    return response()->json($products);
// }


public function BuyNow($id)
{
    $findproduct = Product::find($id);

    if(!$findproduct){
        return redirect('/detail');
    }
     session()->forget('buy_now');

    $buyNow = [
        [
            "id" => $findproduct->id,
            "name" => $findproduct->pro_name,
            "price" => $findproduct->pro_price,
            "Quantity" => 1,
            "image" => is_array($findproduct->image)
                ? $findproduct->image[0]
                : $findproduct->image,
            "totalprice" => $findproduct->pro_price
        ]
    ];

    session()->put("buy_now", $buyNow);

    // login check
    if(!auth()->check()){
        return redirect()->guest('/login');
    }

    $user = auth()->user();

    return view('home.checkout', [
        'check' => $buyNow,
        'user' => $user
    ]);
}




public function checkout()
{
    if(!auth()->check()){
        return redirect()->guest('/login');
    }

    $check = session()->get("buy_now") 
              ?? session()->get("cart");

             if(!$check){
    return redirect()->guest('/cart')->with('error', '🛒 Your cart is empty. Add some products to proceed to checkout.');
}
    $user = auth()->user();

    return view('home.checkout', compact('check', 'user'));
}




public function modelProducts(Request $request, $model)
{
    $query = Product::where('pro_name', $model);

    if($request->sort == 'a_z'){
        $query->orderBy('pro_name', 'asc');
    }
    elseif($request->sort == 'z_a'){
        $query->orderBy('pro_name', 'desc');
    }
    elseif($request->sort == 'low_high'){
        $query->orderBy('pro_price', 'asc');
    }
    elseif($request->sort == 'high_low'){
        $query->orderBy('pro_price', 'desc');
    }

    $products = $query->get();

    return view('home.all_covers', compact('products'));
}

public function Final(Request $req){
     $cart = session()->get("buy_now") 
              ?? session()->get("cart");
   $checkout = new Checkout(); 
   $checkout->user_name = $req->user_name; 
   $checkout->user_email = $req->user_email; 
   $checkout->user_phone = $req->user_phone; 
   $checkout->user_address = $req->user_address; 
   $checkout->user_city = $req->user_city; 
   $checkout->user_state = $req->user_state; 
   $checkout->save();

   foreach($cart as $items){
    $Cart = new Cart();
    $Cart->ch_id = $checkout->checkout_id ;
    $Cart->name = $items["name"];
    $Cart->price = $items["price"];
    $Cart->quantity = $items["Quantity"];
    $Cart->totalPrice = $items["totalprice"];
    $Cart->save();

   }
    return redirect('/thankyou/' . $checkout->checkout_id);
   }


 public function thank($checkoutId)
{
    $checkout = Checkout::where('checkout_id', $checkoutId)->first();

    $cartItems = Cart::where('ch_id', $checkoutId)->get();

    return view('home.thankyou', compact('checkout', 'cartItems'));
}

   }
   
 
   
   // 'ch_id',
   //         'name',
   //         'price',
   //         'quantity',
   //         'totalPrice',

























