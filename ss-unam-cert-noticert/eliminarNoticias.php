<?php
  session_start();
  $get = $_GET;
  unset($_SESSION['noticias']);
  header('Location: /');



?>
