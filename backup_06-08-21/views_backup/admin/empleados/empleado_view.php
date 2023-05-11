<!-- daterange picker -->
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="<?= base_url() ?>public/plugins/select2/select2.min.css">



    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="box box-primary">
            <div class="box-body box-profile">
            <?php 
            $foto = $empleado['fotografia'];
            /*
            $completo = base_url('public/uploads/rh/empleados/fotografias/'.$foto);
            $completo = '../../../public/uploads/rh/empleados/fotografias/' . $foto;
            if(is_file(base_url()) . 'public/uploads/rh/empleados/fotografias/'.$foto){
              echo "<hr class='profile-username text-center'> FOTO SI: " . $completo ."</h3>";
            } else {
              echo "<hr class='profile-username text-center'> FOTO NO: " . $completo ."</h3>";
            }
            */
            if($foto=="" or is_null($foto)) 
            {
                if($empleado['sexo']=='H') {
                    $foto = "no_foto_hombre.png";
                } else {
                    $foto = "no_foto_mujer.png";
                }
            }
            ?>
              <img class="profile-user-img img-responsive img-circle" src="../../../public/uploads/rh/empleados/fotografias/<?=$foto;?>" alt="<?= $empleado['nombre']; ?> <?= $empleado['apellidos']; ?>">

              <h3 class="profile-username text-center"><?= $empleado['nombre']; ?> <?= $empleado['apellidos']; ?></h3>

              <p class="text-muted text-center"><?= $empleado['nombre_del_puesto']; ?></p>

              <ul class="list-group list-group-unbordered">
                <li class="list-group-item">
                  <b><?= $empleado['nombre_del_departamento']; ?></b>
                </li>
                <li class="list-group-item">
                  <b>Num. colaborador: <a><?= $empleado['numero_empleado']; ?></a></b> 
                </li>
                <li class="list-group-item">
                  <b>Estatus: <a class="pull-right1"><?= $empleado['empleado_estatus']; ?></a></b>
                </li>
              </ul>
              <a href="<?= base_url('admin/empleados/edit/'.$empleado['id']); ?>" class="btn btn-info btn-flat ">Editar</a>
              <!--<a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>-->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <!-- About Me Box -->
          <!--
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">About Me</h3>
            </div>

            <div class="box-body">
              <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

              <p class="text-muted">
                B.S. in Computer Science from the University of Tennessee at Knoxville
              </p>

              <hr>

              <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

              <p class="text-muted">Malibu, California</p>

              <hr>

              <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

              <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
              </p>

              <hr>

              <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
            </div>
          </div>
         -->
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#generales" data-toggle="tab">Datos Generales</a></li>
              <li><a href="#laborales" data-toggle="tab">Datos Laborales</a></li>
              <li><a href="#documentos" data-toggle="tab">Documentos</a></li>
              <li><a href="#medicos" data-toggle="tab">Datos Medicos</a></li>
              <li><a href="#equipo" data-toggle="tab">Equipo Asignado</a></li>
            </ul>
            <div class="tab-content">
              <div class="active tab-pane" id="generales">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <div class="row">
                        <span class="username">
                          <label for="nombre" class="col-sm-2 control-label bold"><a href="#">Nombre:</a></label>
                          <label for="nombre" class="col-sm-10 control-label"><?= $empleado['nombre'] . ' ' . $empleado['apellidos']; ?> </label>
                        </span>
                    </div>

                    <div class="row">
                        <span class="username">
                          <label for="nombre" class="col-sm-2 control-label bold"><a href="#">Direccion:</a></label>
                          <label for="nombre" class="col-sm-10 control-label"><?= $empleado['domicilio']; ?> </label>
                        </span>
                    </div>

                    <div class="row">
                        <span class="username">
                          <label for="nombre" class="col-sm-2 control-label bold"><a href="#">Teléfono:</a></label>
                          <label for="nombre" class="col-sm-10 control-label"><?= $empleado['tel_contacto']; ?> </label>
                        </span>
                    </div>

                    <div class="row">
                        <span class="username">
                          <label for="nombre" class="col-sm-2 control-label bold"><a href="#">Contacto Emergencia:</a></label>
                          <label for="nombre" class="col-sm-10 control-label"><?= $empleado['contacto_emergencia']; ?> </label>
                        </span>
                    </div>

                    <div class="row">
                        <span class="username">
                          <label for="nombre" class="col-sm-2 control-label bold"><a href="#">Tel C. Emergencia</a></label>
                          <label for="nombre" class="col-sm-10 control-label"><?= $empleado['tel_contacto_emergencia']; ?> </label>
                        </span>
                    </div>

                    <div class="row">
                        <span class="username">
                          <label for="nombre" class="col-sm-2 control-label bold"><a href="#">Sexo:</a></label>
                          <?php if($empleado['sexo']=="H")
                          { ?>
                              <label for="nombre" class="col-sm-10 control-label">Hombre</label>
                          <?php } else { ?>
                              <label for="nombre" class="col-sm-10 control-label">Mujer</label>    
                          <?php } ?>
                        </span>
                    </div>

                    <div class="row">
                      <span class="username">
                        <label for="nombre" class="col-sm-2 control-label bold"><a href="#">RFC:</a></label>
                        <label for="nombre" class="col-sm-10 control-label"><?= $empleado['rfc']; ?> </label>
                      </span>
                    </div>

                    <div class="row">
                      <span class="username">
                        <label for="nombre" class="col-sm-2 control-label bold"><a href="#">NSS:</a></label>
                        <label for="nombre" class="col-sm-10 control-label"><?= $empleado['nss']; ?> </label>
                      </span>
                    </div>

                    <div class="row">
                      <span class="username">
                        <label for="nombre" class="col-sm-2 control-label bold"><a href="#">CURP:</a></label>
                        <label for="nombre" class="col-sm-10 control-label"><?= $empleado['curp']; ?> </label>
                      </span>
                    </div>

                    <div class="row">
                      <span class="username">
                        <label for="nombre" class="col-sm-2 control-label bold"><a href="#">Fecha Nac:</a></label>
                        <label for="nombre" class="col-sm-10 control-label"><?= $empleado['fecha_de_nacimiento']; ?> </label>
                      </span>
                    </div>

                    <div class="row">
                      <span class="username">
                        <label for="talla_camisa" class="col-sm-2 control-label bold"><a href="#">Talla Cam:</a></label>
                        <label for="talla_camisa" class="col-sm-10 control-label"><?= $empleado['talla_camisa']; ?> </label>
                      </span>
                    </div>

                    <div class="row">
                      <span class="username">
                        <label for="talla_pantalon" class="col-sm-2 control-label bold"><a href="#">Talla Pant:</a></label>
                        <label for="talla_pantalon" class="col-sm-10 control-label"><?= $empleado['talla_pantalon']; ?> </label>
                      </span>
                    </div>

                    <div class="row">
                      <span class="username">
                        <label for="talla_zapatos" class="col-sm-2 control-label bold"><a href="#">Talla Zap:</a></label>
                        <label for="talla_zapatos" class="col-sm-10 control-label"><?= $empleado['talla_zapatos']; ?> </label>
                      </span>
                    </div>

                    <div class="row">
                      <span class="username">
                        <label for="talla_zapatos" class="col-sm-2 control-label bold"><a href="#">CLABE:</a></label>
                        <label for="talla_zapatos" class="col-sm-10 control-label"><?= $empleado['numero_clabe']; ?> </label>
                      </span>
                    </div>

                  </div>
                  <!-- /.user-block -->
                  <!--<p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>-->
                </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="laborales">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                  <div class="row">
                      <span class="username">
                        <label for="nombre" class="col-sm-4 control-label bold"><a href="#">Estatus:</a></label>
                        <label for="nombre" class="col-sm-8 control-label"><?= $empleado['empleado_estatus']; ?> </label>
                      </span>
                    </div>

                    <div class="row">
                      <span class="username">
                        <label for="nombre" class="col-sm-4 control-label bold"><a href="#">Fecha de Ingreso:</a></label>
                        <label for="nombre" class="col-sm-8 control-label"><?= $empleado['fecha_de_ingreso']; ?> </label>
                      </span>
                    </div>

                    <div class="row">
                      <span class="username">
                        <label for="nombre" class="col-sm-4 control-label bold"><a href="#">Fecha de Baja:</a></label>
                        <label for="nombre" class="col-sm-8 control-label"><?= $empleado['fecha_de_baja']; ?> </label>
                      </span>
                    </div>

                    <div class="row">
                      <span class="username">
                        <label for="nombre" class="col-sm-4 control-label bold"><a href="#">Numero de Colaborador:</a></label>
                        <label for="nombre" class="col-sm-8 control-label"><?= $empleado['numero_empleado']; ?> </label>
                      </span>
                    </div>

                    <div class="row">
                      <span class="username">
                        <label for="nombre" class="col-sm-4 control-label bold"><a href="#">Registro Patronal:</a></label>
                        <label for="nombre" class="col-sm-8 control-label"><?= $empleado['registro_patronal']; ?> </label>
                      </span>
                    </div>

                    <div class="row">
                      <span class="username">
                        <label for="nombre" class="col-sm-4 control-label bold"><a href="#">Area:</a></label>
                        <label for="nombre" class="col-sm-8 control-label"><?= $empleado['nombre_del_area']; ?> </label>
                      </span>
                    </div>

                    <div class="row">
                      <span class="username">
                        <label for="nombre" class="col-sm-4 control-label bold"><a href="#">Departamento:</a></label>
                        <label for="nombre" class="col-sm-8 control-label"><?= $empleado['nombre_del_departamento']; ?> </label>
                      </span>
                    </div>

                    <div class="row">
                      <span class="username">
                        <label for="nombre" class="col-sm-4 control-label bold"><a href="#">Puesto:</a></label>
                        <label for="nombre" class="col-sm-8 control-label"><?= $empleado['nombre_del_puesto']; ?> </label>
                      </span>
                    </div>

                    <div class="row">
                      <span class="username">
                        <label for="nombre" class="col-sm-4 control-label bold"><a href="#">Tipo Contrato:</a></label>
                        <label for="nombre" class="col-sm-8 control-label"><?= $empleado['tipo_contrato']; ?> </label>
                      </span>
                    </div>

                    <div class="row">
                      <span class="username">
                        <label for="nombre" class="col-sm-4 control-label bold"><a href="#">Forma de Pago:</a></label>
                        <label for="nombre" class="col-sm-8 control-label"><?= $empleado['forma_pago']; ?> </label>
                      </span>
                    </div>

                    <div class="row">
                      <span class="username">
                        <label for="nombre" class="col-sm-4 control-label bold"><a href="#">Frecuencia de Pago:</a></label>
                        <label for="nombre" class="col-sm-8 control-label"><?= $empleado['frecuencia_pago']; ?> </label>
                      </span>
                    </div>

                  </div>
                  <!-- /.user-block -->
                  <!--<p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>-->
                </div>
                <!-- /.post -->
              </div>

              <div class="tab-pane" id="medicos">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                  <div class="row">
                      <span class="username">
                        <label for="nombre" class="col-sm-4 control-label bold"><a href="#">Tipo de Sangre:</a></label>
                        <label for="nombre" class="col-sm-8 control-label"><?= $empleado['tipo_sangre']; ?> </label>
                      </span>
                    </div>

                    <div class="row">
                      <span class="username">
                        <label for="nombre" class="col-sm-4 control-label bold"><a href="#">Alergias:</a></label>
                        <label for="nombre" class="col-sm-8 control-label"><?= $empleado['alergias']; ?> </label>
                      </span>
                    </div>

                    <div class="row">
                      <span class="username">
                        <label for="nombre" class="col-sm-4 control-label bold"><a href="#">Padecimientos:</a></label>
                        <label for="nombre" class="col-sm-8 control-label"><?= $empleado['padecimientos']; ?> </label>
                      </span>
                    </div>

                  </div>
                  <!-- /.user-block -->
                  <!--<p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>-->
                </div>
                <!-- /.post -->
              </div>


              <div class="tab-pane" id="timeline">
                <!-- The timeline -->
                <ul class="timeline timeline-inverse">
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-red">
                          10 Feb. 2014
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-envelope bg-blue"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                      <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                      <div class="timeline-body">
                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                        weebly ning heekya handango imeem plugg dopplr jibjab, movity
                        jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                        quora plaxo ideeli hulu weebly balihoo...
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-primary btn-xs">Read more</a>
                        <a class="btn btn-danger btn-xs">Delete</a>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-user bg-aqua"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                      <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                      </h3>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-comments bg-yellow"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                      <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                      <div class="timeline-body">
                        Take me to your leader!
                        Switzerland is small and neutral!
                        We are more like Germany, ambitious and misunderstood!
                      </div>
                      <div class="timeline-footer">
                        <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <!-- timeline time label -->
                  <li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2014
                        </span>
                  </li>
                  <!-- /.timeline-label -->
                  <!-- timeline item -->
                  <li>
                    <i class="fa fa-camera bg-purple"></i>

                    <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                      <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                      <div class="timeline-body">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                        <img src="http://placehold.it/150x100" alt="..." class="margin">
                      </div>
                    </div>
                  </li>
                  <!-- END timeline item -->
                  <li>
                    <i class="fa fa-clock-o bg-gray"></i>
                  </li>
                </ul>
              </div>
              <!-- /.tab-pane -->


              <div class="tab-pane" id="documentos">
              <div class="post">
                  <div class="user-block ">
                      <strong>Documentos del Colaborador</strong>
                   <div class="form-group">
                    <span class="username">
                    <div class="box-body table-responsive">
                      <table id="example1" class="table table-bordered table-striped " style="width:100%">
                        <thead>
                        <tr>
                          <td style="width: 60px;">Documento</td>
                          <td style="width: 40px;">Fecha Creacion</td>
                          <td style="width: 130px;" class="text-right">Opciones</td>
                        </tr>
                        </thead>
                        <tbody>
                          <?php foreach($all_empleados_documentos as $row): ?>
                          <tr>
                            <td><?= $row['nombre_archivo']; ?></td>
                            <td><?= $row['created_at']; ?></td>
                            <td class="text-right">
                              <a href="<?= base_url('public/uploads/rh/empleados/documentos/'.$row['nombre_archivo']); ?>" class="btn btn-info btn-flat" style="margin-right:1px; text-align:center;" target="_blank">Ver</a> 
                              <a href="<?= base_url('admin/empleados/delete_empleados_documentos/'.$row['id'].'/'.$row['nombre_archivo'].'/'.$empleado['id']); ?>" class="btn btn-info btn-flat" style="text-align:center;">Eliminar</a>
                            </td>
                          </tr>
                          <?php endforeach; ?>
                        </tbody>
                      
                      </table>
                  </div>

                        <!--<label for="nombre" class="col-sm-4 control-label bold"><a href="#">Estatus:</a></label>
                        <label for="nombre" class="col-sm-8 control-label"><?= $empleado['empleado_estatus']; ?> </label>-->
                    </span>
                    </div>

                  </div>
                  <!-- /.user-block -->
                  <!--<p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>-->
                </div>
              </div>

              <div class="tab-pane" id="equipo">
                <div class="post">
                  <div class="user-block ">
                      <strong>Equipo Asignado</strong>
                      <div class="form-group">
                        <span class="username">
                          <div class="box-body table-responsive">
                            <table id="example1" class="table table-bordered table-striped " style="width:100%">
                              <thead>
                              <tr>
                                <td style="width: 60px;">Responsiva</td>
                                <td style="width: 200px;">Descripcion</td>
                                <td style="width: 40px;">Fecha Creacion</td>
                                <td style="width: 130px;" class="text-right">Opciones</td>
                              </tr>
                              </thead>
                              <tbody>
                                <?php foreach($all_empleados_equipos as $row): ?>
                                <tr>
                                  <td><?= $row['nombre_archivo']; ?></td>
                                  <td><?= $row['descripcion_equipo']; ?></td>
                                  <td><?= $row['created_at']; ?></td>
                                  <td class="text-right">
                                    <a href="<?= base_url('public/uploads/rh/empleados/documentos/equipos/'.$row['nombre_archivo']); ?>" class="btn btn-info btn-flat" style="margin-right:1px; text-align:center;" target="_blank">Ver</a> 
                                    <a href="<?= base_url('admin/empleados/delete_empleados_equipos/'.$row['id'].'/'.$row['nombre_archivo'].'/'.$empleado['id']); ?>" class="btn btn-info btn-flat" style="text-align:center;">Eliminar</a>
                                  </td>
                                </tr>
                                <?php endforeach; ?>
                              </tbody>
                            
                            </table>
                          </div>

                        </span>
                      </div>

                  </div>
                  <!-- /.user-block -->
                  <!--<p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>-->
                </div>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
 
 <!-- Select2 -->
