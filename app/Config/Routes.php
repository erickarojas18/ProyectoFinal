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


$routes->get('amigos', 'Amigos::index'); // Muestra la lista de amigos
$routes->get('admin/editar/(:num)', 'Amigos::editar/$1'); // Muestra el formulario de edición
$routes->post('Amigos/actualizar/(:num)', 'Amigos::actualizar/$1'); // Actualiza un amigo
$routes->get('Amigos/eliminar/(:num)', 'Amigos::eliminar/$1'); // Elimina un amigo

$routes->get('menu', 'Menu::index');
