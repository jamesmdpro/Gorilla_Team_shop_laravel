# 🦍 Shop Gorilla - Tienda de Suplementos

Una moderna tienda online especializada en suplementos deportivos y nutricionales, construida con tecnologías web modernas y Cart.js para una experiencia de compra fluida.

## 🚀 Características

- **Catálogo de Productos**: Amplia gama de suplementos organizados por categorías
- **Carrito de Compras**: Integración con Cart.js para gestión dinámica del carrito
- **Búsqueda Avanzada**: Filtros por categoría, precio, marca y más
- **Responsive Design**: Optimizado para dispositivos móviles y desktop
- **Gestión de Inventario**: Control en tiempo real del stock disponible
- **Proceso de Checkout**: Flujo de compra simplificado y seguro
- **Panel de Administración**: Gestión de productos, pedidos y usuarios

## 🛠️ Tecnologías Utilizadas

- **Frontend**: HTML5, CSS3, JavaScript (ES6+)
- **Carrito**: Cart.js para gestión del carrito de compras
- **Backend**: Laravel (PHP)
- **Base de Datos**: MySQL
- **Estilos**: CSS personalizado con diseño responsive
- **Control de Versiones**: Git

## 📦 Instalación

### Prerrequisitos

- PHP >= 8.1
- Composer
- Node.js >= 16.x
- MySQL >= 5.7

### Pasos de Instalación

1. **Clonar el repositorio**
   ```bash
   git clone https://github.com/tu-usuario/shop-gorilla.git
   cd shop-gorilla
   ```

2. **Instalar dependencias de PHP**
   ```bash
   composer install
   ```

3. **Configurar variables de entorno**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Configurar base de datos**
   - Edita el archivo `.env` con tus credenciales de base de datos:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=shop_gorilla
   DB_USERNAME=tu_usuario
   DB_PASSWORD=tu_contraseña
   ```

5. **Ejecutar migraciones**
   ```bash
   php artisan migrate
   ```

6. **Sembrar datos de prueba (opcional)**
   ```bash
   php artisan db:seed
   ```

7. **Iniciar el servidor de desarrollo**
   ```bash
   php artisan serve
   ```

La aplicación estará disponible en `http://localhost:8000`

## 🛒 Configuración de Cart.js

Cart.js está integrado para manejar todas las operaciones del carrito de compras:

### Inicialización
```javascript
// Inicializar Cart.js
Cart.init({
  currency: 'EUR',
  submitTo: '/cart/add',
  dataAPI: true,
  debug: false
});
```

### Agregar Productos
```javascript
// Agregar producto al carrito
Cart.addItem(productId, {
  quantity: 1,
  properties: {
    name: 'Proteína Whey',
    price: 29.99,
    image: 'producto.jpg'
  }
});
```

### Eventos del Carrito
```javascript
// Escuchar cambios en el carrito
document.addEventListener('cart.requestComplete', function(event) {
  console.log('Carrito actualizado:', Cart.getCart());
  updateCartUI();
});
```

## 📁 Estructura del Proyecto

```
Shop_gorilla/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   └── Middleware/
│   ├── Models/
│   └── Providers/
├── bootstrap/
├── config/
├── database/
│   ├── migrations/
│   └── seeders/
├── public/
│   ├── css/
│   ├── js/
│   │   └── cart.js
│   └── images/
├── resources/
│   ├── views/
│   └── sass/
├── routes/
└── storage/
```

## 🎯 Funcionalidades Principales

### Gestión de Productos
- Crear, editar y eliminar productos
- Categorización por tipo de suplemento
- Gestión de imágenes y descripciones
- Control de stock y precios

### Carrito de Compras
- Agregar/quitar productos dinámicamente
- Actualización automática de totales
- Persistencia del carrito en sesión
- Validación de stock disponible

### Proceso de Compra
- Formulario de datos del cliente
- Cálculo de envío
- Integración con pasarelas de pago
- Confirmación por email

## 🔧 Configuración Adicional

### Variables de Entorno Importantes

```env
# Configuración de la aplicación
APP_NAME="Shop Gorilla"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

# Configuración de correo
MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025

# Configuración de pagos (ejemplo)
STRIPE_KEY=your-stripe-key
STRIPE_SECRET=your-stripe-secret
```

## 🚀 Despliegue

### Producción

1. **Configurar servidor web** (Apache/Nginx)
2. **Optimizar aplicación**
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   ```
3. **Configurar SSL** para transacciones seguras
4. **Configurar backups** de base de datos

## 🤝 Contribución

1. Fork el proyecto
2. Crea una rama para tu feature (`git checkout -b feature/AmazingFeature`)
3. Commit tus cambios (`git commit -m 'Add some AmazingFeature'`)
4. Push a la rama (`git push origin feature/AmazingFeature`)
5. Abre un Pull Request

## 📝 Licencia

Este proyecto está bajo la Licencia MIT. Ver el archivo `LICENSE` para más detalles.

## 📞 Contacto

- **Desarrollador**: Tu Nombre
- **Email**: tu-email@ejemplo.com
- **Proyecto**: [https://github.com/tu-usuario/shop-gorilla](https://github.com/tu-usuario/shop-gorilla)

## 🙏 Agradecimientos

- [Cart.js](https://cartjs.org/) por la excelente librería de carrito
- [Laravel](https://laravel.com/) por el framework backend
- Comunidad de desarrolladores por el feedback y contribuciones

---

⭐ ¡No olvides dar una estrella al proyecto si te ha sido útil!
