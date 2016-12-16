<!-- MENU CON CLASE FIXED-->
<body class="hold-transition skin-blue fixed sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index.php" class="logo">
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
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <img  src="site_media/img/logo.png"  class="user-image"  alt="User Image">
              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">
                <?php
                
                      echo $usuarios[$_SESSION['app_id']]['all_apellido'];
                
                ?>
                
              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <img src="site_media/img/logo.png" class="img-circle" alt="User Image">

                <p>
                  Jcorpus - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
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
          <img src="site_media/img/logo.png"  class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <?php
          if (isset($_SESSION['app_id'])) {
                echo '<p>'.strtoupper($usuarios[$_SESSION['app_id']]['all_apellido']).'</p>';
                //echo '<p>'.$usuarios[$_SESSION['app_id']]['id_usuario'].'</p>';
          }
           ?>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          
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
          <a href="#"><i class="fa fa-book fa-lg" aria-hidden="true"></i>&ensp;&ensp; <span>Otros Datos</span>
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
