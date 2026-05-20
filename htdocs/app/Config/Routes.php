<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
//$routes->get('test-db', 'TestDb::index');
$routes->get('blog', 'Blog::index');
$routes->get('articulo/crear', 'Articulo::crear');
$routes->post('articulo/store', 'Articulo::store');

$routes->get('contacto', 'Contacto::index');
$routes->post('contacto/enviar', 'Contacto::enviar');
$routes->get('admin/usuarios', 'Admin::usuarios');
$routes->get('articulo/getArticulo/(:num)', 'Articulo::getArticulo/$1');

$routes->get('test-contacto', function() {
    return 'Ruta de prueba OK';
});