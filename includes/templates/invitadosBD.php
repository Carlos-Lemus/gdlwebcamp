<section class="seccion contenedor">

    <h2>Nuestros Invitados</h2>

    <?php 
        try {

            require_once("includes/funciones/conexion.php");
            $sql = "SELECT * FROM invitados ";
            
            $resultado = $conn->query($sql);

        } catch(\Exception $exception) {
            echo $exception->getMessage();
        }
    ?>
        <section class="invitados contenedor seccion">
            <ul class="lista-invitados">

                <?php 
                    while($invitados = $resultado->fetch_assoc()) { ?>
                            <li>
                                <a class="invitado-info" href="#invitado<?php echo $invitados['id_invitado']; ?>">
                                    <div class="invitado">
                                        <img src="img/<?php echo $invitados["url_imagen"]; ?>" alt="imagen invitado">
                                        <p><?php echo $invitados["nombre_invitado"]." ".$invitados["apellido_invitado"]; ?></p>
                                    </div>
                                </a>
                            </li>

                            <div class="container-invitado-info">
                                <div class="invitado-info" id="invitado<?php echo $invitados['id_invitado']; ?>">
                                    <h2><?php echo $invitados["nombre_invitado"]." ".$invitados["apellido_invitado"]; ?></h2>
                                    <img src="img/<?php echo $invitados["url_imagen"]; ?>" alt="imagen invitado">
                                    <p>
                                        <?php echo $invitados["descripcion"]; ?>
                                    </p>

                                </div>
                            </div>

                <?php   
                    } 
                ?>

            </ul>

        </section>

    <?php 
        $conn->close();
    ?>
    
</section>