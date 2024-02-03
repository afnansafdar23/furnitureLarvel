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
                <li class="breadcrumb-item active" aria-current="page">Wishlist</li>
            </ul>
        </nav>
    </div>
</div>
<!-- Breadcrumb Area End -->
<!-- Wishlist Area start -->
<div class="wishlist-area ptb-90">
    <div class="container">
        <div class="wishlist-content">
            <form action="#">
                <div class="wishlist-table table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th class="product-remove"><span>Remove</span></th>
                                <th class="product-thumbnail">Image</th>
                                <th class="product-name"><span>Product</span></th>
                                <th class="w-c-price"><span> Unit Price </span></th>
                                <th class="product-add-to-cart"><span>Add to Cart </span></th>
                            </tr>
                        </thead>
                        <tbody>
                        @if(session('wish'))
                                     @foreach(session('wish') as $id => $details)
                            <tr>
                                <td class="product-remove"><button class="remove-from-wish" data-id="{{ $id }}">×</button></td>
                                <td class="product-thumbnail"><a href="{{ url('product-detail/'.$details['name']) }}"><img src="{{$details['photo']}}" alt="" /></a></td>
                                <td class="product-name"><a href="{{ url('product-detail/'.$details['name']) }}">{{ $details['name'] }}</a></td>
                                <td class="w-c-price"><span class="amount">${{ $details['price'] }}</span></td>
                                <td class="product-add-to-cart"><a href="{{ url('product-detail/'.$details['name']) }}"> Add to Cart</a></td>
                            </tr>
                            @endforeach
                            @endif

                        </tbody>

                    </table>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Wishlist Area end -->


@endsection

@section('coustomJS')

@endsection
