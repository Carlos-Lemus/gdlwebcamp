<?php
    session_start();
    
    if(isset($_GET["cerrar_sesion"])) {
        $cerrar_sesion = $_GET["cerrar_sesion"];
        if($cerrar_sesion) {
            session_destroy();
        }
    }

    include "templates/header.php"; 
?>

    <div class="hold-transition login-page">
        <div class="login-box">
            <div class="login-logo">
                <a href="../index.php"><b>GDL</b>WebCamp</a>
            </div>


            <!-- /.login-logo -->
            <div class="card">
                <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>

                <form action="login-admin.php" id="login-admin-form" name="login-admin-form" method="post">
                    <div class="input-group mb-3">
                    <input type="text" class="form-control" name="usuario" placeholder="Usuario">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                    </div>
                    <div class="input-group mb-3">
                    <input type="password" class="form-control" name="password" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                        </div>
                    </div>
                    </div>
                    <div class="row">
                    <!-- /.col -->
                    <div class="col-12">
                        <input type="hidden" name="registro" value="login">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Iniciar Sesion</button>
                    </div>
                    <!-- /.col -->
                    </div>
                </form>


                <p class="mb-1">
                    <a href="forgot-password.html">I forgot my password</a>
                </p>
                <p class="mb-0">
                    <a href="register.html" class="text-center">Register a new membership</a>
                </p>
                </div>
                <!-- /.login-card-body -->
            </div>
            </div>
    </div>

  <?php 
    include "templates/footer.php";
  ?>

 