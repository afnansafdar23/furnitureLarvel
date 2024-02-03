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
                <li class="breadcrumb-item active" aria-current="page">Checkout</li>
            </ul>
        </nav>
    </div>
</div>
<!-- Breadcrumb Area End -->
<!-- Checkout Area Start -->
<div class="checkout-area pt-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <div class="panel active">
                        <div class="panel-heading" id="headingone">
                            <h4 class="panel-title">

                                    <span>1</span> BILLING INFORMATION

                            </h4>
                        </div>
                        <div id="billing" >
                            <div class="panel-body">
                                <div class="login-form">
                                    <form action="{{url('payment')}}" method="post">
                                    @csrf
                                        <div class="customer-name">
                                            <div class="first-name">
                                                <p>First Name<span>*</span></p>
                                                <input type="text" placeholder="First Name" name="Fname" required>
                                            </div>
                                            <div class="last-name">
                                                <p>Last Name<span>*</span></p>
                                                <input type="text" placeholder="Last Name" name="Lname" required>
                                            </div>
                                        </div>
                                        <div class="customer-info">

                                            <div class="email-address">
                                                <p>Email Adress<span>*</span></p>
                                                <input type="email" placeholder="Email" name="email" required>
                                            </div>
                                            <div class="telephone">
                                                <p>Phone NO<span>*</span></p>
                                                <input type="text" placeholder="PhNo" name="Phno" required>
                                            </div>
                                        </div>
                                        <p>Address<span>*</span></p>
                                       <textarea name="address" id="" cols="30" rows="10"  placeholder="Street address, P.O. box etc." required></textarea><br>
                                        <div class="city-country">
                                            <div class="city" >
                                                <p>City<span>*</span></p>
                                                <input type="text" placeholder="City" name="city" required>
                                            </div>
                                            <div class="state">
                                                <p>State/Province</p>
                                               <input type="text" placeholder="State  / Province" name="state" required>
                                            </div>
                                        </div>
                                        <div class="city-country">
                                            <div class="city">
                                                <p>Zip/Postal Code<span>*</span></p>
                                                <input type="text" placeholder="ZipCode" name="zipcode" required>
                                            </div>

                                        </div>



                                        <div class="buttons-set">
                                            <button class="collapse button" data-bs-toggle="collapse" data-parent="#accordion" type="button"><span>Continue</span></button>
                                        </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="panel">
                        <div class="panel-heading" id="headingFive">
                            <h4 class="panel-title">
                                <a class="collapse" data-bs-toggle="collapse" data-parent="#accordion" href="#payment-info">
                                    <span>2</span> PAYMENT INFORMATION
                                </a>
                            </h4>
                        </div>
                        <div id="payment-info" class="collapse">
                            <div class="panel-body">
                                <div class="ship-method payment">
                                    <div class="ship-wrap">
                                        <div class="ship-address">
                                            <input type="radio" name="payment_method" value="ChachOnDelivery">
                                            <span>Cash on Delivery </span>
                                        </div>
                                         <div class="ship-address">
                                            <input type="radio" name="payment_method" value="Stipe">
                                            <span>Stripe </span>
                                        </div>
                                    </div>
                                    <div class="buttons-set">
                                        <button type="button" class="button"><span>Continue</span></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel">
                        <div class="panel-heading" id="headingSix">
                            <h4 class="panel-title">
                                <a class="collapsed" data-bs-toggle="collapse" data-parent="#accordion" href="#order-review">
                                    <span>3</span> ORDER REVIEW
                                </a>
                            </h4>
                        </div>
                        <div id="order-review" class="collapse">
                            <div class="panel-body">

                                    <div class="checkout-table table-responsive">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <th class="p-name alignleft">Product Name</th>
                                                    <th class="p-amount">Price</th>
                                                    <th class="p-quantity">Qty</th>
                                                    <th class="p-total">SubTotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <?php $total = 0 ?>
                                        @if(session('cart'))
                                     @foreach(session('cart') as $id => $details)
                                          <?php $total += $details['price'] * $details['quantity'] ?>
                                          @endforeach
                                          @endif
                                          @foreach(session('cart') as $id => $details)
                                                <tr>
                                                    <td class="p-name">{{$details['name']}}</td>
                                                    <td class="p-amount"><span class="amount">${{$details['price']}}</span></td>
                                                    <td class="p-quantity">{{$details['quantity']}}</td>
                                                    <td class="p-total alignright">${{$details['price']}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="3" class="alignright">Subtotal</td>
                                                    <td>${{$total}}</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" class="alignright">Shipping &amp; Handling (Flat Rate - Fixed)    </td>
                                                    <td>£5.00</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="3" class="alignright"><strong>Grand Total</strong></td>
                                                    <td><strong>${{$total}}</strong></td>
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <div class="checkout-buttons">
                                            <p>Forgot an Item? <a href="{{url('/cart')}}">Edit Your Cart</a></p>
                                            <button type="submit" class="default-btn"><span>Place Order</span></button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-3 mt-4">
                <div class="col-md-12 order-md-2 mb-4">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                      <span class="text-dark">Your cart</span>
                      <span class="badge badge-secondary badge-pill">3</span>
                    </h4>
                    <ul class="list-group mb-3">
                    @if(session('cart'))
                    @foreach(session('cart') as $id => $details)
                      <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <img  src="{{$details['photo']}}" alt="" height="50px" width="50px" >
                          <h6 class="my-0 d-inline">{{$details['name']}}</h6>
                          <small class="text-dark d-block">{{$details['size']}}</small>
                        </div>
                        <span class="text-dark">${{$details['price']}}</span>
                      </li>
                      <li class="list-group-item d-flex justify-content-between bg-light">
                      </li>
                      @endforeach
                      @endif
                      <li class="list-group-item d-flex justify-content-between">
                        <span>Total (USD)</span>
                        <strong>${{$total}}</strong>
                      </li>

                    </ul>
                  </div>
            </div>
        </div>
    </div>
</div>
<!-- Checkout Area End -->


@endsection

@section('coustomJS')

@endsection
