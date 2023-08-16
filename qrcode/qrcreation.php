<?php
// Include necessary libraries
use Endroid\QrCode\QrCode;

// Gather the posted data
$siteNumber = $_POST['site_number'];
$startDatetime = $_POST['start_datetime'];
$endDatetime = $_POST['end_datetime'];
$type = $_POST['type'];

// Construct the QR code content
$qrContent = $siteNumber . " " . $startDatetime . " " . $endDatetime . " " . $type;

// Create a QR code
$qrCode = new QrCode($qrContent);

header('Content-Type: ' . $qrCode->getContentType());
echo $qrCode->writeString();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Purchase</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- Navigation Bar -->
    <div class="navbar">
        Consolidated Parking
    </div>

</body>
