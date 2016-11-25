<body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top menu_hv" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html"><i class="fa fa-home fa-lg" aria-hidden="true"></i>&nbsp; Inicio</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <!--MENU AGREGADO -->
                <ul class="nav navbar-nav">
                    <li>
                        <a href="#">Ayuda</a>
                    </li>
                </ul>
            <!--MENU AGREGADO -->
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Other Pages <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="full-width.html">Full Width Page</a>
                            </li>
                            <li>
                                <a href="sidebar.html">Sidebar Page</a>
                            </li>
                            <li>
                                <a href="faq.html">FAQ</a>
                            </li>
                            <li>
                                <a href="404.html">404</a>
                            </li>
                            <li>
                                <a href="pricing.html">Pricing Table</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                      <?php
                      if (isset($_SESSION['app_id'])) {
                            echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">'.strtoupper($usuarios[$_SESSION['app_id']]['usuario']).'&nbsp;<b class="caret"></b></a>';
                      }
                       ?>
                       <ul class="dropdown-menu">
                         <li>
                           <?php
                           if (isset($_SESSION['app_id'])) {
                                 echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">'.strtoupper($usuarios[$_SESSION['app_id']]['nombre_tipo_user']).'</a>';
                           }
                            ?>
                         </li>
                         <li>
                           <a href="?view=perfil">Perfil</a>
                         </li>
                         <li>
                           <a href="?view=salir">Cerrar Sesion</a>
                         </li>
                       </ul>
                    </li>
                    <li>
                        <a href="admin.php" target="_blank">Administrar</a>
                    </li>
                    <li>
                        <a href="?view=salir">Salir</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- Page Content -->
    <div class="container">
