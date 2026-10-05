<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;

class AdminController extends Controller
{
     public function admin(){
 return view('admin.admin_index');
    }
     public function products(){
 return view('admin.add_products');
    }
    

    public function add_product(Request $request){
     $product = new Product();


 $product->pro_name = $request->pro_name;
 $product->category = $request->category;
    $product->pro_price = $request->pro_price; 
    $product->pro_description = $request->pro_description;
   
     $imageNames = [];

       // hasfile check laro img wha per upload hui hai yanhi laravel builtin funtion hai:img a rhi hai ya nhi check:
if($request->hasfile('image')){
    foreach($request->file('image')as $image){

        // yai time jo hai woh seconds lata hai yani har img ko alag alag secon dai kar aik unque name bnadaite hai phir center mai . yani + is kai sath "." phir file yani img ka extention yani jpg png rand(1000,9999) is sai 1000 sai lai kar 10000 tk koi bhi random num choose kare ga yani lai lai ga (.) concatinate karde ga:

$imagename = time().'_'.rand(1000,9999).'.'.$image->getClientOriginalExtension();
$image->move("img_upload", $imagename);
  $imageNames[] = $imagename;
  
  }
  }
 $product->image = ($imageNames);
 $product->save();


return redirect()->back()->with('success', 'Product Added Successfully!');    }


     public function allproduct(){
        $all = Product::all();
 return view('admin.all_product',[
    "product"=>$all
 ]);
    }


public function updates($id){
    $update = Product::find($id);
    return view('admin.update_products', compact('update'));
}


public function result(Request $request, $id)
{
    $product = Product::find($id);

    if (!$product) {
        return redirect()->back()->with('error', 'Product not found!');
    }
    $product->pro_name = $request->pro_name;
    $product->pro_price = $request->pro_price;
    $product->category = $request->category;
    $product->pro_description = $request->pro_description;

    // ✅ Image (optional safe handling)
      $imageNames = [];

       // hasfile check laro img wha per upload hui hai yanhi laravel builtin funtion hai:img a rhi hai ya nhi check:
if($request->hasfile('image')){
    foreach($request->file('image')as $image){

        // yai time jo hai woh seconds lata hai yani har img ko alag alag secon dai kar aik unque name bnadaite hai phir center mai . yani + is kai sath "." phir file yani img ka extention yani jpg png rand(1000,9999) is sai 1000 sai lai kar 10000 tk koi bhi random num choose kare ga yani lai lai ga (.) concatinate karde ga:

$imagename = time().'_'.rand(1000,9999).'.'.$image->getClientOriginalExtension();
$image->move("img_upload", $imagename);
  $imageNames[] = $imagename;
  
  }
  }
 $product->image = ($imageNames);
    // ✅ Other fields
    $product->save();                       
    return redirect('/all_product')->with('success', 'Product Updated Successfully!');
}


 public function delete($id)
{
    $product = Product::find($id);
    $product->delete();
    
    return redirect()->back();
}
}
