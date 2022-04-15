<?php
$opd = opendir('otfi/dnac/ipfd');
while($fp = readdir($opd)){
if ($fp != '.' && $fp != '..' && $fp != $_SERVER['REMOTE_ADDR']){
$dp = explode('-',file_get_contents('otfi/dnac/ipfd/'.$fp));
if ($dp['0'] < (time()-300)){
unlink('otfi/dnac/ipfd/'.$fp);
}
}
}
$ip = $_SERVER['REMOTE_ADDR'];
if (file_exists('otfi/dnac/ipfd/'.$ip)){
$data = explode('-',file_get_contents('otfi/dnac/ipfd/'.$ip));
if ($data['1'] < '100'){
file_put_contents('otfi/dnac/ipfd/'.$ip,time().'-'.($data['1']+1));
}
$datad = explode('-',file_get_contents('otfi/dnac/ipfd/'.$ip));
if ($datad['0'] < (time()-300)){
unlink('otfi/dnac/ipfd/'.$ip);
}
if ($datad['1'] > '99'){
exit('Deny access !');
}
} else {
file_put_contents('otfi/dnac/ipfd/'.$ip,time().'-0');
}