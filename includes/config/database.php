<?php

function connectToDb(): mysqli {
  $db = new mysqli( $_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB_DB']);

  if(!$db) {
    echo 'Error al conectar a la Base de Datos';
    exit;
  }

  return $db;
}
