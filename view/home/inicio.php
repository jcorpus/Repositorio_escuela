
        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Repositorio Digital de Tesis USP
                    <small>Informática y de Sistemas</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="home.php">Home</a></li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-9">
                <!-- Third Blog Post -->
                <h2>
                    <a href="#">Sobre el Repositorio</a>
                </h2>
                <hr>
                <div class="alert alert-success alert-dismissible">
                  <h4><i class="fa fa-graduation-cap" aria-hidden="true"></i> Sobre el Repositorio</h4>
                  Este repositorio Institucional de la Escuela Informática y de Sistemas es una herramienta virtual que tiene por objeto almacenar, conservar y difundir la creación científico-intelectual
                   de los alumnos de la Facultad de Ingenieria Informatica y de Sistemas.
                </div>
                <!-- agregaro -->
                <div class="ds-option-set" id="ds-search-option">
                <form method="GET"  class="" id="ds-search-form" action="busqueda_tesis.php">
                <small>Busqueda</small>
                <fieldset>
                <div class="input-group">
                <input placeholder="Buscar" type="text" class="ds-text-field form-control" name="busqueda"><span class="input-group-btn"><button title="Go" class="ds-button-field btn btn-primary"><span aria-hidden="true" class="glyphicon glyphicon-search"></span></button></span>
                </div>
                </fieldset>
                
                </form>
                </div>
              
                  <!-- agregaro -->
                
                <hr>
                <h3>
                    Tesis Publicadas Recientemente
                </h3>
                <div class="panel panel-info">
                  <div class="panel-heading">
                  Tesis Publicadas Recientemente
                  </div>
                  <table class="table panel-body">
                    <tbody>
                      <tr>
                        <th>Año</th>
                        <th>Titulo</th>
                        <th>Autor</th>
                        <th>Especialidad</th>
                        <th>Filial</th>
                      </tr>
                    </tbody>
                    
                    <?php
                    require 'core/bin/funciones/funciones_tesis.php'; 
                    include 'tesis_recientes.php'; 
                    ?>
                  </table>
                </div>
                <hr>
                <!-- EJEMPLO -->

                <ul class="ds-artifact-list list-unstyled">
                  <?php include 'tesis_recientes2.php';  ?>
                  
                </ul>

                <ul class="pagination">
                	<li class="disabled"><a href="javascript:void(0)">«</a></li>
                	<li class="disabled"><a href="javascript:void(0)">Anterior</a></li>
                	<li class="active"><a href="javascript:void(0)">1</a></li>
                	<li><a href="">2</a></li><li><a href="javascript:void(0)">Siguiente</a></li>
                	<li><a href="javascript:void(0)">»</a></li>
                </ul>
                
                <!--
                <li>
                  <h4>
                      <a href="blog-post.html">Sistema Informatico Web de Compras ventas y almacén para la Empresa SAC</a>
                  </h4>
                  <p><strong clas="">Julio Corpus, Daniel Narvaez</strong><span> Chimbote</span> <span>Noviembre 12 de 2016</span></p>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur.</p>
                </li>
                <hr>
                -->
                
                <!-- EJEMPLO -->
            </div>
            <!-- cold-sm-3 -->
            <div class="col-md-3">

                      <!-- Blog Search Well -->
                    
                    <div id="" class="panel panel-default">
                      <div class="panel-heading"><h4>Buscar</h4>
                        <form action="busqueda_tesis.php" method="GET" class="sidebar-form"><!-- busqueda_tesis.php -->
                            <div class="input-group">
                                <input type="text" name="busqueda" id="busqueda_tesis" class="form-control" placeholder="Buscar...">
                                  <span class="input-group-btn">
                                  <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                                  </span>
                            </div>
                        </form>  
                      </div>                      
                    </div>
                        
                      <!--otra categoria-->
                      <div id="" class="panel panel-default">
                      <div class="panel-heading"><h5>Categorias</h5></div>
                        <ul class="list-group">
                          <li class="list-group-item"><span class="badge">43</span><a href="?view=ejemplo">ejemplo vista</a></li>
                          <li class="list-group-item"><span class="badge">64</span><a href="#">Administracion de Redes </a></li>
                          <li class="list-group-item"><span class="badge">64</span><a href="#">Base de Datos</a></li>
                          <li class="list-group-item"><span class="badge">64</span><a href="#">Sistema Informático</a></li>
                        </ul>
                      </div>
                      <!--otra categoria-->
                      <!--Filiales-->
                      <div id="" class="panel panel-default">
                      <div class="panel-heading"><h5>Filiales</h5></div>
                        <ul class="list-group">
                          <li class="list-group-item"><span class="badge"><?php require('controller/contar_filial.php'); ?></span><a href="#">Chimbote</a></li>
                          <li class="list-group-item"><span class="badge"><?php require('controller/contar_fil_huaraz.php'); ?></span><a href="#">Huaraz </a></li>
                          <li class="list-group-item"><span class="badge"><?php require('controller/contar_fil_lima.php'); ?></span><a href="#">Lima</a></li>
                          <li class="list-group-item"><span class="badge"><?php require('controller/contar_fil_huacho.php'); ?></span><a href="#">Huacho</a></li>
                        </ul>
                      </div>
                      <!--Filiales-->
                      <!-- Side Widget Well -->
                      <div class="well">
                          <h4>Side Widget Well</h4>
                          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                      </div>

                  </div>

        </div>
        <!-- /.row -->
