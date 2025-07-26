# 🌱 ASDEN Perú

**ASDEN Perú** es una plataforma web integral desarrollada para apoyar a una ONG en la gestión de noticias, ofertas de voluntariado, donaciones y publicaciones comunitarias. Este proyecto combina un backend robusto con un frontend dinámico, ofreciendo una experiencia segura, escalable y centrada en la participación social.

---

## 🚀 Características

### 🧠 Gestión de contenido
- Publicación de noticias, ofertas de trabajo para voluntariado y posts.
- Envío de solicitudes sin necesidad de estar registrado.
- Sistema de comentarios para fomentar la interacción.

### 👥 Roles de usuario
- **Administrador**: puede crear, editar y eliminar noticias, ofertas, posts y gestionar usuarios.
- **Usuario regular**: puede crear posts y comentar en publicaciones.
- **Visitante**: puede enviar solicitudes sin necesidad de autenticarse.

---

## 🛠️ Tecnologías Utilizadas

### Backend robusto
- Desarrollado en **Laravel 11.x** con **PHP**, ofreciendo una arquitectura limpia y modular.
- Gestión de autenticación mediante **JWT** para asegurar las interacciones y la protección de datos.
- API RESTful para la comunicación con el frontend y la integración con otros servicios.

### Frontend dinámico y responsivo
- Uso de **Blade** como motor de plantillas para generar vistas.
- Estilos y componentes con **Tailwind CSS** que garantizan un diseño moderno y adaptativo.
- Comportamiento interactivo con **Alpine.js** para potenciar la experiencia de usuario sin depender de frameworks complejos.

### Herramientas y utilidades
- **Git** para control de versiones.
- **Composer** para la gestión de dependencias en PHP.
- **NPM** para la gestión de assets y librerías de JavaScript/CSS.
- **MySQL** como sistema de gestión de base de datos.

---

## ⚙️ Instalación

```bash
# Clona el repositorio
git clone https://github.com/tuusuario/asden-peru.git
cd asden-peru

# Instala dependencias de PHP
composer install

# Instala dependencias de frontend
npm install && npm run dev

# Configura el archivo .env
cp .env.example .env
php artisan key:generate

# Configura la base de datos en .env y ejecuta migraciones
php artisan migrate

# Opcional: seeders para datos de prueba
php artisan db:seed
