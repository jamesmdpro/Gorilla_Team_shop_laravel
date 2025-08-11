// Product database
const products = {
    'proteina': {
        name: 'PROTEÍNA MASS GORILLA',
        description: 'Nuestra proteína premium de absorción rápida y lenta, ideal para recuperación y crecimiento muscular.',
        category: 'proteina',
        images: [
            'img/Productos/proteina-mass-1.jpg',
            'img/Productos/proteina-mass-2.jpg',
            'img/Productos/proteina-mass-3.jpg'
        ],
        variants: [
            { name: 'Gorilla Mass 2.3LB (1050g)', price: 69000, servings: 30 },
            { name: 'Gorilla Mass 5LB (2270g)', price: 159000, servings: 65 },
            { name: 'Gorilla Mass 10LB (4540g)', price: 262000, servings: 130 },
            { name: 'Gorilla Mass 15LB (6810g)', price: 359000, servings: 195 },
            { name: 'Gorilla Mass 20LB (9080g)', price: 479000, servings: 260 }
        ]
    },
    'ripped': {
        name: 'RIPPED GORILLA',
        description: 'Fórmula avanzada con 24g de proteína enriquecida con artichofas, cáscara de papa, resveratrol e inulina. Potenciada con cromo picolinato, colágeno hidrolizado, potasio y vitamina E para definición muscular, reducción de grasa y tonificación específica para el organismo femenino.',
        category: 'proteina',
        images: [
            'img/Productos/ripped-1.jpg',
            'img/Productos/ripped-2.jpg'
        ],
        variants: [
            { name: 'Gorilla Ripped / Ripped Fit 2LB', price: 149000, servings: 30 },
            { name: 'Gorilla Ripped / Ripped Fit 4LB', price: 259000, servings: 60 }
        ]
    },
    'isocomplex': {
        name: 'ISO COMPLEX GORILLA',
        description: 'Aislado de proteína de suero de leche de alta pureza.',
        category: 'proteina',
        images: [
            'img/Productos/iso-complex-1.jpg',
            'img/Productos/iso-complex-2.jpg'
        ],
        variants: [
            { name: 'Gorilla ISOCOMPLEX 2LB', price: 149000, servings: 30 },
            { name: 'Gorilla ISOCOMPLEX 4LB', price: 259000, servings: 60 }
        ]
    },
    'zero': {
        name: 'ZERO CARBS GORILLA',
        description: 'Proteína sin carbohidratos para definición muscular.',
        category: 'proteina',
        images: [
            'img/Productos/zero-carbs-1.jpg',
            'img/Productos/zero-carbs-2.jpg'
        ],
        variants: [
            { name: 'Gorilla ZERO CARBS 2.2LB', price: 139000, servings: 30 },
            { name: 'Gorilla ZERO CARBS 4LB', price: 239000, servings: 60 },
            { name: 'Gorilla ZERO CARBS 6LB', price: 319000, servings: 90 },
            { name: 'Gorilla ZERO CARBS 10LB', price: 449000, servings: 150 }
        ]
    },
    'whey': {
        name: 'WHEY 100% GORILLA',
        description: 'Proteína con café para energía y nutrición matutina.',
        category: 'proteina',
        images: [
            'img/Productos/whey-1.jpg',
            'img/Productos/whey-2.jpg'
        ],
        variants: [
            { name: 'Gorilla WHEY MORNING 1LB - Café', price: 69000, servings: 15 },
            { name: 'Gorilla GOLD MORNING 2LB - Café', price: 69000, servings: 30 }
        ]
    },
    'colageno_500': {
        name: 'COLÁGENO HIDROLIZADO GORILLA LÍQUIDO',
        description: 'Fórmula avanzada de colágeno en formato líquido para máxima absorción y biodisponibilidad. Potencia la elasticidad de la piel, fortalece articulaciones, tendones y ligamentos mientras promueve un cabello y uñas más fuertes.',
        category: 'suplementos',
        images: [
            'img/Productos/colageno-1.jpg',
            'img/Productos/colageno-2.jpg'
        ],
        variants: [
            { name: 'Gorilla COLÁGENO 500ml', price: 49000, servings: 30 }
        ]
    },
    'BCAA': {
        name: 'BCAA GORILLA',
        description: 'Aminoácidos de cadena ramificada de alta calidad para optimizar la recuperación muscular, reducir la fatiga y preservar la masa muscular durante entrenamientos intensos.',
        category: 'aminoacidos',
        images: [
            'img/Productos/bcaa-1.jpg',
            'img/Productos/bcaa-2.jpg'
        ],
        variants: [
            { name: 'Gorilla BCAA 500g', price: 99000, servings: 50 }
        ]
    },
    'glutamina': {
        name: 'GLUTAMINA GORILLA',
        description: 'Aminoácido esencial para recuperación muscular.',
        category: 'aminoacidos',
        images: [
            'img/Productos/glutamina-1.jpg',
            'img/Productos/glutamina-2.jpg'
        ],
        variants: [
            { name: 'Gorilla GLUTAMINA 300g', price: 59000, servings: 60 }
        ]
    },
    'creatina': {
        name: 'CREATINA GORILLA',
        description: 'Creatina monohidrato pura para aumentar la fuerza, potencia muscular y mejorar la recuperación entre series durante tus entrenamientos intensos.',
        category: 'creatina',
        images: [
            'img/Productos/creatina-1.jpg',
            'img/Productos/creatina-2.jpg'
        ],
        variants: [
            { name: 'Gorilla CREATINA 300g', price: 89000, servings: 60 }
        ]
    },
    'beta_alanina': {
        name: 'GORILLA BETA ALANINA',
        description: 'Mejora el rendimiento y retrasa la fatiga muscular.',
        category: 'suplementos',
        images: [
            'img/Productos/beta-alanina-1.jpg',
            'img/Productos/beta-alanina-2.jpg'
        ],
        variants: [
            { name: 'Gorilla BETA ALANINA 300g', price: 59000, servings: 60 }
        ]
    },
    'cafeina': {
        name: 'GORILLA CAFEÍNA',
        description: 'Energía y concentración en cápsulas.',
        category: 'suplementos',
        images: [
            'img/Productos/cafeina-1.jpg',
            'img/Productos/cafeina-2.jpg'
        ],
        variants: [
            { name: 'Gorilla CAFEÍNA 100 CAPS', price: 49000, servings: 100 }
        ]
    },
    'test_boost': {
        name: 'TEST BOOST GORILLA',
        description: 'Potenciador natural de testosterona.',
        category: 'suplementos',
        images: [
            'img/Productos/test-boost-1.jpg',
            'img/Productos/test-boost-2.jpg'
        ],
        variants: [
            { name: 'Gorilla TEST BOOST 500g', price: 105000, servings: 30 }
        ]
    },
    'brain_recovery': {
        name: 'BRAIN RECOVERY GORILLA',
        description: 'Fórmula para recuperación cognitiva y mental.',
        category: 'especiales',
        images: [
            'img/Productos/brain-recovery-1.jpg',
            'img/Productos/brain-recovery-2.jpg'
        ],
        variants: [
            { name: 'Gorilla BRAIN RECOVERY 1000g', price: 109000, servings: 50 }
        ]
    },
    'gorilla_1000': {
        name: 'GORILLA 1000',
        description: 'Proteína económica para principiantes.',
        category: 'proteina',
        images: [
            'img/Productos/gorilla-1000-1.jpg',
            'img/Productos/gorilla-1000-2.jpg'
        ],
        variants: [
            { name: 'Gorilla 1000 X 2LB (910g)', price: 59000, servings: 30 },
            { name: 'Gorilla 1000 X 5LB (2270g)', price: 139000, servings: 75 },
            { name: 'Gorilla 1000 X 10LB (4540g)', price: 239000, servings: 150 }
        ]
    },
    'kids': {
        name: 'GORILLA KIDS',
        description: 'Proteína especialmente formulada para niños.',
        category: 'especiales',
        images: [
            'img/Productos/kids-1.jpg',
            'img/Productos/kids-2.jpg'
        ],
        variants: [
            { name: 'Gorilla KIDS 2LB', price: 69000, servings: 30 }
        ]
    }
};

