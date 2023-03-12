  <main class="container section">
    <?php include 'aboutUsIcons.php'; ?>
  </main>
  <section class="section container">
    <h2>Casas y Depas en venta</h2>
    <?php 
      include 'listProperties.php';
    ?>
    <div class="align-right">
      <a href="/propiedad" class="btn-green">Ver Todas</a>
    </div>
  </section>
  <section class="contact-section">
    <h2>Encuentra la casa de tus suenos</h2>
    <p>Llena el formulario de contacto y un asesor se pondra en contacto contigo a la brevedad</p>
    <a href="contacto.php" class="btn-yellow-inlineblock">Contactanos</a>
  </section>
  <div class="container section lower-section">
    <section class="blog">
      <h3>Nuestro Blog</h3>
      <article class="blog-post">
        <div class="blog-image">
          <picture>
            <source srcset="build/img/blog1.webp" type="image/webp">
            <source srcset="build/img/blog1.jpg" type="image/jpeg">
            <img src="build/img/blog1.jpg" alt="Texto entrada Blog">
          </picture>
        </div>
        <div class="post-text">
          <a href="entrada.html">
            <h4>Terraza en el techo de tu casa</h4>
            <p class="info-meta">Escrito el: <span>01/01/2023</span> por: <span>Admin</span></p>
            <p>Consejos para construir una terraza en el techo de tu casa con los mejores materiales y ahorrando dinero</p>
          </a>
        </div>
      </article>
      <article class="blog-post">
        <div class="blog-image">
          <picture>
            <source srcset="build/img/blog2.webp" type="image/webp">
            <source srcset="build/img/blog2.jpg" type="image/jpeg">
            <img src="build/img/blog2.jpg" alt="Texto entrada Blog">
          </picture>
        </div>
        <div class="post-text">
          <a href="entrada.php">
            <h4>Guia para la decoracion de tu hogar</h4>
            <p class="info-meta">Escrito el: <span>01/01/2023</span> por: <span>Admin</span></p>
            <p>Maximiza el espacio de tu hogar con esta guia, aprende a combinar muebles y colores para darle vida a tu espacio</p>
          </a>
        </div>
      </article>
    </section>
    <section class="testimonials">
      <h3>Testimoniales</h3>
      <div class="testimonial">
        <blockquote>
          El personal se comporto de excelente forma, muy buena atencion y la casa que me ofrecieron cumple con todas mis espectativas.
        </blockquote>
        <p>- Efren Anastacio</p>
      </div>
    </section>
  </div>