<main class="container section">
  <h1>Administrador de Bienes Raices</h1>
  <?php
    if ($success) {
      
      $message = showNotification(intval($success)); 
      if ($message): 
        ?> 
    <p class="alert success">  <?php echo sanitize($message); ?></p>  
      <?php endif; } ?>
  <h2>Propiedades</h2>
  <a href="/propiedades/crear" class="btn btn-green">Nueva Propiedad</a>
  <a href="/vendedores/crear" class="btn btn-yellow-inlineblock">Nuevo(a) Vendedor</a>
  <table class="properties-table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Titulo</th>
        <th>Imagen</th>
        <th>Precio</th>
        <th>Acciones</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach($properties as $property): ?>
        <tr>
          <td>
            <?php echo $property->id; ?>
          </td>
          <td>
          <?php echo $property->title; ?>
          </td>
          <td>
            <img src="/images/<?php echo $property->image; ?>" alt="Imagen de la propiedad">
          </td>
          <td>
            $ <?php echo number_format($property->price, 2); ?>
          </td>
          <td>
            <a href="propiedades/actualizar?id=<?php echo $property->id; ?>" class="btn btn-yellow-block">Actualizar</a>
            <form method="POST" action="propiedades/eliminar">
              <input type="hidden" name="id" value="<?php echo $property->id; ?>">
              <input type="hidden" name="typeValue" value="property">
              <input type="submit" value="Eliminar" class="btn btn-red-block w-100">
            </form>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
  <h2>Vendedores</h2>
    <table class="properties-table">
      <thead>
        <tr>
          <th>ID</th>
          <th>Nombre</th>
          <th>Telefono</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($sellers as $seller): ?>
          <tr>
            <td>
              <?php echo $seller->id; ?>
            </td>
            <td>
              <?php echo $seller->name . ' ' . $seller->lastname; ?>
            </td>
            <td>
              <?php echo $seller->phone; ?>
            </td>
            <td>
              <a href="vendedores/actualizar?id=<?php echo $seller->id; ?>" class="btn btn-yellow-block">Actualizar</a>
              <form method="POST" action="vendedores/eliminar">
                <input type="hidden" name="id" value="<?php echo $seller->id; ?>">
                <input type="hidden" name="typeValue" value="seller">
                <input type="submit" value="Eliminar" class="btn btn-red-block w-100">
              </form>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
</main>