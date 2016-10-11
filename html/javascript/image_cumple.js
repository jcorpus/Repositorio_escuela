$('.file-input').on('change', function() {
    previewImage(this);
});


/** cumpleaños **/
$(".cumple").change(function(){


   var dia = $("#dia option:selected").val();
  var mes = $("#mes option:selected").val();
  var year = $("#year option:selected").val();

  if((dia=='') || (mes=='') ||( year=='')){
    //alert("faltan datos");

  }else{
    var valor = dia+"/"+mes+"/"+year;
    console.log("el cumpleaños es: "+dia+"/"+mes+"/"+year);
    calcularedad(valor);
  }

});
