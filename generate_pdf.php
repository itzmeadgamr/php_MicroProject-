<?php
require_once __DIR__ . '/vendor/tecnickcom/tcpdf/tcpdf.php';
include 'db.php';


$pdf = new TCPDF();
$pdf->AddPage();
$pdf->SetFont('helvetica', 'B', 20);
$pdf->Cell(0, 10, 'Event Schedule', 0, 1, 'C');
$sql = "SELECT * FROM events ORDER BY event_date ASC";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $pdf->Ln(5);
    $pdf->Cell(0, 10, 'Event: ' . $row['title'], 0, 1);
    $pdf->Cell(0, 10, 'Date: ' . $row['event_date'], 0, 1);
    $pdf->Cell(0, 10, 'Time: ' . $row['event_time'], 0, 1);
    $pdf->Cell(0, 10, 'Location: ' . $row['location'], 0, 1);
    $pdf->Ln(5);
}


$pdfFilePath = __DIR__ . '/event_schedule.pdf';   
$pdf->Output($pdfFilePath, 'F');  


$pdfLink = 'http://localhost/event_management/event_schedule.pdf';
$subject = urlencode("Event Schedule");
$body = urlencode("Please find the attached Event Schedule. Click the link below to download:\n\n$pdfLink");


header("Location: https://mail.google.com/mail/?view=cm&fs=1&to=&su=$subject&body=$body");
exit();
?>
