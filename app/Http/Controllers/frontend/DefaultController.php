<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\ChildCategory;
use App\Models\Color;
use App\Models\order;
use App\Models\ParentCategory;
use App\Models\Product;
use App\Models\productSize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use SebastianBergmann\Type\NullType;
use Illuminate\Support\Facades\Session;

class DefaultController extends Controller
{
    public function home(): View
    {
        $products = Product::latest()->take(20)->get();
        $allcategories = ChildCategory::all();
        $product = Product::latest()->take(20)->get();

        return view('frontend.layout.index')
            ->with([

                'product' => $product,
                'childcategory' => $allcategories,
            ]);
    }

    public function allparentcategory(): View
    {
        $allcategories = ParentCategory::all();
        $product = Product::latest()->take(20)->get();
        // $products = Product::whereRaw('id % 2 != 0')->latest()->take(20)->get();


        return view('frontend.layout.category', compact('product', 'allcategories'));

    }


    public function productbycategory(Request $request){
        $id = $request->id;
        $getid = ParentCategory::where('name', $id)->get();
        $allid =$getid ->pluck('id')->all();
          $pid = ChildCategory::where('parent_category_id', $allid)->get();
if($pid->isEmpty())
            {
                $products =  Product::where(function ($query) use($allid){
                    $query->whereNull('child_category_id')
                        ->where('parent_category_id', $allid);
                })->get();
                // dd($products->all());
                $parentcategory = ParentCategory::where('id',  $allid)->get();
                return view('frontend.layout.allproduct')->with([
                  'product' => $products,
                  'category' =>$parentcategory,
              ]);
            } else{
                $childcategory = ChildCategory::where('parent_category_id',  $allid)->get();
                $parentcategory = ParentCategory::where('id', $allid)->get();
                $product = Product::latest()->take(20)->get();
                return view('frontend.layout.childcatgory')->with([
                    'childcategory' => $childcategory,
                    'parentcategory' =>$parentcategory,
                    'product' => $product,
                ]);

            }


    }

    public function all(){

        $product = Product::all();
        $categories = ParentCategory::all();
        $productCounts = Product::select('parent_category_id', DB::raw('count(*) as product_count'))
            ->groupBy('parent_category_id')
            ->get();

        return view('frontend.layout.allproduct')->with([
            'product' => $product,
            'categories' => $categories,
            'productCounts' => $productCounts,
        ]);

    }
    public function porductbychildcategory(Request $request){

        $id = $request->id;

        $childproduct = Product::where('child_category_id',  $id)->get();


       $category =  ChildCategory::where('id',  $id)->take(1)->get();
    //   dd($category);
        return view('frontend.layout.allproduct')->with([

            'product' => $childproduct,
            'category' =>$category,
        ]);
    }
    public function addtocart(Request $request)

    {
   // Retrieve individual form fields
   $quantity = $request->input('quantity');
   $color = $request->input('color');
   $size = $request->input('size');
   $id = $request->input('id');




   if (Auth::user()) {
    $product = Product::find($id);

    // Get the existing cart from the session or initialize an empty array
    $wish = Session::get('cart', []);

    // Check if the product already exists in the cart

        // Product doesn't exist, add it to the cart
        $productImage =  $product->getFirstMediaUrl('product.image');
        $wish[$id] = [
            "id" =>$product->id,
            "name" => $product->name,
            "quantity" => $quantity ,
            "price" => $product->discounted_price,
            "photo" => $productImage,
            "size" => $size,
            "color" => $color


            // Add other product details as needed
        ];


    // Save the updated cart array to the session
    Session::put('cart', $wish);

    // Return a JSON response (optional)
    return response()->json(['cartSection' => view('frontend.layout.cart')->render()]);
} else {
    // Redirect to the login route
    return response()->json(['redirect' => route('auth.login')]);
}




       }

 public function updateCart(Request $request)
{
    $id = $request->input('id');
    $quantity = $request->input('quantity');

    $cart = Session::get('cart', []);

    if (isset($cart[$id])) {
        // Update the quantity for the specified product
        $cart[$id]['quantity'] = $quantity;

        // Save the updated cart array to the session
        Session::put('cart', $cart);

        // Return a JSON response with the updated cart section
        return response()->json([
            'cartSection' => view('frontend.layout.cart')->render(),
                  'updatecar' => view('frontend.layout.adcart')->render()
        ]);
    }

    return response()->json(['error' => 'Product not found in cart']);
}
    public function addtowishlist($productId)
    {
        // Sample product information retrieval, replace it with your logic
        if (Auth::user()) {
            $product = Product::find($productId);

            // Get the existing cart from the session or initialize an empty array
            $wish = Session::get('wish', []);

            // Check if the product already exists in the cart
            if (array_key_exists($productId, $wish)) {
                // Product already exists, increase quantity
                $wish[$productId]['quantity'] += 1;
            } else {
                // Product doesn't exist, add it to the cart
                $productImage =  $product->getFirstMediaUrl('product.image');
                $wish[$productId] = [
                    "name" => $product->name,
                    "quantity" => 1,
                    "price" => $product->discounted_price,
                    "photo" => $productImage


                    // Add other product details as needed
                ];
            }

            // Save the updated cart array to the session
            Session::put('wish', $wish);

            // Return a JSON response (optional)
            return response()->json(['wishSection' => view('frontend.layout.wish')->render()]);
        } else {
            // Redirect to the login route
            return response()->json(['redirect' => route('auth.login')]);
        }
    }



