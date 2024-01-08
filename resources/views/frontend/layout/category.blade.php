@extends('frontend.layout.app')

@section('CoustomCSS')

@endsection

@section('content')
 <!-- Breadcrumb Area Start -->
 <div class="breadcrumb-area bg-dark">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">About Us</li>
            </ul>
        </nav>
    </div>
</div>
<!-- Breadcrumb Area End -->
<!-- Category  Area Start -->
<div class="section-title ">
        <h2 align="center" class="mt-5 fs-1 fw-700"><span>Categories</span></h2>
    </div>
<div class="about-skill-area1 pt-80 pb-50">
            <div class=" category1 col-md-10 col-sm-12 ">

                <div class="cards-list card-list1 ">


                @foreach($allcategories as $parentcategory)
                    <div class="card 1 cardsp  ">

                      <div class=" title-white ">
                        <p class="text-dark" style="line-height: 30px; list-style:none;"><a href="{{route('web.product-by-category',Str::slug($parentcategory->name))}}">{{$parentcategory->name}}</a></p>
                      </div>
                    </div>
                    @endforeach




                    </div>
            </div>



</div>
<!-- Category  Area End -->

 <!-- Feature Product Area Start -->
 <div class="product-area text-center pt-90 pb-85">
    <div class="container">
        <div class="section-title">
            <span>new shop item</span>
            <h2><span>Nightstands</span></h2>
        </div>
    </div>
    <div class="container">
        <div class="custom-row">
            <div class="product-carousel owl-carousel carousel-style-one">









                @foreach($product as $product)
                <div class="custom-col">
                    <div class="product-item">
                        <span class="hot-sale">sale</span>
                        <div class="product-image-hover">
                            <a href="shop.html">
                                <img class="primary-image" src="{{$product->getFirstMediaUrl('product.image')}}" alt="">

                            </a>
                            <div class="product-hover">
                                <button><i class="icon icon-FullShoppingCart"></i></button>
                                <a href="wishlist.html"><i class="icon icon-Heart"></i></a>
                                <a href="wishlist.html"><i class="icon icon-Files"></i></a>
                            </div>
                        </div>
                        <div class="product-text">
                            <div class="product-rating">
                                <i class="fa fa-star color"></i>
                                <i class="fa fa-star color"></i>
                                <i class="fa fa-star color"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <h4><a href="shop.html">{{$product->name}}</a></h4>
                            <div class="product-price"><span>${{$product->discounted_price}}</span><span class="prev-price">${{$product->price}}</span></div>

                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
<!-- Feature Product Area End -->


@endsection

@section('coustomJS')

@endsection
