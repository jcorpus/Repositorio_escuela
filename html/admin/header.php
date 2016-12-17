<!-- MENU CON CLASE FIXED-->
<body class="hold-transition skin-blue fixed sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="admin.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Panel&ensp;</b>Admin</span>
    </a>
    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="home.php" target="_blank">
              <i class="fa fa-home fa-lg"></i>
              <span class="hidden-xs">
                Home          
              </span>
            </a>

          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar user panel (optional) -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $usuarios[$_SESSION['app_id']]['imgUsuario']; ?>"  class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <?php
          if (isset($_SESSION['app_id'])) {
                echo '<p>'.strtoupper($usuarios[$_SESSION['app_id']]['all_apellido']).'</p>';
                //echo '<p>'.$usuarios[$_SESSION['app_id']]['id_usuario'].'</p>';
          }
           ?>
          <!-- Status -->
          <a href="javascript:void(0)"><i class="fa fa-circle text-success"></i> <?php echo $usuarios[$_SESSION['app_id']]['DesTipoUsuario']; ?></a>
        </div>
      </div>

      <!-- search form (Optional) -->
      
        <div class="">
          <canvas id="clock" style="margin:0 auto;display:block;margin-bottom:4px;" width="85" height="21"></canvas>
        </div>
      
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">Menu</li>
        <!-- Optionally, you can add icons to the links -->

        <li class="treeview">
          <a href="#"><i class="fa fa-male fa-lg" aria-hidden="true"></i>&ensp;&ensp; <span>Usuario</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?p=listar"><i class="fa fa-list-ul" aria-hidden="true"></i>&ensp;Listar Usuarios</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-user fa-lg" aria-hidden="true"></i>&ensp;&ensp; <span>Trabajador</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?p=reg_trabajador"><i class="fa fa-plus" aria-hidden="true"></i>&ensp;Registrar</a></li>
            <li><a href="?p=list_trabajador"><i class="fa fa-list-ul" aria-hidden="true"></i>&ensp;Listar Trabajador</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-users fa-lg" aria-hidden="true"></i>&ensp;&ensp; <span>Alumnos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?p=reg_alumno"><i class="fa fa-plus" aria-hidden="true"></i>&ensp;Registrar</a></li>
            <li><a href="?p=list_alumno"><i class="fa fa-list-ul" aria-hidden="true"></i>&ensp;Listar Alumnos</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-book fa-lg" aria-hidden="true"></i>&ensp;&ensp; <span>Tesis</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?p=reg_tesis"><i class="fa fa-plus" aria-hidden="true"></i>&ensp;Registrar</a></li>
            <li><a href=""><i class="fa fa-list-ul" aria-hidden="true"></i>&ensp;Listar Tesis</a></li>
            <li><a href="?p=public_tesis"><i class="fa fa-check" aria-hidden="true"></i>&ensp;Publicar</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-tags fa-lg" aria-hidden="true"></i>&ensp;&ensp; <span>Otros Datos</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?p=otros_datos"><i class="fa fa-list-ul" aria-hidden="true"></i>&ensp;Tipos</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-database fa-lg" aria-hidden="true"></i>&ensp;&ensp; <span>Reportes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?p=reportes"><i class="fa fa-file-text-o" aria-hidden="true"></i>&ensp;Reportes PDF</a></li>
            <li><a href="?p=graficos"><i class="fa fa-bar-chart" aria-hidden="true"></i>&ensp;Gráficos</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Cuenta</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Link in level 2</a></li>
            <li><a href="#">Link in level 2</a></li>
          </ul>
        </li>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
