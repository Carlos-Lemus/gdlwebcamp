<?php
    // Definir un nombre para cachear
    $archivo = basename($_SERVER['PHP_SELF']);
    $pagina = str_replace(".php", "", $archivo);

    // Definir archivo para cachear (puede ser .php también)
	$archivoCache = 'cache/'.$pagina.'.html';
	// Cuanto tiempo deberá estar este archivo almacenado
	$tiempo = 36000;
	// Checar que el archivo exista, el tiempo sea el adecuado y muestralo
	if (file_exists($archivoCache) && time() - $tiempo < filemtime($archivoCache)) {
   	include($archivoCache);
    	exit;
	}
	// Si el archivo no existe, o el tiempo de cacheo ya se venció genera uno nuevo
	ob_start();
?>

<!doctype html>
<html class="no-js" lang="es">

<head>
  <meta charset="utf-8">
  <title>GdlWebCamp</title>
  <meta name="description" content="GdlWebCamp conferencias talleres virtuales">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="theme-color" content="#fafafa">

  <link rel="manifest" href="site.webmanifest">
  <link rel="apple-touch-icon" href="icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="css/normalize.css">
  <link rel="stylesheet" href="css/all.min.css">
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&family=Oswald:wght@200&family=PT+Sans&display=swap"
    rel="stylesheet">
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" />

  <?php 
    $archivo = basename($_SERVER["PHP_SELF"]); //obtengo el archivo en donde estoy
    $pagina = str_replace(".php", "", $archivo);

    if($pagina == "invitados" || $pagina == "index") {
      echo '<link rel="stylesheet" href="css/colorbox.css">';
    }
    else if($pagina == "conferencias") {
      echo '<link rel="stylesheet" href="css/lightbox.css">';
    }

  ?>
  
  <link rel="stylesheet" href="css/main.css">

</head>

<body class="<?php echo $pagina; ?>">
  <!--[if IE]>
    <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
  <![endif]-->


  <header class="site-header">

    <div class="hero">
      <div class="contenido-header">
        <nav class="redes-sociales">
          <a href="#"><i class="fab fa-facebook-square"></i></a>
          <a href="#"><i class="fab fa-twitter-square"></i></a>
          <a href="#"><i class="fab fa-pinterest-square"></i></a>
          <a href="#"><i class="fab fa-youtube-square"></i></a>
          <a href="#"><i class="fab fa-instagram-square"></i></a>
        </nav>

        <div class="informacion-evento">
          <div class="datos-evento">
            <p class="fecha">
              <i class="fas fa-calendar-alt"></i> 10-12 Dic
            </p>
            <p class="ciudad">
              <i class="fas fa-map-marker-alt"></i> San Miguel, El Salvador
            </p>
          </div>
          <h1 class="nombre-sitio">
            GdlWebCamp
          </h1>
          <p class="slogan">La mejor conferencia de <span>diseño web</span></p>
        </div>
      </div>
    </div>

  </header>

  <div class="barra">
    <div class="contenedor clearfix">
      <div class="logo">
        <a href="index.php">
            <img src="img/logo.svg" alt="Imagen logo">
        </a>
      </div>

      <div class="menu-movil">
        <span></span>
        <span></span>
        <span></span>
      </div>

      <nav class="navegacion-principal">
        <a href="conferencias.php">Conferencia</a>
        <a href="calendario.php">Calendario</a>
        <a href="invitados.php">Invitados</a>
        <a href="registro.php">Reservaciones</a>
      </nav>
    </div>
  </div>