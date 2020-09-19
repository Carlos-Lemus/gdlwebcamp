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
            <h1>Dashboard <small>Informacion del sitio</small></h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

        <div class="row ">
            <!-- /.col (LEFT) -->
          <div class="col-md-12">
            <!-- LINE CHART -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Line Chart</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body p-5">
                <div class="chart">
                  <canvas id="lineChart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        
      <div class="row w-100">
          <div class="col-lg-3 col-6">

            <?php 

                try {
                    $sql = "SELECT COUNT(ID_Registrado) AS registrados FROM registros";

                    $resultado = $conn->query($sql);

                    $registrado = $resultado->fetch_assoc();

                } catch(Exception $ex) {
                    echo $ex->getMessage();
                    echo $conn->errno." ".$conn->error;
                }
            
            ?>


            <!-- small card -->
            <div class="small-box bg-primary">
              <div class="inner">
                <h3><?php echo $registrado["registrados"]; ?></h3>

                <p>Total registrados</p>
              </div>
              <div class="icon">
                <i class="fas fa-user"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">

            <?php 

                try {
                    $sql = "SELECT COUNT(ID_Registrado) AS registrados FROM registros WHERE pagado = 1";

                    $resultado = $conn->query($sql);

                    $registrado = $resultado->fetch_assoc();

                } catch(Exception $ex) {
                    echo $ex->getMessage();
                    echo $conn->errno." ".$conn->error;
                }
            
            ?>


            <!-- small card -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3><?php echo $registrado["registrados"]; ?></h3>

                <p>Total pagados</p>
              </div>
              <div class="icon">
              <i class="fas fa-user-check"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-6">

            <?php 

                try {
                    $sql = "SELECT COUNT(ID_Registrado) AS registrados FROM registros WHERE pagado = 0";

                    $resultado = $conn->query($sql);

                    $registrado = $resultado->fetch_assoc();

                } catch(Exception $ex) {
                    echo $ex->getMessage();
                    echo $conn->errno." ".$conn->error;
                }
            
            ?>


            <!-- small card -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3><?php echo $registrado["registrados"]; ?></h3>

                <p>Total sin pagar</p>
              </div>
              <div class="icon">
                  <i class="fas fa-user-times"></i>
              </div>
              <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
              </a>
            </div>
          </div>
        
          <div class="col-lg-3 col-6">
            <?php 

                try {
                    $sql = "SELECT SUM(total_pagado) AS ganancias FROM registros WHERE pagado = 1";

                    $resultado = $conn->query($sql);

                    $ganancias = $resultado->fetch_assoc();

                } catch(Exception $ex) {
                    echo $ex->getMessage();
                    echo $conn->errno." ".$conn->error;
                }

            ?>


            <!-- small card -->
            <div class="small-box bg-yellow">
            <div class="inner">
                <h3><?php echo $ganancias["ganancias"]; ?></h3>

                <p>Ganancias</p>
            </div>
            <div class="icon">
                <i class="fas fa-dollar-sign"></i>
            </div>
            <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <?php 

                try {
                    $sql = "SELECT COUNT(regalos) AS regalos FROM registros WHERE regalos = 1";

                    $resultado = $conn->query($sql);

                    $regalos = $resultado->fetch_assoc();

                } catch(Exception $ex) {
                    echo $ex->getMessage();
                    echo $conn->errno." ".$conn->error;
                }

            ?>


            <!-- small card -->
            <div class="small-box bg-info">
            <div class="inner">
                <h3><?php echo $regalos["regalos"]; ?></h3>

                <p>Pulseras</p>
            </div>
            <div class="icon">
                <i class="fas fa-gift"></i>
            </div>
            <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
            </div>
        </div>

        <div class="col-lg-3 col-6">
            <?php 

                try {
                    $sql = "SELECT COUNT(regalos) AS regalos FROM registros WHERE regalos = 2";

                    $resultado = $conn->query($sql);

                    $regalos = $resultado->fetch_assoc();

                } catch(Exception $ex) {
                    echo $ex->getMessage();
                    echo $conn->errno." ".$conn->error;
                }

            ?>


            <!-- small card -->
            <div class="small-box bg-orange">
            <div class="inner">
                <h3><?php echo $regalos["regalos"]; ?></h3>

                <p>Etiquetas</p>
            </div>
            <div class="icon">
                <i class="fas fa-gift"></i>
            </div>
            <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
            </div>
        </div>
          
        <div class="col-lg-3 col-6">
            <?php 

                try {
                    $sql = "SELECT COUNT(regalos) AS regalos FROM registros WHERE regalos = 3";

                    $resultado = $conn->query($sql);

                    $regalos = $resultado->fetch_assoc();

                } catch(Exception $ex) {
                    echo $ex->getMessage();
                    echo $conn->errno." ".$conn->error;
                }

            ?>
            <!-- small card -->
            <div class="small-box bg-purple">
            <div class="inner">
                <h3><?php echo $regalos["regalos"]; ?></h3>

                <p>Plumas</p>
            </div>
            <div class="icon">
                <i class="fas fa-gift"></i>
            </div>
            <a href="#" class="small-box-footer">
                More info <i class="fas fa-arrow-circle-right"></i>
            </a>
            </div>
        </div>

        </div>
        <!-- /.row -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php 
    include "templates/footer.php";
  ?>

 