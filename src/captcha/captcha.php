<?php
header("Content-type: image/png");
$im = @imagecreate(140, 32);
$color_fondo = imagecolorallocate($im, 128,128,128);
$color_texto = imagecolorallocate($im, 255,255,255);
session_start();
$valor = '';
for($x = 15; $x <= 95; $x += 20) {
     $valor .= ($num = rand(0, 9));
     imagechar($im, rand(3, 5), $x, rand(2, 14), $num, $color_texto);
}
imagepng($im);
imagedestroy($im);
$_SESSION['captcha'] = $valor;


/*CAPTCHA CON IMAGEN DE FONDO
session_start();
$ranStr = md5(microtime());
$ranStr = substr($ranStr, 0, 6);
$_SESSION['captcha'] = $ranStr;
$newImage = imagecreatefromjpeg("cap_bg.jpg");
$txtColor = imagecolorallocate($newImage, 0, 0, 0);
imagestring($newImage, 5, 5, 5, $ranStr, $txtColor);
header("Content-type: image/jpeg");
imagejpeg($newImage);
*/
?>