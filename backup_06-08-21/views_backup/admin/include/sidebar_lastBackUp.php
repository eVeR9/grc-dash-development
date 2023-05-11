<?php
$depto = strtoupper($this->session->userdata('departamento'));
$puesto = strtoupper($this->session->userdata('puesto'));
$esAdmin = strtoupper($this->session->userdata('es_admin'));
$user = strtoupper($this->session->userdata('id_usuario'));
/* Validacion de usuario
        'id_usuario' => $result['id'],
        */
//var_dump($depto);
//echo "<b>El depto firmado es: ". $depto ."</b>";
?>
<?php
$cur_tab = $this->uri->segment(2) == '' ? 'dashboard' : $this->uri->segment(2);
?>

<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?= base_url() ?>public/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?= ucwords($this->session->userdata('name')); ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
      </div>
    </div>
    <!-- search form -->
    <!-- <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>-->
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu">
      <li id="dashboard">
        <a href="<?= base_url('admin/dashboard/'); ?>">
          <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <!--<ul class="treeview-menu">
            <li id="dashboard1"><a href="<?//= base_url('admin/dashboard/'); ?>"><i class="fa fa-circle-o"></i> Dashboard</a></li>
            <li id="dashboard2"><a href="<?//= base_url('admin/dashboard2/'); ?>"><i class="fa fa-circle-o"></i> Dashboard V2</a></li>
          </ul>-->
      </li>
    </ul>

    <!-- Inicia tab Reportes... -->
    <?php if ($depto == "TI" || $depto == "VENTAS" || $user == 15 || $user == 10 || $puesto == "JEFE-LOGISTICA" || $puesto == "BASCULA" ?: "JEFE-BASCULA") : ?>
      <ul class="sidebar-menu">
        <li id="dashboard">
          <a href="<?= base_url('admin/dashboard/'); ?>">
            <i class="fa fa-line-chart"></i> <span>Reportes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if ($puesto == "JEFE-MINA" || $puesto == "SUPERVISOR-TRITURACION" || $depto == "TI") : ?>
              <li><a target="_blank" href="https://analytics.zoho.com/open-view/1749734000013219906/25eef3d5b99f8381cc39a1fbffd25558"><i class="fa fa-bar-chart"></i>Remisiones Diarias Mina</a></li>
            <?php endif; ?>

            <?php if ($puesto == "JEFE-LOGISTICA" || $depto == "TI") : ?>
              <li><a target="_blank" href="https://analytics.zoho.com/open-view/1749734000013219518/5a3ff0cbe9628bf1ee1b8d9763ba0c03"><i class="fa fa-bar-chart"></i>Remisiones Logistica<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Transporte</a></li>
            <?php endif; ?>

            <?php if ($puesto == "BASCULA" || $puesto == "JEFE-BASCULA" || $depto == "TI") : ?>
              <li><a target="_blank" href="https://analytics.zoho.com/open-view/1749734000013184605/121d67ff0647daecfe1ff7f358467726"><i class="fa fa-bar-chart"></i>Reporte de Bascula</a></li>
            <?php endif; ?>

            <?php if ($user == 10 || $depto == "TI") : ?>
              <li><a target="_blank" href="https://analytics.zoho.com/open-view/1749734000013193237/fe715cf152bad8e8ed83519367345ebb"><i class="fa fa-bar-chart"></i>Embarques Espuela</a></li>
            <?php endif; ?>

            <?php if ($depto == "FACTURACION" || $depto == "TI") : ?>
              <li><a target="_blank" href="https://analytics.zoho.com/open-view/1749734000013185450/297ee31f768c47f7bba39471d9bce072"><i class="fa fa-bar-chart"></i>Remisiones para Cobranza</a></li>
            <?php endif; ?>

            <?php if ($depto == "TI" || $depto == "VENTAS") : ?>
              <li><a target="_blank" href="https://analytics.zoho.com/open-view/1749734000012109790/6bc14e992aeb8f099c5843e1cb17132c"><i class="fa fa-bar-chart"></i> Remisiones de Pedidos</a></li>
              <li><a target="_blank" href="https://analytics.zoho.com/open-view/1749734000012126934/42901ae3807e838b2a44c9d80b7a1f02"><i class="fa fa-bar-chart"></i> General de Ventas</a></li>
              <li><a target="_blank" href="https://analytics.zoho.com/open-view/1749734000013307499/9c1b2607ff20e5fa60f835c774c10647"><i class="fa fa-bar-chart"></i>Resumen General Diario</a></li>
              <li><a target="_blank" href="https://analytics.zoho.com/open-view/1749734000013310211/a32cd010312a89f64a66f74d7aef8af5"><i class="fa fa-bar-chart"></i>Resumen General Mensual</a></li>
              <li><a target="_blank" href="https://analytics.zoho.com/open-view/1749734000012038860/ec0c8576a02082074f6b6045a38b8871"><i class="fa fa-bar-chart"></i> Junta de Resultados</a></li>
              <li><a target="_blank" href="https://analytics.zoho.com/open-view/1749734000012853195/bb3a739c738c431d99c2658baeb9b258"><i class="fa fa-bar-chart"></i>General de Remisiones</a></li>
              <li><a target="_blank" href="https://analytics.zoho.com/open-view/1749734000013304356/bb342616ed3f2b784ae228b6d26ea538"><i class="fa fa-bar-chart"></i>Reporte Diario Manuel Y.</a></li>
              <li><a target="_blank" href="https://analytics.zoho.com/open-view/1749734000013304528/ffe63714de4b5a9c0d65a65ac8fcdee4"><i class="fa fa-bar-chart"></i>Reporte Diario Martina C.</a></li>
            <?php endif; ?>

            <?php if ($depto == "RH" || $depto == "TI") : ?>
              <li><a target="_blank" href="https://analytics.zoho.com/open-view/1749734000016338158/ccef5627479d0e00c501f0554c938cdf"><i class="fa fa-bar-chart"></i> General de Empleados</a></li>
            <?php endif; ?>
            <!-- Agregar nuevo li -->
          </ul>
        </li>
      </ul>
    <?php endif; ?>
    <!-- Termina tab Reportes -->

    <ul class="sidebar-menu">
      <?php if ($depto == "TI" || $depto == "RH" || $puesto == "JEFE-PROYECTOS" || $puesto == "JEFE-MEJORA-CONTINUA" || $puesto == "GERENTE-FINANZAS") : ?>
        <!-- Mientras no sea BASCULA se muestran todos los drop downs -->
        <?php if ($depto == "TI") : ?>
          <li class="treeview">
            <a href="#">
              <i class="fa fa-dashboard"></i> <span>Administracion</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <!--<li><a href="#"><i class="fa fa-circle-o"></i> Link Sencillo</a></li>-->
              <li>
                <a href="#"><i class="fa fa-users"></i> Usuarios Sistema
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li id="add_user"><a href="<?= base_url('admin/users/add'); ?>"><i class="fa fa-circle-o"></i> Nuevo Usuario</a></li>
                  <li id="view_users" class=""><a href="<?= base_url('admin/users'); ?>"><i class="fa fa-circle-o"></i> Ver Usuarios</a></li>
                </ul>
              </li>
            </ul>
          <?php endif; ?>
          <li>
            <a href="#"><i class="fa fa-users"></i> Recursos Humanos
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <!--
              <li id="add_cliente"><a href="<?//= base_url('admin/clientes/add'); ?>"><i class="fa fa-circle-o"></i> Nuevo Cliente</a></li>
              <li id="view_clientes" class=""><a href="<?//= base_url('admin/clientes'); ?>"><i class="fa fa-circle-o"></i> Ver Clientes</a></li>
