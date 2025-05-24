# Instrucciones para Recrear la Base de Datos

Estas instrucciones te guiarán paso a paso para recrear la tabla `products` con la estructura adecuada para el sistema de gestión de mina.

## Pasos a seguir

### 1. Realizar una copia de seguridad (opcional pero recomendado)

Si tienes datos importantes en la tabla `products` que no quieres perder, realiza primero una copia de seguridad:

```bash
mysqldump -u [usuario] -p [base_de_datos] products > products_backup.sql
```

### 2. Ejecutar la nueva migración

Esta migración eliminará la tabla `products` existente y la recreará con la estructura correcta:

```bash
php artisan migrate --path=database/migrations/2023_11_14_000000_recreate_products_table.php
```

### 3. Refrescar la caché de la aplicación

Para asegurarte de que Laravel reconoce los cambios:

```bash
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### 4. Reiniciar el servidor (si es necesario)

```bash
php artisan serve
```

## Nueva estructura de la tabla

La tabla `products` ahora tiene los siguientes campos:

- `id`: Identificador único (clave primaria)
- `placa`: Placa del vehículo
- `tipo_material`: Tipo de material extraído
- `cantidad`: Cantidad del material
- `precio`: Precio del material
- `comprador`: Nombre del comprador
- `ubicacion_extraccion`: Ubicación de la extracción (predeterminado: "Mina San Pedro")
- `fecha_extraccion`: Fecha en que se extrajo el material
- `calidad_material`: Calidad del material (Alta, Media, Baja)
- `estado_procesamiento`: Estado del procesamiento (Crudo, Procesado, Refinado)
- `observaciones`: Observaciones adicionales sobre el material
- `codigo_referencia`: Estado de pago (Comprado o Fiado)
- `created_at`: Fecha de creación del registro
- `updated_at`: Fecha de actualización del registro

## Solución de problemas

Si encuentras algún error durante la migración:

1. Verifica que tienes permisos de administrador en la base de datos
2. Asegúrate de que no hay conexiones activas a la tabla cuando intentas eliminarla
3. Si continúan los problemas, puedes ejecutar manualmente el siguiente SQL:

```sql
DROP TABLE IF EXISTS products;

CREATE TABLE products (
    id BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    placa VARCHAR(255) NOT NULL,
    tipo_material VARCHAR(255) NOT NULL,
    cantidad INT DEFAULT 0 NOT NULL,
    precio DECIMAL(10, 2) DEFAULT 0 NOT NULL,
    comprador VARCHAR(255) NOT NULL,
    ubicacion_extraccion VARCHAR(255) DEFAULT 'Mina San Pedro',
    fecha_extraccion DATE NULL,
    calidad_material VARCHAR(255) NULL,
    estado_procesamiento VARCHAR(255) NULL,
    observaciones TEXT NULL,
    codigo_referencia VARCHAR(255) NULL,
    created_at TIMESTAMP NULL,
    updated_at TIMESTAMP NULL
);
```

## Archivos modificados

- Migración: `database/migrations/2023_11_14_000000_recreate_products_table.php`
- Modelo: `app/Models/Producto.php`
- Controlador: `app/Http/Controllers/ProductoControl.php`

¡Una vez completados estos pasos, tu aplicación estará utilizando la nueva estructura de base de datos!