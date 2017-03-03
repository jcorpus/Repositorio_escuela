<hr>
</div>

<!-- Footer -->
<div class="container footer_rp">
<footer>
<div class="row">
    <div class="col-lg-12">
        <p>Copyright &copy; Repositorio Epiiys &nbsp;<i class="fa fa-graduation-cap" aria-hidden="true"></i> USP 2016</p>
    </div>
</div>
</footer>
</div>
<!-- /.container -->

<script type="text/javascript">
$(document).ready(function(){
  var resumen_ = $(".resumen_tesis").text();
  var num_word_ = 5;

  //acortar_texto();
  //segunda opcion
  //$(".resumen_tesis").html(recortar_texto_home(resumen_,num_word_)+" ...");

});

function recortar_texto_home(texto,palabras){
  var parrafo, newparrafo;
  parrafo = texto.split(/\s+/,palabras);
  newparrafo = parrafo.join(" ");
  return newparrafo;

}

</script>


<!-- scripts -->
<script src="html/javascript/buscar_tesis.js"></script>
<script src="site_media/js/no-recargar.js"></script>
<script src="site_media/js/preview_img.js"></script>
<script src="site_media/js/mensaje_consola.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="site_media/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
