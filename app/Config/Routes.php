<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('login', 'Login::index'); // Ruta para cargar el formulario de login
$routes->post('Login/autenticar', 'Login::autenticar'); // Ruta para procesar el login
$routes->get('logout', 'Login::logout'); // Ruta para cerrar sesión


$routes->get('/registrar', 'Usuarios::index'); // Mostrar el formulario
$routes->post('Usuarios/registrar', 'Usuarios::registrar'); // Procesar los datos del formulario

$routes->get('admin', 'Admin::index');
$routes->post('Admin/dashboard', 'Admin::dashboard'); // Procesar los datos del formulario


