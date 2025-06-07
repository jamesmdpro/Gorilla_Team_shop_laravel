// Product database
const products = {
    'proteina': {
        name: 'PROTEÍNA MASS GORILLA',
        description: 'Nuestra proteína premium de absorción rápida y lenta, ideal para recuperación y crecimiento muscular.',
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
        variants: [
            { name: 'Gorilla Ripped / Ripped Fit 2LB', price: 149000, servings: 30 },
            { name: 'Gorilla Ripped / Ripped Fit 4LB', price: 259000, servings: 60 }
        ]
    },
    'isocomplex': {
        name: 'ISO COMPLEX GORILLA',
        description: 'Aislado de proteína de suero de leche de alta pureza.',
        variants: [
            { name: 'Gorilla ISOCOMPLEX 2LB', price: 149000, servings: 30 },
            { name: 'Gorilla ISOCOMPLEX 4LB', price: 259000, servings: 60 }
        ]
    },
    'zero': {
        name: 'ZERO CARBS GORILLA',
        description: 'Proteína sin carbohidratos para definición muscular.',
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
        variants: [
            { name: 'Gorilla WHEY MORNING 1LB - Café', price: 69000, servings: 15 },
            { name: 'Gorilla GOLD MORNING 2LB - Café', price: 69000, servings: 30 }
        ]
    },
    'colageno_500': {
        name: 'COLÁGENO HIDROLIZADO GORILLA LÍQUIDO',
        description: 'Fórmula avanzada de colágeno en formato líquido para máxima absorción y biodisponibilidad. Potencia la elasticidad de la piel, fortalece articulaciones, tendones y ligamentos mientras promueve un cabello y uñas más fuertes.',
        variants: [
            { name: 'Gorilla COLÁGENO 500ml', price: 49000, servings: 30 }
        ]
    },
    'BCAA': {
        name: 'BCAA GORILLA',
        description: 'Aminoácidos de cadena ramificada de alta calidad para optimizar la recuperación muscular, reducir la fatiga y preservar la masa muscular durante entrenamientos intensos.',
        variants: [
            { name: 'Gorilla BCAA 500g', price: 99000, servings: 50 }
        ]
    },
    'glutamina': {
        name: 'GLUTAMINA GORILLA',
        description: 'Aminoácido esencial para recuperación muscular.',
        variants: [
            { name: 'Gorilla GLUTAMINA 300g', price: 59000, servings: 60 }
        ]
    },
    'creatina': {
        name: 'CREATINA GORILLA',
        description: 'Creatina monohidrato pura para aumentar la fuerza, potencia muscular y mejorar la recuperación entre series durante tus entrenamientos intensos.',
        variants: [
            { name: 'Gorilla CREATINA 300g', price: 89000, servings: 60 }
        ]
    },
    'beta_alanina': {
        name: 'GORILLA BETA ALANINA',
        description: 'Mejora el rendimiento y retrasa la fatiga muscular.',
        variants: [
            { name: 'Gorilla BETA ALANINA 300g', price: 59000, servings: 60 }
        ]
    },
    'cafeina': {
        name: 'GORILLA CAFEÍNA',
        description: 'Energía y concentración en cápsulas.',
        variants: [
            { name: 'Gorilla CAFEÍNA 100 CAPS', price: 49000, servings: 100 }
        ]
    },
    'test_boost': {
        name: 'TEST BOOST GORILLA',
        description: 'Potenciador natural de testosterona.',
        variants: [
            { name: 'Gorilla TEST BOOST 500g', price: 105000, servings: 30 }
        ]
    },
    'brain_recovery': {
        name: 'BRAIN RECOVERY GORILLA',
        description: 'Fórmula para recuperación cognitiva y mental.',
        variants: [
            { name: 'Gorilla BRAIN RECOVERY 1000g', price: 109000, servings: 50 }
        ]
    },
    'gorilla_1000': {
        name: 'GORILLA 1000',
        description: 'Proteína económica para principiantes.',
        variants: [
            { name: 'Gorilla 1000 X 2LB (910g)', price: 59000, servings: 30 },
            { name: 'Gorilla 1000 X 5LB (2270g)', price: 139000, servings: 75 },
            { name: 'Gorilla 1000 X 10LB (4540g)', price: 239000, servings: 150 }
        ]
    },
    'kids': {
        name: 'GORILLA KIDS',
        description: 'Proteína especialmente formulada para niños.',
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
        `;
        document.body.insertAdjacentHTML('beforeend', popupHTML);
    }

    // Create cart popup if it doesn't exist
    if (!document.getElementById('cart-popup')) {
        const cartHTML = `
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
        `;
        document.body.insertAdjacentHTML('beforeend', cartHTML);
    }

    // Create checkout popup if it doesn't exist
    if (!document.getElementById('checkout-popup')) {
        const checkoutHTML = `
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
        `;
        document.body.insertAdjacentHTML('beforeend', checkoutHTML);
    }

    // Initialize references to DOM elements
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

// Function to setup event listeners
function setupEventListeners() {
    // Get references to elements (both existing and newly created)
    cartIcon = document.getElementById('cart-icon');
    cartCount = document.getElementById('cart-count');
    cartPopup = document.getElementById('cart-popup');
    productDetailsPopup = document.getElementById('product-details-popup');
    checkoutPopup = document.getElementById('checkout-popup');
    cartItems = document.getElementById('cart-items');
    cartTotalAmount = document.getElementById('cart-total-amount');
    checkoutBtn = document.getElementById('checkout-btn');
    closeButtons = document.querySelectorAll('.close-popup');

    // Close popups when clicking outside
    window.addEventListener('click', (e) => {
        if (e.target.classList.contains('popup-overlay')) {
            closeAllPopups();
        }
    });

    // Close buttons
    closeButtons.forEach(button => {
        button.addEventListener('click', () => {
            closeAllPopups();
        });
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

    // Checkout form submission (both existing and dynamically created)
    const checkoutForm = document.getElementById('checkout-form');
    if (checkoutForm) {
        // Remove any existing listeners to avoid duplicates
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
    // Ensure elements are initialized
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
                            <span class="price">$${variant.price.toLocaleString()}</span>
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
    cartPopup.style.display = 'none';
    checkoutPopup.style.display = 'block';
}

// Cart state
let cart = [];
let cartTotal = 0;

// Cart functions
function addToCart(productId, variantName, price) {
    cart.push({
        productId,
        variantName,
        price,
        quantity: 1
    });
    updateCartCount();
    updateCartTotal();
    closeAllPopups();
    showCart();
}

function removeFromCart(index) {
    cart.splice(index, 1);
    updateCartDisplay();
}

function updateQuantity(index, delta) {
    cart[index].quantity = Math.max(1, cart[index].quantity + delta);
    updateCartDisplay();
}

function updateCartCount() {
    const cartCount = document.getElementById('cart-count');
    if (cartCount) {
        cartCount.textContent = cart.length;
    }
    
    // También actualizamos el ícono del carrito si existe
    const cartIcon = document.getElementById('cart-icon');
    if (cartIcon && !document.getElementById('cart-count')) {
        // Si no existe el contador, lo creamos
        const countSpan = document.createElement('span');
        countSpan.id = 'cart-count';
        countSpan.className = 'cart-count';
        countSpan.textContent = cart.length;
        cartIcon.appendChild(countSpan);
    }
}

function updateCartTotal() {
    cartTotal = cart.reduce((total, item) => total + (item.price * item.quantity), 0);
    cartTotalAmount.textContent = `$${cartTotal.toLocaleString()}`;
}

function updateCartDisplay() {
    cartItems.innerHTML = cart.map((item, index) => `
        <div class="cart-item">
            <div class="cart-item-info">
                <h4>${item.variantName}</h4>
                <p>$${(item.price * item.quantity).toLocaleString()}</p>
            </div>
            <div class="cart-item-actions">
                <div class="quantity-controls">
                    <button class="quantity-btn" onclick="updateQuantity(${index}, -1)">-</button>
                    <span>${item.quantity}</span>
                    <button class="quantity-btn" onclick="updateQuantity(${index}, 1)">+</button>
                </div>
                <button onclick="removeFromCart(${index})" class="remove-btn">
                    <i class="material-icons-sharp">delete</i>
                </button>
            </div>
        </div>
    `).join('');
    
    updateCartTotal();
}

// Handle checkout form submission
function handleCheckoutSubmit(e) {
    e.preventDefault();
    
    // Validar que hay items en el carrito
    if (cart.length === 0) {
        alert('Tu carrito está vacío. Agrega productos antes de continuar.');
        return;
    }
    
    const formData = {
        name: document.getElementById('checkout-name').value,
        phone: document.getElementById('checkout-phone').value,
        email: document.getElementById('checkout-email').value,
        address: document.getElementById('checkout-address').value,
        city: document.getElementById('checkout-city').value,
        items: cart,
        total: cartTotal
    };

    // Mostrar indicador de carga
    const submitBtn = document.querySelector('#checkout-form button[type="submit"]');
    const originalText = submitBtn.textContent;
    submitBtn.textContent = 'Procesando...';
    submitBtn.disabled = true;

    // Obtener el token CSRF de forma segura
    const csrfToken = document.querySelector('meta[name="csrf-token"]');
    if (!csrfToken) {
        console.error('Token CSRF no encontrado');
        alert('Error de configuración. Por favor, recarga la página e inténtalo de nuevo.');
        return;
    }

    fetch('/orders', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken.getAttribute('content'),
            'Accept': 'application/json'
        },
        body: JSON.stringify(formData)
    })
    .then(response => {
        if (!response.ok) {
            return response.json().then(err => Promise.reject(err));
        }
        return response.json();
    })
    .then(data => {
        if (data.success) {
            // Limpiar carrito
            cart = [];
            updateCartCount();
            updateCartDisplay();
            
            // Mostrar mensaje de éxito
            alert('¡Pedido realizado con éxito! Te contactaremos pronto para coordinar la entrega.');
            
            // Cerrar popup y limpiar formulario
            closeAllPopups();
            document.getElementById('checkout-form').reset();
        } else {
            throw new Error(data.message || 'Error al procesar el pedido');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        let errorMessage = 'Hubo un error al realizar el pedido. Por favor, inténtalo de nuevo.';
        
        if (error.message) {
            errorMessage = error.message;
        } else if (error.errors) {
            // Manejar errores de validación
            const errorList = Object.values(error.errors).flat();
            errorMessage = errorList.join('\n');
        }
        
        alert(errorMessage);
    })
    .finally(() => {
        // Restaurar botón
        submitBtn.textContent = originalText;
        submitBtn.disabled = false;
    });
}