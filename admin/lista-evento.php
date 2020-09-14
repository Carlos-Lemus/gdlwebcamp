<?php include "funciones/sesiones.php"; ?>
<?php include "funciones/funciones.php"; ?>
<?php include "templates/header.php"; ?>
<?php include "templates/barra.php" ?>
<?php include "templates/navegacion.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Listado de eventos</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Maneja los evento en esta sección</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="registros" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Categoria</th>
                    <th>Invitado</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                        try {
            
                            require_once("funciones/funciones.php"); 
                
                            $sql = "SELECT evento_id, nombre_evento, fecha_evento, hora_evento, categoria_evento, nombre_invitado, apellido_invitado FROM eventos";
                            $sql .= " INNER JOIN categoria_eventos";
                            $sql .= " ON eventos.id_categoria=categoria_eventos.id_categoria";
                            $sql .= " INNER JOIN invitados";
                            $sql .= " ON eventos.id_invitado=invitados.id_invitado";

                
                                $resultado = $conn->query($sql);
                                
                                while($evento = $resultado->fetch_assoc()) {

                                ?>
                                    <tr>
                                        <td><?php echo $evento["nombre_evento"]; ?></td>
                                        <td><?php echo $evento["fecha_evento"]; ?></td>
                                        <td><?php echo $evento["hora_evento"]; ?></td>
                                        <td><?php echo $evento["categoria_evento"]; ?></td>
                                        <td><?php echo $evento["nombre_invitado"]." ".$evento["apellido_invitado"]; ?></td>
                                        <td>
                                            <a href="editar-evento.php?id=<?php echo $evento['evento_id']; ?>" class="btn btn-flat bg-orange margin">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <a href="#" data-tipo="evento" data-id="<?php echo $evento['evento_id']; ?>" class="btn btn-flat bg-maroon margin borrar_registro">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php

                                }
                
                        } catch(Exception $ex) {
                            echo $ex->getMessage();
                        }
                    ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Nombre</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Categoria</th>
                    <th>Invitado</th>
                    <th>Acciones</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php 
    include "templates/footer.php";
  ?>

 