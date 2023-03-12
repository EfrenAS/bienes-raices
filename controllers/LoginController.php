<?php

namespace Controllers;

use MVC\Router;
use Model\Admin;

class LoginController {

  public static function login(Router $router) {
    $errors = [];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $auth = new Admin($_POST);
      $errors = $auth -> validateValues();

      if (empty($errors)) {
        $result = $auth->existUser();
        
        if (!$result) {
          $errors = Admin::getErrors();
        } else {
          $isAuthenticated = $auth->verifyPassword($result);
          
          if ($isAuthenticated) {
            $auth->authenticate();          
          } else {
            $errors = Admin::getErrors();
          }
        }
      }
    }
    $router->render('auth/login', [
      'errors' => $errors
    ]);
  }

  public static function logout() {
    session_start();

    $_SESSION = [];

    header('Location: /');
  }
}
