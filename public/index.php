<?php

require_once  __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\LoginController;
use Controllers\pagesController;
use Controllers\PropertyController;
use Controllers\SellerController;

$router = new Router();

// Property Routes
$router->get('/admin', [ PropertyController::class, 'index'] );
$router->get('/propiedades/crear', [PropertyController::class, 'create']);
$router->post('/propiedades/crear', [PropertyController::class,'create']);
$router->get('/propiedades/actualizar', [PropertyController::class ,'update']);
$router->post('/propiedades/actualizar', [PropertyController::class,'update']);
$router->post('/propiedades/eliminar', [PropertyController::class,'delete']);


// Seller Routes
$router->get('/vendedores/crear', [SellerController::class, 'create']);
$router->post('/vendedores/crear', [SellerController::class, 'create']);
$router->get('/vendedores/actualizar', [SellerController::class, 'update']);
$router->post('/vendedores/actualizar', [SellerController::class, 'update']);
$router->post('/vendedores/eliminar', [SellerController::class, 'delete']);

// Pulic Routes
$router->get('/', [pagesController::class, 'index']);
$router->get('/nosotros', [pagesController::class, 'aboutUs']);
$router->get('/propiedades', [pagesController::class, 'properties']);
$router->get('/propiedad', [pagesController::class, 'property']);
$router->get('/blog', [pagesController::class, 'blog']);
$router->get('/entrada', [pagesController::class, 'entry']);
$router->get('/contacto', [pagesController::class, 'contact']);
$router->post('/contacto', [pagesController::class, 'contact']);

// Login and Authentication
$router->get('/login', [LoginController::class, 'login']);
$router->post('/login', [LoginController::class, 'login']);
$router->get('/logout', [LoginController::class, 'logout']);




$router->checkRoutes();
