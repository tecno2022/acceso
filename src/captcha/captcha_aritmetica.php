<?PHP
    session_start();
 
    $Valor1 = rand(1,99);
    $Valor2 = rand(1,99);
    $_SESSION["captcha"] = $Valor1 + $Valor2;
 
    $Imagen = imagecreatetruecolor(140, 32);
    $Color_Fondo = imagecolorallocate($Imagen, 102,102,153);
    imagefill($Imagen, 0, 0, $Color_Fondo);
    $Color_Texto = imagecolorallocate($Imagen, 255,255,255);
    imagestring($Imagen, 14, 20, 6,  $Valor1." + ".$Valor2." =", $Color_Texto);
 
    header('Content-Type: image/png');
 
    imagepng($Imagen);
    imagedestroy($Imagen);
?>