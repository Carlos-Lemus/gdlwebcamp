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
            <h1>Categoria</h1>
            <small>Llena el formulario para actualizar una categoria</small>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <?php 
            try {

                $id = $_GET["id"];
                if(!filter_var($id, FILTER_VALIDATE_INT)) {
                    die("ERROR!");
                }

                $sql = "SELECT * FROM categoria_eventos WHERE id_categoria = $id";

                $resultado = $conn->query($sql);

                $categoria = $resultado->fetch_assoc();

            } catch (Exception $ex) {
                echo $ex->getMessage();
            }
        ?>

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Editar Categoria</h3>
        </div>
        <div class="card-body">

        <div class="row">
            <div class="col-md-8">
              
              <div class="card card-primary">
                <!-- form start -->
                <form role="form" name="guardar_registro" id="guardar_registro" method="post" action="modelo-categorias.php">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="nombre">Nombre Categoria:</label>
                      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la categoria" value="<?php echo $categoria["categoria_evento"]; ?>">
                    </div>
                    <div class="form-group">
                      <label for="icono">Icono Categoria:</label>
                      
                      <div class="input-group">
                        <input type="text" id="icono" name="icono" class="form-control" placeholder="fa-icon" value="<?php echo $categoria["icono"]; ?>">
                      </div>
                    </div>

                  <!-- /.card-body -->

                  <div class="card-footer">
                    <input type="hidden" name="registro" value="actualizar">
                    <input type="hidden" name="id_registro" value="<?php echo $categoria["id_categoria"]; ?>">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                  </div>
                </form>
              </div>

            </div>
          </div>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php 
    include "templates/footer.php";
  ?>

 