<script src="<?= base_url() ?>public/plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url() ?>public/plugins/input-mask/jquery.inputmask.js"></script>
<script src="<?= base_url() ?>public/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="<?= base_url() ?>public/plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="<?= base_url() ?>public/plugins/daterangepicker/moment.min.js"></script>
<script src="<?= base_url() ?>public/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="<?= base_url() ?>public/plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?= base_url() ?>public/plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="<?= base_url() ?>public/plugins/timepicker/bootstrap-timepicker.min.js"></script>
<!-- SlimScroll 1.3.0 -->
<script src="<?= base_url() ?>public/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- iCheck 1.0.1 -->
<script src="<?= base_url() ?>public/plugins/iCheck/icheck.min.js"></script>
<!-- Page script -->
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true,
	  format: 'yyyy/mm/dd'
    });
	  
    $('#fecha_de_nacimiento').datepicker({
      autoclose: true,
	  format: 'yyyy/mm/dd'
    });
	  
    $('#fecha_de_ingreso').datepicker({
      autoclose: true,
	  format: 'yyyy/mm/dd'
    });
	  
    $('#fecha_de_baja').datepicker({
      autoclose: true,
	  format: 'yyyy/mm/dd'
    });	  

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });
  });
</script><script>
$("#add_user").addClass('active');
</script>