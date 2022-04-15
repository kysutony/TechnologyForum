<?php
function rand_string($length){
$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
$size = strlen($chars);
for($i = 0;$i < $length;$i++ ){
$str .= $chars[rand(0,$size-1)];
}
return $str;
}
function fud($eday,$lop){
if ($lop == 'lower'){
$h = 'h';
}
if ($lop == 'upper'){
$h = 'H';
}
$xc = explode(' ',$eday);
$cb = $xc['1'];
$cbc = date('d/m/Y');
$cbcb = date('d')-1;
if (strlen($cbcb) == '1'){
$hk = '0';
} else {
$hk = '';
}
$cbb = date('m/Y');
$cbc1 = $hk.$cbcb.'/'.$cbb;
if ($cb == $cbc){
return $h.'ôm nay, '.$xc['0'];
} elseif ($cb == $cbc1){
return $h.'ôm qua, '.$xc['0'];
} else {
return $eday;
}
}
function rtext($length){
$chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
$size = strlen($chars);
for($i = 0;$i < $length;$i++){
$str .= $chars[rand(0,$size-1)];
}
return $str;
}
function vntext($title){
$replacement = '-';
$map = array();
$quotedReplacement = preg_quote($replacement, '/');
$default = array(
'/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ|À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ|å/' => 'a',
'/e|è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ|È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ|ë/' => 'e',
'/ì|í|ị|ỉ|ĩ|Ì|Í|Ị|Ỉ|Ĩ|î/' => 'i',
'/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ|Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ|ø/' => 'o',
'/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ|Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ|ů|û/' => 'u',
'/ỳ|ý|ỵ|ỷ|ỹ|Ỳ|Ý|Ỵ|Ỷ|Ỹ/'=> 'y',
'/đ|Đ/' => 'd',
'/ç/' => 'c',
'/ñ/' => 'n',
'/ä|æ/' => 'ae',
'/ö/' => 'o',
'/ü/' => 'u',
'/Ä/' => 'A',
'/Ü/' => 'U',
'/Ö/' => 'O',
'/ß/' => 'b',
'/̃|̉|̣|̀|́/' => '',
'/[^\s\p{Ll}\p{Lm}\p{Lo}\p{Lt}\p{Lu}\p{Nd}]/mu' => ' ', '/\\s+/' => $replacement,
sprintf('/^[%s]+|[%s]+$/', $quotedReplacement, $quotedReplacement) => '',
);
$title = urldecode($title);
mb_internal_encoding('UTF-8');
$map = array_merge($map, $default);
return strtolower( preg_replace(array_keys($map), array_values($map), $title) );
}
function file_size($a_bytes){
if($a_bytes < 1024){
return $a_bytes .' B';
}elseif ($a_bytes < 1048576){
return round($a_bytes / 1024, 2) .' KB';
}elseif ($a_bytes < 1073741824){
return round($a_bytes / 1048576, 2) . ' MB';
}
}
?>