    public function deletecart(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
                return response()->json([ 'cartSection' => view('frontend.layout.cart')->render(),
                'updatecar' => view('frontend.layout.adcart')->render()]);

            }

        }

    }

    public function cart()
    {
        return view('frontend.layout.addtocart');
    }



    public function wish()
    {
        return view('frontend.layout.addtowishlist');
    }

    public function deletewish(Request $request)
    {
        if($request->id) {
            $wish = session()->get('wish');
            if(isset($wish[$request->id])) {
                unset($wish[$request->id]);
                session()->put('wish', $wish);
                return response()->json(['wishSection' => view('frontend.layout.wish')->render()]);

            }

        }
    }

    Public function productDetail(Request $request)
    {

        $name = $request->name;

        $products= Product::where("name",$name)->first();

        $colors = Color::whereIn('id', $products->color)->get();
        $size = productSize::whereIn('id', $products->size)->get();


        if (!$products) {
            // Handle the case where the product is not found
            abort(404); // or redirect to a 404 page, or display an error message
        };

        $relatedProducts = Product::where([['category_id','=',$products->category_id]]);
        $productImage = $products->getFirstMediaUrl('product.image');

        $color = Color::all();




return view('frontend.layout.productdetail')->with([
    'product' => $products,
    'image' => $productImage,
    'colors' => $colors,
    'size' => $size
]);



    }

    public function checkout():View
    {

        return view ('frontend.layout.checkout');

    }


    public function payment(Request $request)
    {
        // $all = $request->all();
        // // dd($all);
        // $userID = Auth::User()->id;
        $validation =$request->validate([
            'Fname'=>'required',
            'Lname'=>'required|max:60',
            'email'=>'required|max:60',
            'address'=>'required',
            'city'=>'required',
            'state'=>'required',
            'zipcode'=>'required',
            'Phno'=>'required',
            'payment_method'=>'required',

      ]);
        print_r($validation);
        $Fname=$request->input('Fname');
        $Lname=$request->input('Lname');
        $address=$request->input('address');
        $city=$request->input('city');
        $state=$request->input('state');
        $zipcode=$request->input('zipcode');
        $phno=$request->input('Phno');
        $Pmethod=$request->input('payment_method');

          $fullname =$Fname.''.$Lname;
        $Delivery_Address=$address.',<br>'.$city.','.$state.',<br>'.$zipcode.','.$phno;

        if(session('cart'))
        {
            $total=0;$count=0;$order_details='';$delivery_charges=0;
            foreach (session('cart') as $id => $details)
            {
                $count=$count +1 ;
                $total += $details['price'] * $details['quantity'];
                $order_details=$order_details.'<br>'.
                ('Product Name:'.$details["name"].', Quantity: '.$details["quantity"].
                '<br> Price:'.$details["price"]);
            }
    }
    $Amount = $details["price"];
    $O_Details=$order_details;
    $Email_Id=Auth::user()->email;
    $userid = Auth::user()->id;
    $loginid=$Email_Id;
    $name=Auth::user()->name;
/*Order Details Ends Here*/
     $Order = new order();
     $Order->userid=$userid;
     $Order->address=$Delivery_Address;
     $Order->product_id=$details["id"];
     $Order->totalprice=$Amount;
     $Order->color = $details["color"];
     $Order->size = $details["size"];
     $Order->size = $details["size"];
     $Order->payment_method=$Pmethod;
     $Order->save();
     $id=$Order->id;

     if($Pmethod=='stripe')
     {
        return redirect("proceed_to_Payment/$id");
     }
     else
     {


            $welcomemessage='Hello '.$name.'<br>';
            $emailbody='Your Order Was Placed Successfully<br>
            <p>Thank you for your order. We’ll send a confirmation when your order ships. Your estimated delivery date is 3-5 working days. If you would like to view the status of your order or make any changes to it, please visit Your Orders on <a href="https://www.gainaloe.com">Gainaloe.com</a></p>
            <h4>Order Details: </h4><p> Order No:'.$id.$O_Details.'</p>
             <p><strong>Delivery Address:</strong>
           '.$Delivery_Address.'</p>
            <p> <strong>Total Amount:</strong>
            '.$Amount.'</p>
             <p><strong>Payment Method:</strong>'.$p_method.'</p>';
            $emailcontent=array(
                'WelcomeMessage'=>$welcomemessage,
                'emailBody'=>$emailbody

                );
                Mail::send(array('html' => 'emails.order_email'), $emailcontent, function($message) use
                ($loginid, $name,$id)
                {
                    $message->to($loginid, $name)->subject
                    ('Your ouction.pk order '.$id.' is Confirmed');
                    $message->from('muhammadnoman0786@hotmail.com','ouction.pk');

                });

                Session::forget('cart');
                Session::forget('discount');
                Session::forget('promocode');
                session()->flash('success', 'Session data  is Cleared');


        return redirect("/Orders")->with('status','Order Placed Succesfully!');
     }


}

}

