jQuery(document).on('submit', '#formularioLogin', function(event){
  event.preventDefault();

  jQuery.ajax({
    url : 'login.php',
    type: 'POST',
    datatype: 'json',
    data: $(this).serialize(),
    beforeSend: function(){
      $('.login100-form-btn').val('Validando...');
    }
  })
  .done(function(respuesta){
    console.log('success');
    if (!respuesta.error) {
      location.href = '/Login';
    } else {
      $('.error').slideDown('slow');
      setTimeout(function(){
        $('.error').slideUp('slow');
      }, 3000);
      $('.botonLogin').val('Iniciar sesión');
    }
  })
  .fail(function(resp){
    console.log(resp.responseText);
  })
  .always(function(){
    console.log('complete');
  });

});