// Initialize DOM Elements
let cartIcon, cartCount, cartPopup, productDetailsPopup, checkoutPopup, cartItems, cartTotalAmount, checkoutBtn, closeButtons;

// Function to initialize DOM elements
function initializeElements() {
    // Create product details popup if it doesn't exist
    if (!document.getElementById('product-details-popup')) {
        const popupHTML = `
            <div id="product-details-popup" class="popup-overlay">
                <div class="popup-content product-details-popup">
                    <div class="popup-header">
                        <h3>Detalles del Producto</h3>
                        <span class="close-popup">&times;</span>
                    </div>
                    <div id="product-details-content" class="product-details-content">
                        <!-- Product details will be loaded here dynamically -->
                    </div>
                </div>
            </div>
        `;
        document.body.insertAdjacentHTML('beforeend', popupHTML);
    }

    // Create cart popup if it doesn't exist
    if (!document.getElementById('cart-popup')) {
        const cartHTML = `
            <div id="cart-popup" class="popup-overlay">
                <div class="popup-content cart-popup">
                    <div class="popup-header">
                        <h3>Carrito de Compras</h3>
                        <span class="close-popup">&times;</span>
                    </div>
                    <div id="cart-items" class="cart-items">
                        <!-- Cart items will be added here dynamically -->
                    </div>
                    <div class="cart-summary">
                        <div class="cart-total">
                            <span>Total:</span>
                            <span id="cart-total-amount">$0</span>
                        </div>
                        <button id="checkout-btn" class="btn-checkout">Proceder al Pago</button>
                    </div>
                </div>
            </div>
        `;
        document.body.insertAdjacentHTML('beforeend', cartHTML);
    }

    // Create checkout popup if it doesn't exist
    if (!document.getElementById('checkout-popup')) {
        const checkoutHTML = `
            <div id="checkout-popup" class="popup-overlay">
                <div class="popup-content checkout-popup">
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
                            <div class="order-summary">
                                <h4>Resumen del Pedido</h4>
                                <div id="checkout-items"></div>
                                <div class="checkout-total">
                                    <strong>Total: <span id="checkout-total-amount">$0</span></strong>
                                </div>
                            </div>
                            <button type="submit" class="btn-submit">Confirmar Pedido</button>
                        </form>
                    </div>
                </div>
            </div>
        `;
        document.body.insertAdjacentHTML('beforeend', checkoutHTML);
    }

    // Add cart icon to header if it doesn't exist
    if (!document.getElementById('cart-icon')) {
        const header = document.querySelector('header') || document.querySelector('nav');
        if (header) {
            const cartIconHTML = `
                <div id="cart-icon" class="cart-icon">
                    <i class="material-icons-sharp">shopping_cart</i>
                    <span id="cart-count" class="cart-count">0</span>
                </div>
            `;
            header.insertAdjacentHTML('beforeend', cartIconHTML);
        }
    }

    // Add popup styles if they don't exist
    if (!document.getElementById('popup-styles')) {
        const styles = `
            <style id="popup-styles">
                .popup-overlay {
                    display: none;
                    position: fixed;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background: rgba(0, 0, 0, 0.8);
                    z-index: 10000;
                    backdrop-filter: blur(5px);
                }

                .popup-content {
                    position: absolute;
                    top: 50%;
                    left: 50%;
                    transform: translate(-50%, -50%);
                    background: white;
                    border-radius: 16px;
                    max-width: 90vw;
                    max-height: 90vh;
                    overflow-y: auto;
                    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
                }

                .product-details-popup {
                    width: 800px;
                }

                .cart-popup {
                    width: 600px;
                }

                .checkout-popup {
                    width: 700px;
                }

                .popup-header {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    padding: 20px 30px;
                    border-bottom: 1px solid #eee;
                    background: #f8f9fa;
                    border-radius: 16px 16px 0 0;
                }

                .popup-header h3 {
                    margin: 0;
                    color: #333;
                    font-size: 1.5em;
                }

                .close-popup {
                    font-size: 28px;
                    cursor: pointer;
                    color: #999;
                    transition: color 0.3s ease;
                }

                .close-popup:hover {
                    color: #ff6b35;
                }

                .product-details-content {
                    padding: 30px;
                }

                .product-details h2 {
                    color: #333;
                    margin-bottom: 15px;
                    font-size: 1.8em;
                }

                .product-description {
                    color: #666;
                    line-height: 1.6;
                    margin-bottom: 25px;
                    font-size: 1.1em;
                }

                .variants-list {
                    display: flex;
                    flex-direction: column;
                    gap: 15px;
                }

                .product-variant {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    padding: 20px;
                    border: 2px solid #e0e0e0;
                    border-radius: 12px;
                    cursor: pointer;
                    transition: all 0.3s ease;
                }

                .product-variant:hover {
                    border-color: #ff6b35;
                    background: #fff5f2;
                    transform: translateY(-2px);
                    box-shadow: 0 5px 15px rgba(255, 107, 53, 0.2);
                }

                .variant-info h4 {
                    margin: 0 0 5px 0;
                    color: #333;
                    font-size: 1.2em;
                }

                .variant-info p {
                    margin: 0;
                    color: #666;
                    font-size: 0.9em;
                }

                .variant-price {
                    text-align: right;
                }

                .variant-price .price {
                    display: block;
                    font-size: 1.4em;
                    font-weight: bold;
                    color: #ff6b35;
                    margin-bottom: 10px;
                }

                .add-to-cart-btn {
                    background: linear-gradient(135deg, #ff6b35, #ff8c42);
                    color: white;
                    border: none;
                    padding: 10px 20px;
                    border-radius: 8px;
                    cursor: pointer;
                    font-weight: 600;
                    transition: all 0.3s ease;
                }

                .add-to-cart-btn:hover {
                    background: linear-gradient(135deg, #e55a2b, #e67a35);
                    transform: translateY(-2px);
                }

                .cart-items {
                    padding: 20px 30px;
                    max-height: 400px;
                    overflow-y: auto;
                }

                .cart-item {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    padding: 15px 0;
                    border-bottom: 1px solid #eee;
                }

                .cart-item:last-child {
                    border-bottom: none;
                }

                .cart-item-info h4 {
                    margin: 0 0 5px 0;
                    color: #333;
                    font-size: 1.1em;
                }

                .cart-item-info p {
                    margin: 0;
                    color: #666;
                    font-size: 0.9em;
                }

                .cart-item-controls {
                    display: flex;
                    align-items: center;
                    gap: 10px;
                }

                .quantity-btn {
                    background: #f0f0f0;
                    border: none;
                    width: 30px;
                    height: 30px;
                    border-radius: 50%;
                    cursor: pointer;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-weight: bold;
                    transition: background 0.3s ease;
                }

                .quantity-btn:hover {
                    background: #e0e0e0;
                }

                .quantity {
                    font-weight: bold;
                    min-width: 30px;
                    text-align: center;
                }

                .remove-btn {
                    background: #dc3545;
                    color: white;
                    border: none;
                    padding: 5px 10px;
                    border-radius: 5px;
                    cursor: pointer;
                    font-size: 0.8em;
                    transition: background 0.3s ease;
                }

                .remove-btn:hover {
                    background: #c82333;
                }

                .cart-summary {
                    padding: 20px 30px;
                    border-top: 1px solid #eee;
                    background: #f8f9fa;
                }

                .cart-total {
                    display: flex;
                    justify-content: space-between;
                    align-items: center;
                    font-size: 1.3em;
                    font-weight: bold;
                    color: #333;
                    margin-bottom: 20px;
                }

                .btn-checkout {
                    width: 100%;
                    background: linear-gradient(135deg, #28a745, #20c997);
                    color: white;
                    border: none;
                    padding: 15px;
                    border-radius: 8px;
                    font-size: 1.1em;
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.3s ease;
                }

                .btn-checkout:hover {
                    background: linear-gradient(135deg, #218838, #1e7e34);
                    transform: translateY(-2px);
                }

                .btn-checkout:disabled {
                    background: #ccc;
                    cursor: not-allowed;
                    transform: none;
                }

                .checkout-form {
                    padding: 30px;
                }

                .shipping-notice {
                    background: #d4edda;
                    color: #155724;
                    padding: 15px;
                    border-radius: 8px;
                    margin-bottom: 25px;
                    text-align: center;
                    font-weight: 600;
                }

                .form-group {
                    margin-bottom: 20px;
                }

                .form-group label {
                    display: block;
                    margin-bottom: 8px;
                    color: #333;
                    font-weight: 600;
                }

                .form-group input {
                    width: 100%;
                    padding: 12px;
                    border: 2px solid #e0e0e0;
                    border-radius: 8px;
                    font-size: 1em;
                    transition: border-color 0.3s ease;
                }

                .form-group input:focus {
                    outline: none;
                    border-color: #ff6b35;
                }

                .order-summary {
                    background: #f8f9fa;
                    padding: 20px;
                    border-radius: 8px;
                    margin: 25px 0;
                }

                .order-summary h4 {
                    margin: 0 0 15px 0;
                    color: #333;
                }

                .checkout-item {
                    display: flex;
                    justify-content: space-between;
                    padding: 8px 0;
                    border-bottom: 1px solid #e0e0e0;
                }

                .checkout-item:last-child {
                    border-bottom: none;
                }

                .checkout-total {
                    margin-top: 15px;
                    padding-top: 15px;
                    border-top: 2px solid #ff6b35;
                    font-size: 1.2em;
                }

                .btn-submit {
                    width: 100%;
                    background: linear-gradient(135deg, #ff6b35, #ff8c42);
                    color: white;
                    border: none;
                    padding: 15px;
                    border-radius: 8px;
                    font-size: 1.1em;
                    font-weight: 600;
                    cursor: pointer;
                    transition: all 0.3s ease;
                }

                .btn-submit:hover {
                    background: linear-gradient(135deg, #e55a2b, #e67a35);
                    transform: translateY(-2px);
                }

                .cart-icon {
                    position: fixed;
                    top: 20px;
                    right: 20px;
                    background: #ff6b35;
                    color: white;
                    width: 60px;
                    height: 60px;
                    border-radius: 50%;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    cursor: pointer;
                    box-shadow: 0 4px 20px rgba(255, 107, 53, 0.3);
                    transition: all 0.3s ease;
                    z-index: 1000;
                }

                .cart-icon:hover {
                    transform: scale(1.1);
                    box-shadow: 0 6px 25px rgba(255, 107, 53, 0.4);
                }

                .cart-count {
                    position: absolute;
                    top: -5px;
                    right: -5px;
                    background: #dc3545;
                    color: white;
                    border-radius: 50%;
                    width: 24px;
                    height: 24px;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    font-size: 0.8em;
                    font-weight: bold;
                }

                .empty-cart {
                    text-align: center;
                    padding: 40px 20px;
                    color: #666;
                }

                .empty-cart i {
                    font-size: 4em;
                    color: #ddd;
                    margin-bottom: 20px;
                }

                @media (max-width: 768px) {
                    .popup-content {
                        width: 95vw;
                        margin: 20px;
                    }
                    
                    .product-details-popup,
                    .cart-popup,
                    .checkout-popup {
                        width: 100%;
                    }
                    
                    .product-variant {
                        flex-direction: column;
                        text-align: center;
                        gap: 15px;
                    }
                    
                    .cart-item {
                        flex-direction: column;
                        align-items: flex-start;
                        gap: 10px;
                    }
                    
                    .cart-item-controls {
                        align-self: flex-end;
                    }
                }
            </style>
        `;
        document.head.insertAdjacentHTML('beforeend', styles);
    }

    // Get references to elements
    cartIcon = document.getElementById('cart-icon');
    cartCount = document.getElementById('cart-count');
    cartPopup = document.getElementById('cart-popup');
    productDetailsPopup = document.getElementById('product-details-popup');
    checkoutPopup = document.getElementById('checkout-popup');
    cartItems = document.getElementById('cart-items');
    cartTotalAmount = document.getElementById('cart-total-amount');
    checkoutBtn = document.getElementById('checkout-btn');
    closeButtons = document.querySelectorAll('.close-popup');
}

