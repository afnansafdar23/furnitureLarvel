<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\ProductSizeDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\productSize\storeSizeRequest;
use App\Models\ChildCategory;
use App\Models\ParentCategory;
use App\Models\productSize;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class productSizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ProductSizeDatatable $productSizeDatatable )
    {
        return $productSizeDatatable->render('admin.Product-size.index', [$productSizeDatatable]);
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

    return view('admin.Product-size.create')->with(
        [
            'parentCategories' => $parentCategories,
            'childCategories' => $childCategories,
    ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeSizeRequest $request):RedirectResponse
    {
        try {
            $productsize = productSize::create($request->validated());

            if ($productsize) {
                return redirect()->route('size.index')->withSuccess('Product Size successfully Add');
            }else{
                return back()->withError('Something Went Wrong');
            }
           } catch (Exception $ex) {
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(productSize $size):RedirectResponse
    {
        try {
            $size->delete();

            return back()->withSuccess("Size deleted successfully");
        } catch (Exception $ex) {
            return back()->withError('something went wrong');
        }
    }
}
