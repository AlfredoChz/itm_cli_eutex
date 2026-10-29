# EUTEX - Confección y Distribución de Uniformes Industriales

Plataforma web desarrollada en **Laravel 12** inspirada en el estándar de diseño corporativo e industrial de SGIS Perú, adaptada y personalizada para **EUTEX**, empresa líder en confección textil y dotación de prendas técnicas para los sectores de minería, construcción, logística, hidrocarburos e industria pesada en el Perú.

---

## 🚀 Características Principales

- **Banner Panorámico 100% Ancho Completo**: Slider horizontal de alta definición directamente debajo del menú de navegación.
- **Catálogo de Productos Industriales**:
  - Polos manga larga piqué 100% algodón (gama de 10 colores corporativos).
  - Chalecos de seguridad de alta visibilidad con certificación ANSI/ISEA 107.
  - Jeans industriales 14 oz con cintas reflectivas 3M de 2 pulgadas.
  - Camisas de trabajo, pantalones multibolsillo, mamelucos térmicos e ignífugos.
- **Buscador en Vivo Modal (AJAX + Alpine.js)** con autocompletado y atajo de teclado (`Ctrl + K`).
- **Sistema Integral de Cotización Rápida**:
  - Drawer modal interactivo para solicitar presupuestos por volumen.
  - Registro automático en base de datos SQLite.
  - Generación instantánea de enlace y mensaje formateado para **WhatsApp directo** (`+51 920 783 202`).
- **Secciones Corporativas**:
  - Nosotros, Filosofía y Capacidad de Producción en Gamarra.
  - Servicios: Bordado computarizado, estampado serigráfico de alta durabilidad, desarrollo textil a medida y distribución a nivel nacional.
  - Blog Técnico: Artículos especializados en normativas de seguridad laboral, selección de telas industriales y certificaciones ANSI/NTP.
  - Libro de Reclamaciones conforme a las disposiciones de INDECOPI.
- **Panel de Administración (`/admin`)**:
  - Acceso seguro mediante login (`/admin/login`).
  - Dashboard con estadísticas en tiempo real de productos, cotizaciones y mensajes.
  - Gestión integral (CRUD) de Productos (con subida de imágenes, variantes de color/talla y destacados).
  - Gestión de Categorías y Líneas Industriales.
  - Bandeja de Cotizaciones con botón directo para responder por WhatsApp al cliente.
  - Bandeja de Mensajes de contacto.
  - **Credenciales de acceso inicial:** Usuario: `admin@eutex.com` | Contraseña: `admin1234`.
- **Diseño Responsivo y Moderno**: Paleta de color industrial (Azul Marino Profundo `#0B1B3D`, Naranja Seguridad `#FF5500`), tipografía Inter/Montserrat, micro-animaciones y soporte móvil completo.

---

## 🛠️ Stack Tecnológico

- **Backend**: [Laravel 12](https://laravel.com/) (PHP 8.2+)
- **Frontend**: Blade Components, [Tailwind CSS v4](https://tailwindcss.com/), [Alpine.js](https://alpinejs.dev/)
- **Base de Datos**: SQLite (compatible con MySQL/PostgreSQL sin cambios)
- **Empaquetador**: [Vite](https://vitejs.dev/)
- **Iconografía**: SVG Vectorial integrado y Lucide Icons

---

## 💻 Instalación y Puesta en Marcha Local

1. **Clonar el repositorio**:
   ```bash
   git clone https://github.com/AlfredoChz/itm_cli_eutex.git
   cd itm_cli_eutex
   ```

2. **Instalar dependencias de PHP**:
   ```bash
   composer install
   ```

3. **Configurar el archivo de entorno**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

4. **Ejecutar migraciones y datos de prueba (Seeders)**:
   ```bash
   touch database/database.sqlite
   php artisan migrate --seed
   ```

5. **Instalar dependencias de Frontend y compilar activos**:
   ```bash
   npm install
   npm run build
   ```
   *(O `npm run dev` para desarrollo en vivo)*

6. **Iniciar el servidor local**:
   ```bash
   php artisan serve
   ```
   Acceder a la aplicación en: `http://localhost:8000` o `http://eutex.test` en entornos Laragon.

---

## 📞 Datos de Contacto de la Empresa

- **Razón Comercial**: EUTEX - Uniformes Industriales
- **Teléfono / WhatsApp**: [+51 920 783 202](https://wa.me/51920783202)
- **Correos Electrónicos**: `eutex@ventas.com` / `e20huaccachi@gmail.com`
- **Ubicación**: Jr. Gamarra, La Victoria, Lima - Perú
- **Cobertura**: Envíos y despachos a todo el Perú

---

## 📄 Licencia

Este proyecto está bajo la licencia [MIT](LICENSE).
