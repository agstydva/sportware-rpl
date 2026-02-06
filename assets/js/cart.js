// Cart management functions for real-time updates
function updateCartCount() {
    $.ajax({
        url: 'partials/getCartCount.php',
        method: 'GET',
        dataType: 'json',
        success: function(response) {
            if(response.success) {
                $('#cartCount').text(response.count);
            }
        },
        error: function() {
            console.log('Error updating cart count');
        }
    });
}

// Function to add item to cart via AJAX
function addToCartAjax(productId, button, callback) {
    // Show loading state
    const originalText = button.innerHTML;
    button.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Adding...';
    button.disabled = true;
    
    $.ajax({
        url: 'partials/_manageCart.php',
        method: 'POST',
        data: {
            addToCart: true,
            itemId: productId
        },
        dataType: 'json',
        success: function(response) {
            if(response.success) {
                // Update cart count
                updateCartCount();
                
                // Show success message
                button.innerHTML = '<i class="fas fa-check"></i> Added!';
                button.style.backgroundColor = '#28a745';
                
                // Reset button after 2 seconds
                setTimeout(function() {
                    button.innerHTML = originalText;
                    button.disabled = false;
                    button.style.backgroundColor = '';
                }, 2000);
                
                // Trigger localStorage event for other tabs
                localStorage.setItem('cartUpdated', Date.now());
                
                if(callback) callback(true);
            } else {
                alert(response.message || 'Item already in cart');
                button.innerHTML = originalText;
                button.disabled = false;
                if(callback) callback(false);
            }
        },
        error: function() {
            // Reset button and allow normal form submission
            button.innerHTML = originalText;
            button.disabled = false;
            if(callback) callback(false);
        }
    });
}

// Auto-update cart count when page loads
$(document).ready(function() {
    // Update cart count every 30 seconds to sync with other tabs
    setInterval(updateCartCount, 30000);
    
    // Listen for storage events (when user adds items in other tabs)
    window.addEventListener('storage', function(e) {
        if (e.key === 'cartUpdated') {
            updateCartCount();
        }
    });
    
    // Intercept ADD TO CART form submissions for AJAX
    $(document).on('submit', 'form:has(button[name="addToCart"])', function(e) {
        e.preventDefault();
        
        const form = $(this);
        const itemId = form.find('input[name="itemId"]').val();
        const button = form.find('button[name="addToCart"]')[0];
        
        if (itemId && button) {
            addToCartAjax(itemId, button, function(success) {
                if (!success) {
                    // If AJAX fails, submit form normally
                    form.off('submit').submit();
                }
            });
        }
    });
});
