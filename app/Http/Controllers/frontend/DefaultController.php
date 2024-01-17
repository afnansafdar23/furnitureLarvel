<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\ChildCategory;
use App\Models\Color;
use App\Models\ParentCategory;
use App\Models\Product;
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
        $category = '';
         // Eager load the 'colors' relationship to optimize queries

        // dd($product);






        return view('frontend.layout.allproduct')->with([
            'product' => $product,
            'category' =>$category
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
    public function addToCart($productId)
    {
       if(Auth::user()){
         // Sample product information retrieval, replace it with your logic
         $product = Product::find($productId);

         // Get the existing cart from the session or initialize an empty array
         $cart = Session::get('cart', []);

         // Check if the product already exists in the cart
         if (array_key_exists($productId, $cart)) {
             // Product already exists, increase quantity
             $cart[$productId]['quantity'] += 1;
         } else {
             // Product doesn't exist, add it to the cart
             $productImage =  $product->getFirstMediaUrl('product.image');
             $cart[$productId] = [
                 "name" => $product->name,
                 "quantity" => 1,
                 "price" => $product->discounted_price,
                 "photo" => $productImage
                 // Add other product details as needed
             ];
         }

         // Save the updated cart array to the session
         Session::put('cart', $cart);

         // Return a JSON response (optional)
         return response()->json(['cartSection' => view('frontend.layout.cart')->render()]);

       }else{
        return response()->json(['redirect' => route('auth.login')]);
       }
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
                return response()->json(['cartSection' => view('frontend.layout.cart')->render()]);

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
]);



    }


}

