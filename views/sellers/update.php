<main class="container section">
    <h1>Actualizar Vendedor(a)</h1>
    <a href="/admin" class="btn btn-green">Regresar</a>
    <?php foreach($errors as $error): ?>
      <div class="alert error">
        <?php echo $error; ?>
      </div>
    <?php endforeach;?>
    <form class="contact-form" method="POST">
      <?php include __DIR__ . '/form.php'; ?>
      <input type="submit" value="Actualizar Vendedor" class="btn btn-green">
    </form>
  </main>