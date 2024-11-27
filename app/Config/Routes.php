<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('login', 'Login::index'); // Ruta para cargar el formulario de login
$routes->post('Login/autenticar', 'Login::autenticar'); // Ruta para procesar el login
$routes->get('logout', 'Login::logout'); // Ruta para cerrar sesión

$routes->get('/usuarios/registrar', 'Usuarios::registrar');
$routes->post('/usuarios/registrar', 'Usuarios::registrar');

$routes->get('usuarios/listar', 'Usuarios::listarUsuarios'); // Listar usuarios
$routes->get('login', 'Login::index'); // Página de login (si tienes un controlador separado para Login)

