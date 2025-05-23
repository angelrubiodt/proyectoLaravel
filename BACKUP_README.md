# Documentación de Respaldo del Sistema de Gestión para Mina de Explotación de Material

## Descripción del sistema

Este proyecto es un sistema de gestión para una mina de explotación de material, desarrollado con Laravel. El sistema permite administrar productos (materiales extraídos), usuarios, contactos y cuenta con un área pública informativa.

## Contenido del respaldo

Este respaldo incluye:

1. **Código fuente completo**: Todo el código del proyecto Laravel incluyendo modelos, controladores, vistas y configuraciones.
2. **Base de datos**: Estructura completa de la base de datos y datos existentes (si se ha realizado el respaldo de la base de datos).
3. **Archivos de configuración**: Incluyendo variables de entorno (exceptuando claves sensibles).
4. **Dependencias**: Lista de paquetes y sus versiones en composer.json y package.json.

## Fecha del respaldo

Respaldo realizado el: [INSERTAR FECHA ACTUAL]

## Estructura del proyecto

El proyecto sigue la estructura estándar de Laravel con las siguientes particularidades:

- **app/Models**: Contiene los modelos principales (Producto, Cliente, Contact, User)
- **app/Http/Controllers**: Incluye controladores para la gestión de productos, contactos y administración
- **resources/views**: Vistas organizadas por funcionalidad
- **database/migrations**: Estructura de la base de datos

## Instrucciones para restauración

### Requisitos previos

- PHP 8.0 o superior
- Composer
- Node.js y NPM
- MySQL o MariaDB

### Pasos para restaurar desde este respaldo

1. **Restaurar código**:
   ```
   cp -r proyectoLaravel-backup-original/* proyectoLaravel-master/
   ```

2. **Instalar dependencias**:
   ```
   cd proyectoLaravel-master
   composer install
   npm install
   ```

3. **Configurar entorno**:
   ```
   cp .env.example .env
   php artisan key:generate
   ```
   Editar el archivo `.env` con las credenciales de base de datos y otras configuraciones necesarias.

4. **Restaurar base de datos**:
   ```
   mysql -u usuario -p nombre_base_datos < backup_antes_mejoras.sql
   ```
   Alternativamente:
   ```
   php artisan migrate
   ```
   para crear una base de datos fresca (sin datos).

5. **Enlazar almacenamiento**:
   ```
   php artisan storage:link
   ```

6. **Limpiar caché**:
   ```
   php artisan optimize:clear
   ```

7. **Iniciar servidor**:
   ```
   php artisan serve
   ```

## Notas importantes

- Este respaldo fue creado antes de implementar las mejoras propuestas al sistema.
- Se recomienda realizar pruebas en un entorno de desarrollo antes de restaurar en producción.
- Para cualquier problema durante la restauración, contactar al equipo de desarrollo.

## Inventario de funcionalidades respaldadas

1. **Gestión de productos/materiales**
   - CRUD completo de productos
   - Listado con paginación

2. **Sistema de usuarios**
   - Autenticación de administradores
   - Gestión de perfiles

3. **Área de contacto**
   - Formulario de contacto para visitantes
   - Sistema de newsletter

4. **Frontend**
   - Página de bienvenida
   - Panel de administración

## Responsables del respaldo

[INSERTAR NOMBRE DEL RESPONSABLE]

---

Este documento debe mantenerse junto con los archivos de respaldo para referencia futura.