function setupEventListeners() {
    // Close buttons
    closeButtons = document.querySelectorAll('.close-popup');
    closeButtons.forEach(btn => {
        btn.addEventListener('click', closeAllPopups);
    });

    // Click outside to close
    [cartPopup, productDetailsPopup, checkoutPopup].forEach(popup => {
        if (popup) {
            popup.addEventListener('click', (e) => {
                if (e.target === popup) {
                    closeAllPopups();
                }
            });
        }
    });

    // Checkout button
    if (checkoutBtn) {
        checkoutBtn.addEventListener('click', showCheckoutForm);
    }

    // Cart icon
    if (cartIcon) {
        cartIcon.addEventListener('click', (e) => {
            e.preventDefault();
            showCart();
        });
    }

    // Checkout form submission
    const checkoutForm = document.getElementById('checkout-form');
    if (checkoutForm) {
        checkoutForm.removeEventListener('submit', handleCheckoutSubmit);
        checkoutForm.addEventListener('submit', handleCheckoutSubmit);
    }
}

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    initializeElements();
    setupEventListeners();
});

// Function to handle the "VER DETALLES" button click
function verProducto(productId) {
    if (!document.getElementById('product-details-popup')) {
        initializeElements();
    }
    showProductDetails(productId);
}

// Functions to show/hide popups
function closeAllPopups() {
    if (cartPopup) cartPopup.style.display = 'none';
    if (productDetailsPopup) productDetailsPopup.style.display = 'none';
    if (checkoutPopup) checkoutPopup.style.display = 'none';
}

