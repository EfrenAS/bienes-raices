<?php

namespace Controllers;

use Model\Property;
use Model\Seller;
use MVC\Router;
use Intervention\Image\ImageManagerStatic as Image;

class PropertyController {

  public static function index(Router $router): void {
    $success = $_GET['success'] ?? null;
    $properties = Property::all();
    $sellers = Seller::all();

    $router->render('/properties/admin', ['properties' => $properties, 'sellers' => $sellers ,'success' => $success]);
  }

  public static function create(Router $router) {

    $property = new Property;
    $sellers = Seller::all();
    $errors = Property::getErrors();
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

      $property = new Property($_POST['property']);
      
      // Set unique name for the image
      $imageName = md5( uniqid(rand()) ) . '.jpg';
      
      if ($_FILES['property']['tmp_name']['image']) {  
        //Set and resize to Image for save
        $image = Image::make($_FILES['property']['tmp_name']['image'])->fit(800, 600);
        $property->setImage($imageName);
      }
      
      $errors = $property->validateValues();
      
      if (empty($errors)) {
        
        if(!is_dir( IMAGE_FILE )) {
          mkdir( IMAGE_FILE );
        }      
        
        /** Upload Image **/
        $image->save(IMAGE_FILE . $imageName);
        $property->save();  
      }
    }

    $router->render('properties/create', ['property' => $property, 'sellers' => $sellers, 'errors' => $errors]);
  }
  
  public static function update(Router $router): void {
    
    $id = validateParams('/admin');
    $property = Property::find($id);
    $sellers = Seller::all();
    $errors = Property::getErrors();
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      
      $args = $_POST['property'];
      
      $property->sync($args);
      $errors= $property->validateValues();
      
      $imageName = md5( uniqid(rand()) ) . '.jpg';
      
      if ($_FILES['property']['tmp_name']['image']) {  
        //Set and resize to Image for save
        $image = Image::make($_FILES['property']['tmp_name']['image'])->fit(800, 600);
        $property->setImage($imageName);
      }
      
      if (empty($errors)) {
        if ($_FILES['property']['tmp_name']['image']) {
          $image->save(IMAGE_FILE . $imageName);
        }
        
        $property->save();
      }
    }
    
    $router->render('properties/update', ['property' => $property, 'sellers'=> $sellers , 'errors' => $errors]);
  }

  public static function delete(): void {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
      $id = $_POST['id'];
      $id = filter_var($id, FILTER_VALIDATE_INT);
  
      if ($id) {
        $type = $_POST['typeValue'];
  
        if(validateTypeContent($type)) {
          $property = Property::find($id);
          $property->delete();
        }
      }
    }
  }
}