-->

              <!-- Empleados -->
              <li>
                <a href="#"><i class="fa fa-circle-o"></i> Colaboradores
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <?php if ($depto == "TI" || $depto == "RH") : ?>
                    <li id="add_empleado"><a href="<?= base_url('admin/empleados/add'); ?>"><i class="fa fa-circle-o"></i> Nuevo Colaborador</a></li>
                  <?php endif; ?>
                  <li id="view_empleados"><a href="<?= base_url('admin/empleados'); ?>"><i class="fa fa-circle-o"></i> Ver Colaboradores</a></li>
                </ul>
              </li>

              <!-- Departamentos -->
              <?php if ($depto == "TI" || $puesto == "RECLUTAMIENTO" || $puesto == "JEFE-PROYECTOS" || $puesto == "JEFE-MEJORA-CONTINUA" || $puesto == "GERENTE-FINANZAS") : ?>
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Departamentos
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <?php if ($depto == "TI" || $puesto == "RECLUTAMIENTO") : ?>
                      <li id="add_departamento"><a href="<?= base_url('admin/departamentos/add'); ?>"><i class="fa fa-circle-o"></i> Nuevo Departamento</a></li>
                    <?php endif; ?>
                    <li id="view_departamentos"><a href="<?= base_url('admin/departamentos'); ?>"><i class="fa fa-circle-o"></i> Ver Departmentos</a></li>
                  </ul>
                </li>

                <!-- Puestos de Trabajo -->
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Puestos de Trabajo
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <?php if ($depto == "TI" || $puesto == "RECLUTAMIENTO") : ?>
                      <li id="add_puesto"><a href="<?= base_url('admin/puestos/add'); ?>"><i class="fa fa-circle-o"></i> Nuevo Puesto</a></li>
                    <?php endif; ?>
                    <li id="view_puestos"><a href="<?= base_url('admin/puestos'); ?>"><i class="fa fa-circle-o"></i> Ver Puestos</a></li>
                  </ul>
                </li>

                <!-- Registro Patronal -->
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Registro Patronal
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <?php if ($depto == "TI" || $puesto == "RECLUTAMIENTO") : ?>
                      <li id="add_registro"><a href="<?= base_url('admin/registro_patronal/add'); ?>"><i class="fa fa-circle-o"></i> Nuevo Registro</a></li>
                    <?php endif; ?>
                    <li id="view_registros"><a href="<?= base_url('admin/registro_patronal'); ?>"><i class="fa fa-circle-o"></i> Ver Registros</a></li>
                  </ul>
                </li>
            </ul>
    </ul>
    </li>
  <?php endif; ?>