function showCart() {
    updateCartDisplay();
    cartPopup.style.display = 'block';
}

function showProductDetails(productId) {
    const product = products[productId];
    if (!product) return;

    const content = document.getElementById('product-details-content');
    
    let html = `
        <div class="product-details">
            <h2>${product.name}</h2>
            <p class="product-description">${product.description}</p>
            
            <div class="variants-list">
                ${product.variants.map(variant => `
                    <div class="product-variant" onclick="addToCart('${productId}', '${variant.name}', ${variant.price})">
                        <div class="variant-info">
                            <h4>${variant.name}</h4>
                            <p>${variant.servings} porciones</p>
                        </div>
                        <div class="variant-price">
                            <span class="price">$${variant.price.toLocaleString('es-CO')}</span>
                            <button class="add-to-cart-btn">Agregar al Carrito</button>
                        </div>
                    </div>
                `).join('')}
            </div>
        </div>
    `;

    content.innerHTML = html;
    productDetailsPopup.style.display = 'block';
}

function showCheckoutForm() {
    if (cart.length === 0) {
        alert('El carrito está vacío');
        return;
    }
    
    // Update checkout summary
    updateCheckoutSummary();
    
    cartPopup.style.display = 'none';
    checkoutPopup.style.display = 'block';
}

// Cart state
let cart = [];
let cartTotal = 0;

