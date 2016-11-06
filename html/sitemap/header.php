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
      <span class="logo-lg"><b>Admin</b>LTE</span>
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
              <span class="hidden-xs">jcorpus</span>
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
          <p>Julio Corpus</p>
          <!-- Status -->
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          <canvas id="clock" width="85" height="21"></canvas>
        </div>
      </div>

      <!-- search form (Optional) -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">Menu</li>
        <!-- Optionally, you can add icons to the links -->
        <li><a href="#"><i class="fa fa-link"></i> <span>Another Link</span></a></li>
        <li class="treeview">
          <a href="#"><i class="fa fa-users fa-lg" aria-hidden="true"></i>&ensp;&ensp; <span>Usuarios</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?p=registrar"><i class="fa fa-plus" aria-hidden="true"></i>&ensp;Registrar</a></li>
            <li><a href="?p=listar"><i class="fa fa-list-ul" aria-hidden="true"></i>&ensp;Listar Usuarios</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-book fa-lg" aria-hidden="true"></i>&ensp;&ensp; <span>Tesis</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="?p=registro_tesis"><i class="fa fa-plus" aria-hidden="true"></i>&ensp;Registrar</a></li>
            <li><a href="javascript:void(0)"><i class="fa fa-list-ul" aria-hidden="true"></i>&ensp;Listar Tesis</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-calculator fa-lg" aria-hidden="true"></i>&ensp;&ensp; <span>Otra cosa</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="javascript:void(0)" onclick="load_div('contenido','Views/matricula_registro.php');"><i class="fa fa-plus" aria-hidden="true"></i>&ensp;Registrar</a></li>
            <li><a href="javascript:void(0)" onclick="load_div('contenido','Views/matricula_lista.php');"><i class="fa fa-list-ul" aria-hidden="true"></i>&ensp;Listar </a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#"><i class="fa fa-database fa-lg" aria-hidden="true"></i>&ensp;&ensp; <span>Reportes</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>



          <ul class="treeview-menu">
            <li><a href="javascript:void(0)" onclick="load_div('contenido','Views/reportes_pdf.php');"><i class="fa fa-file-text-o" aria-hidden="true"></i>&ensp;Reportes PDF</a></li>
            <li><a href="javascript:void(0)" onclick="load_div('contenido','Views/reporte_graficos.php');" ><i class="fa fa-bar-chart" aria-hidden="true"></i>&ensp;Gráficos</a></li>
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
