<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('login', 'Login::index'); // Ruta para cargar el formulario de login
$routes->post('Login/autenticar', 'Login::autenticar'); // Ruta para procesar el login
$routes->get('logout', 'Login::logout'); // Ruta para cerrar sesión



$routes->get('/registrar', 'Usuarios::registro'); // Mostrar el formulario
$routes->post('/registrar', 'Usuarios::registro'); // Procesar los datos del formulario

$routes->get('amigos', 'Amigos::index'); // Muestra la lista de amigos
$routes->get('admin/editar/(:num)', 'Amigos::editar/$1'); // Muestra el formulario de edición
$routes->post('Amigos/actualizar/(:num)', 'Amigos::actualizar/$1'); // Actualiza un amigo
$routes->get('Amigos/eliminar/(:num)', 'Amigos::eliminar/$1'); // Elimina un amigo

$routes->get('usuarios', 'MenuAmigos::index');

$routes->get('menu', 'Menu::index');

//especies
$routes->get('especies', 'Especies::index'); // Muestra la lista de especies
$routes->post('Especies/store', 'Especies::store');
$routes->get('admin/editar_especie/(:num)', 'Especies::edit/$1'); // Muestra el formulario de edición
$routes->get('admin/crear_especie', 'Especies::create'); // Formulario de creación
$routes->post('Especies/update/(:num)', 'Especies::update/$1'); // Acción para actualizar una especie
$routes->get('Especies/delete/(:num)', 'Especies::delete/$1');

$routes->get('/compras', 'Compras::index'); // Muestra la lista de arboles comprados

$routes->get('/arbol', 'ArbolesDisponibles::index'); // Muestra la lista de arboles comprados
$routes->get('admin/editar_arbol/(:num)', 'ArbolesDisponibles::editar/$1'); // Muestra el formulario de edición
$routes->post('ArbolesDisponibles/actualizar/(:num)', 'ArbolesDisponibles::actualizar/$1'); // Acción para actualizar una especie
$routes->get('ArbolesDisponibles/eliminar/(:num)', 'ArbolesDisponibles::eliminar/$1');
//crear arbol 
$routes->get('arbol/crear', 'ArbolesDisponibles::crear');
$routes->post('arbol/guardar', 'ArbolesDisponibles::guardar');


$routes->get('dashboard', 'Dashboard::index');

$routes->get('arboles_disponibles', 'Arbol::index');
$routes->get('comprar_arbol/(:num)', 'Arbol::comprar/$1');

$routes->get('usuarios/arboles_comprados', 'Arbol::arbolesComprados');

//ver arboles amigos
$routes->get('admin/ver_arboles', 'Vista::arbolesCompradosPorAmigos');
//administrar arboles amigos

$routes->get('admin/adm_arbol_amigo', 'Vista::index');
$routes->match(['get', 'post'], 'admin/editar_arbol_amigo/(:num)', 'Vista::editarArbolAmigo/$1');
$routes->get('Vista/eliminarArbol/(:num)', 'Vista::eliminarArbol/$1');
