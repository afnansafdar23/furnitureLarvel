<!doctype html>
<html lang="en">
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
        <link href=" {{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css"/>


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
                            <div class="cart-box-wrapper" id="addcart">
                            @include('frontend.layout.cart')
                            </div>
                            <div class="cart-box-wrapper  wish" id="addwish">
                            @include('frontend.layout.wish')
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
        <script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
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

$(document).ready(function () {

$('.increment-btn').click(function (e) {
    e.preventDefault();
    var incre_value = $(this).parents('.quantity').find('.qty-input').val();
    var value = parseInt(incre_value, 10);
    value = isNaN(value) ? 0 : value;
    if(value<10){
        value++;
        $(this).parents('.quantity').find('.qty-input').val(value);
    }

});

$('.decrement-btn').click(function (e) {
    e.preventDefault();
    var decre_value = $(this).parents('.quantity').find('.qty-input').val();
    var value = parseInt(decre_value, 10);
    value = isNaN(value) ? 0 : value;
    if(value>1){
        value--;
        $(this).parents('.quantity').find('.qty-input').val(value);
    }
});

});


        $(document).on('click', '.remove-from-cart', function (e) {

    e.preventDefault();
            var ele = $(this);
            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('delete-cart') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        updatecart(response.cartSection);
                        updateaddCart(response.updatecar);


                    }


                });
            }
            function updatecart(cartHtml) {
    // Update the cart section with the new HTML content
    $('#addcart').html(cartHtml);
            }
            function updateaddCart(carthtml) {
    // Update the cart section with the new HTML content
    $('#addcart1').html(carthtml);
}
});
$(document).on('click', '.remove-from-wish', function (e) {
    e.preventDefault();
            var ele = $(this);
            if(confirm("Are you sure")) {
                $.ajax({
                    url: '{{ url('delete-wish') }}',
                    method: "DELETE",
                    data: {_token: '{{ csrf_token() }}', id: ele.attr("data-id")},
                    success: function (response) {
                        updatewish(response.wishSection);
                    }
                });
            }
            function updatewish(wishHtml) {
    // Update the cart section with the new HTML content
    $('#addwish').html(wishHtml);
}




});
$(document).ready(function(){
    $('#product').submit(function(e){
        e.preventDefault();

        // Serialize the form data
        var formData = $('#product').serialize();

        // Log the serialized data to the consol
        $.ajaxSetup({
            type: 'POST',
            url: "/add-to-cart",
            data: formData,
            async: true,
            dataType: 'json',
            beforeSend: function () {
                // You can add any code here to be executed before the request is sent
            },
            complete: function(){
                // You can add any code here to be executed after the request is completed
            }
        });

        $.post()
        .done(function(response) {
            if (response.redirect) {
                    // Handle redirect
                    window.location.href = response.redirect;
                } else {
                    // Update the cart section with the new HTML content
                    updateCart(response.cartSection);
                    // Other actions...
                }
        })
        .fail(function() {
            console.log('failed');
        });
    });
    function updateCart(cartHtml) {
    // Update the cart section with the new HTML content
    $('#addcart').html(cartHtml);
}
});

$(document).ready(function () {
    $('.add-to-wish').on('click', function () {
        var productId = $(this).data('product-id');
        console.log('Product ID:', productId); // Add this line


        $.ajax({
            type: 'POST', // Use POST method
            url: '{{ route("web.addtowish", ["productId" => ":productId"]) }}'.replace(':productId', productId),
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function (response) {
                // Check the console for the response
                if (response.redirect) {
                    // Handle redirect
                    window.location.href = response.redirect;
                } else {
                    // Update the cart section with the new HTML content
                    updateCart(response.wishSection);
                    // Other actions...
                }


                // Show the cart message

            },
            error: function (error) {
                // Check the console for errors
                console.error('Error adding to cart:', error);
            }
        });
    });
    function updateCart(wishHtml) {
    // Update the cart section with the new HTML content
    $('#addwish').html(wishHtml);
}


});


    </script>
        @yield('coustomJS')


    </body>

</html>
