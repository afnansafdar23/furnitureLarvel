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

            <div class="p-5">
                @if (Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                @endif
                @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                @endif
                <form class="form d-flex flex-column flex-lg-row" method="POST" enctype="multipart/form-data"
                    action="{{ route('setting.storeUpdate') }}">
                    @csrf
                    <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
                        <div class="card card-flush py-4">
                            <div class="card-header my-3">
                                <div class="card-title">
                                    <h2>General Settings</h2>
                                </div>
                            </div>
                            @php
                                $allSettings = app('GlobalHelper')->getAllSettings();
                            @endphp

                            @foreach ($allSettings as $setting)
                                <!-- Display other columns as needed -->
                            @endforeach

                            <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-6">
                                        @if (isset($setting) && app('globalHelper')->hasImages())
                                            @include('admin.media.dropdown', [
                                                'collection_name' => 'settings.logo',
                                                'file' => $setting,
                                            ])
                                        @else
                                            @include('admin.media.dropdown', [
                                                'collection_name' => 'settings.logo',
                                            ])
                                        @endif
                                    </div>
                                    <div class="col-6">
                                        @if (isset($setting) && app('globalHelper')->hasImages())
                                            @include('admin.media.dropdown', [
                                                'collection_name' => 'settings.favicon',
                                                'file' => $setting,
                                                'dropzone_name' => 'settings_favicon',
                                            ])
                                        @else
                                            @include('admin.media.dropdown', [
                                                'collection_name' => 'settings.favicon',
                                                'dropzone_name' => 'settings_favicon',
                                            ])
                                        @endif
                                    </div>
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label class="col-lg-6 col-form-label fw-bold fs-6">Application
                                            Name</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="application_name"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                            placeholder="Furnimart"
                                            value="{{ isset($setting['application_name']) ? $setting['application_name'] : '' }}" />
                                        @if ($errors->has('application_name'))
                                            <div class="text-danger">
                                                {{ $errors->first('application_name') }}
                                            </div>
                                        @endif
                                    </div>
                                    <!--begin::Input-->
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label class="col-lg-6 col-form-label fw-bold fs-6">Short
                                            Discription</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="short_description"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                            placeholder="Short Description"
                                            value="{{ isset($setting['short_description']) ? $setting['short_description'] : '' }}" />
                                        @if ($errors->has('short_description'))
                                            <div class="text-danger">
                                                {{ $errors->first('short_description') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label class="col-lg-6 col-form-label fw-bold fs-6">Facebook
                                            Url's</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="facebook_link"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                            placeholder="insert your fb url here"
                                            value="{{ isset($setting['facebook_link']) ? $setting['facebook_link'] : '' }}" />
                                        @if ($errors->has('facebook_link'))
                                            <div class="text-danger">
                                                {{ $errors->first('facebook_link') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label class="col-lg-6 col-form-label fw-bold fs-6">Instagram
                                            Url's</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="instagram_link"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                            placeholder="insert your insta url here"
                                            value="{{ isset($setting['instagram_link']) ? $setting['instagram_link'] : '' }}" />
                                        @if ($errors->has('instagram_link'))
                                            <div class="text-danger">
                                                {{ $errors->first('instagram_link') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label class="col-lg-6 col-form-label fw-bold fs-6">Email
                                            Address </label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="email" name="email"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                            placeholder="Email address"
                                            value="{{ isset($setting['email']) ? $setting['email'] : '' }}" />
                                        @if ($errors->has('email'))
                                            <div class="text-danger">{{ $errors->first('email') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-3 fv-row fv-plugins-icon-container">
                                        <label class="col-lg-12 col-form-label fw-bold fs-6">Color One</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="color" name="color_one"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                            value="{{ isset($setting['color_one']) ? $setting['color_one'] : '' }}" />
                                        @if ($errors->has('color_one'))
                                            <div class="text-danger">{{ $errors->first('color_one') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-3 fv-row fv-plugins-icon-container">
                                        <label class="col-lg-12 col-form-label fw-bold fs-6">Color Two</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="color" name="color_two"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                            value="{{ isset($setting['color_two']) ? $setting['color_two'] : '' }}" />
                                        @if ($errors->has('color_two'))
                                            <div class="text-danger">{{ $errors->first('color_two') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-3 fv-row fv-plugins-icon-container">
                                        <label class="col-lg-12 col-form-label fw-bold fs-6">Color
                                            Three</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="color" name="color_three"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                            value="{{ isset($setting['color_three']) ? $setting['color_three'] : '' }}" />
                                        @if ($errors->has('color_three'))
                                            <div class="text-danger">{{ $errors->first('color_three') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-3 fv-row fv-plugins-icon-container">
                                        <label class="col-lg-12 col-form-label fw-bold fs-6">Color Four</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="color" name="color_four"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                            value="{{ isset($setting['color_four']) ? $setting['color_four'] : '' }}" />
                                        @if ($errors->has('color_four'))
                                            <div class="text-danger">{{ $errors->first('color_four') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label class="col-lg-12 col-form-label fw-bold fs-6">Google Search
                                            Console (GSC)</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="text" name="gsc"
                                            class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                            value="{{ isset($setting['gsc']) ? $setting['gsc'] : '' }}" />
                                        @if ($errors->has('gsc'))
                                            <div class="text-danger">{{ $errors->first('gsc') }}
                                            </div>
                                        @endif
                                    </div>
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label class="col-lg-12 col-form-label fw-bold fs-6">Site
                                            Indexing</label>
                                        <!--end::Label-->
                                        <!--begin::Input-->
                                        <input type="checkbox" name="site_index"
                                            class="form-check form-check-lg form-control-check mb-3 mb-lg-0"
                                            value="{{ isset($setting['site_index']) ? $setting['site_index'] : '' }}" />
                                        @if ($errors->has('site_index'))
                                            <div class="text-danger">{{ $errors->first('site_index') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <a href="{{ url()->previous() }}" class="btn btn-light me-5">Cancel</a>
                            <button type="submit" class="btn btn-primary">Save Changes
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!--end:::Main-->
    </x-slot>
    <x-slot name="footer">
        <x-layout.footer />
    </x-slot>
</x-layout.master>
