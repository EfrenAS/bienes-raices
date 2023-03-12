<fieldset>
  <legend>Informacion General</legend>
  <div class="form-fields">
    <label for="name">Nombre:</label>
    <input type="text" id="name" name="seller[name]" placeholder="Nombre" value="<?php echo sanitize($seller->name); ?>">
  </div>
  <div class="form-fields">
    <label for="lastname">Apelllido:</label>
    <input type="text" id="lastname" name="seller[lastname]" placeholder="Apellido Materno" value="<?php echo sanitize($seller->lastname); ?>">
  </div>
</fieldset>
<fieldset>
  <legend>Informacion Extra</legend>
  <div class="form-fields">
    <label for="phone">Telefono:</label>
    <input type="phone" id="phone" name="seller[phone]" placeholder="Telefono contacto" value="<?php echo sanitize($seller->phone); ?>" >
  </div>
</fieldset>