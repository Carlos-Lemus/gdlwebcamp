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
            <h1>Crear Evento</h1>
            <small>Llena el formulario para crear un nuevo evento</small>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Nuevo Evento</h3>
        </div>
        <div class="card-body">

        <div class="row">
            <div class="col-md-8">
              
              <div class="card card-primary">
                <!-- form start -->
                <form role="form" name="guardar_registro" id="guardar_registro" method="post" action="modelo-evento.php">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="titulo_evento">Titulo Evento</label>
                      <input type="text" id="nombre" name="nombre" class="form-control" id="titulo_evento" name="titulo_evento" placeholder="Titulo Evento">
                    </div>
                    <!-- Date -->
                    <div class="form-group">
                    <label>Fecha Evento: </label>
                      <div class="input-group date" id="reservationdate" data-target-input="nearest">
                          <input type="text" id="fecha" name="fecha" class="form-control datetimepicker-input" data-target="#reservationdate">
                          <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                              <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                          </div>
                      </div>
                  </div>
                  <!-- time Picker -->
                  <div class="bootstrap-timepicker">
                    <div class="form-group">
                      <label>Hora picker:</label>

                      <div class="input-group date" id="timepicker" data-target-input="nearest">
                        <input type="text" id="hora" name="hora" class="form-control datetimepicker-input" data-target="#timepicker"/>
                        <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                            <div class="input-group-text"><i class="far fa-clock"></i></div>
                        </div>
                        </div>
                      <!-- /.input group -->
                    </div>
                    <!-- /.form group -->
                  </div>
                    <div class="form-group">
                      <label for="categoria_evento">Categoria Evento:</label>
                      <select name="categoria_evento" id="categoria_evento" class="form-control">
                        <option value="0">- Seleccione -</option>
                        <?php 
                          try {

                            $sql = "SELECT * FROM categoria_eventos";

                            $resultado = $conn->query($sql);

                            while($categoria = $resultado->fetch_assoc()) {

                            ?>
                              <option value="<?php echo $categoria["id_categoria"]; ?>">
                                <?php echo $categoria["categoria_evento"]; ?>
                              </option>
                          <?php

                            }

                          } catch(Exception $ex) {
                            echo $ex->getMessage();
                          }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="invitado">Invitado o Ponente:</label>
                      <select name="invitado" id="invitado" class="form-control">
                        <option value="0">- Seleccione -</option>
                        <?php 
                          try {

                            $sql = "SELECT id_invitado, nombre_invitado, apellido_invitado FROM invitados";

                            $resultado = $conn->query($sql);

                            while($invitado = $resultado->fetch_assoc()) {

                            ?>
                              <option value="<?php echo $invitado["id_invitado"]; ?>">
                                <?php echo $invitado["nombre_invitado"]." ".$invitado["apellido_invitado"]; ?>
                              </option>
                          <?php

                            }

                          } catch(Exception $ex) {
                            echo $ex->getMessage();
                          }
                        ?>
                      </select>
                    </div>
                  <!-- /.card-body -->

                  <div class="card-footer">
                    <input type="hidden" name="registro" value="nuevo">
                    <button type="submit" class="btn btn-primary">Añadir</button>
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

 