<main class="container section">
  <h1>Actualizar Propiedad</h1>
  <a href="/admin" class="btn btn-green">Regresar</a>
  <?php foreach($errors as $error): ?>
    <div class="alert error">
      <?php echo $error; ?>
    </div>
  <?php endforeach;?>
  <form class="contact-form" method="POST" enctype="multipart/form-data">
    <?php include __DIR__ . '/form.php'; ?>
    <input type="submit" value="Actualizar Propiedad" class="btn btn-green">
  </form>
</main>