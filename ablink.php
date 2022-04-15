<?php
function ndurl($matches){
$ret = '';
$url = $matches['2'];
if (empty($url))
return $matches['0'];
if (in_array(substr($url, -1),array('.',',',';',':')) === true){
$ret = substr($url, -1);
$url = substr($url, 0,strlen($url)-1);
}
return $matches['1'].' <a href="'.$url.'" target="_blank">'.$url.'</a>'.$ret;
}
function ndlink($ret){
$ret = ' '.$ret;
$ret = preg_replace_callback('#([\s>])([\w]+?://[\w\\x80-\\xff\#$%&~/.\-;:=,?@\[\]+]*)#is','ndurl',$ret);
$ret = preg_replace('#(<a( [^>]+?>|>))<a [^>]+?>([^>]+?)</a></a>#i','$1$3</a>',$ret);
$ret = trim($ret);
return $ret;
}
?>