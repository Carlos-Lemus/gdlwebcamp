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
                <h3 class="card-title">Maneja los invitado en esta sección</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="registros" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombre Invitado</th>
                    <th>Apellido invitado</th>
                    <th>Descripcion</th>
                    <th>Imagen invitado</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                        try {
            
                            require_once("funciones/funciones.php"); 
                
                            $sql = "SELECT * FROM invitados";

                
                                $resultado = $conn->query($sql);
                                
                                while($invitado = $resultado->fetch_assoc()) {

                                ?>
                                    <tr>
                                        <td><?php echo $invitado["nombre_invitado"]; ?></td>
                                        <td><?php echo $invitado["apellido_invitado"]; ?></td>
                                        <td><?php echo $invitado["descripcion"]; ?></td>
                                        <td>
                                          <img src="../img/invitados/<?php echo $invitado['url_imagen']; ?>" alt="imagen" width="100px" height="100px">
                                        </td>
                                        <td>
                                            <a href="editar-invitado.php?id=<?php echo $invitado['id_invitado']; ?>" class="btn btn-flat bg-orange margin">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <a href="#" data-tipo="invitado" data-id="<?php echo $invitado['id_invitado']; ?>" class="btn btn-flat bg-maroon margin borrar_registro">
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
                   <th>Nombre Invitado</th>
                    <th>Apellido invitado</th>
                    <th>Descripcion</th>
                    <th>Imagen invitado</th>
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

 