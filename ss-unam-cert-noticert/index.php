<?php
  session_start();
  require ('Encoding.php');
  use \ForceUTF8\Encoding;
  include ('nuevasFunciones.php');

  //echo '<pre>'.print_r($_SESSION, true) . '</pre>';

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">



    <?php
      $encabezado = "NotiCERT HOME - NotiCERT";
      $sitio = "NotiCERT";
      $unamcert = "CSI/UNAM-CERT";
    ?>


  <title>
    <?php
    echo $encabezado
    ?>
  </title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script>
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
  <script src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

  <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
  <script src="https://code.jquery.com/jquery-3.0.0.js"></script>
  <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

  <!--script src="jspdf.js"></script-->
  <script src="jspdf.min.js"></script>
  <script src="html2canvas.js"></script>

  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


  <script>
    $(document).ready(function(){

      $("#btn1").click(function() {
        var urlNoticia = $('#Noticia').val();
        if (urlNoticia== null || urlNoticia == '') {
          alert('Por favor, llene el campo con una URL válida');
        } else {
          guardarNoticia(urlNoticia);
        }

      });







      $("#DescargarNoticias").submit(function() {
        var noticias = $('#ListaNoticias').html();
        $(this).find('input[name=dom]').val(noticias);
      });

    });

    function guardarNoticia(url){
        $.ajax({
        type: "POST",
        url: 'enviarUrlPrueba.php',
        data: {url: url},
        success: function(){location.reload();},
        complete: function(){}
      });
    }




    ////--------------------------DescargarNoticiasPDF - FUNCIONA
    // Inicializar
    let doc = new jsPDF();
    // Crear objeto para establecer márgenes
    let margins = {
        top: 5,
        bottom: 5,
        left: 5,
        width: 200
    };
    function saveDiv(divId) {
      $.ajax({
        type: "POST",
        url: 'noticiashtml.php',
        success: function(response){

          doc.fromHTML(
            response,
            margins.left,
            margins.top,
            {
                'width': margins.width, // Ancho máximo de contenido
            },
            // Función a ejecutar cuando se renderice el PDF
            function (dispose) {
              // dispose: Objeto con coordenadas X, Y de última línea
              //          permite agregar más líneas después del HTML
              // Se guarda dentro de la función, no fuera
              doc.save('news_fecha_hora.pdf');
            },
            margins
          );
        },
        complete: function(){}
      });
    }
    //--------------------------------------------



    ////Función para realizar captura del div en jpg --- F U N C I O N A
    $(function(){
      //here is the hero, after the capture button is clicked
      //aquí se toma la screenshot del div para guardarlo commo imagen
      $('#capture').click(function(){
          //get the div content
          div_content = document.querySelector("#canvas")
          //make it as html5 canvas
          html2canvas(div_content).then(function(canvas) {
              //change the canvas to jpeg image
              data = canvas.toDataURL('image/jpeg');

              //then call a super hero php to save the image
              save_img(data);
          });
      });
    });

    function save_img(data){
        //ajax method.
        $.post('descargaNoticiasJPG.php', {data: data}, function(res){
            //if the file saved properly, trigger a popup to the user.
            if(res != ''){
                yes = alert('Archivo guardado.');
            }
            else{
                alert('Algo salió mal');
            }
        });
    }


  </script>




  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/blog-home.css" rel="stylesheet">

</head>

