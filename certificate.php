<?php
// Certificate details
$industryName = "GreenFuture Industries Ltd.";
$carbonCredits = 2000;
$certificateId = "CC-2025-1059";
$date = date("F d, Y");

// Create image
$width = 1000;
$height = 700;
$image = imagecreatetruecolor($width, $height);

// Colors
$white = imagecolorallocate($image, 255, 255, 255);
$black = imagecolorallocate($image, 0, 0, 0);
$gray = imagecolorallocate($image, 128, 128, 128);
$blue = imagecolorallocate($image, 40, 100, 200);

// Fill background
imagefill($image, 0, 0, $white);

// Set fonts (ensure these paths are valid on your server)
$fontBold = __DIR__ . '/fonts/arialbd.ttf';
$fontRegular = __DIR__ . '/fonts/arial.ttf';

// Draw border
$border = imagecolorallocate($image, 0, 0, 0);
imagesetthickness($image, 4);
imagerectangle($image, 10, 10, $width - 10, $height - 10, $border);

// Title
imagettftext($image, 40, 0, 250, 100, $black, $fontBold, "Carbon Credit Certificate");

// Certificate info
imagettftext($image, 18, 0, 700, 150, $gray, $fontRegular, "ID: $certificateId");
imagettftext($image, 18, 0, 700, 180, $gray, $fontRegular, "Date: $date");

// Industry name
imagettftext($image, 24, 0, 180, 250, $black, $fontRegular, "This certifies that");
imagettftext($image, 30, 0, 100, 320, $blue, $fontBold, $industryName);

// Credit text
imagettftext($image, 24, 0, 250, 380, $black, $fontRegular, "has been awarded");
imagettftext($image, 32, 0, 300, 440, $black, $fontBold, "$carbonCredits Carbon Credits");
imagettftext($image, 20, 0, 150, 500, $black, $fontRegular, "for efforts in reducing carbon emissions and promoting sustainability.");

// Signature area
imagettftext($image, 16, 0, 100, 600, $gray, $fontRegular, "Authorized Signature");
imagettftext($image, 16, 0, 100, 620, $gray, $fontRegular, "Carbon Regulation Authority");

// Output the image
header("Content-Type: image/png");
imagepng($image);
imagedestroy($image);
?>
