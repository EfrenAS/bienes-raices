<fieldset>
  <legend>Informacion General</legend>
  <div class="form-fields">
    <label for="title">Titulo:</label>
    <input type="text" id="title" name="property[title]" placeholder="Titulo de la Propiedad" value="<?php echo sanitize($property->title); ?>">
  </div>
  <div class="form-fields">
    <label for="price">Precio:</label>
    <input type="number" id="price" name="property[price]" placeholder="Precio de la propiedad" value="<?php echo sanitize($property->price); ?>">
  </div>
  <div class="form-fields">
    <label for="image">Imagen:</label>
    <input type="file" id="image" name="property[image]" accept="image/jpeg, image/png">
    <?php if($property->image):  ?>
      <img src="/images/<?php echo $property->image; ?>" class="image-sm" alt="imagen pequena de la propiedad">
    <?php endif; ?>
  </div>
  <div class="form-fields">
    <label for="description">Descripcion:</label>
    <textarea id="description" name="property[description]">
      <?php echo sanitize($property->description); ?>
    </textarea>
  </div>
</fieldset>
<fieldset>
  <legend>Informacion de la propiedad</legend>
  <div class="form-fields">
    <label for="bedrooms">Habitaciones:</label>
    <input type="number" id="bedrooms" name="property[bedrooms]" placeholder="Ej. 3" min="1" max="9" value="<?php echo sanitize($property->bedrooms); ?>">
  </div>
  <div class="form-fields">
    <label for="wc">Banos:</label>
    <input type="number" id="wc" name="property[wc]" placeholder="Ej. 3" min="1" max="9" value="<?php echo sanitize($property->wc); ?>">
  </div>
  <div class="form-fields">
    <label for="parking">Estacionamiento:</label>
    <input type="number" id="parking" name="property[parking]" placeholder="Ej. 3" min="1" max="9" value="<?php echo sanitize($property->parking); ?>">
  </div>
</fieldset>
<fieldset>
  <legend>Vendedor</legend>
  <div class="form-fields">
    <select name="property[sellerId]" required>
      <option value="" selected> -- Seleccione -- </option>
      <?php foreach ($sellers as $seller): ?>
        <option <?php echo $property->sellers_id === $seller->id ? 'selected' : ''; ?>  value="<?php echo sanitize($seller->id); ?>">
          <?php echo sanitize($seller->name) . ' ' . sanitize($seller->lastname); ?>
        </option>
      <?php endforeach; ?>
    </select>
  </div>
</fieldset>