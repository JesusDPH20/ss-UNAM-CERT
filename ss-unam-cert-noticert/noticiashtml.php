<style media="screen">
img{
  width: 50;
  height: 50;
}
</style>
<?php
  session_start();
  require ('Encoding.php');
  use \ForceUTF8\Encoding;
  include ('nuevasFunciones.php');
  foreach($_SESSION['noticias'] as $noticia) :
?>
<!-- Blog Post -->
<div class="card mb-4">
  <img class="card-img-top" src="<?= $noticia['imagen'];?>" style="max-width:100%" alt="Card image cap">
  <div class="card-body">
    <h2>
      <?php
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
