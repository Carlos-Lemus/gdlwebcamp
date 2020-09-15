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
            <h1>Listado de Categorias</h1>
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
                <h3 class="card-title">Maneja las categorias en esta sección</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="registros" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombre Categoria</th>
                    <th>icono</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                        try {
            
                            require_once("funciones/funciones.php"); 
                
                            $sql = "SELECT id_categoria, categoria_evento, icono FROM categoria_eventos";
                            
                
                                $resultado = $conn->query($sql);
                                
                                while($categoria = $resultado->fetch_assoc()) {

                                ?>
                                    <tr>
                                        <td><?php echo $categoria["categoria_evento"]; ?></td>
                                        <td>
                                            <i class="fas <?php echo $categoria['icono']; ?>"></i>
                                        </td>
                                        <td>
                                            <a href="editar-categoria.php?id=<?php echo $categoria['id_categoria']; ?>" class="btn btn-flat bg-orange margin">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <a href="#" data-tipo="categorias" data-id="<?php echo $categoria['id_categoria']; ?>" class="btn btn-flat bg-maroon margin borrar_registro">
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
                    <th>Nombre Categoria</th>
                    <th>icono</th>
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

 