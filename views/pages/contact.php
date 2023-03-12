<main class="container section">
  <h1>Contacto</h1>
  <?php if ($message) { ?>
    <p class="alert success"><?php echo $message ?></p>    
  <?php } ?>
  <picture>
    <source srcset="build/img/destacada3.webp" type="img/webp">
    <source srcset="build/img/destacada3.jpg" type="img/jpeg">
    <img loading="lazy" src="build/img/destacada3.jpg" alt="Imagen Contacto">
  </picture>
  <h2>Llena el formulario de contacto</h2>
  <form action="/contacto" method="post" class="contact-form">
    <fieldset>
      <legend>Informacion Personal</legend>
      <div class="form-fields">
        <label for="name">Nombre:</label>
        <input type="text" name="contact[name]" id="name" placeholder="Tu Nombre" required>
      </div>
      <div class="form-fields">
        <label for="message">Mensaje:</label>
        <textarea name="contact[message]" id="message" cols="30" rows="10" required></textarea>
      </div>
    </fieldset>
    <fieldset>
      <legend>Informacion sobre Propiedad</legend>
      <div class="form-fields">
        <label for="saleOrBuy">Vende o Compra</label>
        <select name="contact[saleOrBuy]" id="saleOrBuy" required>
          <option value="-" selected disabled>- Seleccione -</option>
          <option value="Compro">Comprar</option>
          <option value="Vendo">Vender</option>
        </select>
      </div>
      <div class="form-fields">
        <label for="lot">Cantidad:</label>
        <input type="number" name="contact[lot]" id="lot">
      </div>
    </fieldset>
    <fieldset>
      <legend>Contacto</legend>
      <p>Como desea ser contactado</p>
      <div class="form-fields contact-radio">
        <label for="byPhone">Telefono</label>
        <input type="radio" name="contact[contact-radio]" value="phone" id="byPhone">
        <label for="byMail">E-mail</label>
        <input type="radio" name="contact[contact-radio]" value="email" id="byMail">
      </div>
      <div id="contact"></div>
    </fieldset>
    <input class="btn-green" type="submit" value="Enviar">
  </form>
</main>
