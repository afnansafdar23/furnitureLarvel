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
                <li class="breadcrumb-item active" aria-current="page">Cart</li>
            </ul>
        </nav>
    </div>
</div>
<!-- Breadcrumb Area End -->
<!-- Cart Main Area Start -->
<div class="cart-main-area ptb-80">
    <div class="container">
        <form action="#">
            <div class="cart-table table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th class="p-image"></th>
                            <th class="p-name">Product Name</th>
                            <th class="p-amount">Unit Price</th>
                            <th class="p-quantity">Qty</th>
                            <th class="p-total">SubTotal</th>
                            <th class="p-edit">Edit</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $total = 0 ?>
                                        @if(session('cart'))
                                     @foreach(session('cart') as $id => $details)
                                          <?php $total += $details['price'] * $details['quantity'] ?>

                        <tr>
                            <td class="p-image">
                                <a href="product-details.html"><img alt="" src=" {{$details['photo']}}"></a>
                            </td>
                            <td class="p-name"><a href="{{url('product-detail/'.$details['name']) }}">{{ $details['name'] }}</a></td>
                            <td class="p-amount">${{ $details['price'] }}</td>
                            <td class="p-quantity"><input maxlength="12" type="number" value="{{ $details['quantity'] }}" name="quantity" class="quantity"></td>
                            <td class="p-total"><span>${{ $details['price'] * $details['quantity'] }}</span></td>

                            <td class="edit"><button  class="remove-from-cart" data-id="{{ $id }}"><img src=" {{asset('assets/img/icon/delte.png')}}" alt=""></button></td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="all-cart-buttons">
                <a   href="{{url('')}}" class="button"  role="button"><span>Continue Shopping</span></a>
</div>
            <div class="row">

                <div class="col-lg-4 col-md-12">
                    <div class="ht-shipping-content">
                        <h3>Discount Code</h3>
                        <p>Enter your coupon code if you have one</p>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12">
                                <div class="postal-code">
                                    <input type="text" placeholder="">
                                </div>
                                <div class="buttons-set">
                                    <button class="button" type="button"><span>Apply Coupon</span></button>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="ht-shipping-content">
                        <h3>Total</h3>
                        <div class="amount-totals">
                            <p class="total">Subtotal <span>${{ $total }}</span></p>
                            <p class="total">Grandtotal <span>${{ $total }}</span></p>
                            <a href="{{url('/check-out')}}" class="button" type="button"><span>Procced to checkout</span></button>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Cart Main Area End -->

@endsection

@section('coustomJS')

@endsection
