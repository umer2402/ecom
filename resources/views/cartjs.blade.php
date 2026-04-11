<script>
    
$(document).ready(function() {
    // Add to cart
    $('.add-to-cart-btn').click(function(e) {
        e.preventDefault();
        let productId = $(this).data('product-id');
        
        $.ajax({
            url: '/store/cart/add/' + productId,
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                updateCartUI(response);
                showSuccessMessage('Product added to cart');
            },
            error: function() {
                showErrorMessage('Error adding product to cart');
            }
        });
    });

    // Remove from cart
    $(document).on('click', '.remove, .remove-item', function(e) {
        e.preventDefault();
        let productId = $(this).data('product-id');
        
        $.ajax({
            url: '/store/cart/remove/' + productId,
            method: 'DELETE',
            data: {
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                updateCartUI(response);
                showSuccessMessage('Product removed from cart');
            },
            error: function() {
                showErrorMessage('Error removing product from cart');
            }
        });
    });

    // Update cart UI
    function updateCartUI(data) {
        $('.cart-count').text(data.cart_count);
        $('.total').text('$' + data.subtotal.toFixed(2));
        
        // For a more dynamic update, you could:
        // 1. Make an AJAX call to get updated cart HTML
        // 2. Replace the cart popup content
        // Here's a simple reload for demonstration
        location.reload();
    }

    function showSuccessMessage(message) {
        // Use toastr, SweetAlert, or your preferred notification system
        alert(message); // Simple alert for demo
    }

    function showErrorMessage(message) {
        alert(message); // Simple alert for demo
    }
});
</script>
