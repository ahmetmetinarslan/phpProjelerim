<?php

session_start();

$image = @imagecreatetruecolor(120, 30) or die("Hata oluştu");
$background = imagecolorallocate($image, 0xFF, 0xFF, 0xFF);
imagefill($image, 0, 0, $background);
$line_color = imagecolorallocate($image, 0xCC, 0xCC, 0xCC);
$text_color = imagecolorallocate($image, 0x33, 0x33, 0x33);
for ($i = 0; $i <= 8; $i++) {
    imagesetthickness($image, rand(1, 3));
    imageline($image, 0, rand(0, 30), 120, rand(0, 30), $line_color);
}
$numbers = "";
for ($x = 15; $x <= 95; $x += 20) {
    $numbers .= ($number = rand(0, 9));
    imagechar($image, rand(3, 5), $x, rand(2, 14), $number, $text_color);
}
$_SESSION["captcha"] = $numbers;
header("Content-type: image/png");
imagepng($image);
imagedestroy($image);
