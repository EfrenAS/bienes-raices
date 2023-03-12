<main class="container section center-content">
  <h1> Iniciar Sesion </h1>
  <?php foreach($errors as $error): ?>
    <p class="alert error"> <?php echo $error; ?></p>
  <?php endforeach; ?>
  <form method="POST" class="contact-form" action="/login">
    <fieldset>
      <legend>email y password</legend>
      <div class="form-fields">
        <label for="mail">E-Mail:</label>
        <input type="email" name="email" id="email" placeholder="Tu Correo Electronico" required>
      </div>
      <div class="form-fields">
        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="Tu password" required>
      </div>
    </fieldset>
    <input type="submit" value="Iniciar sesion" class="button btn-green">
  </form>
</main>