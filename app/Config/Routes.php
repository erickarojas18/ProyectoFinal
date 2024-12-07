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

//especies
$routes->get('especies', 'Especies::index'); // Muestra la lista de especies
$routes->get('admin/editar_especie/(:num)', 'Especies::edit/$1'); // Muestra el formulario de edición

$routes->post('Especies/update/(:num)', 'Especies::update/$1'); // Acción para actualizar una especie
$routes->get('Especies/delete/(:num)', 'Especies::delete/$1');

$routes->get('/compras', 'Compras::index'); // Muestra la lista de arboles comprados

$routes->get('/arbol', 'ArbolesDisponibles::index'); // Muestra la lista de arboles comprados
$routes->get('admin/editar_arbol/(:num)', 'ArbolesDisponibles::editar/$1'); // Muestra el formulario de edición
$routes->post('ArbolesDisponibles/actualizar/(:num)', 'ArbolesDisponibles::actualizar/$1'); // Acción para actualizar una especie
$routes->get('ArbolesDisponibles/eliminar/(:num)', 'ArbolesDisponibles::eliminar/$1');

$routes->get('dashboard', 'Dashboard::index');
