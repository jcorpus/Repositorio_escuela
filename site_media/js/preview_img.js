
    
    function previewImage(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader(),
        preview = $('#' + $(input).data('target'));

    reader.onload = function(event) {
      preview.attr('src', event.target.result);
    }

    reader.readAsDataURL(input.files[0]);

  }
  else{
    preview.src = "Recursos/img/imagenpreview2.png";
    
  }
}

        

    


