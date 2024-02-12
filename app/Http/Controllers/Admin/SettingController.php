<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\SettingDatatable;
use App\Helpers\GlobalHelper;
use App\Http\Controllers\Controller;
use App\Http\Requests\Setting\StoreUpdateSettingRequest;
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
  public function storeUpdateSetting(StoreUpdateSettingRequest $request): RedirectResponse
{
    try {
        $validatedData = $request->validated();

        // Find the existing setting or create a new one
        $setting = Setting::updateOrCreate([], $validatedData);

        // Handle media for 'settings.logo'
        if (isset($request['image'])) {
            if ($setting->getFirstMedia('settings.logo')) {
                $setting->clearMediaCollection('settings.logo');
            }
            $setting->addMedia($request['image'])->toMediaCollection('settings.logo');
        }

        // Handle media for 'settings.favicon'
        if (isset($request['settings_favicon'])) {
            if ($setting->getFirstMedia('settings.favicon')) {
                $setting->clearMediaCollection('settings.favicon');
            }
            $setting->addMedia($request['settings_favicon'])->toMediaCollection('settings.favicon');
        }
cache()->forget('settings');
        return redirect()->back()->withSuccess('Settings have been updated successfully!');
    } catch (Exception $ex) {
        return back()->withError($ex->getMessage());
    }
}
}