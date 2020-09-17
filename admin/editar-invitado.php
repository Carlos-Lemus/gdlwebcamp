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
            <small>Llena el formulario para actualizar una invitado</small>
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

                $sql = "SELECT * FROM invitados WHERE id_invitado = $id";

                $resultado = $conn->query($sql);

                $invitado = $resultado->fetch_assoc();

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
                <form role="form" name="guardar_registro" id="guardar_registro_archivo" method="post" action="modelo-invitado.php" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="nombre_invitado">Nombre invitado</label>
                      <input type="text" class="form-control" id="nombre_invitado" name="nombre_invitado" placeholder="Nombre del invitado" value="<?php echo $invitado["nombre_invitado"]; ?>">
                    </div>
                    <div class="form-group">
                      <label for="apellido_invitado">Apellido invitado</label>
                      <input type="text" class="form-control" id="apellido_invitado" name="apellido_invitado" placeholder="Apellido del invitado" value="<?php echo $invitado["apellido_invitado"]; ?>">
                    </div>

                    <div class="form-group">
                        <label for="descripcion">Descripcion</label>
                        <textarea class="form-control" name="descripcion_invitado" id="descripcion_invitado" cols="30"><?php echo $invitado['descripcion']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="imagen_actual">Imagen Actual</label>
                        <br>
                        <img src="../img/invitados/<?php echo $invitado['url_imagen']; ?>" alt="imagen" width="200px" height="200px">
                    </div>
                    
                    <div class="form-group">
                        <label for="archivo_imagen">Imagen</label>
                        <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" id="archivo_imagen" name="archivo_imagen">
                            <label class="custom-file-label" for="archivo_imagen">Buscar archivo</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text" id="">Subir</span>
                        </div>
                        </div>
                    </div>


                  <!-- /.card-body -->

                  <div class="card-footer">
                    <input type="hidden" name="registro" value="actualizar">
                    <input type="hidden" name="id_registro" value="<?php echo $invitado["id_invitado"]; ?>">
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

 