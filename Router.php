<?php

namespace MVC;

ini_set('display_errors', 1);

class Router {

  public $requestGET = [];
  public $requestPOST = [];

  public function get($url, $fn): void {
    $this->requestGET[$url] = $fn;
  }

  public function post($url, $fn): void {
    $this->requestPOST[$url] = $fn;
  }

  public function checkRoutes(): void {

    session_start();
    $auth = $_SESSION['login'] ?? null;
    $restrictedRoutes = [
      '/admin',
      '/propiedades/crear',
      '/propiedades/actualizar',
      '/propiedades/eliminar',
      '/vendedores/crear',
      '/vendedores/actualizar',
      '/vendedores/eliminar'
    ];

    $url = $_SERVER['REQUEST_URI'] === '' ? '/' : $_SERVER['REQUEST_URI'];
    $method =  $_SERVER['REQUEST_METHOD'];
    
    if ($method === 'GET') {
      $fn = $this->requestGET[$url] ?? null;
    } else {
      $fn = $this->requestPOST[$url] ?? null;
    }

    if (in_array($url, $restrictedRoutes) && !$auth) {
      header('Location: /');
    }

    if ($fn) {
      call_user_func($fn, $this);
    } else {
      echo 'Pagina no encontrada';
    }
  }

  public function render($view, $data = []): void {
    
    foreach ($data as $key => $value) {
      $$key = $value;
    }

    ob_start();

    include_once __DIR__ . "/views/$view.php";
    $content = ob_get_clean();
    include_once __DIR__ . "/views/layout.php";
  }
}
