<?php

namespace App\Http\Controllers\Admin;
use App\DataTables\ColorDataTable;

use App\Http\Controllers\Controller;
use App\Models\Color;
use App\Http\Requests\Color\StoreRequest;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ColorDataTable $colorDatable)
    {
        return $colorDatable->render('admin.color-pallet.index',[$colorDatable]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create():View
    {
        return view("admin.color-pallet.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request):RedirectResponse
    {
        try {
            $color = Color::create($request->validated());
          if($color){
               return redirect()->route('color.index')->withSuccess("Color Add Successfully");
          }
       } catch (Exception $ex) {
           return back()->withError("Something went wrong");
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
    public function destroy(Color $color):RedirectResponse
    {
        try {
            $color->delete();

            return back()->withSuccess("Color deleted successfully");
        } catch (Exception $ex) {
            return back()->withError('something went wrong');
        }
    }
}