<?php endif; ?>

<!--
        <li id="examples" class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Examples</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="invoice"><a href="<?//= base_url('adminlte/invoice'); ?>"><i class="fa fa-circle-o"></i> Invoice</a></li>
            <li id="profile"><a href="<?//= base_url('adminlte/profile'); ?>"><i class="fa fa-circle-o"></i> Profile</a></li>
            <li id="login"><a target="_blank" href="<?//= base_url('adminlte/login'); ?>"><i class="fa fa-circle-o"></i> Login</a></li>
            <li id="register"><a target="_blank" href="<?//= base_url('adminlte/register'); ?>"><i class="fa fa-circle-o"></i> Register</a></li>
            <li id="lockscreen"><a target="_blank" href="<?//= base_url('adminlte/lockscreen'); ?>"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
            <li id="404-error"><a href="<?//= base_url('adminlte/error404'); ?>"><i class="fa fa-circle-o"></i> 404 Error</a></li>
            <li id="500-error"><a href="<?//= base_url('adminlte/errro500'); ?>"><i class="fa fa-circle-o"></i> 500 Error</a></li>
            <li id="blank-page"><a href="<?//= base_url('adminlte/blank'); ?>"><i class="fa fa-circle-o"></i> Blank Page</a></li>
            <li id="pace"><a href="<?//= base_url('adminlte/pace'); ?>"><i class="fa fa-circle-o"></i> Pace Page</a></li>
          </ul>
        </li>
              <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li>
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li>
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li>

        <li><a target="_blank" href="../documentation_adminlte/index.html"><i class="fa fa-book"></i> <span>Documentation</span></a></li>
        <li class="header">LABELS</li>
        <li><a href="#"><i class="fa fa-circle-o text-red"></i> <span>Important</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> <span>Warning</span></a></li>
        <li><a href="#"><i class="fa fa-circle-o text-aqua"></i> <span>Information</span></a></li>
-->
</ul> <!-- Fin RH -->

