<?php include_once("includes/templates/header.php") ?>

<?php if(isset($_POST["submit"])) { ?>
        
        <?php 
            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $email = $_POST["email"];
            $regalo = $_POST["regalo"];   
            $fecha = date("Y-m-d H:i:s"); 
            $total = $_POST["total_pedido"];

            // pedidos 
            $camisas = $_POST["pedido_camisas"];
            $etiquetas = $_POST["pedido_etiquetas"];
            $boletos = $_POST["boletos"];

            include_once("includes/funciones/funciones.php");
            $pedido = productos_json($boletos, $camisas, $etiquetas);

            $eventos = $_POST["registro"];

            $registro = eventos_json($eventos);

            try {

                require_once("includes/funciones/conexion.php");
                $sql = "INSERT INTO registros(nombre_registrado, apellido_registrado, email_registrado, fecha_registro, pases_articulos, talleres_registrados, regalos, total_pagado) VALUES(?, ?, ?, ?, ?, ?, ?, ?);";

               if($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("ssssssis", $nombre, $apellido, $email ,$fecha, $pedido, $registro, $regalo, $total);
                $stmt->execute();
                $stmt->close();
                $conn->close();

                header("Location: validar_registro.php?exitoso=1");

               } else {
                    $error = $conn->errno." ".$conn->error;
                    echo $error; 
               }

            } catch(\Exception $exception) {
                echo $exception->getMessage();
            }
        ?>

<?php } ?>

<section class="seccion contenedor">

    <h2>Resumen registro</h2>

    <?php 
        if(isset($_GET["exitoso"])) {
            if($_GET["exitoso"] == "1") {
    ?>
            <h3 class="center">Se ha registrado exitosamente</h3>

    <?php 
            } 
        }
    
    ?>

</section>

<?php include_once("includes/templates/footer.php") ?>