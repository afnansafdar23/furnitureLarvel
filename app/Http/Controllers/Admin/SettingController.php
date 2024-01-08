<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SettingDatatable;
use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\StoreRequest;
use App\Http\Requests\Setting\UpdateRequest;
use App\Models\setting;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(SettingDatatable $settingDatatable)
    {
           return $settingDatatable->render('admin.Setting.index', [$settingDatatable]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create():View
    {
        return view('admin.Setting.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request):RedirectResponse
    {

    //    dd($request->all());
        try {
            $setting = setting::create($request->validated());
            if (isset($request->favicon)) {
                $setting->addMedia(storage_path('tmp/uploads/' . $request->favicon))->toMediaCollection('setting.favicon');
            }
            if (isset($request->sitelogo)) {
                $setting->addMedia(storage_path('tmp/uploads/' . $request->sitelogo))->toMediaCollection('setting.sitelogo');
            }
            if($setting){
                return redirect()->route('setting.index')->withSuccess('Data Save Successfully ');
            }else{
                return back()-> withError($setting->getMessage());
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
    public function edit(setting $setting):View

    {



        return view('admin.Setting.create')->with([
            'setting' => $setting
        ]);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, setting $setting):RedirectResponse
    {

        try {
            $setting->update($request->validated());

            if (isset($request['image']) == null) {
                $setting->clearMediaCollection('setting.image');
            } else {
                if (!file_exists(storage_path('tmp/uploads/' . $request['image']))) {
                    return redirect()->route('setting.index')->withSuccess('Setting Successfully Updated');
                }
                $setting->media()->delete();
                $setting->addMedia(storage_path('tmp/uploads/' . $request['image']))->toMediaCollection('setting.image');
            }
            if ($setting) {
                return redirect()->route('setting.index')->withSuccess('Setting successfully updated');
            }
        } catch (Exception $ex) {
            return back()->withError($ex->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
