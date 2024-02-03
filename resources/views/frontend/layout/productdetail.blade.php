@extends('frontend.layout.app')

@section('CoustomCSS')
<style>
input[type='radio'] {
    -webkit-appearance: none;
    width: 50px;
    height: 50px;
    border-radius: 10px;
    outline: none;
}


input[type='radio']:before {
        content: '';
        display: block;
        width: 40px;

        height: 45px;
        margin: 5% auto;
        border-radius: 10px;
    }



input[type='radio']:checked {
    box-shadow: 0 0 0 5px gray;

}
input[type='radio']:checked::after {
          /* Heres your symbol replacement - this is a tick in Unicode. */
    content: '\2713';
     color: black;
     position: absolute;
     padding-left:2px;
     margin-top: -47px;
      font-size: 30px;
      font-weight:bolder;

    }
</style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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
                     <form id="product">

                     {{ csrf_field() }}
                    <div class="qty-cart-add quantity">

                        <label for="qty">qty</label>
                         <div class="input-group-prepend decrement-btn" style="cursor: pointer">
                         <span class="input-group-text">-</span>
                      </div>
                        <input  type="number" name="quantity"  class="qty-input" style="border:none; border-radius:3px; margin:0px 4px 0px 4px; background-color:lightgray; font-weight:bold;" placeholder="0" id="qty" min="1" value="1">
                        <div class="input-group-append increment-btn" style="cursor: pointer">
                         <span class="input-group-text">+</span>
                          </div>
                          <button type="submit">Add to cart</button>

                    </div>
                    <div class="radio-grid">
        <!-- Group 1 -->
        <div class="radio-grid roles">
    @foreach($colors as $color)

    <input type="radio"  name="color"  value="{{$color->name}}" class="radio"  style="background-color:{{$color->code}};"
        @if ($color->id == 1)
          checked
       @endif   >
    @endforeach
</div>

                    </div>
                    <div class="selected-value col-6 mt-2">
    <select  class="form-select form-select-transparent" data-control="select2" name="size" id="size">


    @foreach ($size as $size)
       <option

        @if ($size->id == 2)
          selected
       @endif
         >{{$size->name}}({{$size->dimension}})inch</option>"
         @endforeach



    </select>
    <input type="text" name="id" value="{{$product->id}}" hidden>

</div>

</form>
                    <div class="p-d-buttons">
                        <a href="{{ url('add-to-wish/'.$product->id) }}">Add to wish list</a>
                        <a href="#">BUY NOW</a>

                    </div>
                   {!! $product->features !!}
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
                            <p>{!! $product->description !!}</p>
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
<script type="text/javascript">

</script>
<script>

</script>

@endsection
