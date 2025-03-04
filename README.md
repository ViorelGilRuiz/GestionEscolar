# Sistema de Gestión de Escuela

Este es un sistema de gestión escolar desarrollado con Laravel y Vue.js que permite administrar alumnos, proyectos y asignaciones.

## 📋 Requisitos Previos

Antes de comenzar, necesitas tener instalado:

1. **Docker Desktop** - [Descargar aquí](https://www.docker.com/products/docker-desktop)
2. **Node.js** - [Descargar aquí](https://nodejs.org/) (versión 16 o superior)
3. **Composer** - [Descargar aquí](https://getcomposer.org/download/)

## 🚀 Instalación

Sigue estos pasos para instalar el proyecto:

1. **Clonar el repositorio**
   ```bash
   git clone [URL_DEL_REPOSITORIO]
   cd proyecto_laravel
   ```

2. **Instalar dependencias de PHP**
   ```bash
   composer install
   ```

3. **Instalar dependencias de Node.js**
   ```bash
   npm install
   ```

4. **Configurar el archivo .env**
   - Copia el archivo .env.example a .env
   ```bash
   cp .env.example .env
   ```
   - Configura las siguientes variables:
     ```
     DB_CONNECTION=mysql
     DB_HOST=mysql
     DB_PORT=3306
     DB_DATABASE=laravel
     DB_USERNAME=root
     DB_PASSWORD=root12345
     ```

5. **Generar clave de aplicación**
   ```bash
   php artisan key:generate
   ```

## 🏃‍♂️ Iniciar el Proyecto

1. **Iniciar Docker**
   ```bash
   cd proyecto_laravel
   docker-compose up -d
   ```

2. **Ejecutar migraciones**
   ```bash
   php artisan migrate
   ```

3. **Iniciar servidor de desarrollo**
   ```bash
   npm run dev
   ```

4. **En otra terminal, iniciar Laravel**
   ```bash
   php artisan serve
   ```

## 🌐 Acceso al Sistema

- **Aplicación Web**: http://localhost:8000
- **phpMyAdmin**: http://localhost:8100
  - Usuario: root
  - Contraseña: root12345

## 📱 Funcionalidades Principales

1. **Dashboard**
   - Vista general del sistema
   - Contadores de alumnos y proyectos
   - Acciones rápidas

2. **Gestión de Alumnos**
   - Agregar nuevos alumnos
   - Ver lista de alumnos
   - Editar información
   - Eliminar alumnos

3. **Gestión de Proyectos**
   - Crear nuevos proyectos
   - Asignar alumnos
   - Ver detalles
   - Modificar estado

4. **Sistema Multiidioma**
   - Soporte para Español e Inglés
   - Cambio dinámico de idioma

## 🛠️ Estructura del Proyecto

```
proyecto_laravel/
├── app/                    # Lógica principal
├── resources/             
│   ├── js/                # Archivos Vue.js
│   ├── views/             # Vistas Blade
│   └── lang/              # Archivos de idiomas
├── database/
│   └── migrations/        # Migraciones DB
└── docker/                # Configuración Docker
```

## 🔧 Solución de Problemas Comunes

1. **Error de conexión a la base de datos**
   - Verificar que Docker esté corriendo
   - Comprobar credenciales en .env

2. **Error al ejecutar npm**
   - Borrar node_modules y package-lock.json
   - Ejecutar npm install nuevamente

3. **Página en blanco**
   - Limpiar caché: php artisan cache:clear
   - Recompilar assets: npm run dev

## 📞 Soporte

Para soporte técnico o dudas:
- Email: [TU_EMAIL]
- GitHub Issues: [URL_REPOSITORIO/issues]

## 📄 Licencia

Este proyecto está bajo la Licencia MIT.