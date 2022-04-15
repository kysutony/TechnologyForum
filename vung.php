<?php
session_start();
create_image(); 
exit(); 
function create_image(){ 
$md5_hash = md5(rand(0,999));
$security_code = substr($md5_hash, 6, 4);
$_SESSION['captcha'] = $security_code;
$width = 40; 
$height = 15;  
$image = ImageCreate($width, $height);  
$white = ImageColorAllocate($image, 255, 255, 255);
$black = ImageColorAllocate($image, 0, 0, 0);
ImageFill($image, 0, 0, $white); 
ImageString($image, 5, 2, 0, $_SESSION['captcha'], $black);
header("Content-Type: image/png"); 
Imagepng($image); 
ImageDestroy($image); 
} 
?>