<div class="adds-container">
  <?php foreach ($properties as $property): ?>
    <div class="add-cards">
        <img loading="lazy" src="/images/<?php  echo $property->image; ?>" alt="Imagen del anuncio">
      <div class="add-content">
        <h3><?php echo $property->title; ?></h3>
        <p><?php echo $property->description; ?></p>
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
        <a href="/propiedad?id=<?php echo $property->id; ?>" class="btn-yellow-block">Ver Propiedad</a>
      </div><!-- .add-content -->
    </div><!-- .add-cards -->
  <?php endforeach; ?>
</div>
