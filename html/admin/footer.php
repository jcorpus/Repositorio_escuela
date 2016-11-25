 </div>  <!-- div  fin del footer -->
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    <!-- To the right -->
    <div class="pull-right hidden-xs">
      Todo lo que quieras
    </div>
    <!-- Default to the left -->
    <strong>Copyright &copy; 2016 <a href="#">Escuela Ing USP</a>.</strong> Derechos Reservados.
    <?php printf(YEAR_APLICACION);  ?>
  </footer>


</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<script type="text/javascript">
                var contextt;
                var dir;
                var str;
                function getClock()
                {
                    //Get Current Time
                    dir = new Date();
                    strr = hola(dir.getHours(), dir.getMinutes(), dir.getSeconds());
                    //Get the Context 2D or 3D
                    contextt = clock.getContext("2d");
                    contextt.clearRect(0, 0, 90, 50);
                    contextt.font = "17px Arial";
                    contextt.fillStyle = "#abcdef";
                    contextt.fillText(strr, 0, 21);
                }

                function hola(hour, min, sec)
                {
                     var curTime;
                     if(hour < 10)
                        curTime = "0"+hour.toString();
                     else
                        curTime = hour.toString();

                     if(min < 10)
                        curTime += ":0"+min.toString();
                     else
                        curTime += ":"+min.toString();

                     if(sec < 10)
                        curTime += ":0"+sec.toString();
                     else
                        curTime += ":"+sec.toString();
                    return curTime;
                }

                setInterval(getClock, 1000);
                /*
                var date = new Date;
                var seconds = date.getSeconds();
                var minutes = date.getMinutes();
                var hour = date.getHours();

                document.write("la hora es:"+hour+":"+minutes+":"+seconds);
                */



</script>

<script src="site_media/js/no-recargar.js"></script>
<script src="site_media/js/preview_img.js"></script>
<script src="site_media/js/mensaje_consola.js"></script>



<!--scroll plugin-->
<script src="site_media/plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="site_media/bootstrap/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="site_media/js/app.min.js"></script>
<script src="site_media/js/mi_script.js"></script>


<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
</body>
</html>
