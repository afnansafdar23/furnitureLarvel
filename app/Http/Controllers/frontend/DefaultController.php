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
    public function addtocart($id)
    {
        if(Auth::user()){
        $product = Product::find($id);

        if(!$product) {
            abort(404);
        }
        $cart = session()->get('cart');
        // if cart is empty then this the first product
        if(!$cart) {

            $productImage =  $product->getFirstMediaUrl('product.image');

            $cart = [
                    $id => [
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->discounted_price,
                        "photo" =>  $productImage

                    ]
            ];
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
            $cart[$id]['quantity']++;
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
        // if item not exist in cart then add to cart with quantity = 1
        $productImage =  $product->getFirstMediaUrl('product.image');
        $cart[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->discounted_price,
            "photo" =>  $productImage
        ];
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    } else{
        return redirect()->route('auth.login');
    }

    }


    public function deletecart(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);

            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    public function cart()
    {
        return view('frontend.layout.addtocart');
    }


    public function addtowishlist($id)
    {
        $product = Product::find($id);

        if(!$product) {
            abort(404);
        }
        $wish = session()->get('wish');
        // if cart is empty then this the first product
        if(!$wish) {

            $productImage =  $product->getFirstMediaUrl('product.image');

            $wish = [
                    $id => [
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->discounted_price,
                        "photo" =>  $productImage

                    ]
            ];
            session()->put('wish', $wish);
            return redirect()->back()->with('success', 'Product added to wish successfully!');
        }
        // if wish not empty then check if this product exist then increment quantity
        if(isset($wish[$id])) {
            $wish[$id]['quantity']++;
            session()->put('wish', $wish);
            return redirect()->back()->with('success', 'Product added to wish successfully!');
        }
        // if item not exist in wish then add to wish with quantity = 1
        $productImage =  $product->getFirstMediaUrl('product.image');

        $wish[$id] = [
            "name" => $product->name,
            "quantity" => 1,
            "price" => $product->discounted_price,
            "photo" =>  $productImage
        ];
        session()->put('wish', $wish);
        return redirect()->back()->with('success', 'Product added to wish successfully!');
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

            }
            session()->flash('success', 'Product removed successfully');
        }
    }

    Public function productDetail(Request $request)
    {

        $name = $request->name;

        $products= Product::where("name",$name)->first();
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
    'colors' => $color,
]);



    }


}

