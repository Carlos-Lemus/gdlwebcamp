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
            <h1>Listado de Registrados</h1>
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
                <h3 class="card-title">Maneja los registrados en esta sección</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="registros" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Fecha Registro</th>
                    <th>Articulos</th>
                    <th>Talleres</th>
                    <th>Regalo</th>
                    <th>Total Pagado</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody>
                    <?php 
                        try {
            
                            require_once("funciones/funciones.php"); 
                
                            $sql = "SELECT registros.*, regalos.nombre_regalo FROM registros";
                            $sql .= " JOIN regalos";
                            $sql .= " ON registros.regalos = regalos.ID_regalo";
                
                                $resultado = $conn->query($sql);
                                
                                while($registrado = $resultado->fetch_assoc()) {

                                ?>
                                    <tr>
                                        <td>
                                            <?php 
                                                echo $registrado["nombre_registrado"]." ".$registrado["apellido_registrado"]; 

                                                $pagado = $registrado["pagado"];

                                                if($pagado) {
                                                ?>
                                                   <span class="badge bg-green">Pagado</span>
                                                <?php 
                                                    } else {
                                                ?>
                                                  <span class="badge bg-red">No pagado</span>
                                                <?php 
                                                    }
                                                ?>
                                        </td>
                                        <td>
                                            <?php echo $registrado["email_registrado"]; ?>
                                        </td>
                                        <td>
                                            <?php echo $registrado["fecha_registro"]; ?>
                                        </td>
                                        <td>
                                            <?php 
                                                $pases =  json_decode($registrado["pases_articulos"]);
                                                
                                                $articulos = array(
                                                    "un_dia" => "Pase un dia",
                                                    "pase_2dias" => "Pase dos dias",
                                                    "pase_completo" => "Pase completo",
                                                    "camisas" => "Camisas",
                                                    "etiquetas" => "Etiquetas"
                                                );

                                                foreach($pases as $key => $articulo) {
                                            ?>
                                                <span><?php echo $articulo." ".$articulos[$key]; ?></span>
                                                <br>
                                            <?php 
                                                }
                                            ?>
                                        </td>
                                        <td>
                                             <?php 
                                                $evento_resultado =  $registrado["talleres_registrados"];

                                                $talleres = json_decode($evento_resultado, true);
                                                
                                                $talleres = implode("', '", $talleres["eventos"]);
                                            
                                                $sql_talleres = "SELECT nombre_evento, fecha_evento, hora_evento FROM eventos WHERE clave IN ('$talleres')";

                                                $resultado_talleres = $conn->query($sql_talleres);

                                                while($taller = $resultado_talleres->fetch_assoc()) {
                                            ?>
                                                <span><?php echo $taller["nombre_evento"]; ?></span>
                                                <br>
                                                <span><?php echo $taller["fecha_evento"]." - ".$taller["hora_evento"]; ?></span>
                                                <br>
                                            <?php 
                                                }
                                            ?>

                                        </td>
                                        <td>
                                            <?php echo $registrado["nombre_regalo"]; ?>
                                        </td>
                                        <td>
                                            <?php echo $registrado["total_pagado"]; ?>
                                        </td>
                                        <td>
                                            <a href="editar-registrado.php?id=<?php echo $registrado['ID_Registrado']; ?>" class="btn btn-flat bg-orange margin">
                                                <i class="fa fa-pencil-alt"></i>
                                            </a>
                                            <a href="#" data-tipo="registros" data-id="<?php echo $registrado['ID_Registrado']; ?>" class="btn btn-flat bg-maroon margin borrar_registro">
                                                <i class="fas fa-trash-alt"></i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php

                                }
                
                        } catch(Exception $ex) {
                            echo $ex->getMessage();
                            echo $conn->errno." ".$conn->error;
                        }
                    ?>
                  </tbody>
                  <tfoot>
                  <tr>
                   <th>Nombre</th>
                    <th>Email</th>
                    <th>Fecha</th>
                    <th>Pases</th>
                    <th>Talleres</th>
                    <th>Regalo</th>
                    <th>Total pagado</th>
                    <th>Pagado</th>
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

 