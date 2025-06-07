<!-- Product Details Popup -->
<div id="product-details-popup" class="popup-overlay">
    <div class="popup-content">
        <div class="popup-header">
            <h3>Detalles del Producto</h3>
            <span class="close-popup">&times;</span>
        </div>
        <div id="product-details-content" class="product-details-content">
            <!-- Product details will be loaded here dynamically -->
        </div>
    </div>
</div>

<!-- Shopping Cart Popup -->
<div id="cart-popup" class="popup-overlay">
    <div class="popup-content">
        <div class="popup-header">
            <h3>Carrito de Compras</h3>
            <span class="close-popup">&times;</span>
        </div>
        <div id="cart-items" class="cart-items">
            <!-- Cart items will be added here dynamically -->
        </div>
        <div class="cart-total">
            <span>Total:</span>
            <span id="cart-total-amount">$0</span>
        </div>
        <button id="checkout-btn" class="btn-checkout">Proceder al Pago</button>
    </div>
</div>

<!-- Checkout Form Popup -->
<div id="checkout-popup" class="popup-overlay">
    <div class="popup-content">
        <div class="popup-header">
            <h3>Finalizar Compra</h3>
            <span class="close-popup">&times;</span>
        </div>
        <div class="checkout-form">
            <p class="shipping-notice">¡Envío nacional gratis! Pago contra entrega.</p>
            <form id="checkout-form">
                <div class="form-group">
                    <label for="checkout-name">Nombre completo</label>
                    <input type="text" id="checkout-name" required>
                </div>
                <div class="form-group">
                    <label for="checkout-phone">Teléfono</label>
                    <input type="tel" id="checkout-phone" required>
                </div>
                <div class="form-group">
                    <label for="checkout-email">Correo electrónico</label>
                    <input type="email" id="checkout-email" required>
                </div>
                <div class="form-group">
                    <label for="checkout-address">Dirección de envío</label>
                    <input type="text" id="checkout-address" required>
                </div>
                <div class="form-group">
                    <label for="checkout-city">Ciudad</label>
                    <input type="text" id="checkout-city" required>
                </div>
                <button type="submit" class="btn-submit">Confirmar Pedido</button>
            </form>
        </div>
    </div>
</div>