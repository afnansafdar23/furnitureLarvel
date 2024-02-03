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
    <div class="container" id="addcart1">
    @include('frontend.layout.adcart')

    </div>
</div>
<!-- Cart Main Area End -->

@endsection

@section('coustomJS')
<script>
 $(document).on('click', '.increment-btn, .decrement-btn', function(event) {
    console.log('Button clicked!');
    event.preventDefault();
    var productId = $(this).closest('tr').find('.remove-from-cart').data('id');
    var newQuantity = parseInt($(this).closest('tr').find('.qty-input').val());

    // Check if the button clicked is increment or decrement, adjust the newQuantity accordingly
    if ($(this).hasClass('increment-btn')) {
        newQuantity += 1;
    } else if ($(this).hasClass('decrement-btn')) {
        newQuantity -= 1;
    }

    // Make an AJAX request to update the cart quantity
    updateCartQuantity(productId, newQuantity);
});

function updateCartQuantity(productId, newQuantity) {
    $.ajax({
        type: 'POST',
        url: "/update-cart",
        data: {
            id: productId,
            quantity: newQuantity,
            // Add any other necessary data
        },
        headers: {
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        dataType: 'json',
        success: function(response) {
            if (response.redirect) {
                // Handle redirect
                window.location.href = response.redirect;
            } else {
                // Update the cart section with the new HTML content
                updateCart(response.cartSection);
                updateaddCart(response.updatecar);
                // Other actions...
            }
        },
        error: function() {
            console.log('Failed to update cart quantity');
        }
    });
}

function updateCart(cartHtml) {
    // Update the cart section with the new HTML content
    $('#addcart').html(cartHtml);
}

function updateaddCart(carthtml) {
    // Update the cart section with the new HTML content
    $('#addcart1').html(carthtml);
}

</script>

@endsection
