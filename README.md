#Aplicacion desarrollada con el framework Laravel version 8
#Aplicacion desarrollada con el lenguaje php 7.4
#Aplicacion desarrollada con el SGBD MySql

#Requerimientos y herramientas:

1- Git 
2- Nodejs
3- Servidor Apache
4- SGBD MySQL
5- Composer
6- Php

7- Xampp

#instalacion del proyecto

1- Clonar el proyecto del siguiente repositorio:
git clone https://github.com/anonimo21/prueba_nexura.git

2- Entrar al proyecto y ejecutar el comando para instalar dependencias de php:

composer install

3- Entrar al proyecto y ejecutar el comando para instalar dependencias de js:

npm install

4- Crear una base de datos en MySQL

5- Modificar el archivo .env con sus credenciales de acceso a la base de datos

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=prueba_nexura
DB_USERNAME=root
DB_PASSWORD=

6- Ejecutar el comando para crear las tablas e insertar los datos de prueba en la BD creada anteriorimente:

php artisan migrate --seed

7- Una vez realizados los pasos anteriores ejecutar el siguiente comando para levantar el servidor de pruebas que viene con laravel:

php artisan serve

8- Dirigirse a las siguinte URL en el navegador para acceder al sistema:

http://localhost:8000/empleados

