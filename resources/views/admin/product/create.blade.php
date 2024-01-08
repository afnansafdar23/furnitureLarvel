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
            <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="p-5">
                    @if (Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif
                    @if (Session::has('success'))
                    <div class="alert alert-success">{{ Session::get('success') }}</div>
                    @endif
                    <div class="card mb-xl-8 mb-5" style="user-select: auto;">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5" style="user-select: auto;">
                            <h3 class="card-title align-items-start flex-column" style="user-select: auto;">
                                <span class="card-label fw-bold fs-3 mb-1" style="user-select: auto;">Add New
                                    Product</span>
                            </h3>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-3" style="user-select: auto;">
                            <!--begin::Table container-->
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-12">
                                        <label class="col-lg-8 col-form-label required fw-bold fs-6">Image</label>
                                        @include('admin.media.dropdown')
                                    </div>
                                    <div class="col-12">
                                        <x-cento-dash-input type="text" name="name" label="Name" placeholder="Name"
                                            :message="$errors->first('name')" />
                                    </div>
                                    <div class="col-6">
                                        <x-cento-dash-input type="number" name="price" label="price" placeholder="price"
                                            :message="$errors->first('price')" />
                                    </div>
                                    <div class="col-6">
                                        <x-cento-dash-input type="number" name="discounted_price"
                                            label="Discounted Price" placeholder="Discounted Price"
                                            :message="$errors->first('discounted_price')" />
                                    </div>
                                    <div class="col-6">
                                        <x-textarea type='text' name="description" label="Description" class="col-12"
                                            placeholder="Enter Description" :message="$errors->first('description')" />
                                    </div>
                                    <div class="col-6">
                                        <x-textarea type='text' name="features" label="Key Features" class="col-12"
                                            placeholder="Enter Features" :message="$errors->first('features')" />
                                    </div>
                                    <div class="col-6">
                                        <x-cento-dash-input type="select" name="parent_category_id"
                                            label="Parent Category" :options="$parentCategories"
                                            :message="$errors->first('parent_category_id')" />
                                    </div>
                                    <div class="col-6">
                                        <x-cento-dash-input type="select" name="child_category_id" label="Child Category"
                                            :options="$childCategories" :message="$errors->first('child_category_id')" />
                                    </div>

                                    <div class="col-6">
                                        <x-cento-dash-input type="number" nullable name="sku"
                                            label="SKU (Unique Product No.)" placeholder="Product No. should be unique"
                                            :message="$errors->first('sku')" />
                                    </div>
                                    <div class="col-6">
                                        <x-cento-dash-input type="number" name="product_length" label="Product Length"
                                            placeholder="product_length" :message="$errors->first('product_length')" />
                                    </div>
                                    <div class="col-6">
                                        <x-cento-dash-input type="number" name="product_weight" label="Product Weight"
                                            placeholder="product_weight" :message="$errors->first('product_weight')" />
                                    </div>
                                    <div class="col-6">
                                        <x-cento-dash-input type="number" name="product_height" label="Product Height"
                                            placeholder="product_height" :message="$errors->first('product_height')" />
                                    </div>
                                    <div class="col-6">
                                        <x-cento-dash-input type="number" name="product_width" label="Product Width"
                                            placeholder="product_width" :message="$errors->first('product_width')" />
                                    </div>
                                    <div class="col-6">
                                        <x-cento-dash-input type="select" name="color_id"
                                            label="Select Color" :options="$color"
                                            :message="$errors->first('Color')" />
                                    </div>
                                    <div class="col-sm-3 my-4">
                                        <label class="form-check form-switch form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox" name="availability" />
                                            <span class="form-check-label fw-semibold text-muted">Availability</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer mt-5 gap-2">
                                <x-cento-dash-input type="submit" label="Add Product" />
                                <a class="btn btn-danger" href={{ route('product.index') }}> Cancel </a>
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
