<!doctype html>
<html class="no-js" lang="en">
    <head>


        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">


        <title>name</title>

        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href=" ">

		<!-- all css here -->
        <link rel="stylesheet" href=" {{asset('assets/frontend/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href=" {{asset('assets/frontend/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href=" {{asset('assets/frontend/css/font-awesome.min.css')}}">
        <link rel="stylesheet" href=" {{asset('assets/frontend/css/ie7.css')}}">
        <link rel="stylesheet" href=" {{asset('assets/frontend/css/meanmenu.css')}}">
        <link rel="stylesheet" href=" {{asset('assets/frontend/css/animate.css')}}">
        <link rel="stylesheet" href=" {{asset('assets/frontend/css/bundle.css')}}">
        <link rel="stylesheet" href=" {{asset('assets/frontend/css/slick.css')}}">
        <link rel="stylesheet" href=" {{asset('assets/frontend/css/style.css')}}">
        <link rel="stylesheet" href=" {{asset('assets/frontend/css/responsive.css')}}">

        @yield('CoustomCSS')
    </head>
    <body>
        <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

         <!-- Header Area Start -->
         <header class="header-area bg-ash">

            <!--Header Middle Area Start -->
            <div class="header-middle-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="logo">
                                <a href="{{url('/index')}}">ifurniture <!--<img src="assets/img/logo/logo.png" alt="ifurniture">--></a>
                            </div>
                        </div>
                        <div class="col-md-2 invisible">
                            <span class="email-image">
                                <span><img src="assets/img/icon/email.png" alt=""></span>
                                <span><span>Email: </span>admin@LOREM IPSUM.com</span>
                            </span>
                        </div>
                        <div class="col-md-7">
                            <form action="#" method="post" class="header-search col-5">
                                <input type="text" placeholder="Search for item...">
                                <button><i class="icon icon-Search"></i></button>
                            </form>
                            <div class="cart-box-wrapper  " id="addcart">
                                <a class="cart-info" href="{{url('/cart')}}">
                                    <span>
                                        <img src=" {{asset('assets/frontend/img/icon/cart.png')}}" alt="" width="25px" height="25px">
                                        <span style="width: 19px; height: 19px; font-size: 13px;">{{ count((array) session('cart')) }}</span>
                                    </span>
                                </a>
                                <div class="cart-dropdown">
                                    <button class="close"><i class="fa fa-close"></i></button>
                                    <div class="cart-item-a-wrapper">
                                        <div class="cart-item-amount">
                                            <span class="cart-number"><span>{{ count((array) session('cart')) }}</span> items</span>
                                             <?php $total = 0    ?>
                                             @foreach((array) session('cart') as $id => $details)
                                             <?php $total += $details['price'] * $details['quantity'] ?>
                                             @endforeach
                                            <div class="cart-amount">
                                                <h5>Cart Subtotal :</h5>
                                                <h4>$ {{ $total }}</h4>
                                            </div>
                                        </div>
                                        <a href="{{ url('/check-out') }}" class="grey-button">Go to Checkout</a>
                                    </div>
                                    @if(session('cart'))
                                     @foreach(session('cart') as $id => $details)
                                    <div class="cart-dropdown-item">
                                        <div class="cart-p-image">
                                            <a ><img src="{{$details['photo']}}" alt="{{ $details['name'] }}"></a>
                                        </div>
                                        <div class="cart-p-text">
                                            <a  class="cart-p-name">{{ $details['name'] }}</a>
                                            <span>{{ $details['price'] }}</span>
                                            <div class="cart-p-qty">
                                                <label>Qty</label>
                                                <input type="text" placeholder="1">
                                                <button  class="remove-from-cart" data-id="{{ $id }}"  ><i class="icon icon-Delete"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    @endif

                                    <div class="cart-btn-wrapper ">
                                        <a href="{{url('/cart')}}" class="grey-button">View  cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="cart-box-wrapper  wish">
                                <a class="cart-info" href="{{url('/wish')}}">
                                    <span class="p-1">
                                    <svg width="25px" height="25px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" id="heart"><g fill="none" fill-rule="evenodd" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" transform="translate(2.5 3)" class="colorStroke200e32 svgStroke"><path d="M9.26100981 17.8537669C7.09039739 16.5178915 5.07111022 14.9456454 3.2392904 13.1651694 1.95143752 11.8829466.9710055 10.3197719.373096631 8.59538613-.702856235 5.25030481.553929046 1.42082647 4.07111951.287520227 5.91961305-.307565201 7.93844933.0325524403 9.49609195 1.20147687L9.49609195 1.20147687C11.0543328.0339759987 13.0724617-.306022468 14.9210644.287520227 18.4382548 1.42082647 19.7040817 5.25030481 18.6281289 8.59538613 18.03022 10.3197719 17.049788 11.8829466 15.7619351 13.1651694 13.9301153 14.9456454 11.9108281 16.5178915 9.7402157 17.8537669L9.50513357 18 9.26100981 17.8537669zM13.2393229 4.0530216C14.3046302 4.39332197 15.061552 5.34972367 15.1561465 6.47500671" fill="" class="color000000 svgShape"></path></g></svg>
                                        <span style="width: 19px; height: 19px; font-size: 13px;">{{ count((array) session('wish')) }}</span>
                                    </span>
                                </a>
                                <div class="cart-dropdown">
                                    <button class="close"><i class="fa fa-close"></i></button>
                                    <div class="cart-item-a-wrapper">
                                        <div class="cart-item-amount">
                                            <span class="cart-number"><span>{{ count((array) session('wish')) }}</span> items</span>

                                        </div>
                                        <a href="{{ url('/wish') }}" class="grey-button">Go to WishList</a>
                                    </div>
                                    @if(session('wish'))
                                     @foreach(session('wish') as $id => $details)
                                    <div class="cart-dropdown-item">
                                        <div class="cart-p-image">
                                            <a ><img src="{{$details['photo']}}" alt="{{ $details['name'] }}"></a>
                                        </div>
                                        <div class="cart-p-text">
                                            <a  class="cart-p-name">{{ $details['name'] }}</a>
                                            <span>{{ $details['price'] }}</span>
                                            <div class="cart-p-qty">
                                                <button  class="remove-from-wish" data-id="{{ $id }}"  ><i class="icon icon-Delete"></i></button>
                                            </div>

                                        </div>
                                    </div>
                                    @endforeach
                                    @endif

                                </div>
                            </div>
                            <div class="col-2"></div>
                        </div>

                    </div>
                </div>
            </div>
            <!--Header Middle Area End -->
            <!-- Mainmenu Area Start -->
            <div class="mainmenu-area header-sticky display-none">
                <div class="container">
                    <div class="menu-wrapper">
                        <div class="main-menu">
                            <nav>
                                <ul>

                                    <li class="{{Request::route()->getName()=='index'?'active':''}}"><a href="{{url('')}}">Home</a></li>

                                    <li class="megamenu {{Request::route()->getName()=='web.allcategories'?'active':''}}"><a href="{{url('/allcategories')}}">Categories</a>
                                        <ul>
                                        @foreach(\App\Models\ParentCategory::take(7)->get() as $parent)
                                            <li>
                                                <ul>
                                                    <li>{{$parent->name}}</li>


                                                     @foreach( \App\Models\ChildCategory::where(['parent_category_id' => $parent->id])->take(10)->get() as $child)

                                                    <li><a href="#">{{$child->name}}</a></li>


                                                    @endforeach
                                                    <li ><a class="text-lowercase" href="#">more</a></li>
                                                </ul>
                                            </li>

                                        @endforeach

                                        </ul>
                                    </li>
                                    <li class="{{Request::route()->getName()=='web.allproduct'?'active':''}}" ><a href="{{url('/all-product')}}">Shop</a></li>
                                    <li class="{{Request::route()->getName()=='web.about'?'active':''}}"><a class="{{Request::route()->getName()=='about'?'active':''}}" href="{{url('/about')}}">About Us</a></li>
                                    <li><a href="{{url("/Blog")}}">Blog</a></li>
                                    <li><a href="{{url("/Contact-Us")}}">Contact</a></li>

                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Mainmenu Area End -->
            <!-- Mobile Menu Area Start -->
            <div class="mobile-menu-area container">
                <div class="mobile-menu">
                    <nav id="mobile-menu-active">
                        <ul class="menu-overflow">
                            <li><a href="{{url('')}}">HOME</a></li>
                            <li><a href="{{url("/All-Product")}}">Shop</a></li>
                            <li><a href="{{url("/About")}}">About Us</a></li>
                            <li><a href="{{url("/Blog")}}">Blog</a></li>
                            <li><a href="{{url("/Contact-Us")}}">Contact</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- Mobile Menu Area End -->
        </header>
        <!-- Header Area End -->

        @yield('content')


	   <!-- Footer Area Start -->
       <footer class="footer-area">
        <div class="footer-top pt-80 pb-80">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-5">
                        <div class="single-footer-widget">
                            <div class="footer-logo">
                                <a href="index.html"><img src="assets/img/logo/logo-2.png" alt="">Home</a>
                            </div>
                            <div class=" text-light single-footer-text ">
                                <span>Addresss: Lorem, ipsum dolor.</span>
                                <span>Phone 01: +(800) 123 456 78</span>
                                <span>Phone 02: +(100) 123 456 789</span>
                                <span>Fax : (800) 123 456 789</span>
                                <span>Email:Contact@ifurniture.com</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <div class="single-footer-widget">
                            <h4>ABOUT US</h4>
                            <ul class="footer-widget-list">
                                <li><a href="#">Site Map</a></li>
                                <li><a href="#">Specials</a></li>
                                <li><a href="#">Delivery Information</a></li>
                                <li><a href="{{route('web.privacy')}}">Privacy Policy</a></li>
                                <li><a href="{{route('web.terms')}}">Terms & Condition</a></li>
                                <li><a href="{{route('web.faq')}}">FAQ Section</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4">
                        <div class="single-footer-widget">
                            <h4>INFORMATION</h4>
                            <ul class="footer-widget-list">
                                <li><a href="#">Gift Cards</a></li>
                                <li><a href="#">Return Policy</a></li>
                                <li><a href="#">Your Orders</a></li>

                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <div class="single-footer-widget">
                            <h4>my account</h4>
                            <ul class="footer-widget-list">
                                <li><a href="{{url("/Check-Out")}}">Checkout</a></li>
                                <li><a href="{{url("/Login")}}">Login</a></li>
                                <li><a href="#">Order status</a></li>
                                <li><a href="#">Site Map</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="single-footer-widget">
                            <h4 >sign up newsletter</h4>
                            <p class="text-light">Be the first to hear about new trending and offers and see how youve helped</p>
                            <div class="newsletter-form mc_embed_signup">
                                <form action="http://devitems.us11.list-manage.com/subscribe/post?u=6bbb9b6f5827bd842d9640c82&amp;id=05d85f18ef" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
                                    <div id="mc_embed_signup_scroll" class="mc-form">
                                        <input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="Enter your email address" required>
                                        <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                                        <div class="mc-news" aria-hidden="true"><input type="text" name="b_6bbb9b6f5827bd842d9640c82_05d85f18ef" tabindex="-1" value=""></div>
                                        <button id="mc-embedded-subscribe" type="submit" name="subscribe">Subscribe</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-6 text-light">
                        <span class="text-light">Copyright &copy; 2023<a href="{{url("/index")}}" class="text-light">I furniture</a>. All rights reserved.</span>
                         <br>
                        <ul class="list-underline col-12 row" style="padding: 0px;">
                            <li class="col-4"><a href="{{url("/Privacy-Policy")}}" class="text-light col-12 p-0 m-0">Privacy policy</a></li>
                            <li class="col-5"><a href="{{url("/Terms")}}" class="text-light col-12 p-0 m-0">Terms & condition</a></li>

                        </ul>
                    </div>
                    <div class="col-lg-4 col-md-2">
                        <div class="social-link text-light">
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-google-plus"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4">
                        <div class="payment-image">
                            <img src=" {{asset('assets/frontend/img/payment.png')}}" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->

		<!-- all js here -->
        <script src=" {{asset('assets/frontend/js/vendor/modernizr-3.6.0.min.js')}}"></script>
        <script src="{{asset('assets/frontend/js/vendor/jquery-3.6.0.min.js')}}"></script>
        <script src="{{asset('assets/frontend/js/vendor/jquery-migrate-3.3.2.min.js')}}"></script>
        <script src="{{asset('assets/frontend/js/vendor/bootstrap.bundle.min.js')}} "></script>
        <script src="{{asset('assets/frontend/js/owl.carousel.min.js')}}"></script>
        <script src="{{asset('assets/frontend/js/jquery.meanmenu.js')}}"></script>
        <script src="{{asset('assets/frontend/js/ajax-mail.js')}}"></script>
        <script src="{{asset('assets/frontend/js/plugins.js')}}"></script>
        <script src="{{asset('assets/frontend/js/main.js')}}"></script>
        <script type="text/javascript">

        $(".remove-from-cart").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('delete-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
        $(".remove-from-wish").click(function (e) {
            e.preventDefault();
            var ele = $(this);
            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('delete-wish') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        window.location.reload();
                    }
                });
            }
        });
    </script>
        @yield('coustomJS')


    </body>

</html>
