<main class="container section">
  <h1><?php echo $property->title; ?></h1>
    <img loading="lazy" src="/images/<?php echo $property->image; ?>" alt="imagen anuncios">
  <div class="add-characteristics">
    <p class="price-add">$ <?php echo number_format($property->price, 2); ?></p>
    <ul class="icons-characteristics">
      <li>
        <img loading="lazy" class="add-icon" src="build/img/icono_wc.svg" alt="Imagen wc">
        <p><?php echo $property->wc; ?></p>
      </li>
      <li>
        <img loading="lazy" class="add-icon" src="build/img/icono_estacionamiento.svg" alt="Imagen estacionamiento">
        <p><?php echo $property->parking; ?></p>
      </li>
      <li>
        <img loading="lazy" class="add-icon" src="build/img/icono_dormitorio.svg" alt="Imagen dormitorio">
        <p><?php echo $property->bedrooms; ?></p>
      </li>
    </ul>
  </div>
  <div class="add-description">
    <p>
      <?php echo $property->description; ?>
    </p>
  </div>
</main>