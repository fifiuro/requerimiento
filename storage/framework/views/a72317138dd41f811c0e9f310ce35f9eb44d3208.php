<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>SISTEMA ASISTENCIA Y EVALUACION</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo e(asset('css/all.min.css')); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="<?php echo e(asset('css/tempusdominus-bootstrap-4.min.css')); ?>">
  <!-- iCheck -->
  <link rel="stylesheet" href="<?php echo e(asset('css/icheck-bootstrap.min.css')); ?>">
  <!-- JQVMap -->
  <link rel="stylesheet" href="<?php echo e(asset('css/jqvmap.min.css')); ?>">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo e(asset('css/adminlte.min.css')); ?>">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?php echo e(asset('css/OverlayScrollbars.min.css')); ?>">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="<?php echo e(asset('css/daterangepicker.css')); ?>">
  <!-- summernote -->
  <link rel="stylesheet" href="<?php echo e(asset('css/summernote-bs4.css')); ?>">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  
  <link rel="stylesheet" href="<?php echo e(asset('css/toastr.css')); ?>">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo e(asset('css/dataTables.bootstrap4.css')); ?>">
  <!-- CSC propio de la pagina -->
  <link rel="stylesheet" href="<?php echo e(asset('css/page.css')); ?>">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
      <img src="<?php echo e(asset('images/img/LogoLight.png')); ?>" alt="Caja Nacional de Salud" class="brand-image img-circle elevation-3">
      <span class="brand-text font-weight-light">Caja Nacional de Salud</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">CONFIGURACION</li>
          <li class="nav-item">
            <a href="<?php echo e(url('departamento/buscar')); ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Departamentos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(url('estadocivil/buscar')); ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Estado Civil
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(url('afp/buscar')); ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                afp
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(url('centrosalud/buscar')); ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Centro Salud
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(url('contrato/buscar')); ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Contratos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(url('documento/buscar')); ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Documentos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(url('area/buscar')); ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Areas & Cargos
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="<?php echo e(url('nivel/buscar')); ?>" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Niveles
              </p>
            </a>
          </li>
          <li class="nav-header">REQUERIMIENTOS</li>
          <li class="nav-item">
            <a href="<?php echo e(url('personal/buscar')); ?>" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Datos Personales
              </p>
            </a>
          </li>
          <li class="nav-item">
            <a href="pages/gallery.html" class="nav-link">
              <i class="nav-icon far fa-image"></i>
              <p>
                Nuevo Requrimiento
              </p>
            </a>
          </li>
        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
          <h3><?php echo $__env->yieldContent('content'); ?></h3>
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?php echo e(asset('js/jquery.min.js')); ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo e(asset('js/jquery-ui.min.js')); ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="<?php echo e(asset('js/bootstrap.bundle.min.js')); ?>"></script>
<!-- ChartJS -->
<script src="<?php echo e(asset('js/Chart.min.js')); ?>"></script>
<!-- Sparkline -->
<script src="<?php echo e(asset('js/sparkline.js')); ?>"></script>
<!-- JQVMap -->
<script src="<?php echo e(asset('js/jquery.vmap.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/jquery.vmap.usa.js')); ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo e(asset('js/jquery.knob.min.js')); ?>"></script>
<!-- daterangepicker -->
<script src="<?php echo e(asset('js/moment.min.js')); ?>"></script>
<script src="<?php echo e(asset('js/daterangepicker.js')); ?>"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?php echo e(asset('js/tempusdominus-bootstrap-4.min.js')); ?>"></script>
<!-- Summernote -->
<script src="<?php echo e(asset('js/summernote-bs4.min.js')); ?>"></script>
<!-- overlayScrollbars -->
<script src="<?php echo e(asset('js/jquery.overlayScrollbars.min.js')); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo e(asset('js/adminlte.js')); ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo e(asset('js/dashboard.js')); ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo e(asset('js/demo.js')); ?>"></script>

<script src="<?php echo e(asset('js/toastr.js')); ?>"></script>
<!-- DataTables -->
<script src="<?php echo e(asset('js/jquery.dataTables.js')); ?>"></script>
<script src="<?php echo e(asset('js/dataTables.bootstrap4.js')); ?>"></script>

<?php echo app('toastr')->render(); ?>
<script>
  $(document).ready(function(){
    <?php echo $__env->yieldContent('extra'); ?>
  });
</script>
</body>
</html>
<?php /**PATH /var/www/html/requerimiento/resources/views/template/base.blade.php ENDPATH**/ ?>