<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="/index.php">
        <?php echo $sitio ?>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://www.seguridad.unam.mx/nosotros">Acerca de</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://www.seguridad.unam.mx">Servicios</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="https://www.seguridad.unam.mx/content/mapa-de-ubicacion">Contacto</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="row">

      <!-- Sidebar Widgets Column -->
      <div class="col-md-4">

        <!-- Buscador-->
        <div class="card my-4">
          <h5 class="card-header">¿Buscas una noticia en especial?</h5>
          <div class="card-body">
            <div class="input-group">

              <ol id="ordenable">
                <?php
                  $count=0;
                  foreach ($_SESSION['noticias'] as $i => $noticia) : ?>
                  <li class="agregados1">
                    <input type="url" class="input1" value="<?= $noticia['url']; ?>" placeholder="Ingresa una URL" readonly><br> <!--readonly-->

                    <div id="divBorrar" class="divBorrar">
                      <button id="borrar1" type="button" name="button">
                        <a href="/eliminarNoticia.php?id=<?=$i;?>">Borrar</a>
                      </button>
                    </div>
                  </li>
                <?php
                  $count = $count+1;
                  endforeach; ?>

                <li class="agregados1">
                  <input id='Noticia' type="url" class="input1" placeholder="Ingresa una URL"><br>
                  <div class="div1">
                  </div>
                </li>
              </ol>

              <!--Botones de interacción-->

              <button id="btn1" title="Carga tu noticia a la lista">Añadir noticia</button>

              <button type="button" name="button">
                <a href="/eliminarNoticias.php" title="Elimina las url que has añadido">Eliminar listado de url</a>
              </button>
              <?php
                if (!empty($_SESSION['noticias'])):
              ?>
              <form class="" action="descargaNoticias.php" method="post" id="DescargarNoticias">
                <input type="hidden" name="dom" value="">
                <button type="submit" name="button" title="Descarga las noticias mostradas" id="botonNoticias">Descargar HTML</button>
              </form>

              <form class="" method="post" id="DescargarNoticiasPdf">
                <input type="hidden" name="dom" value="">
                <button type="button" name="button" onclick="saveDiv('canvas')" title="Descarga las noticias mostradas" id="botonNoticiasPdf">Descargar PDF</button><!---->
              </form>

              <form class="" method="post" id="DescargarNoticiasJpg">
                <input type="hidden" name="dom" value="">
                <button type="button" name="button" id="capture" title="Descarga las noticias mostradas">Descargar JPG</button><!--  -->
              </form>
            <?php endif; ?>
            </div>
          </div>
        </div>


        <!-- Calendario -->
        <div class="card my-4">
          <h5 class="card-header">Calendario</h5>
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6">
                <ul class="list-unstyled mb-0">

                  <!--Espacio de noticias de hoy-->
                  <div class="row">
                    <label>Fecha</label>
                    <input type="number" id="contador" name="contador" value="<?php echo $count; ?>" hidden>
                    <input id="díaHoy" type="text" name="díaHoy" value="<?php echo date('d/m/Y'); ?>" readonly>
                    <label>Noticias añadidas hoy: </label>
                    <div id="divHoy">
                      <input id="noticiasDeHoy" type="text" name="noticiasDeHoy" readonly>
                    </div>
                  </div>

                  <!--Espacio de noticias en periodo-->
                  <div class="row">
                    <form id="buscadorFecha" class="" method="POST">
                      <label>Buscar noticias entre fechas:</label>
                      <p><input type="text" id="datepickerFrom" size="30" placeholder="Rango desde..." readonly></p>
                      <label>Y</label>
                      <p><input type="text" id="datepickerTo" size="30" placeholder="Rango hasta..." readonly></p>
                      <input type="button" id="Filtrar" name="Filtrar" value="Filtrar"><br>
                    </form>
                    <label>Noticias añadidas en ese periodo:</label>
                    <div id="divRango">
                      <input id="noticiasDeXDia" type="text" name="noticiasDeXDia" readonly>
                    </div>
                  </div>

                  <!--Espacio de noticias totales-->
                  <div class="row">
                    <label>Total de noticias:</label>
                    <div id="divTotal">
                      <input id="noticiasEnTotal" type="text" name="noticiasEnTotal" readonly>
                    </div>
                  </div>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Blog Entries Column -->
      <div class="col-md-8" id="canvas">

        <h1 class="my-4">
          <?php echo $sitio ?>
          <small>
            <?php echo $unamcert ?>
          </small>
        </h1>

        <div id="ListaNoticias">
        <?php
          foreach($_SESSION['noticias'] as $noticia) :
        ?>
        <!-- Blog Post -->
        <div class="card mb-4">
          <img class="card-img-top" src="<?= $noticia['imagen'];?>" style="max-width:100%" alt="Card image cap">
          <div class="card-body">
            <h2>
              <?php
              //Muestreo del título de la noticia
              //echo $noticia['titulo'];
              echo Encoding::fixUTF8($noticia['titulo']);
              ?>
            </h2>
            <p>
              <?php
              //Función para jalar el "abstract" de cada noticia
              echo $noticia['tags']['description'];
              ?>
            </p>
            <a href="<?= $noticia['url']; ?>" title="Click para ir a la noticia" class="btn btn-primary">Seguir leyendo...</a>
          </div>

          <!--Intendo de jalar el autor de la noticia y link-->
          <div class="card-footer text-muted">
            <?php
              if ($noticia['tags']['keywords']) {
                echo "Palabras clave: ".$noticia['tags']['keywords']."<br>";
              }elseif ($noticia['tags']['news_keywords']) {
                echo "Palabras clave: ".$noticia['tags']['news_keywords']."<br>";
              }else {
                echo "Palabras clave: N/A </br>";
              }

              echo "URL: ".$noticia['url']."<br>";

              if ($noticia['tags']['twitter:site']) {
                echo "Sitio: ".$noticia['tags']['twitter:site']."<br>";
              }elseif ($noticia['tags']['application-name']) {
                echo "Sitio: ".$noticia['tags']['application-name']."<br>";
              }else {
                echo "Sitio: - </br>";
              }
            ?>

          </div>
        </div>
      <?php endforeach; ?>
      </div>

      </div>



    </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; NotiCERT 2020</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

  <script src="cargarDatos.js"></script>
  <script type="text/javascript">
    //Cargar Totales
    window.onload = function () {
        CargarHoy();
        CargarTotal();
    }
  </script>


</body>

</html>
