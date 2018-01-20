<?php

echo 'Hello world ';












exit();


// Create image handle
$im = imagecreatetruecolor(200, 200);

// Allocate colors
$black = imagecolorallocate($im, 0, 0, 0);
$white = imagecolorallocate($im, 255, 255, 255);

// Load the PostScript Font
$font = imagepsloadfont('font.svg');

// Write the font to the image
imagepstext($im, 'Sample text is simple', $font, 12, $black, $white, 50, 50);

// Output and free memory
header('Content-type: image/png');

imagepng($im);
imagedestroy($im);
?>