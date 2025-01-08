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
