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
                <a class="navbar-brand" href="home.php"><i class="fa fa-home fa-lg" aria-hidden="true"></i>&nbsp; Inicio</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <!--MENU AGREGADO -->
                <ul class="nav navbar-nav">
                    <li>
                        <a href="home.php?view=faq">FAQ</a>
                    </li>
                </ul>
            <!--MENU AGREGADO -->
                <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                      <?php
                      if (isset($_SESSION['app_id'])) {
                            echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">'.strtoupper($usuarios[$_SESSION['app_id']]['NomPersona']).'&nbsp;<b class="caret"></b></a>';
                      }
                       ?>
                       <ul class="dropdown-menu">
                         <li>
                           <?php
                           if (isset($_SESSION['app_id'])) {
                                 echo '<a href="#" class="dropdown-toggle" data-toggle="dropdown">'.strtoupper($usuarios[$_SESSION['app_id']]['DesTipoUsuario']).'</a>';
                           }
                            ?>
                         </li>
                         <li>
                           <a href="home.php?view=perfil">Perfil</a>
                         </li>
                         <li>
                           <a href="home.php?view=salir">Cerrar Sesion</a>
                         </li>
                       </ul>
                    </li>
                    <li>
                      <?php 
                      $tipo_usuario = $usuarios[$_SESSION['app_id']]['DesTipoUsuario'];
                      if ($tipo_usuario == "Administrador") {
                        echo '<a href="admin.php" target="_blank">Administrar</a>';
                      }
                      
                      
                       ?>
                        
                    </li>
                    <li>
                        <a href="home.php?view=salir">Salir</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- Page Content -->
    <div class="container">
    
      
