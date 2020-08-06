  <?php include_once("includes/templates/header.php") ?>

  <section class="seccion contenedor">
    <h2>La mejor conferencia en español</h2>
    <p>
      Praesent et nulla magna. Maecenas laoreet mi in risus pellentesque, ut imperdiet sem posuere. Aenean purus sem,
      finibus ut purus in, scelerisque dignissim massa. Sed vulputate nisl eget sodales scelerisque. Donec non massa
      eget odio sagittis pharetra id nec urna. Aliquam vel velit quam odio sagittis pharetra id nec urna.
    </p>
  </section>

  <section class="programa">

    <div class="contenedor-video">
      <video loop autoplay poster="img/bg-talleres.jpg">
        <source src="video/video.mp4" type="video/mp4">
        <source src="video/video.webm" type="video/webm" type="video/webm">
        <source src="video/video.ogv" type="video/ogv">
      </video>
    </div>

    <div class="contenido-programa">
      <div class="contenedor">
        <div class="programa-evento">

          <h2>Programa del evento</h2>

          <nav class="menu-programa">
            <a href="#talleres"><i class="fas fa-code" aria-hidden="true"></i> Talleres</a>
            <a href="#conferencias"><i class="fas fa-comment" aria-hidden="true"></i> Conferencias</a>
            <a href="#seminarios"><i class="fas fa-university" aria-hidden="true"></i> Seminarios</a>
          </nav>

          <div id="talleres" class="info-curso ocultar clearfix">
            <div class="detalle-evento">
              <h3>HTML5, CSS3, JavaScript</h3>
              <p><i class="fas fa-clock" aria-hidden="true"></i> 16:00 hrs</p>
              <p><i class="fas fa-calendar" aria-hidden="true"></i> 10 de Dic</p>
              <p><i class="fas fa-user" aria-hidden="true"></i> Pedro Alvarado</p>
            </div>

            <div class="detalle-evento">
              <h3>Responsive Web Design</h3>
              <p><i class="fas fa-clock" aria-hidden="true"></i> 20:00 hrs</p>
              <p><i class="fas fa-calendar" aria-hidden="true"></i> 10 de Dic</p>
              <p><i class="fas fa-user" aria-hidden="true"></i> Luis Torres</p>
            </div>
            <a href="#" class="button float-right">Ver todas</a>

          </div>

          <div id="conferencias" class="info-curso ocultar clearfix">
            <div class="detalle-evento">
              <h3>Como ser freelance</h3>
              <p><i class="fas fa-clock" aria-hidden="true"></i> 10:00 hrs</p>
              <p><i class="fas fa-calendar" aria-hidden="true"></i> 10 de Dic</p>
              <p><i class="fas fa-user" aria-hidden="true"></i> Gregorio Sanchez</p>
            </div>

            <div class="detalle-evento">
              <h3>Tecnologias del futuro</h3>
              <p><i class="fas fa-clock" aria-hidden="true"></i> 17:00 hrs</p>
              <p><i class="fas fa-calendar" aria-hidden="true"></i> 10 de Dic</p>
              <p><i class="fas fa-user" aria-hidden="true"></i> Susan Sanchez</p>
            </div>
            <a href="#" class="button float-right">Ver todas</a>

          </div>

          <div id="seminarios" class="info-curso ocultar clearfix">
            <div class="detalle-evento">
              <h3>Diseño UI/UX para moviles</h3>
              <p><i class="fas fa-clock" aria-hidden="true"></i> 17:00 hrs</p>
              <p><i class="fas fa-calendar" aria-hidden="true"></i> 11 de Dic</p>
              <p><i class="fas fa-user" aria-hidden="true"></i> Harold Garcia</p>
            </div>

            <div class="detalle-evento">
              <h3>Aprender a programar</h3>
              <p><i class="fas fa-clock" aria-hidden="true"></i> 10:00 hrs</p>
              <p><i class="fas fa-calendar" aria-hidden="true"></i> 11 de Dic</p>
              <p><i class="fas fa-user" aria-hidden="true"></i> Susan Rivera</p>
            </div>
            <a href="#" class="button float-right">Ver todas</a>

          </div>

        </div>
      </div>

  </section>

  <section class="invitados contenedor seccion">
    <h2>Nuestros Invitados</h2>

    <ul class="lista-invitados">
      <li>
        <div class="invitado">
          <img src="img/invitado1.jpg" alt="imagen invitado">
          <p>Rafael Bautista</p>
        </div>
      </li>
      <li>
        <div class="invitado">
          <img src="img/invitado2.jpg" alt="imagen invitado">
          <p>Carme Sanchez</p>
        </div>

      </li>
      <li>
        <div class="invitado">
          <img src="img/invitado3.jpg" alt="imagen invitado">
          <p>Gregorio Herrera</p>
        </div>

      </li>
      <li>
        <div class="invitado">
          <img src="img/invitado4.jpg" alt="imagen invitado">
          <p>Susana Rivera</p>
        </div>

      </li>
      <li>
        <div class="invitado">
          <img src="img/invitado5.jpg" alt="imagen invitado">
          <p>Harold Garcia</p>
        </div>

      </li>
      <li>
        <div class="invitado">
          <img src="img/invitado6.jpg" alt="imagen invitado">
          <p>Susan Sanchez</p>
        </div>

      </li>
    </ul>

  </section>

  <div class="contador parallax">
    <div class="contenedor">
      <ul class="resumen-evento">

        <li>
          <p class="numero"></p> Invitados
        </li>
        <li>
          <p class="numero"></p> Talleres
        </li>
        <li>
          <p class="numero"></p> Dias
        </li>
        <li>
          <p class="numero"></p> Conferencias
        </li>

      </ul>
    </div>
  </div>

  <section class="seccion precios">
    <h2>Precios</h2>
    <div class="contenedor">
      <ul class="lista-precios">

        <li>
          <div class="tabla-precio">
            <h3>Pase por dia</h3>
            <p class="numero">$10</p>
            <ul>
              <li><i class="fas fa-check"></i> Bocadillos gratis</li>
              <li>Todas las conferencias</li>
              <li>Todos los talleres</li>
            </ul>
            <a href="#" class="button hollow">Comprar</a>
          </div>
        </li>

        <li>
          <div class="tabla-precio">
            <h3>Pase por todos los dias</h3>
            <p class="numero">$50</p>
            <ul>
              <li><i class="fas fa-check"></i> Bocadillos gratis</li>
              <li><i class="fas fa-check"></i> Todas las conferencias</li>
              <li><i class="fas fa-check"></i> Todos los talleres</li>
            </ul>
            <a href="#" class="button">Comprar</a>
          </div>
        </li>

        <li>
          <div class="tabla-precio">
            <h3>Pase por dos dias</h3>
            <p class="numero">$30</p>
            <ul>
              <li><i class="fas fa-check"></i> Bocadillos gratis</li>
              <li><i class="fas fa-check"></i> Todas las conferencias</li>
              <li>Todos los talleres</li>
            </ul>
            <a href="#" class="button hollow">Comprar</a>
          </div>
        </li>

      </ul>
    </div>
  </section>

  <div id="mapa" class="mapa"></div>

  <section class="seccion">
    <h2>Testimoniales</h2>

    <div class="contenedor testimoniales">

      <div class="testimonial">
        <blockquote>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sagittis quam id leo molestie vulputate.
            Mauris magna nulla, blandit vitae enim vel, finibus euismod erat. Sed sit amet libero quam.
          </p>

          <footer class="info-testimonial">
            <img src="img/testimonial.jpg" alt="imagen testimonial">

            <cite>
              Oswaldo Esponte Escobedo <span>Desarrollador @primas</span>
            </cite>

          </footer>
        </blockquote>
      </div>

      <div class="testimonial">
        <blockquote>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sagittis quam id leo molestie vulputate.
            Mauris magna nulla, blandit vitae enim vel, finibus euismod erat. Sed sit amet libero quam.
          </p>

          <footer class="info-testimonial">
            <img src="img/testimonial.jpg" alt="imagen testimonial">

            <cite>
              Oswaldo Esponte Escobedo <span>Desarrollador @primas</span>
            </cite>

          </footer>
        </blockquote>
      </div>

      <div class="testimonial">
        <blockquote>
          <p>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean sagittis quam id leo molestie vulputate.
            Mauris magna nulla, blandit vitae enim vel, finibus euismod erat. Sed sit amet libero quam.
          </p>

          <footer class="info-testimonial">
            <img src="img/testimonial.jpg" alt="imagen testimonial">

            <cite>
              Oswaldo Esponte Escobedo <span>Desarrollador @primas</span>
            </cite>

          </footer>
        </blockquote>
      </div>

    </div>

  </section>

  <div class="newsletter parallax">
    <div class="contenido contenedor">
      <p>Registrate al newsletter</p>
      <h3>GdlWebCamp</h3>
      <a href="#" class="button transparent">Registro</a>
    </div>
  </div>

  <section class="seccion">
    <h2>Faltan</h2>

    <div class="cuenta-regresiva">
      <ul>
        <li>
          <p id="dias" class="numero"></p> dias
        </li>
        <li>
          <p id="horas" class="numero"></p> horas
        </li>
        <li>
          <p id="minutos" class="numero"></p> minutos
        </li>
        <li>
          <p id="segundos" class="numero"></p> segundos
        </li>
      </ul>
    </div>

  </section>

  <?php include_once("includes/templates/footer.php") ?>
  
</body>

</html>