<?php 
ini_set('display_errors', 1);

if (!isset($_SESSION)) {
  session_start();
}

$auth = $_SESSION['login'] ?? false;
$isHome = (isset($isHome)) ? $isHome : false;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienes Raices</title>
  <link rel="preload" href="../build/css/app.css">
  <link rel="stylesheet" href="../build/css/app.css">
</head>
<body>
  <header class="header  <?php echo $isHome ? 'home' : ''; ?>">
    <div class="container header-content">
      <div class="bar">
        <a href="/">
          <img src="../build/img/logo.svg" alt="Logo de Bienes Raices">
        </a>
        <div class="mobile-menu">
          <img src="../build/img/barras.svg" alt="icono menu responsive">
        </div>
        <div class="right-menu">
          <img src="../build/img/dark-mode.svg" alt="boton modo oscuro" class="dark-mode-btn">
          <nav class="navigation-main">
            <a href="/nosotros">Nosotros</a>
            <a href="/propiedades">Anuncios</a>
            <a href="/blog">Blog</a>
            <a href="/contacto">Contacto</a>
            <?php if ($auth): ?>
              <a href="/logout">Cerrar Sesion</a>
            <?php endif;  ?>
          </nav>
        </div><!-- .right-menu -->
      </div><!-- .bar -->
      <?php if($isHome): ?>
        <h1>Ventas de Casas y Departamentos Exclusivos de Lujo</h1>
      <?php endif; ?>
    </div>
  </header>
  
  <p><?php echo $content; ?></p>
  
  <footer class="footer section">
    <div class="container footer-container">
      <nav class="navigation-main">
        <a href="/nosotros">Nosotros</a>
        <a href="/proiedades">Anuncios</a>
        <a href="/blog">Blog</a>
        <a href="/contacto">Contacto</a>
      </nav>
    </div>
    <p class="copyright">Todos los derechos reservados <?php echo date('Y'); ?> &copy;</p>
  </footer>
  <script src="../build/js/bundle.min.js"></script>
</body>
</html>