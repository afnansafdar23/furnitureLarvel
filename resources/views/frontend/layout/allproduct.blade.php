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
                 @if(empty($category))
                 <li class="breadcrumb-item active" aria-current="page">All Products</li>
                @else
                  @foreach($category as $category)
                <li class="breadcrumb-item active" aria-current="page">{{$category->name}}</li>
                 @endforeach
                 @endif
            </ul>
        </nav>
    </div>
</div>
<!-- Breadcrumb Area End -->
<!-- Shop Area Start -->
<div class="shop-area ptb-80">
    <div class="container">
        <div class="row">
            <div class="order-xl-2 order-lg-2 col-xl-9 col-lg-8">
                @if(Empty($category))
                <h1 class="page-title text-dark">All Products</h1>
                @else
                <h1 class="page-title text-dark">{{$category->name}}</h1>
                @endif
                <div class="ht-product-shop tab-content">
                    <div class="tab-pane active show fade text-center" id="grid" role="tabpanel">
                        <div class="row">





                          @foreach($product as $product)

                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-xs-12">
                                <div class="product-item">
                                    <div class="product-image-hover">
                                        <a href="{{ url('product-detail/'.$product->name) }}">
                                            <img class="primary-image" src="{{$product->getFirstMediaUrl('product.image')}}" alt="">
                                        </a>
                                        <div class="product-hover">
                                        <a href="{{ url('add-to-cart/'.$product->id) }}"  role="button"><i class="icon icon-FullShoppingCart"></i></a>
                                            <a href="{{ url('add-to-wish/'.$product->id) }}"><i class="icon icon-Heart"></i></a>
                                            <a href="{{ url('product-detail/'.$product->name) }}"><i class="icon icon-Files"></i></a>
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
                                        <h4><a href="{{ url('product-detail/'.$product->name) }}">{{$product->name}}</a></h4>
                                        <div class="product-price"><span>${{$product->discounted_price}}</span><span class="prev-price">${{$product->price}}</span></div>
                                    </div>
                                </div>
                            </div>
                            @endforeach



                        </div>
                    </div>

                </div>
                <div class="pagination-wrapper">
                    <nav aria-label="navigation">
                        <ul class="pagination align-items-center">
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item active"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#"><i class="fa fa-angle-right"></i></a></li>
                        </ul>
                    </nav>
                    <div class="shop-results"><span>Show</span>
                        <select name="number" id="b-number">
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="14">15</option>
                        </select>
                        <span>per page</span>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4">
                <div class="sidebar-widget widget-style-1 panel-group" id="widget-parent" aria-multiselectable="true" role="tablist">
                    <h4>Shop By</h4>
                    <div class="panel widget-option">
                        <a data-bs-toggle="collapse" href="#category" data-parent="#widget-parent">Category</a>
                        <div class="collapse show" id="category">
                            <div class="collapse-content">
                                <div class="single-widget-opt">
                                    <input type="checkbox" id="tables">
                                    <label for="tables">Dining tables <span>(4)</span></label>
                                </div>
                                <div class="single-widget-opt">
                                    <input type="checkbox" id="chairs">
                                    <label for="chairs">Dining chairs <span>(8)</span></label>
                                </div>
                                <div class="single-widget-opt">
                                    <input type="checkbox" id="sets">
                                    <label for="sets">Dining sets <span>(5)</span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel widget-option">
                        <a class="collapsed" data-bs-toggle="collapse" href="#color" data-parent="#widget-parent">Color</a>
                        <div class="collapse" id="color">
                            <div class="collapse-content">
                                <div class="widget-color">
                                    <span class="black"></span>
                                    <span class="blue"></span>
                                    <span class="gray"></span>
                                    <span class="green"></span>
                                    <span class="white"></span>
                                    <span class="purple"></span>
                                    <span class="red"></span>
                                    <span class="white"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel widget-option">
                        <a class="collapsed" data-bs-toggle="collapse" href="#manufacture" data-parent="#widget-parent">Manufacturer</a>
                        <div class="collapse" id="manufacture">
                            <div class="collapse-content">
                                <div class="single-widget-opt">
                                    <input type="checkbox" id="adidas">
                                    <label for="adidas">Adidas <span>(1)</span></label>
                                </div>
                                <div class="single-widget-opt">
                                    <input type="checkbox" id="chanel">
                                    <label for="chanel">Chanel <span>(4)</span></label>
                                </div>
                                <div class="single-widget-opt">
                                    <input type="checkbox" id="dkny">
                                    <label for="dkny">DKNY <span>(2)</span></label>
                                </div>
                                <div class="single-widget-opt">
                                    <input type="checkbox" id="dolce">
                                    <label for="dolce">Dolce <span>(5)</span></label>
                                </div>
                                <div class="single-widget-opt">
                                    <input type="checkbox" id="gabbana">
                                    <label for="gabbana">Gabbana <span>(1)</span></label>
                                </div>
                                <div class="single-widget-opt">
                                    <input type="checkbox" id="nike">
                                    <label for="nike">Nike <span>(2)</span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel widget-option">
                        <a class="collapsed" data-bs-toggle="collapse" href="#price" data-parent="#widget-parent">Price</a>
                        <div class="collapse" id="price">
                            <div class="collapse-content">
                                <div class="single-widget-opt">
                                    <input type="checkbox" id="low">
                                    <label for="low">$0.00 - $9.99 <span>(3)</span></label>
                                </div>
                                <div class="single-widget-opt">
                                    <input type="checkbox" id="l-t-m">
                                    <label for="l-t-m">$10.00 - $19.99 <span>(2)</span></label>
                                </div>
                                <div class="single-widget-opt">
                                    <input type="checkbox" id="medium">
                                    <label for="medium">$30.00 - $39.99 <span>(3)</span></label>
                                </div>
                                <div class="single-widget-opt">
                                    <input type="checkbox" id="m-t-h">
                                    <label for="m-t-h">$40.00 - $49.99 <span>(4)</span></label>
                                </div>
                                <div class="single-widget-opt">
                                    <input type="checkbox" id="high">
                                    <label for="high">$50.00 - $59.99 <span>(1)</span></label>
                                </div>
                                <div class="single-widget-opt">
                                    <input type="checkbox" id="highest">
                                    <label for="highest">$70.00 And Above <span>(1)</span></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>




            </div>
        </div>
    </div>