// Cart functions
function addToCart(productId, variantName, price) {
    // Check if item already exists in cart
    const existingItemIndex = cart.findIndex(item => 
        item.productId === productId && item.variantName === variantName
    );
    
    if (existingItemIndex > -1) {
        // If item exists, increase quantity
        cart[existingItemIndex].quantity += 1;
    } else {
        // If item doesn't exist, add new item
        cart.push({
            productId,
            variantName,
            price,
            quantity: 1
        });
    }
    
    updateCartCount();
    updateCartTotal();
    
    // Show success message
    showAddToCartSuccess();
    
    // Close product details popup if open
    if (productDetailsPopup && productDetailsPopup.style.display === 'block') {
        closeAllPopups();
    }
}

function removeFromCart(index) {
    cart.splice(index, 1);
    updateCartCount();
    updateCartTotal();
    updateCartDisplay();
}

function updateQuantity(index, delta) {
    if (cart[index]) {
        cart[index].quantity += delta;
        if (cart[index].quantity <= 0) {
            removeFromCart(index);
        } else {
            updateCartCount();
            updateCartTotal();
            updateCartDisplay();
        }
    }
}

function updateCartCount() {
    const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
    if (cartCount) {
        cartCount.textContent = totalItems;
        cartCount.style.display = totalItems > 0 ? 'flex' : 'none';
    }
}

