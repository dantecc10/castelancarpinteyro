<?php
include "mpdf/mpdf.php";

$html = ("<h1>Hola</h1>");


$pdf = new mPDF('c');
$pdf->WriteHTML($html);
$pdf->Output();
exit;
