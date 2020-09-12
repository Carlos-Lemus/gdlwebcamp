<?php include "funciones/sesiones.php"; ?>
<?php include "funciones/funciones.php"; ?>
<?php include "templates/header.php"; ?>

<?php 
    $id = $_GET["id"];
    if(!filter_var($id, FILTER_VALIDATE_INT)) {
        die("ERROR!");
    }
?>

<?php include "templates/barra.php" ?>
<?php include "templates/navegacion.php"; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Editar el Administrador</h1>
            <small>Modifica los datos del Administrador</small>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <?php 
        try {

            $sql = "SELECT * FROM admins WHERE id_admin = $id";

            $resultado = $conn->query($sql);

            $admin = $resultado->fetch_assoc();

        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    ?>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Editar Administrador</h3>
        </div>
        <div class="card-body">

        <div class="row">
            <div class="col-md-8">
              
              <div class="card card-primary">
                <!-- form start -->
                <form role="form" name="guardar_registro" id="guardar_registro" method="post" action="modelo_admin.php">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="usuario">Usuario:</label>
                      <input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" value="<?php echo $admin["usuario"]; ?>">
                    </div>
                    <div class="form-group">
                      <label for="nombre">Nombre:</label>
                      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Tu nombre" value="<?php echo $admin["nombre"]; ?>">
                    </div>
                    <div class="form-group">
                      <label for="password">Password:</label>
                      <input type="password" class="form-control" id="password" name="password" placeholder="Password para iniciar sesion">
                    </div>
                  </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                  <input type="hidden" name="registro" value="actualizar">
                  <input type="hidden" name="id_registro" value="<?php echo $admin["id_admin"]; ?>">
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

 