<?php if ($depto == "TI" || $depto == "VENTAS" || $depto == "FACTURACION" || $puesto == "BASCULA" || $puesto == "JEFE-PROYECTOS" || $puesto == "JEFE-MEJORA-CONTINUA" || $puesto == "GERENTE-FINANZAS" || $puesto == "JEFE-BASCULA" || $puesto == "ESPUELA") : ?>
  <ul class="sidebar-menu">
    <li class="treeview">
      <a href="#">
        <i class="fa fa-usd" style="font-weight:bold;"></i> <span>Ventas</span>
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <ul class="treeview-menu">
        <!--<li><a href="#"><i class="fa fa-circle-o"></i> Link Sencillo</a></li>-->
        <li>
          <a href="#"><i class="fa fa-users"></i> Clientes
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if ($depto == "TI" || $depto == "VENTAS") : ?>
              <li id="add_cliente"><a href="<?= base_url('admin/clientes/add'); ?>"><i class="fa fa-circle-o"></i> Nuevo Cliente</a></li>
            <?php endif; ?>
            <li id="view_clientes" class=""><a href="<?= base_url('admin/clientes'); ?>"><i class="fa fa-circle-o"></i> Ver Clientes</a></li>
            <?php if ($depto == "TI") : ?>
              <li id="add_sucursal"><a href="<?= base_url('admin/sucursales/add'); ?>"><i class="fa fa-circle-o"></i> Nueva Sucursal</a></li>
            <?php endif; ?>
            <li id="view_sucursales" class=""><a href="<?= base_url('admin/sucursales'); ?>"><i class="fa fa-circle-o"></i> Ver Sucursales</a></li>

          </ul>
        <li>
          <a href="#"><i class="fa fa-users"></i> Pedidos
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if ($depto == "TI" || $depto == "VENTAS") : ?>
              <li id="add_pedido"><a href="<?= base_url('admin/pedidos/add'); ?>"><i class="fa fa-circle-o"></i> Nuevo Pedido</a></li>
            <?php endif; ?>
            <li id="view_pedidos" class=""><a href="<?= base_url('admin/pedidos'); ?>"><i class="fa fa-circle-o"></i> Ver Pedidos</a></li>
          </ul>
        </li>
        <li>
          <a href="#"><i class="fa fa-users"></i> Remisiones
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if ($depto == "MINA" || $depto == "TI") { ?>
              <li id="add_pedido"><a href="<?= base_url('admin/remisiones/add'); ?>"><i class="fa fa-circle-o"></i> Nueva Remision</a></li>
            <?php } ?>
            <li id="view_pedidos" class=""><a href="<?= base_url('admin/remisiones'); ?>"><i class="fa fa-circle-o"></i> Ver Remisiones</a></li>
          </ul>
        </li>
        <li>
          <a href="#"><i class="fa fa-users"></i> Materiales
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <?php if ($depto == "TI") : ?>
              <li id="add_material"><a href="<?= base_url('admin/materiales/add'); ?>"><i class="fa fa-circle-o"></i> Nuevo Material</a></li>
            <?php endif; ?>
            <li id="view_materiales" class=""><a href="<?= base_url('admin/materiales'); ?>"><i class="fa fa-circle-o"></i> Ver Materiales</a></li>
          </ul> <!-- Materiales dropdown  -->
        </li> <!-- End li Materiales -->
        <?php if ($depto == "VENTAS" || $depto == "TI") : ?>
          <li>
            <!--Metas embarques tab -->
            <a href="#"><i class="fa fa-users"></i> Metas Embarques
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <!-- drop-down menu -->
              <li id=""><a href="<?= base_url('admin/metas_embarques/add'); ?>"><i class="fa fa-circle-o"></i>Nueva Meta</a></li>
              <li id=""><a href="<?= base_url('admin/metas_embarques'); ?>"><i class="fa fa-circle-o"></i>Ver Metas</a></li>
              <li id=""><a href="<?= base_url('admin/metas_embarques/edit'); ?>"><i class="fa fa-circle-o"></i>Editar Metas</a></li>
            </ul>
          </li> <!-- End Metas embarques -->
        <?php endif; ?>
      </ul>
    </li>
    <!--
            <li> 
              <a href="#"><i class="fa fa-users"></i>Metas Embarques
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i>Prueba 1</a></li>
                <li><a href="#"><i class="fa fa-circle-o"></i>Prueba 2</a></li>
              </ul>
            </li> -->

    <!--
         <li id="forms" class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Formularios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="general"><a href="<?= base_url('adminlte/general_form'); ?>"><i class="fa fa-circle-o"></i> Usuales</a></li>
            <li id="advanced"><a href="<?= base_url('adminlte/advanced_form'); ?>"><i class="fa fa-circle-o"></i> Avanzado</a></li>
            <li id="editors"><a href="<?= base_url('adminlte/editors_form'); ?>"><i class="fa fa-circle-o"></i> Editores</a></li>
          </ul>
        </li>
        <li id="tables" class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tablas</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li id="simple-tables"><a href="<?= base_url('adminlte/simple_table'); ?>"><i class="fa fa-circle-o"></i> Simples</a></li>
            <li id="data-tables"><a href="<?= base_url('adminlte/data_table'); ?>"><i class="fa fa-circle-o"></i>Avanzado</a></li>
          </ul>
        </li>
