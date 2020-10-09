<?php
  file_put_contents("news_".date('Y_m_d-h_i_s_a').".jpg", base64_decode(explode(",", $_POST['data'])[1]));

  header('Content-Disposition: attachment;filename=news_'.date('Y_m_d-h_i_s_a').'.jpg');
  header('Content-Description: File Transfer');
  header('Content-Type: application/octet-stream');
  header('Expires: 0');
  header('Cache-Control: must-revalidate');
  header('Pragma: public');
  header('Content-Length: ' . filesize('news_'.date('Y_m_d-h_i_s_a').'.jpg'));
  echo('news_'.date('Y_m_d-h_i_s_a').'.jpg');
  readfile('news_'.date('Y_m_d-h_i_s_a').'.jpg');
  echo('news_'.date('Y_m_d-h_i_s_a').'.jpg');
  rename("news_".date('Y_m_d-h_i_s_a').".jpg", "/home/user/login/Downloads/news_".date('Y_m_d-h_i_s_a').".jpg");
