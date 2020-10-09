<?php
  session_start();

  $noticias = $_POST['dom'];

  //die();

  //CREACIÓN DEL ARCHIVO HTML - FUNCIONA
  $myfile = fopen("news_".date('Y_m_d-h_i_s_a').".html", "w+");
  $html = "<h1>Estas son las noticias</h1><br>";
  fwrite($myfile, $html);
  fclose($myfile);

  file_put_contents('news_'.date('Y_m_d-h_i_s_a').'.html', $_POST['dom']);

  header('Content-Disposition: attachment;filename=news_'.date('Y_m_d-h_i_s_a').'.html');
  readfile('news_'.date('Y_m_d-h_i_s_a').'.html');

?>