function updateCartTotal() {
    cartTotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
    if (cartTotalAmount) {
        cartTotalAmount.textContent = `$${cartTotal.toLocaleString('es-CO')}`;
    }
}

function updateCartDisplay() {
    if (!cartItems) return;
    
    if (cart.length === 0) {
        cartItems.innerHTML = `
            <div class="empty-cart">
                <i class="material-icons-sharp">shopping_cart</i>
                <p>Tu carrito está vacío</p>
                <p>¡Agrega algunos productos increíbles!</p>
            </div>
        `;
        if (checkoutBtn) checkoutBtn.disabled = true;
        return;
    }
    
    if (checkoutBtn) checkoutBtn.disabled = false;
    
    cartItems.innerHTML = cart.map((item, index) => `
        <div class="cart-item">
            <div class="cart-item-info">
                <h4>${products[item.productId]?.name || 'Producto'}</h4>
                <p>${item.variantName}</p>
                <p class="item-price">$${item.price.toLocaleString('es-CO')} c/u</p>
            </div>
            <div class="cart-item-controls">
                <button class="quantity-btn" onclick="updateQuantity(${index}, -1)">-</button>
                <span class="quantity">${item.quantity}</span>
                <button class="quantity-btn" onclick="updateQuantity(${index}, 1)">+</button>
                <button class="remove-btn" onclick="removeFromCart(${index})">Eliminar</button>
            </div>
        </div>
    `).join('');
}

