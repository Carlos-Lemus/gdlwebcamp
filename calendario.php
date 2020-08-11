<?php include_once("includes/templates/header.php") ?>

<section class="seccion contenedor">

    <h2>Calendario de eventos</h2>

    <?php 
        try {

            require_once("includes/funciones/conexion.php");
            $sql = "SELECT {$eventoId}, {$nombreEvento}, {$fechaEvento}, {$horaEvento}, {$categoriaEvento},{$icono} , {$nombreInvitado}, {$apellidoInvitado} FROM eventos INNER JOIN categoria_eventos ON eventos.{$categoriaId} = categoria_eventos.{$categoriaId} INNER JOIN invitados ON eventos.{$invitadosId} = invitados.{$invitadosId} ORDER BY {$eventoId}";
            
            $resultado = $conn->query($sql);

        } catch(\Exception $exception) {
            echo $exception->getMessage();
        }
    ?>

<div class="calendario">        

        <?php 
            $calendario = array();

            while($eventos = $resultado->fetch_assoc()) {
                                
                $fecha = $eventos[$fechaEvento];

                $evento = array(
                    "titulo" => $eventos[$nombreEvento],
                    "fecha" => $eventos[$fechaEvento],
                    "hora" => $eventos[$horaEvento],
                    "categoria" => $eventos[$categoriaEvento],
                    "icono" => "fa ".$eventos[$icono],
                    "invitado" => $eventos[$nombreInvitado]." ".$eventos[$apellidoInvitado]

                );
                $calendario[$fecha][] = $evento;

             } 

            ?>

             <?php 
             // Imprime todo los eventos
             foreach($calendario as $dia => $lista_eventos){ ?>
                 <h3>
                     <i class="far fa-calendar-alt"></i>
                     <?php 
                         // Unix
                         setlocale(LC_TIME, 'es_ES.UTF-8');
                         // windows
                         setlocale(LC_TIME, 'spanish');
                         echo utf8_encode(strftime("%A, %d de %B del %Y", strtotime($dia)));  ?>
                 </h3>

                 <?php foreach($lista_eventos as $evento){ ?>
                     <div class="dia">
                         <p class="titulo"> <?php echo $evento['titulo'];?> </p>
                         <p class="hora"> 
                             <i class="far fa-clock" aria-hidden="true"></i> 
                             <?php echo $evento['fecha'] . " " . $evento['hora']; ?>
                         </p>
                         <p>
                             <i class="<?php echo $evento['icono'] ?>" aria-hidden="true"></i>
                             <?php echo $evento['categoria'];?></p>
                         <p>
                             <i class="fas fa-user" aria-hidden="true"></i>
                             <?php echo $evento['invitado'];?>
                         </p>
                     </div>
                 <?php } // Fin foreach eventos ?>
             <?php } //fin foreach dias ?>

    </div>

    <?php 
        $conn->close();
    ?>
    
</section>

<?php include_once("includes/templates/footer.php") ?>

</body>

</html>