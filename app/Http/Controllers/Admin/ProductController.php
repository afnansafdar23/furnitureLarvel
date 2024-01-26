<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\ChildCategory;
use App\Models\Color;

use App\Models\ParentCategory;
use App\Models\Product;
use App\Models\productSize;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductDatatable $productDataTable)
    {

        return $productDataTable->render('admin.product.index',[$productDataTable]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create():View
    {
        $parentCategories = ParentCategory::all();
        $childCategories = ChildCategory::all();
        $color = Color::all();
        $size = productSize::all();
        return view('admin.product.create')->with(['parentCategories' => $parentCategories,
    'childCategories'=>$childCategories,
    'color'=>$color ]
    );

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProductRequest $request):RedirectResponse
    {


        //  dd($request->all());

        try {
               $validatedData =  $request->validated();
             // Convert color array to JSON before storing
             $validatedData['color'] = $request->input('color', []);
             $validatedData['size'] = $request->input('size', []);
             

            $product = Product::create($validatedData);



            //  dd($p);
            if (isset($request->image)) {
                $product->addMedia(storage_path('tmp/uploads/' . $request->image))->toMediaCollection('product.image');
            }
            if ($product) {
                return redirect()->route('product.index')->withSuccess('Product successfully created');
            } else {
                return back()->withError($product->getMessage());
            }
        } catch (Exception $ex) {
            // dd($ex->getMessage());
            return back()->withError($ex->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product):View
    {
        $parentCategories = ParentCategory::all();
        $childCategories = ChildCategory::all();
        $color = Color::all();
        return view('admin.product.edit')->with(
            [
                 'product' => $product,
                 'childCategories' =>$childCategories,
                 'parentCategories' => $parentCategories,
                 'color' => $color
            ]
            );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product):RedirectResponse
    {

          try{
            $product->update($request->validated());
            if(isset($request['image']) ==null) {

                $product->clearMediaCollection('product.image');
                dd($product);
            } else{
                if (!file_exists(storage_path('tmp/uploads/' . $request['image']))) {
                    return redirect()->route('product.index')->withSuccess('Product Updated Successfully');
                }
                $product->media()->delete();
                $product->addMedia(storage_path('tmp/uploads/' . $request['image']))->toMediaCollection('product.image');
            }
            if($product) {
                return redirect()->route('product.index')->withSuccess('Product successfully Updated');
            }
          }
          catch(Exception $ex) {
            return back()->withError('Something went wrong ! ');
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product):RedirectResponse
    {
        try {
            $product->media()->delete();
            $product->delete();
            return redirect()->back()->withSuccess('Product deleted Successfully');
        } catch (Exception $ex) {
            return back()->withError("something went wrong !");
        }
    }
}
