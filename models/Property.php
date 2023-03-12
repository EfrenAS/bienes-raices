<?php

namespace Model;

class Property extends ActiveRecord {
  protected static $table = 'properties';
  protected static $columnsDb = ['id', 'title', 'price' , 'image','description', 'bedrooms', 'wc', 'parking', 'created_at', 'updated_at', 'sellers_id'];

  public $id;
  public $title;
  public $price;
  public $description;
  public $bedrooms;
  public $wc;
  public $parking;  
  public $sellers_id;
  public $image;
  public $created_at;
  public $updated_at;

  public function __construct($args = []) {
    $this->id = $args['id'] ?? null;
    $this->title = $args['title'] ?? '';
    $this->price = $args['price'] ?? '';
    $this->description = $args['description'] ?? '';
    $this->bedrooms = $args['bedrooms'] ?? '';
    $this->wc = $args['wc'] ?? '';
    $this->parking = $args['parking'] ?? '';
    $this->sellers_id = $args['sellerId'] ?? '';
    $this->image = $args['image'] ?? '';
    $this->created_at = date('Y-m-d H:m:s') ?? '';
    $this->updated_at = date('Y-m-d H:m:s') ?? '';
  }

  public function validateValues(): array {
    if (!$this->title) {
      self::$errors[] = 'El titulo de la propiedad es obligatorio';
    }
    if (!$this->price) {
      self::$errors[] = 'El precio de la propiedad es obligatorio';
    }
    if (strlen($this->description) < 50 ) {
      self::$errors[] = 'La descripcion de la propiedad es obligatoria y debe de ser minimo de 50 caracteres';
    }
    if (!$this->bedrooms) {
      self::$errors[] = 'El numero de dormitorios es obligatorio';
    }
    if (!$this->wc) {
      self::$errors[] = 'El numero de banos es obligatorio';
    }
    if (!$this->parking) {
      self::$errors[] = 'El numero de estacionamientos es obligatorio';
    }
    if (!$this->sellers_id) {
      self::$errors[] = 'El vendedor de la propiedad es obligatorio';
    }
    if (!$this->image) {
      self::$errors[] = 'La imagen es mandatoria';
    }
    return self::$errors;
  }
}
