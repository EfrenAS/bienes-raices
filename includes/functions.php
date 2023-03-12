<?php

define('TEMPLATES_PATH', __DIR__.'/templates');
define('FUNCTIONS_PATH', __DIR__.'functions.php');
define('PATH', __DIR__);
define('IMAGE_FILE', $_SERVER['DOCUMENT_ROOT'] . '/images/');

function includeTemplates( string $template, bool $home = false): void {
  include TEMPLATES_PATH . "/$template.php";
}

function isAuthenticated(): void {
  session_start();

  if (!$_SESSION['login']) {
    header('Location: /');
  }
}

function debug( $var ): void {
  echo '<pre>';
  var_dump( $var );
  echo '</pre>';
  exit;
}

// Sanitize the HTML
function sanitize($html): string {
  $sanitize = htmlspecialchars($html);
  return $sanitize;
}

function validateTypeContent ($type = null): bool {
  $types = ['seller', 'property'];
  return in_array($type, $types);
}

function showNotification(int $code): string{
  $message = '';

  switch ($code) {
    case 200:
      $message = 'Creado correctamente';
      break;
    case 201:
      $message = 'Actualizado correctamente';
      break;
    case 202:
      $message = 'Eliminado correctamente';
      break;
    default:
      $message = false;
      break;
  }

  return $message;
}

function validateParams(string $url): string {
  $param = $_GET['id'];
  $param = filter_var($param, FILTER_VALIDATE_INT);

  if (!$param) {
    header("Location: $url");
  }

  return $param;
}