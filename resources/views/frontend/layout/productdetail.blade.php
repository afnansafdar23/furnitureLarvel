@extends('frontend.layout.app')

@section('CoustomCSS')

@endsection

@section('content')
<!-- Breadcrumb Area Start -->
<div class="breadcrumb-area bg-dark">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url("/index")}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Product Details</li>
            </ul>
        </nav>
    </div>
</div>
<!-- Breadcrumb Area End -->
<!-- Product Details Area Start -->
<div class="product-details-area pt-80 pb-75">



    <div class="container">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-sm-12">
                <div class="single-product-image product-image-slider fix">
                @if(!empty($image))

                    <div class="p-image"><img id="zoom1" src="{{$image}}" alt="" data-zoom-image="{{$image}}"></div>

                </div>
                <div class="single-product-thumbnail product-thumbnail-slider float-left" id="gallery_01">
                <div class="p-thum"><img  src="{{$image}}" alt="{{$product->name}}"></div>
                @endif
                </div>
            </div>
            <div class="col-lg-7 col-md-7 col-sm-12">
                <div class="p-d-wrapper">
                    <h1>{{$product->name}}</h1>
                    <div class="p-rating-review">
                        <div class="product-rating">
                            <i class="fa fa-star color"></i>
                            <i class="fa fa-star color"></i>
                            <i class="fa fa-star color"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <span>1 review</span>
                        <a href="#" class="scroll-down">Add your review</a>
                    </div>
                    <span class="p-d-price">{{$product->discounted_price}}</span>
                    <span class="model-stock">In stock <span><span>SKU</span>{{$product->sku}}</span></span>
                    <div class="qty-cart-add">
                        <label for="qty">qty</label>
                        <input  type="number" placeholder="1" id="qty">
                        <a href="{{ url('add-to-cart/'.$product->id) }}">Add to cart</a>
                    </div>
                    <div class="p-d-buttons">
                        <a href="{{ url('add-to-wish/'.$product->id) }}">Add to wish list</a>
                        <a href="#">BUY NOW</a>

                    </div>
                    <p>{{$product->features}}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container scroll-area">
        <div class="p-d-tab-container">
            <div class="p-tab-btn">
                <div class="nav" role="tablist">
                    <a class="active" href="#tab1" data-bs-toggle="tab" role="tab" aria-selected="true" aria-controls="tab1">Details</a>
                    <a href="#tab2" data-bs-toggle="tab" role="tab" aria-selected="false" aria-controls="tab2">Reviews 1</a>
                </div>
            </div>
            <div class="p-d-tab tab-content">
                <div class="tab-pane active show fade" id="tab1" role="tabpanel">
                    <div class="tab-items">
                        <div class="p-details-list">
                            <p>{{$product->description}}</p>
                            <span>Zippered main compartment.</span>
                            <span>Front zippered pocket.</span>
                            <span>Side mesh pocket.</span>
                            <span>Cell phone pocket on strap.</span>
                            <span>Adjustable shoulder strap and top carry handle.</span>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade scroll-area" id="tab2" role="tabpanel">
                    <div class="tab-items">
                        <div class="p-review-wrapper">
                            <div class="section-title title-style-2 text-center"><h2><span>Customer Reviews</span></h2></div>
                            <h2>Newthemes</h2>
                            <div class="p-tab-contents">
                                <div class="p-tab-ratings">
                                    <div class="p-single-rating">
                                        <span>Quality</span>
                                        <div class="product-rating">
                                            <i class="fa fa-star color"></i>
                                            <i class="fa fa-star color"></i>
                                            <i class="fa fa-star color"></i>
                                            <i class="fa fa-star color"></i>
                                            <i class="fa fa-star color"></i>
                                        </div>
                                    </div>


                                </div>
                                <div class="p-rating-info">
                                    <span>Newthemes</span>
                                    <span>Review by <span>Newthemes</span></span>
                                    <span>Posted on 2/19/18</span>
                                </div>
                            </div>
                        </div>
                        <div class="submit-review-wrapper">
                            <h3>You're reviewing:</h3>
                            <h4>Strive Shoulder Pack</h4>
                            <div class="submit-rating-container">
                                <div class="submit-rating-title"><h4>your rating</h4></div>
                                <div class="submit-rating-wrapper">

                                    <div class="submit-single-rating">
                                        <span>quality</span>
                                        <div class="rating-number">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form action="#" method="post" class="rating-form">
                                <div class="rating-form-box">
                                    <label for="r-name" class="important">Nickname</label>
                                    <input type="text" placeholder="" id="r-name">
                                </div>
                                <div class="rating-form-box">
                                    <label for="r-summary" class="important">Summary</label>
                                    <input type="text" placeholder="" id="r-summary">
                                </div>
                                <div class="rating-form-box">
                                    <label for="r-review" class="important">Review</label>
                                    <textarea name="review" id="r-review" cols="30" rows="10"></textarea>
                                </div>
                                <button>Submit Review</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Product Details Area End -->
<!-- Related Products Area Start -->
<div class="related-products-area text-center">
    <div class="container">
        <div class="section-title title-style-2">
            <h2><span>Related Products</span></h2>
        </div>
    </div>
    <div class="container">
        <div class="custom-row">
            <div class="related-product-carousel owl-carousel carousel-style-one">
                <div class="custom-col">
                    <div class="product-item">
                        <div class="product-image-hover">
                            <a href="product-details.html">
                                <img class="primary-image" src="assets/img/product/1.jpg" alt="">
                                <img class="hover-image" src="assets/img/product/2.jpg" alt="">
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
                            <h4><a href="product-details.html">Joust Duffle Bag</a></h4>
                            <div class="product-price"><span>$34.00</span></div>
                        </div>
                    </div>
                </div>
                <div class="custom-col">
                    <div class="product-item">
                        <div class="product-image-hover">
                            <a href="product-details.html">
                                <img class="primary-image" src="assets/img/product/3.jpg" alt="">
                                <img class="hover-image" src="assets/img/product/4.jpg" alt="">
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
                                <i class="fa fa-star color"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <h4><a href="product-details.html">Strive Shoulder Pack</a></h4>
                            <div class="product-price"><span>$32.00</span></div>
                        </div>
                    </div>
                </div>
                <div class="custom-col">
                    <div class="product-item">
                        <div class="product-image-hover">
                            <a href="product-details.html">
                                <img class="primary-image" src="assets/img/product/5.jpg" alt="">
                                <img class="hover-image" src="assets/img/product/6.jpg" alt="">
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
                                <i class="fa fa-star color"></i>
                                <i class="fa fa-star color"></i>
                            </div>
                            <h4><a href="product-details.html">Crown Summit Backpack</a></h4>
                            <div class="product-price"><span>$38.00</span></div>
                        </div>
                    </div>
                </div>
                <div class="custom-col">
                    <div class="product-item">
                        <div class="product-image-hover">
                            <a href="product-details.html">
                                <img class="primary-image" src="assets/img/product/7.jpg" alt="">
                                <img class="hover-image" src="assets/img/product/8.jpg" alt="">
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
                            <h4><a href="product-details.html">Wayfarer Messenger Bag</a></h4>
                            <div class="product-price"><span>$40.00</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Related Products Area End -->

@endsection

@section('coustomJS')

@endsection
