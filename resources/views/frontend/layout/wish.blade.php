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
