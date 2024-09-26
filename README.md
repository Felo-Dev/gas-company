<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## La tarea consiste en desarrollar una aplicación web usando el framework Laravel para
gestionar una compañía intermediaria en el mercado del gas ciudad. Algunas de las
características del mercado en el que se encuentra la empresa son:

● La empresa cuenta con diferentes clientes. Cada cliente cuenta con, como mínimo,
la siguiente información: Nombre, apellidos, DNI, fecha de alta.
● La empresa cuenta con diferentes proveedores. Cada proveedor cuenta con, como
mínimo, la siguiente información: Nombre empresa, país, CIF, fecha de alta.
● Cada proveedor puede tener varias calidades diferentes de gas. Cada calidad
tendrá un nombre, por ejemplo A, B, C,... y cada una tendrá un precio distinto.
● Cada cliente puede tener asignado una calidad concreta de un proveedor concreto.
El cliente no puede tener más de una calidad asignada, ni más de un proveedor
asignado.
● Se necesita poder dar de alta, modificar, eliminar y listar clientes y proveedores.
(CRUD).
● En el listado de clientes debe especificar el precio de compra, precio de venta y
beneficio, además de mostrar que proveedor y calidad tiene asignado.
● El sistema deberá mostrar un aviso con los clientes que tengan un margen de
beneficio negativo con un enlace para editarlo.
● Se deberá poder exportar el listado de clientes y proveedores.
● Se puntuará cualquier mejora adicional.

2

Entrega
● Debes darnos acceso a un repositorio privado de GitHub donde se pueda ver la
evolución de todos los commits hechos en el proyecto.
● Toda la aplicación debe levantarse con docker-compose, de forma que no sea
necesario tener PHP en el equipo donde se ejecutará.
If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
