<?php
	// Guarda todo el contenido a un archivo
	$fp = fopen($archivoCache, 'w');
	fwrite($fp, ob_get_contents());
	fclose($fp);
	// Enviar al navegador
	ob_end_flush();
?>


<footer class="footer-site">
    <div class="contenedor">
      <div class="footer-informacion">
        <h3>Sobre <span>GdlWebCamp</span></h3>
        <p>
          Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dapibus libero et metus fermentum
          dapibus. Vivamus facilisis, justo a posuere aliquet, nunc diam pharetra odio, eget ultricies sem tellus vitae
          dui. Praesent eu arcu quis dolor rutrum ultricies at nec velit. Maecenas odio leo, auctor et risus at,
          facilisis hendrerit felis. Suspendisse mollis hendrerit rhoncus. Etiam placerat pulvinar posuere. Maecenas
          finibus mi sed justo dictum porta. Curabitur id cursus est.
        </p>
      </div>

      <div class="ultimos-tweets">
        <h3>Ultimos <span>tweets</span></h3>
        <ul>
          <li>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dapibus libero et metus fermentum
            dapibus. Vivamus facilisis
          </li>
          <li>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dapibus libero et met
          <li>
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse dapibus libero et met
        </ul>
      </div>

      <div class="menu">
        <h3>Redes <span>sociales</span></h3>

        <nav class="redes-sociales">
          <a href="#"><i class="fab fa-facebook-square"></i></a>
          <a href="#"><i class="fab fa-twitter-square"></i></a>
          <a href="#"><i class="fab fa-pinterest-square"></i></a>
          <a href="#"><i class="fab fa-youtube-square"></i></a>
          <a href="#"><i class="fab fa-instagram-square"></i></a>
        </nav>

      </div>
    </div>

    <p class="copyright">
      Todos los derechos reservados GDLWWEBCAMP 2020.
    </p>

  </footer>

  <script src="js/vendor/modernizr-3.8.0.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
  <script>window.jQuery || document.write('<script src="js/vendor/jquery-3.4.1.min.js"><\/script>')</script>
  <script src="js/plugins.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js"></script>

  <?php 
    $archivo = basename($_SERVER["PHP_SELF"]); //obtengo el archivo en donde estoy
    $pagina = str_replace(".php", "", $archivo);

    if($pagina == "invitados" || $pagina == "index") {
      echo '<script src="js/jquery.colorbox-min.js"></script>';
    }
    else if($pagina == "conferencias") {
      echo '<script src="js/lightbox.js"></script>';
    }

  ?>

  <script src="js/main.js"></script>

  <!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
  <script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('set', 'transport', 'beacon'); ga('send', 'pageview')
  </script>
  <script src="https://www.google-analytics.com/analytics.js" async></script>