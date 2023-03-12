<?php

namespace Model;

class ActiveRecord {

  protected static $db;
  protected static $table;
  protected static $columnsDb = [];
  protected static $errors = [];

  public static function setDB($database): void {
    self::$db = $database;
  }

  public function setImage($imageName): void {

    if( !is_null($this->id) ) {
      $this->deleteImage();
    }
    
    if ($imageName) {
      $this->image = $imageName;
    }
  }

  public function save() {
    if( !is_null($this->id) ) {
      $this->update();
    } else {
      $this->create();
    }
  }
  
  private function create(): void {
    $attributes = $this->sanitizeAttributes();

    $query = "INSERT INTO ". static::$table . "(";
    $query .= join(", ", array_keys($attributes));
    $query .= ") VALUES (' ";
    $query .= join("', '", array_values($attributes));
    $query .= " ')";

    $result = self::$db->query($query);
    if($result) {
      header('Location: /admin?success=200');
    }
  }

  private function update(): void {
    $attributes = $this->sanitizeAttributes();
    $values = [];

    foreach($attributes as $key => $value) {
      $values[] = "$key = '$value'";
    }

    $query = "UPDATE " . static::$table . " SET ";
    $query.= join(', ', $values);
    $query.= " WHERE id = " . self::$db->escape_string($this->id);
    $query.= " LIMIT 1";
    
    $res = self::$db->query($query);
    
    if($res) {
      header('Location: /admin?success=201');
    }
  }
  
  
  /**Read all items **/
  /*
  * The special keyword SELF only allows access to properties in the same class
  * The special keyword STATIC allows access to the properties of an inherited class
  */
  public static function all(): array {
    $query = "SELECT * FROM " . static::$table;
    $result = self::readSQL($query);
    
    return $result;
  }
  
  /* Search a item by id */
  public static function find($id): object {
    $query = "SELECT * FROM " . static::$table . " WHERE id = $id";
    $result = self::readSQL($query);
    return array_shift($result);
  }

  public static function get($quantity):array {
    $query = "SELECT * FROM " . static::$table . " LIMIT " . $quantity;
    $result = self:: readSQL($query);
    
    return $result;
  }

  public function delete() {
    $query = "DELETE FROM " . static::$table . " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1";
    $res = self::$db->query($query);
    
    if ($res) {
      $this->deleteImage();
      header('Location: /admin?success=202');
    }
  }
  
  private function deleteImage() {
    $isFile = file_exists(IMAGE_FILE . $this->image);
    
    if($isFile) {
      unlink(IMAGE_FILE . $this->image);
    }    
  }
  
  protected static function readSQL($query): array {
    // Read database
    $result = self::$db->query($query);
    
    // Iterate the values
    $values = [];
    while($record = $result->fetch_assoc()) {
      $values[] = static::createObject($record);
    }

    // Free Memory
    $result->free();

    // return the values
    return $values;
  }

  protected static function createObject($record): object {
    $object = new static;
    foreach($record as $key => $value) {
      if(property_exists($object, $key)) {
        $object->$key = $value;
      }
    }
    return $object;
  }

  private function attributes(): array {
    $attributes = [];

    foreach (static::$columnsDb as $column) {
      if($column === 'id') continue;
      $attributes[$column] = $this->$column;
    }

    return $attributes;
  }

  private function sanitizeAttributes(): array {
    $attributes = $this->attributes();
    $sanitized = [];
    
    foreach ($attributes as $key => $value) {
      $sanitized[$key] = self::$db->escape_string($value);
    }
    
    return $sanitized;
  }

  public static function getErrors(): array {
    return static::$errors;
  }

  public function validateValues(): array {
    static::$errors = [];
    return static::$errors;
  }

  public function sync($args = []) {
    foreach($args as $key => $value) {
      if(property_exists($this, $key) && !is_null($value)){
        $this->$key = $value;
      }
    }
  }
}
