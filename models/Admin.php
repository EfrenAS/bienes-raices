<?php

namespace Model;

use Model\ActiveRecord;

class Admin extends ActiveRecord {
  
  protected static $table = 'users';
  protected static $columnsDb = ['id', 'email', 'password'];

  public $id;
  public $email;
  public $password;

  public function __construct($args = []) {
    $this->id = $args['id'] ?? null ;
    $this->email = $args['email'] ?? '' ;
    $this->password = $args['password'] ?? '' ;
  }

  public function validateValues(): array {
    if (!$this->email) {
      self:: $errors[] = 'El email es obligatorio';
    }
    if (!$this->password) {
      self:: $errors[] = 'La contrasena es obligatoria';
    }
    return self::$errors;
  }

  public function existUser() {
    $query = "SELECT * FROM " . self::$table . " WHERE email = '$this->email'  LIMIT 1";
    $result = self::$db->query($query);
    
    if (!$result->num_rows) {
      self::$errors[] = 'El usuario no existe';
      return;
    }

    return $result;
  }

  public function verifyPassword( $result ) {
    $user = $result->fetch_object();
    $isPassword = password_verify($this->password, $user->password);

    if (!$isPassword) {
      self::$errors[] = 'El password es incorrecto';
    }

    return $isPassword;
  }

  public function authenticate() {
    session_start();
    $_SESSION['user'] = $this->email;
    $_SESSION['login'] = true;

    header('Location: /admin');
  }
}
