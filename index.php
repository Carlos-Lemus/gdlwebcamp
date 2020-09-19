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

          <?php 
            try {

                require_once("includes/funciones/conexion.php");
                $sql = "SELECT * FROM categoria_eventos";
                
                $resultado = $conn->query($sql);

            } catch(\Exception $exception) {
                echo $exception->getMessage();
            }
        ?>

          <nav class="menu-programa">
            <?php while($categoria = $resultado->fetch_array(MYSQLI_ASSOC)) {  ?>
              <a href="#<?php echo strtolower($categoria['categoria_evento']); ?>">
              <i class="fas <?php echo $categoria['icono']; ?>" aria-hidden="true"></i> <?php echo $categoria["categoria_evento"]; ?> </a>
             <?php } ?>
          </nav>

          <?php 
            try {

                require_once("includes/funciones/conexion.php");
                $sql = "SELECT {$eventoId}, {$nombreEvento}, {$fechaEvento}, {$horaEvento}, {$categoriaEvento},{$icono} , {$nombreInvitado}, {$apellidoInvitado} FROM eventos INNER JOIN categoria_eventos ON eventos.{$categoriaId} = categoria_eventos.{$categoriaId} INNER JOIN invitados ON eventos.{$invitadosId} = invitados.{$invitadosId} AND eventos.{$categoriaId} = 1 ORDER BY {$eventoId} LIMIT 2;";
                $sql .= "SELECT {$eventoId}, {$nombreEvento}, {$fechaEvento}, {$horaEvento}, {$categoriaEvento},{$icono} , {$nombreInvitado}, {$apellidoInvitado} FROM eventos INNER JOIN categoria_eventos ON eventos.{$categoriaId} = categoria_eventos.{$categoriaId} INNER JOIN invitados ON eventos.{$invitadosId} = invitados.{$invitadosId} AND eventos.{$categoriaId} = 2 ORDER BY {$eventoId} LIMIT 2;";
                $sql .= "SELECT {$eventoId}, {$nombreEvento}, {$fechaEvento}, {$horaEvento}, {$categoriaEvento},{$icono} , {$nombreInvitado}, {$apellidoInvitado} FROM eventos INNER JOIN categoria_eventos ON eventos.{$categoriaId} = categoria_eventos.{$categoriaId} INNER JOIN invitados ON eventos.{$invitadosId} = invitados.{$invitadosId} AND eventos.{$categoriaId} = 3 ORDER BY {$eventoId} LIMIT 2;";
                $resultado = $conn->multi_query($sql);

            } catch(\Exception $exception) {
                echo $exception->getMessage();
            }
          ?>

          <?php 
            do{
              // store_result transfiere un conjunto de resultados de la ultima consulta
              $resultado = $conn->store_result();
              // fetch_all adquiere todas las filas en un array asociativo o indexado
              $row = $resultado->fetch_all(MYSQLI_ASSOC);
          ?>
              <?php $i = 0; ?>
              <?php foreach($row as $evento): ?>

              <?php if($i % 2 == 0) { ?>

                <div id="<?php echo strtolower($evento['categoria_evento']); ?>" class="info-curso ocultar clearfix">
              
              <?php } ?>
      
                <div class="detalle-evento">
                  <h3><?php echo $evento["nombre_evento"]; ?></h3>
                  <p><i class="fas fa-clock" aria-hidden="true"></i> <?php echo $evento["hora_evento"]; ?></p>
                  <p><i class="fas fa-calendar" aria-hidden="true"></i> <?php echo $evento["fecha_evento"]; ?></p>
                  <p><i class="fas fa-user" aria-hidden="true"></i> <?php echo $evento["nombre_invitado"]." ".$evento["apellido_invitado"]; ?></p>
                </div>

              <?php if($i % 2 == 1) { ?>
                <a href="calendario.php" class="button float-right">Ver todas</a>
                </div>
              <?php } ?>

              <?php $i++; ?>
              <?php endforeach; ?>
              <?php $resultado->free(); // libera la memoria asociada a un resultado ?>
          <?php

            // more_results comprueba si hay mas resultados de una multiconsulta
            // next_result prepara el siguiente resultado en multiquery

            } while($conn->more_results() && $conn->next_result());
          ?>

        </div>
      </div>

  </section>

  <?php include_once("includes/templates/invitadosBD.php") ?>

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
            <a href="registro.php" class="button hollow">Comprar</a>
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
            <a href="registro.php" class="button">Comprar</a>
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
            <a href="registro.php" class="button hollow">Comprar</a>
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
      <a href="registro.php" class="button transparent">Registro</a>
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