<?php
namespace Controllers;

use MVC\Router;
use Model\Seller;

class SellerController {

  public static function create (Router $router): void {
    $seller = new Seller;
    $errors = $seller::getErrors();
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $seller = new Seller($_POST['seller']);
      $errors = $seller->validateValues();
      if (empty($errors)) {
        $seller->save();
      }
    }

    $router->render('/sellers/create', ['seller' => $seller, 'errors' => $errors]);
  }

  public static function update (Router $router) {
    $id = validateParams('/admin');
    $seller = Seller::find($id);
    $errors = $seller::getErrors();
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $args = $_POST['seller'];

      $seller->sync($args);
      $errors = $seller->validateValues();

      if (empty($errors)) {
        $seller->save();
      }
    }

    $router->render('/sellers/update', ['seller' => $seller, 'errors' => $errors]);
  }

  public static function delete() {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      
      $id = $_POST['id'];
      $id =  filter_var($id, FILTER_VALIDATE_INT);
      if($id) {
        $type = $_POST['typeValue'];
        
        if (validateTypeContent($type)) {
          $seller = Seller::find($id);
          $seller->delete();
        }
      }
    }
  }
}
