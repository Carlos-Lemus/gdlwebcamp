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
            <h1>Registrados</h1>
            <small>Llena el formulario para crear un nuevo registrado</small>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Nuevo Registrado</h3>
        </div>
        <div class="card-body">

        <div class="row">
            <div class="col-md-8">
              
              <div class="card card-primary">
                <!-- form start -->
                <form role="form" name="guardar_registro" id="guardar_registro" method="post" action="modelo-registros.php">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="nombre">Nombre Registrado:</label>
                      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre del registrado">
                    </div>
                    <div class="form-group">
                      <label for="nombre">Apellido Registrado:</label>
                      <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido del registrado">
                    </div>
                    <div class="form-group">
                      <label for="nombre">Email del Registrado:</label>
                      <input type="text" class="form-control" id="email" name="email" placeholder="Email del registrado">
                    </div>

                    <div id="error" class="error"></div>

                    <div class="form-group">
                      <label for="pagado">Pases pagados:</label>
                      <select name="pagado" id="pagado" class="form-control">
                        <option value="0">- Seleccione -</option>
                        <option value="1">Pagado</option>
                        <option value="0">No pagado</option>
                      </select>
                    </div>

                    <div class="form-group">
                        <div id="Paquetes" class="paquetes">
                            <h3>Elije el numero de boletos</h3>

                            <ul class="lista-precios">

                                <li>
                                <div class="tabla-precio">
                                    <h3>Pase por dia (Viernes)</h3>
                                    <p class="numero">$10</p>
                                    <ul>
                                    <li><i class="fas fa-check"></i> Bocadillos gratis</li>
                                    <li>Todas las conferencias</li>
                                    <li>Todos los talleres</li>
                                    </ul>

                                    <div class="orden">
                                    <label for="pase_dia">Boletos Deseados: </label>
                                    <input type="number" id="pase_dia" name="boletos[un_dia][cantidad]" min="0" size="3" placeholder="0">
                                    <input type="hidden" value="10" name="boletos[un_dia][precio]">
                                    </div>

                                </div>
                                </li>

                                <li>
                                <div class="tabla-precio">
                                    <h3>Pase por todos los dias</h3>
                                    <p class="numero">$50</p>
                                    <ul>
                                    <li><i class="fas fa-check"></i> Bocadillos gratis</li>
                                    <li><i class="fas fa-check"></i> Todas las conferencias</li>
                                    <li><i class="fas fa-check"></i> Todos los talleres</li>
                                    </ul>


                                    <div class="orden">
                                    <label for="pase_completo">Boletos Deseados: </label>
                                    <input type="number" id="pase_completo" name="boletos[completo][cantidad]" min="0" size="3" placeholder="0">
                                    <input type="hidden" value="50" name="boletos[completo][precio]">
                                    </div>

                                </div>
                                </li>

                                <li>
                                <div class="tabla-precio">
                                    <h3>Pase por dos dias (viernes y Sabado)</h3>
                                    <p class="numero">$30</p>
                                    <ul>
                                    <li><i class="fas fa-check"></i> Bocadillos gratis</li>
                                    <li><i class="fas fa-check"></i> Todas las conferencias</li>
                                    <li>Todos los talleres</li>
                                    </ul>


                                    <div class="orden">
                                    <label for="pase_dos_dias">Boletos Deseados: </label>
                                    <input type="number" id="pase_dos_dias" name="boletos[2dias][cantidad]" min="0" size="3" placeholder="0">
                                    <input type="hidden" value="30" name="boletos[2dias][precio]">
                                    </div>

                                </div>
                                </li>

                            </ul>

                            </div> <!-- paquetes -->
                    </div>

                    <div class="form-group">
                        <div class="box-header width-border">
                            <h3 class="box-title">Elije los talleres</h3>
                        </div>
                        <div id="eventos" class="eventos clearfix">
                            <div class="caja">
                                <div id="viernes" class="contenido-dia clearfix">
                                <h4>Viernes</h4>
                                <div>
                                    <p>Talleres:</p>
                                    <label><input type="checkbox" name="registro[]" id="taller_01" value="taller_01"><time>10:00</time>
                                    Responsive Web Design</label>
                                    <label><input type="checkbox" name="registro[]" id="taller_02" value="taller_02"><time>12:00</time>
                                    Flexbox</label>
                                    <label><input type="checkbox" name="registro[]" id="taller_03" value="taller_03"><time>14:00</time>
                                    HTML5 y CSS3</label>
                                    <label><input type="checkbox" name="registro[]" id="taller_04" value="taller_04"><time>17:00</time>
                                    Drupal</label>
                                    <label><input type="checkbox" name="registro[]" id="taller_05" value="taller_05"><time>19:00</time>
                                    WordPress</label>
                                </div>
                                <div>
                                    <p>Conferencias:</p>
                                    <label><input type="checkbox" name="registro[]" id="conf_01" value="conf_01"><time>10:00</time> Como ser
                                    Freelancer</label>
                                    <label><input type="checkbox" name="registro[]" id="conf_02" value="conf_02"><time>17:00</time>
                                    Tecnologías del Futuro</label>
                                    <label><input type="checkbox" name="registro[]" id="conf_03" value="conf_03"><time>19:00</time>
                                    Seguridad en la Web</label>
                                </div>
                                <div>
                                    <p>Seminarios:</p>
                                    <label><input type="checkbox" name="registro[]" id="sem_01" value="sem_01"><time>10:00</time> Diseño UI
                                    y UX para móviles</label>
                                </div>
                                </div>
                                <!--#viernes-->
                                <div id="sabado" class="contenido-dia clearfix">
                                <h4>Sábado</h4>
                                <div>
                                    <p>Talleres:</p>
                                    <label><input type="checkbox" name="registro[]" id="taller_06" value="taller_06"><time>10:00</time>
                                    AngularJS</label>
                                    <label><input type="checkbox" name="registro[]" id="taller_07" value="taller_07"><time>12:00</time> PHP
                                    y MySQL</label>
                                    <label><input type="checkbox" name="registro[]" id="taller_08" value="taller_08"><time>14:00</time>
                                    JavaScript Avanzado</label>
                                    <label><input type="checkbox" name="registro[]" id="taller_09" value="taller_09"><time>17:00</time> SEO
                                    en Google</label>
                                    <label><input type="checkbox" name="registro[]" id="taller_10" value="taller_10"><time>19:00</time> De
                                    Photoshop a HTML5 y CSS3</label>
                                    <label><input type="checkbox" name="registro[]" id="taller_11" value="taller_11"><time>21:00</time> PHP
                                    Medio y Avanzado</label>
                                </div>
                                <div>
                                    <p>Conferencias:</p>
                                    <label><input type="checkbox" name="registro[]" id="conf_04" value="conf_04"><time>10:00</time> Como
                                    crear una tienda online que venda millones en pocos días</label>
                                    <label><input type="checkbox" name="registro[]" id="conf_05" value="conf_05"><time>17:00</time> Los
                                    mejores lugares para encontrar trabajo</label>
                                    <label><input type="checkbox" name="registro[]" id="conf_06" value="conf_06"><time>19:00</time> Pasos
                                    para crear un negocio rentable</label>
                                </div>
                                <div>
                                    <p>Seminarios:</p>
                                    <label><input type="checkbox" name="registro[]" id="sem_02" value="sem_02"><time>10:00</time> Aprende a
                                    Programar en una mañana</label>
                                    <label><input type="checkbox" name="registro[]" id="sem_03" value="sem_03"><time>17:00</time> Diseño UI
                                    y UX para móviles</label>
                                </div>
                                </div>
                                <!--#sabado-->
                                <div id="domingo" class="contenido-dia clearfix">
                                <h4>Domingo</h4>
                                <div>
                                    <p>Talleres:</p>
                                    <label><input type="checkbox" name="registro[]" id="taller_12" value="taller_12"><time>10:00</time>
                                    Laravel</label>
                                    <label><input type="checkbox" name="registro[]" id="taller_13" value="taller_13"><time>12:00</time> Crea
                                    tu propia API</label>
                                    <label><input type="checkbox" name="registro[]" id="taller_14" value="taller_14"><time>14:00</time>
                                    JavaScript y jQuery</label>
                                    <label><input type="checkbox" name="registro[]" id="taller_15" value="taller_15"><time>17:00</time>
                                    Creando Plantillas para WordPress</label>
                                    <label><input type="checkbox" name="registro[]" id="taller_16" value="taller_16"><time>19:00</time>
                                    Tiendas Virtuales en Magento</label>
                                </div>
                                <div>
                                    <p>Conferencias:</p>
                                    <label><input type="checkbox" name="registro[]" id="conf_07" value="conf_07"><time>10:00</time> Como
                                    hacer Marketing en línea</label>
                                    <label><input type="checkbox" name="registro[]" id="conf_08" value="conf_08"><time>17:00</time> ¿Con que
                                    lenguaje debo empezar?</label>
                                    <label><input type="checkbox" name="registro[]" id="conf_09" value="conf_09"><time>19:00</time>
                                    Frameworks y librerias Open Source</label>
                                </div>
                                <div>
                                    <p>Seminarios:</p>
                                    <label><input type="checkbox" name="registro[]" id="sem_04" value="sem_04"><time>14:00</time> Creando
                                    una App en Android en una tarde</label>
                                    <label><input type="checkbox" name="registro[]" id="sem_05" value="sem_05"><time>17:00</time> Creando
                                    una App en iOS en una tarde</label>
                                </div>
                                </div>
                                <!--#domingo-->
                            </div>
                            <!--.caja-->
                            </div>
                    </div>

                    <div class="form-group">
                        <div id="resumen" class="resumen">
                            <h3>Pago y extras</h3>

                            <div class="caja clearfix">
                                <div class="extras">

                                <div class="orden">
                                    <label for="camisas_evento">Camisas a $10 <small>(promocion 25% dto.)</small></label>
                                    <input type="number" name="pedido_extra[camisas][cantidad]" size="0" id="camisas_eventos" placeholder="0">
                                    <input type="hidden" value="10" name="pedido_extra[camisas][precio]">
                                </div>

                                <div class="orden">
                                    <label for="etiquetas_evento">Paquete de 10 etiquetas $2 <small>(HTML5, CSS3, JavaScript,
                                        Chrome)</small></label>
                                    <input type="number" name="pedido_extra[etiquetas][cantidad]" size="0" id="etiquetas_eventos" placeholder="0">
                                    <input type="hidden" value="2" name="pedido_extra[etiquetas][precio]">
                                </div>

                                <div class="orden">
                                    <label for="regalo">Seleccione un regalo</label>
                                    <select name="regalo" id="regalo" required>
                                    <option value="">--- Selecciona un regalo ----</option>
                                    <option value="2">Etiquetas</option>
                                    <option value="1">Pulsera</option>
                                    <option value="3">Plumas</option>
                                    </select>
                                </div>

                                <input type="button" id="btnCalcular" class="float-left btn btn-success" value="Calcular">

                                </div> <!-- fin extras -->

                                <div class="total">

                                <p>Resumen</p>

                                <div id="lista-productos" class="lista-productos">

                                </div>

                                <p>Total</p>

                                <div id="suma-total" class="suma-total">

                                </div>

                                <input type="hidden" name="total_pedido" id="total_pedido">

                                </div>

                            </div>

                            </div>
                    </div>


                  <!-- /.card-body -->

                  <div class="card-footer">
                    <input type="hidden" name="accion" value="nuevo">
                    <button type="submit" class="btn btn-primary" id="btnRegistro">Añadir</button>
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

 