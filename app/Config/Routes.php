<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('login', 'Login::index'); // Ruta para cargar el formulario de login
$routes->post('Login/autenticar', 'Login::autenticar'); // Ruta para procesar el login
$routes->get('logout', 'Login::logout'); // Ruta para cerrar sesión

$routes->get('usuarios/prueba', 'Usuarios::prueba');

$routes->get('usuarios/registrar', 'Usuario::registrar'); // Mostrar el formulario
$routes->post('Usuarios/registrar', 'Usuario::registrar'); // Procesar los datos del formulario