function updateCheckoutSummary() {
    const checkoutItems = document.getElementById('checkout-items');
    const checkoutTotalAmount = document.getElementById('checkout-total-amount');
    
    if (checkoutItems) {
        checkoutItems.innerHTML = cart.map(item => `
            <div class="checkout-item">
                <span>${item.variantName} (x${item.quantity})</span>
                <span>$${(item.price * item.quantity).toLocaleString('es-CO')}</span>
            </div>
        `).join('');
    }
    
    if (checkoutTotalAmount) {
        checkoutTotalAmount.textContent = `$${cartTotal.toLocaleString('es-CO')}`;
    }
}

function showAddToCartSuccess() {
    // Create temporary success message
    const successMsg = document.createElement('div');
    successMsg.style.cssText = `
        position: fixed;
        top: 100px;
        right: 20px;
        background: #28a745;
        color: white;
        padding: 15px 20px;
        border-radius: 8px;
        z-index: 10001;
        box-shadow: 0 4px 20px rgba(40, 167, 69, 0.3);
        transform: translateX(100%);
        transition: transform 0.3s ease;
    `;
    successMsg.innerHTML = `
        <i class="material-icons-sharp" style="vertical-align: middle; margin-right: 8px;">check_circle</i>
        ¡Producto agregado al carrito!
    `;
    
    document.body.appendChild(successMsg);
    
    // Animate in
    setTimeout(() => {
        successMsg.style.transform = 'translateX(0)';
    }, 100);
    
    // Remove after 3 seconds
    setTimeout(() => {
        successMsg.style.transform = 'translateX(100%)';
        setTimeout(() => {
            document.body.removeChild(successMsg);
        }, 300);
    }, 3000);
}

function handleCheckoutSubmit(e) {
    e.preventDefault();
    
    const formData = new FormData(e.target);
    const orderData = {
        customer_name: document.getElementById('checkout-name').value,
        customer_phone: document.getElementById('checkout-phone').value,
        customer_email: document.getElementById('checkout-email').value,
        shipping_address: document.getElementById('checkout-address').value,
        city: document.getElementById('checkout-city').value,
        items: cart.map(item => ({
            product_id: item.productId,
            variant_name: item.variantName,
            price: item.price,
            quantity: item.quantity
        })),
        total_amount: cartTotal
    };
    
    // Get CSRF token
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');
    
    // Show loading state
    const submitBtn = e.target.querySelector('.btn-submit');
    const originalText = submitBtn.textContent;
    submitBtn.textContent = 'Procesando...';
    submitBtn.disabled = true;
    
    fetch('/orders', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
            'Accept': 'application/json'
        },
        body: JSON.stringify(orderData)
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('¡Pedido realizado con éxito! Te contactaremos pronto.');
            
            // Clear cart
            cart = [];
            updateCartCount();
            updateCartTotal();
            
            // Close popup
            closeAllPopups();
            
            // Reset form
            e.target.reset();
        } else {
            throw new Error(data.message || 'Error al procesar el pedido');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error al procesar el pedido. Por favor, inténtalo de nuevo.');
    })
    .finally(() => {
        // Restore button state
        submitBtn.textContent = originalText;
        submitBtn.disabled = false;
    });
}