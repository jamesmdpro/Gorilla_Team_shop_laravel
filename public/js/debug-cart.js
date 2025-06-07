// Debug script para el carrito
console.log('Debug script cargado');

// Función para verificar el estado del carrito
function debugCart() {
    console.log('=== DEBUG CARRITO ===');
    console.log('Cart items:', cart);
    console.log('Cart total:', cartTotal);
    console.log('Cart length:', cart.length);
    
    // Verificar elementos del DOM
    console.log('Checkout form:', document.getElementById('checkout-form'));
    console.log('CSRF token:', document.querySelector('meta[name="csrf-token"]'));
    
    // Verificar si los elementos del formulario existen
    const formElements = [
        'checkout-name',
        'checkout-phone', 
        'checkout-email',
        'checkout-address',
        'checkout-city'
    ];
    
    formElements.forEach(id => {
        const element = document.getElementById(id);
        console.log(`${id}:`, element, element ? element.value : 'NO ENCONTRADO');
    });
}

// Función para simular agregar un producto al carrito
function debugAddProduct() {
    console.log('Agregando producto de prueba...');
    addToCart('proteina', 'Chocolate 1kg', 45000);
    debugCart();
}

// Función para simular el envío del formulario
function debugSubmitForm() {
    console.log('Simulando envío de formulario...');
    
    // Llenar formulario con datos de prueba
    document.getElementById('checkout-name').value = 'Juan Pérez';
    document.getElementById('checkout-phone').value = '3001234567';
    document.getElementById('checkout-email').value = 'juan@example.com';
    document.getElementById('checkout-address').value = 'Calle 123 #45-67';
    document.getElementById('checkout-city').value = 'Bogotá';
    
    // Simular envío
    const form = document.getElementById('checkout-form');
    if (form) {
        const event = new Event('submit', { bubbles: true, cancelable: true });
        form.dispatchEvent(event);
    }
}

// Hacer funciones disponibles globalmente para debugging
window.debugCart = debugCart;
window.debugAddProduct = debugAddProduct;
window.debugSubmitForm = debugSubmitForm;

console.log('Funciones de debug disponibles: debugCart(), debugAddProduct(), debugSubmitForm()');