-->
  <?php endif; ?>
  </ul>
  <?php if ($depto == "TI" || $puesto == "JEFE-MINA" || $puesto == "JEFE-PROYECTOS" || $puesto == "JEFE-MEJORA-CONTINUA" || $puesto == "SUPERVISOR-TRITURACION" || $puesto == "JEFE-BARRENACION" || $puesto == "GERENTE-FINANZAS") : ?>

    <ul class="sidebar-menu">
      <!-- alineacion y encabezado -->
      <li class="treeview">
        <a href="#">
          <i class="fa fa-industry" aria-hidden="true"></i> <span>Mina</span>
          <span class="pull-right-container">
            <!-- alineacion del icon -->
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <!-- desglose menu -->
          <li>
            <a href="#">
              <i class="fa fa-users"></i> Extraccion
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>

            <ul class="treeview-menu">
              <li><a href="<?php echo base_url('admin/barrenacion/bitacora_de_voladura') ?>"><i class="fa fa-circle-o"></i>Bitacora de Voladura</a></li>
              <li><a href="<?php echo base_url('admin/barrenacion/asignacion_de_explosivo') ?>"><i class="fa fa-circle-o"></i>Asignacion de Explosivo</a></li>
              <li><a href="<?php echo base_url('admin/barrenacion') ?>"><i class="fa fa-circle-o"></i>Bitacora de Barrenacion</a></li>
              <li><a href="<?php echo base_url('admin/barrenacion/metas') ?>"><i class="fa fa-circle-o"></i>Programacion</a></li>
              <!-- desglose subcategorias -->
              <li>
                <a href="">
                  <i class="fa fa-circle-o"></i> Catalogo
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu">
                  <li><a href=<?php echo base_url('admin/barrenacion/conceptos_list') ?>><i class="fa fa-circle-o"></i>Conceptos de Prog</a></li>
                  <li><a href="<?php echo base_url('admin/barrenacion/maquina_list') ?>"><i class="fa fa-circle-o"></i>Maquinas</a></li>
                  <li><a href="<?php echo base_url('admin/barrenacion/razones_list') ?>"><i class="fa fa-circle-o"></i>Razones de Paro</a></li>
                  <li><a href="<?php echo base_url('admin/barrenacion/bitacora_zonas') ?>"><i class="fa fa-circle-o"></i>Zonas</a></li>
                </ul>
              </li>
            </ul> <!-- treeview-menu before bitacora de barr -->
          </li> <!-- treeview Extraccion -->

      <li>
        <a href="#"><i class="fa fa-users"></i> Trituracion
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li><a href="<?= base_url('admin/trituracion/'); ?>"><i class="fa fa-circle-o"></i>Bitacora</a></li>
          <li><a href="<?= base_url('admin/trituracion/trituracion_paros_list'); ?>"><i class="fa fa-circle-o"></i>Razones de Paro</a></li>
          <li><a href="<?php echo base_url('admin/trituracion/programacion_list'); ?>"><i class="fa fa-circle-o"></i>Programacion</a></li>
          <li><a href="<?php echo base_url('admin/trituracion/conceptos_list'); ?>"><i class="fa fa-circle-o"></i>Conceptos</a></li>
        </ul>
      </li> <!-- end trituracion -->
    </ul> <!-- treeview-menu depto -->
    </li> <!-- treeview Mina -->
    </ul> <!-- treeview-menu -->
  <?php endif; ?>

  <?php if ($depto == "TI" || $puesto == "JEFE-LABORATORIO" || $puesto == "JEFE-PROYECTOS" || $puesto == "JEFE-MEJORA-CONTINUA" || $puesto == "GERENTE-FINANZAS") : ?>
    <ul class="sidebar-menu">
      <li class="treeview">
      <li>
        <a href="#"><i class="fa fa-flask" style="font-weight:bold;" aria-hidden="true"></i> Laboratorio
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <!-- -->
        <ul class="treeview-menu">
          <li>
            <a href="#"><i class="fa fa-folder-open"></i> Calidad Cal Hornos
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li id="cal_hornos"><a href="<?= base_url('admin/laboratorio/bitacora_calhornos'); ?>"><i class="fa fa-book"></i> Bitacora </a></li>

            </ul>
          </li>

          <li>
            <a href="#"><i class="fa fa-folder-open"></i> Calidad Dolomita Hornos
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li id="hornos"><a href="<?= base_url('admin/laboratorio/bitacora_dolohornos'); ?>"><i class="fa fa-book"></i> Bitacora </a></li>

            </ul>
          </li>

          <li>
            <a href="#"><i class="fa fa-folder-open"></i> Calidad Dolomita Mina
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li id="mina"><a href="<?= base_url('admin/laboratorio/bitacora_dolomina'); ?>"><i class="fa fa-book"></i> Bitacora</a></li>

            </ul>
          </li>

          <li>
            <a href="#"><i class="fa fa-folder-open"></i> Calidad Barrenos
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li id="barrenos"><a href="<?= base_url('admin/laboratorio/bitacora_barrenos'); ?>"><i class="fa fa-book"></i>Seleccion de Barreno</a></li>
              <li id="barrenacion"><a href="<?= base_url('admin/laboratorio/bitacora_laboratorio_barrenos'); ?>"><i class="fa fa-book"></i> Bitacora Analisis Barrenos</a></li>
            </ul>
          </li>

        </ul> <!-- end treeviw menu categories lab -->
      </li> <!-- end treeviw lab -->
    </ul> <!-- end sidebar menu lab -->
  <?php endif; ?>

  <?php if ($depto == "TI" || $puesto == "JEFE-PROYECTOS" || $puesto == "JEFE-MEJORA-CONTINUA" || $puesto == "GERENTE-FINANZAS") : ?>
    <ul class="sidebar-menu">
      <li class="treeview">
        <a href="#"><i class="fa fa-fire" style="font-weight:bold;" aria-hidden="true"></i> Linea de Gas
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <!-- -->
        <ul class="treeview-menu">
          <li>
            <a href="#"><i class="fa fa-folder-open"></i> Consumo de Gas
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li id="cal_hornos"><a href="<?= base_url('admin/linea_gas/'); ?>"><i class="fa fa-book"></i> Bitacora </a></li>
            </ul>
          </li>
          <li>
            <a href="#"><i class="fa fa-folder-open"></i> Precio mensual Gas
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li id="hornos"><a href="<?= base_url('admin/linea_gas/get_all_gas_precio_mensual'); ?>"><i class="fa fa-book"></i> Bitacora </a></li>
            </ul>
          </li>
        </ul>
      </li>
    </ul> <!-- sidebar menu - end linea de gas -->
  <?php endif; ?>

  <?php if ($depto == "TI" || $puesto == "JEFE-MEJORA-CONTINUA" || $puesto == "GERENTE-FINANZAS") : ?>
    <ul class="sidebar-menu">
      <li class="treeview">
        <a href="#"><i class="fa fa-industry" style="font-weight:bold;" aria-hidden="true"></i>Hornos
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <li id=""><a href="<?= base_url('admin/hornos/'); ?>"><i class="fa fa-book"></i> Bitacora </a></li>
          <li id=""><a href="<?= base_url('admin/olivina/bitacora_olivina'); ?>"><i class="fa fa-fire"></i> Olivina </a></li>
          <li id=""><a href="<?= base_url('admin/hornos/'); ?>"><i class="fa fa-book"></i> Programacion Paros </a></li>
        </ul>
      </li> <!-- treeview hornos -->
    </ul> <!-- sidebar-menu end hornos -->
  <?php endif; ?>

  </section>
  <!-- /.sidebar -->
</aside>


<script>
  $("#<?= $cur_tab; ?>").addClass('active');
</script>