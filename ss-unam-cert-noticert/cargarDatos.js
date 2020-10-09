$(document).ready(function(){
/*  $.datepicker.setDefaults({
    dateFormat: 'dd-mm-yy'
  });
*/
  $(function(){
    $( "#datepickerFrom" ).datepicker();
    $( "#datepickerTo" ).datepicker();
  });

  $('#Filtrar').click(function(){
    var datepickerFrom = $('#datepickerFrom').val();
    var datepickerTo = $('#datepickerTo').val();
    if (datepickerFrom != '' && datepickerTo != '') {
      $.ajax({
        url: 'consultaRango.php',
        method: "POST",
        data: {
          datepickerFrom:datepickerFrom,
          datepickerTo:datepickerTo
        },
        success: function(data){
          $('#divRango').html(data);
        }
      });
    } else {
      alert('Por favor selecciona un rango válido');
    }
  });
});



//Muestra las noticias agregadas el día de hoy
function CargarHoy(){
    $("#divHoy").load("consultaDiario.php");
}

//Muestra el total de noticias
function CargarTotal(){
    $("#divTotal").load("consultaTotal.php");
}


//Agregar o actualizar la base
$(document).ready(function(){
  $('#btn1').click(function(){
    var contador = $("#contador").val();
    $.ajax({
      url: 'crearActualizar.php',
      method: "POST",
      data: {
        count:contador
      }
    });
  });
});



//Eliminar de la base
$(document).ready(function(){
  $('#divBorrar').click(function(){
    //var contador = $("#contador").val();
    $.ajax({
      url: 'borrarNoticias.php',
      method: "POST",
      /*data: {
        count:contador
      },*/
      success: function(data){
        alert(data);
      }
    });
  });
});
