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
            <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="p-5">
                    @if (Session::has('error'))
                    <div class="alert alert-danger">{{ Session::get('error') }}</div>
                    @endif
                    <div class="card mb-xl-8 mb-5" style="user-select: auto;">
                        <!--begin::Header-->
                        <div class="card-header border-0 pt-5" style="user-select: auto;">
                            <h3 class="card-title align-items-start flex-column" style="user-select: auto;">
                                <span class="card-label fw-bold fs-3 mb-1" style="user-select: auto;">Edit Existing
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
                                        @include('admin.media.dropdown',['file' => $product,
                                        'collection_name' => 'product.image',])
                                    </div>
                                    <div class="col-12">
                                        <x-cento-dash-input type="text" name="name" label="Name" placeholder="Name"
                                            value="{{$product['name']}}" :message="$errors->first('name')" />
                                    </div>
                                    <div class="col-6">
                                        <x-cento-dash-input type="number" name="price" label="price" placeholder="price"
                                            value="{{$product['price']}}" :message="$errors->first('price')" />
                                    </div>
                                    <div class="col-6">
                                        <x-cento-dash-input type="number" value="{{$product['discounted_price']}}"
                                            name="discounted_price" label="Discounted Price"
                                            placeholder="Discounted Price"
                                            :message="$errors->first('discounted_price')" />
                                    </div>
                                    <div class="col-6">
                                        <x-textarea type='text' name="description" label="Description" class="col-12"
                                            placeholder="Enter Description" value="{{$product['description']}}"
                                            :message="$errors->first('description')" />
                                    </div>
                                    <div class="col-6">
                                        <x-textarea type='text' name="features" value="{{$product['features']}}"
                                            label="Key Features" class="col-12" placeholder="Enter Features"
                                            :message="$errors->first('features')" />
                                    </div>
                                    <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                        <label class="col-lg-8 col-form-label required fw-bold fs-6">Parent
                                            Category</label>
                                        <select name='parent_category_id' class="form-select form-select-solid"
                                            data-control="select2">
                                            @foreach ($parentCategories as $parentCategory)
                                            <option value="{{ $parentCategory->id }}">{{ $parentCategory->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('parent_category_id')
                                    <div class="error text-danger">{{ $message }}</div>
                                    @enderror
                                    <div class="col-6">
                                        <x-cento-dash-input type="select" name="child_category_id" label="Child Category"
                                            :options="$childCategories" :message="$errors->first('child_category_id')" />
                                    </div>

                                    <div class="col-6">
                                        <x-cento-dash-input type="number" name="sku" value="{{$product['sku']}}"
                                            label="SKU (Unique Product No.)" placeholder="Product No. should be unique"
                                            :message="$errors->first('sku')" />
                                    </div>
                                    <div class="col-6">
                                        <x-cento-dash-input type="number" name="product_length"
                                            value="{{$product['product_length']}}" label="Product Length"
                                            placeholder="product_length" :message="$errors->first('product_length')" />
                                    </div>
                                    <div class="col-6">
                                        <x-cento-dash-input type="number" name="product_weight"
                                            value="{{$product['product_weight']}}" label="Product Weight"
                                            placeholder="product_weight" :message="$errors->first('product_weight')" />
                                    </div>
                                    <div class="col-6">
                                        <x-cento-dash-input type="number" name="product_height" label="Product Height"
                                            value="{{$product['product_height']}}" placeholder="product_height"
                                            :message="$errors->first('product_height')" />
                                    </div>
                                    <div class="col-6">
                                        <x-cento-dash-input type="number" name="product_width" label="Product Width"
                                            placeholder="product_width" value="{{$product['product_width']}}"
                                            :message="$errors->first('product_width')" />
                                    </div>
                                    <div class="col-6">
                                        <x-cento-dash-input type="select" name="color_id" label="Color"
                                            :options="$color" :message="$errors->first('color_id')" />
                                    </div>
                                    <div class="col-sm-3 my-4">
                                        <label class="form-check form-switch form-check-custom form-check-solid">
                                            <input class="form-check-input" type="checkbox"
                                                {{$product['availability']=='on' ?'checked':''}} name="availability" />
                                            <span class="form-check-label fw-semibold text-muted">Availability</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer mt-5 gap-2">
                                <button type="submit" class="btn btn-success">
                                    Update Product
                                </button>
                                <a class="btn btn-light-danger" href={{ route('product.index') }}> Cancel </a>
                            </div>
                            <!--end::Table container-->
                        </div>
                        <!--end::Body-->
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
