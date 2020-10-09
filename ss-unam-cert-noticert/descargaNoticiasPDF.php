<!DOCTYPE html>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.min.js"></script>
<script>

  var doc = new jsPDF();
  function saveDiv(divId) {
  doc.fromHTML('<html><head><title>NotiCERT</title></head><body>' + document.getElementById(divId).innerHTML + '</body></html>');
  doc.save('descargaNoticiasPdf.pdf');
  }

  /*$("#DescargarNoticiasPdf").click(function (saveDiv(divId) {
    var doc = new jsPDF();
    doc.fromHTML('<html><head><title>NotiCERT</title></head><body>' + document.getElementById(divId).innerHTML + '</body></html>');
    doc.save('news_'.date('Y_m_d-h_i_s_a').'.pdf');
  })*/

</script>


<!--?php
  session_start();
  //require 'pdfcrowd.php';
  require_once 'vendor/autoload.php';
  use Dompdf\Dompdf;

  // Guardamos el contenido de index.php en la variable html
  ob_start();
  require "index.php";
  $html = ob_get_clean();
  //$html->Load('index.php');
  //$html->getElementById('elemento') ->tagName . "\n";

  $dompdf = new Dompdf();
  $dompdf->loadHtml($html);

  // (Optional) Setup the paper size and orientation
  $dompdf->setPaper('A4', 'landscape');

  // Render the HTML as PDF
  $dompdf->render();

  // Output the generated PDF to Browser
  $dompdf->stream();


  /*$mpdf = new \Mpdf\Mpdf([
  ]);

  function get_plantilla(){
    return 'index.php';
  }

  $plantilla = get_plantilla();

  $mpdf -> writeHtml($plantilla, \Mpdf\HTMLParseMode::HTML_BODY);

  $mpdf -> output();*/

  //$noticiasPdf = $_POST['dom'];

  //echo '<pre>'.print_r($_POST['dom'], true) . '</pre>';
  //die();

  //CREACIÓN DEL ARCHIVO PDF
  /*$myfile = PDF_begin_document("news_".date('Y_d_m-h_i_s_a').".pdf", "w+");
  $pdf = "Estas son las noticias";
  fwrite($myfile, $pdf);
  fclose($myfile);

  file_put_contents('news_'.date('Y_d_m').'.pdf', urldecode($_POST['dom']));
  header('Content-Disposition: attachment;filename=news_'.date('Y_d_m-h_i_s_a').'.pdf');
  readfile('news_'.date('Y_d_m-h_i_s_a').'.pdf');  */


  /*$client = new \Pdfcrowd\HtmlToPdfClient("username", "apikey");
  $client = new \Pdfcrowd\HtmlToPdfClient("demo", "ce544b6ea52a5621fb9d55f8b542d14d");
  //$pdf -> $client->convertUrlToFile("pginasss.com", 'news_'.date('Y_d_m-h_i_s_a').'.pdf');
  $pdf = $client->convert('/index.php');*/



  /*try{
      // create the API client instance
      $client = new \Pdfcrowd\HtmlToPdfClient("demo", "ce544b6ea52a5621fb9d55f8b542d14d");
      //$client = new \Pdfcrowd\HtmlToPdfClient("username", "apikey");

      // run the conversion and write the result to a file

      $client->convertFileToFile("/index.php", 'news_'.date('Y_d_m-h_i_s_a').'.pdf');
  } catch(\Pdfcrowd\Error $why){
      // report the error
      error_log("Pdfcrowd Error: {$why}\n");
      // rethrow or handle the exception
      throw $why;
  }*/



  /*$filename='news_'.date('Y_d_m').'.pdf';
  $file="/index.php";
  $len = filesize($file); // Calculate File Size
  ob_clean();
  header("Pragma: public");
  header("Expires: 0");
  header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
  header("Cache-Control: public");
  header("Content-Description: File Transfer");
  header("Content-Type:application/pdf"); // Send type of file
  $header="Content-Disposition: attachment; filename=$filename;"; // Send File Name
  header($header );
  header("Content-Transfer-Encoding: binary");
  header("Content-Length: ".$len); // Send File Size
  @readfile($file);
  exit;*/

  /*$noticiasPdf = $_POST['dom'].'pdf';
  $myfile = fopen("news_".date('Y_d_m-h_i_s_a').".pdf", "w+");
  $pdf = "Estas son las noticias";
  fwrite($myfile, $pdf);
  fclose($myfile);

  file_put_contents('news_'.date('Y_d_m').'.pdf', urldecode($_POST['dom']));
  header('Content-Type: application/pdf');
  header('Content-Disposition: attachment;filename=news_'.date('Y_d_m-h_i_s_a').'.pdf');
  readfile('news_'.date('Y_d_m-h_i_s_a').'.pdf');

  $pdf = file_put_contents(file_get_contents($noticiasPdf));

  echo $pdf;*/
