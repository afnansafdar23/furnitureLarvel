
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
                                            <img src="{{$details['photo']}}" alt="{{ $details['name'] }}" width="100px" height="100px">
                                        </div>
                                        <div class="cart-p-text">
                                            <a  class="cart-p-name">{{ $details['name'] }}</a>
                                            <span></span>
                                            <span>{{ $details['size'] }}</span>
                                            <div class="cart-p-qty">
                                                <label>Qty</label>
                                                <input type="text" placeholder="" value="{{ $details['quantity'] }}">
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

