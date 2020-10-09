<?php
  session_start();
  $get = $_GET;
  //echo '<pre>' . print_r($_GET, true) . '</pre>';
  unset($_SESSION['noticias'][$get['id']]);
  //echo '<pre>$_SESSION ' . print_r($_SESSION, true) . '</pre>';
  header('Location: /');



?>