</div>
<!-- Shop Area End -->
  <!-- Blog Area Start -->
<div class="blog-area pb-85">
    <div class="container text-center">
        <div class="section-title">
            <span>Latest New</span>
            <h2><span>FROM OUR BLOG</span></h2>
        </div>
    </div>
    <div class="container">
        <div class="custom-row">
            <div class="blog-carousel owl-carousel">
                <div class="custom-col">
                    <div class="single-blog">
                        <div class="blog-image">
                            <a href="blog.html">
                                <img src="assets/img/blog/1.jpg" alt="">
                                <span>05 <span>July</span></span>
                            </a>
                        </div>
                        <div class="blog-text">
                            <h5><a href="blog.html">Lorem ipsum dolor sit.</a></h5>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat ratione, recusandae, adipisci doloribus corporis, dicta libero facilis aspernatur aliquid illo dolor.</p>
                            <a href="blog.html">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="custom-col">
                    <div class="single-blog">
                        <div class="blog-image">
                            <a href="blog.html">
                                <img src="assets/img/blog/2.jpg" alt="">
                                <span>20 <span>June</span></span>
                            </a>
                        </div>
                        <div class="blog-text">
                            <h5><a href="blog.html">Lorem ipsum dolor sit.</a></h5>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat ratione, recusandae, adipisci doloribus corporis, dicta libero facilis aspernatur aliquid illo dolor.</p>
                            <a href="blog.html">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="custom-col">
                    <div class="single-blog">
                        <div class="blog-image">
                            <a href="blog.html">
                                <img src="assets/img/blog/3.jpg" alt="">
                                <span>15 <span>May</span></span>
                            </a>
                        </div>
                        <div class="blog-text">
                            <h5><a href="blog.html">Lorem ipsum dolor sit.</a></h5>
                            <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quaerat ratione, recusandae, adipisci doloribus corporis, dicta libero facilis aspernatur aliquid illo dolor.</p>
                            <a href="blog.html">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog Area End -->


@endsection

@section('coustomJS')

@endsection
