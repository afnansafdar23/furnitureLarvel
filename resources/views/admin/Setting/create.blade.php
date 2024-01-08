<x-layout.master>
    <x-slot name="header">
        <x-layout.header />
    </x-slot>
    <x-slot name="left_side_nav">
        <x-layout.left_side_nav />
    </x-slot>
    <x-slot name="content">
        <!--begin::Main-->
        <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
            <form action="{{ isset($setting) ? route('setting.update', $setting->id) : route('setting.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="p-5">
                    @if (Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif
                    @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    @if(isset($setting))
                @method('POST')
              <input type="hidden" name="id" value="{{ $setting->id }}">
              @else

                 @endif
                    <div class="card mb-xl-8 mb-5" style="user-select: auto;">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5" style="user-select: auto;">
                            <h3 class="card-title align-items-start flex-column" style="user-select: auto;">
                                <span class="card-label fw-bold fs-3 mb-1" style="user-select: auto;">Add Setting</span>
                            </h3>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-3" style="user-select: auto;">
                            <!--begin::Table container-->
                            <div class="modal-body">
                                <!--begin::Label-->
                                <!--end::Label-->
                                <div class="row">
                                @if(isset($setting))

                                    <div class="col-6">
                                        <label class="col-lg-8 col-form-label required fw-bold fs-6">Favicon</label>
                                   @include('admin.media.dropdown', ['file' => $setting, 'collection_name' => 'setting.favicon',])
                                       </div>
                                       <div class="col-6">
                                        <label class="col-lg-8 col-form-label required fw-bold fs-6">sitelogo</label>

                                        @include('admin.media.dropdown',['dropzone_name'=>'sitelogo'])
                                       </div>
                                         @else
                                    <div class="col-6">
                                        <label class="col-lg-8 col-form-label required fw-bold fs-6">Site Logo</label>


                                       @include('admin.media.dropdown',['dropzone_name'=>'favicon'])

                                        </div>
                                         <div class="col-6">
                                        <label class="col-lg-8 col-form-label required fw-bold fs-6">Site Logo</label>


                                       @include('admin.media.dropdown',['dropzone_name'=>'sitelogo'])

                                        </div>
                                         @endif



                                    <div class="col-6">
                                        <x-cento-dash-input type="text" name="title" label="title" placeholder="Title" value="{{ old('title', isset($setting) ? $setting->title : '') }}"
                                            :message="$errors->first('name')" />
                                    </div>
                                    <div class="col-6">
                                        <x-cento-dash-input type="email" name="email" label="EMAIL" placeholder="Email" value="{{ old('email', isset($setting) ? $setting->email : '') }}"
                                            :message="$errors->first('name')" />
                                    </div>
                                    <div class="col-12">
                                        <x-cento-dash-input type="text" name="description" label="Description" placeholder="Description" value="{{ old('description', isset($setting) ? $setting->description : '') }}"
                                            :message="$errors->first('description')" />
                                    </div>
                                    <div class="col-6">
                                        <x-cento-dash-input type="text" name="color1" label="1st Color" placeholder="Color Value" value="{{ old('color1', isset($setting) ? $setting->color1 : '') }}"
                                            :message="$errors->first('color')" />
                                    </div>
                                    <div class="col-6">
                                        <x-cento-dash-input type="text" name="color2" label="2nd Color" placeholder="Color Value" value="{{ old('color2', isset($setting) ? $setting->color2 : '') }}"
                                            :message="$errors->first('color')" />
                                    </div>
                                    <div class="col-6">
                                        <x-cento-dash-input type="text" name="color3" label="3rd Color" placeholder="Color Value" value="{{ old('color3', isset($setting) ? $setting->color3 : '') }}"
                                            :message="$errors->first('color')" />
                                    </div>
                                    <div class="col-6">
                                        <x-cento-dash-input type="text" name="color4" label="4th Color" placeholder="Color Value" value="{{ old('color4', isset($setting) ? $setting->color4 : '') }}"
                                            :message="$errors->first('color')" />
                                    </div>
                                    <div class="col-6">
                                        <x-cento-dash-input type="text" name="link" label="GCS link" placeholder="Paste  Google link here" value="{{ old('link', isset($setting) ? $setting->link : '') }}"
                                            :message="$errors->first('link')" />
                                    </div>
                                    <div class="col-6">
                                        <x-cento-dash-input type="text" name="fblink" label="Facebook Link" placeholder="Facebook Link" value="{{ old('fblink', isset($setting) ? $setting->fblink : '') }}"
                                            :message="$errors->first('link')" />
                                    </div>
                                    <div class="col-6">
                                        <x-cento-dash-input type="text" name="twlink" label="Tweeter Link" placeholder="Tweeter Link" value="{{ old('twlink', isset($setting) ? $setting->twlink : '') }}"
                                            :message="$errors->first('color')" />
                                    </div>
                                    <div class="col-6">
                                        <x-cento-dash-input type="text" name="instalink" label="Insta link" placeholder="Paste  Instagram Link" value="{{ old('instalink', isset($setting) ? $setting->instalink : '') }}"
                                            :message="$errors->first('link')" />
                                    </div>

                                    <div class="col-6">
                                        <x-cento-dash-input type="checkbox" name="fixedheader" label="Fixed Link" value="{{ old('fixedheader', isset($setting) ? $setting->fixedheader : '') }}" placeholder=""
                                            :message="$errors->first('link')" />
                                    </div>

                                </div>
                            </div>
                            <div class="modal-footer mt-5 gap-2">
                                <x-cento-dash-input type="submit" label="Add Setting" />
                                <a class="btn btn-danger" href="{{ route('setting.index') }}" > Cancel </a>
                            </div>
                            <!--end::Table container-->
                        </div>
                        <!--begin::Body-->
                    </div>
                </div>
            </form>
        </div>
        <!--end:::Main-->
    </x-slot>
    <x-slot name="footer">
        <x-layout.footer />
    </x-slot>
</x-layout.master>
