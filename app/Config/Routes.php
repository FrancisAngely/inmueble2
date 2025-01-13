<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index',['filter'=>'authGuard']);
$routes->get('/inicio', 'Home::index',['filter'=>'authGuard']);
//http://localhost/inmuebles2/inicio2?id=1
$routes->match(['get','post'],'/inicioGet', 'Home::inicioGet');
$routes->get('/formulario', 'Home::formulario',['filter'=>'authGuard']);

$routes->match( ['get','post'],'/verificar', 'Home::comprobar');



$routes->match( ['get','post'],'/SiginController/loginAuth', 'SiginController::loginAuth');
$routes->get('/salir', 'ProfileController::cerrar_sesion');

$routes->get('/sigin', 'SiginController::index',['filter'=>'noauthGuard']);


//ROLES
$routes->get('/roles', 'RolesController::index');
$routes->get('/roles/nuevo', 'RolesController::nuevo');
$routes->match( ['get','post'],'/roles/crear', 'RolesController::crear');
$routes->match( ['get','post'],'/roles/editar', 'RolesController::editar');
$routes->match( ['get','post'],'/roles/actualizar', 'RolesController::actualizar');
$routes->match( ['get','post'],'/roles/eliminar', 'RolesController::delete');

//USUARIOS
$routes->get('/usuarios', 'UsuariosController::index');
$routes->get('/usuarios/nuevo', 'UsuariosController::nuevo');
$routes->match( ['get','post'],'/usuarios/crear', 'UsuariosController::crear');
$routes->match( ['get','post'],'/usuarios/editar', 'UsuariosController::editar');
$routes->match( ['get','post'],'/usuarios/actualizar', 'UsuariosController::actualizar');
$routes->match( ['get','post'],'/usuarios/eliminar', 'UsuariosController::delete');

//PROVINCIAS
$routes->get('/provincias', 'ProvinciasController::index');
$routes->get('/provincias/nuevo', 'ProvinciasController::nuevo');
$routes->match( ['get','post'],'/provincias/crear', 'ProvinciasController::crear');
$routes->match( ['get','post'],'/provincias/editar', 'ProvinciasController::editar');
$routes->match( ['get','post'],'/provincias/actualizar', 'ProvinciasController::actualizar');
$routes->match( ['get','post'],'/provincias/eliminar', 'ProvinciasController::delete');
