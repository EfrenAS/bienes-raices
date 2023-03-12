<?php

namespace Controllers;

use MVC\Router;
use Model\Property;
use PHPMailer\PHPMailer\PHPMailer;

class pagesController {

  public static function index(Router $router): void {
    $properties = Property::get(3);
    $isHome = true;

    $router->render('pages/index', ['properties' => $properties, 'isHome' => $isHome]);
  }

  public static function aboutUs(Router $router): void {
    $router->render('pages/aboutUs');
  }

  public static function properties(Router $router): void {
    $properties = Property::all();

    $router->render('pages/properties', ['properties' => $properties]);
  }

  public static function property(Router $router): void {
    
    $id = validateParams('/propiedades');
    $property = Property::find($id);

    $router->render('pages/property', ['property' => $property]);
  }

  public static function blog(Router $router): void {
    $router->render('pages/blog');
  }

  public static function entry(Router $router): void {
    $router->render('pages/entry');
  }

  public static function contact( Router $router ): void {
    $message = null;
    
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      
      $contact = $_POST['contact'];

      // Config Mail Server
      $mail = new PHPMAiler();
      $mail->isSMTP();
      $mail->SMTPAuth = true;
      $mail->Host = 'sandbox.smtp.mailtrap.io';
      $mail->Username = 'c45c05fa14b0a2';
      $mail->Password = 'c67acf42aa8dd1';
      $mail->SMTPSecure = 'tls';
      $mail->Port = 2525;

      // Config mail content
      $mail->setFrom('admin@bienesraices..com');
      $mail->addAddress('admin@bienesraices.com', 'bienesraices.com');
      $mail->Subject = 'Tienes un nuevo mensaje';
      
      // Enable HTML
      $mail->isHTML(true);
      $mail->CharSet = 'UTF-8';

      // Define the content mail
      $content = '<html> <p>Tienes un nuevo mensaje</p>';
      $content .= "<p>Nombre: " . $contact['name'] ."<p>";
      
      if ($contact['contact-radio'] === 'phone') {
        $content .= "<p>Tel.:" . $contact['phone'] ."<p>";
        $content .= "<p>EL dia: " . $contact['dateToContacted'] ."<p>";
        $content .= "<p>A las : " . $contact['hourToContacted'] ."<p>";
      } else {
        $content .= "<p> Mail: " . $contact['mail'] ."<p>";
      }
      $content .= "<p>Mensaje: " . $contact['message'] ."<p>";
      $content .= "<p>Tipo: " . $contact['saleOrBuy'] ."<p>";
      $content .= "<p>Presupuesto: " . $contact['lot'] ."<p>";
      $content .= '</html>';

      $mail->Body = $content;
      $mail->AltBody = 'Contenido sin HTML';

      // Send the mail
      if ($mail->send()) {
        $message = 'Correo enviado exitosamente';
      } else {
        $message= 'El mensaje no pudo ser enviado..';
      }
    }

    $router->render('pages/contact', ['message' => $message]);
  }
}
