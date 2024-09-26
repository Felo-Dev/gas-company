<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## # Aplicación de Gestión de Empresa Intermediaria en el Mercado de Gas Ciudad

## Descripción del Proyecto

Esta aplicación web ha sido desarrollada utilizando el framework **Laravel** para gestionar una compañía intermediaria en el mercado del gas ciudad. La plataforma permite gestionar clientes, proveedores y la asignación de calidades de gas, además de incluir un sistema de alertas para márgenes de beneficio negativo y funcionalidades de exportación de datos. La aplicación está diseñada para facilitar las tareas administrativas de la empresa con operaciones CRUD completas y reportes personalizados.

## Características Principales

### 1. Gestión de Clientes

Cada cliente cuenta con la siguiente información mínima:

- Nombre
- Apellidos
- DNI
- Fecha de alta

**Operaciones soportadas:**

- Crear, modificar, eliminar y listar clientes.

### 2. Gestión de Proveedores

Cada proveedor tiene la siguiente información mínima:

- Nombre de la empresa
- País
- CIF
- Fecha de alta

Un proveedor puede ofrecer varias calidades de gas, con diferentes nombres y precios.

**Operaciones soportadas:**

- Crear, modificar, eliminar y listar proveedores.

### 3. Asignación de Calidad de Gas a Clientes

- Cada cliente puede tener asignada una única calidad de gas de un proveedor.
- No se permite que un cliente tenga más de un proveedor o más de una calidad asignada.

### 4. Listados y Reportes

En el listado de clientes se muestran:

- Proveedor y calidad asignada.
- Precio de compra del gas, precio de venta y margen de beneficio.

El sistema alerta sobre clientes con márgenes de beneficio negativos, con enlaces directos para editar sus datos.

### 5. Exportación de Datos

La aplicación permite exportar el listado de clientes y proveedores a formatos adecuados para su gestión externa.

## Instalación

### Requisitos

- **Laravel** (8.x o superior)
- **Docker** y **docker-compose**
- **MySQL** o **MariaDB** como base de datos.

### Pasos de Instalación

1. Clona el repositorio:
   ```bash
   git clone https://github.com/Felo-Dev/gas-company.git
   cd gas-company.git 
   docker-compose up -d 
    docker-compose exec app php artisan migrate
    docker-compose exec app php artisan db:seed
    
