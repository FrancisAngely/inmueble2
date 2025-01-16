<?php
require_once 'dompdf/autoload.inc.php';
use Dompdf\Options;
use Dompdf\Dompdf;
$options = new Options();
$options->setIsRemoteEnabled(true);
$dompdf = new Dompdf($options);
//$dompdf=new DOMPDF();

$dompdf->load_html(ob_get_clean());
$dompdf->render();
$pdf=$dompdf->output();
//$filename="Ejemplo.pdf";
file_put_contents($filename,$pdf);
$dompdf->stream($filename,array('Attachment'=>0));

?>