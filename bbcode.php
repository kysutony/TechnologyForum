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
function smile($sml){
$tet = ':lcb: :D :)) :) :3 :vx: :vl: :vote: :v :(( :( =)) :good: :hack: :rip: :wow: :yeah: :ym: :yao1: :yaoming: :what: :troll: :troi: :1lol: :2lol: :amen: :ban: :bom: :brick: :buoi: :buon: :buonngu: :chan: :chao: :chay: :chay2: :choang: :choang2: :clgt: :dau: :dc: :decu: :den: :die: :dien: :dkm: :fa: :fu: :gach: :ge: :ha: :haha: :haiz: :hehe: :help: :her: :hi: :hihi: :hix: :hixhix: :hoho: :hohuha: :hu: :iurui: :kaka: :keke: :khong: :leuleu: :loa: :lol: :love: :met: :nan: :ngap: :ngau: :ngau2: :ngo: :ngon: :no: :nono: :o: :oa: :oaoa: :oe: :oeoe: :oil: :oil2: :oil3: :pun: :suyt: :them: :tien: :tuc: :x: :xi: :xoaybong: :xoaybong2: :xoaybong3: :sad: :sogood: :sosad:';
$nam = explode(' ',$tet);
foreach($nam as $key => $value){
$img = str_replace(':','',$value);
$resml = array(
')' => '1',
'))' => '2',
'(' => '6',
'((' => '4',
'=))' => '5'
);
$img = '<img src="http://mbkvn.tk/image/default/smile/'.strtr($img,$resml).'.gif">';
$sml = str_replace($value, $img, $sml);
}
return $sml;
}
function bb($ndp){
if (preg_match_all('#@([a-zA-Z0-9]+)#is',$ndp,$tk)){
$tongac = count($tk['0']);
for($i = 0;$i < $tongac;$i++){
$kt = mysqli_query($conn,'SELECT account,ncolor FROM dt_user WHERE account = "'.substr($tk['0'][$i],1,(strlen($tk['0'][$i])-1)).'"');
if (mysqli_num_rows($kt)){
$as = mysqli_fetch_assoc($kt);
$ndp = str_replace($tk['0'][$i],'<a href="/profile/'.$as['account'].'" style="color:'.$as['ncolor'].';">@'.$as['account'].'</a>',$ndp);
}
}
}
$ndp = preg_replace('#\[audio\](.*?)\[/audio\]#is', '<center><audio controls> <source src="$1" type="audio/mpeg"> <embed height="80" width="320" autostart="0" src="$1"> <noembed> 000</noembed></audio></center>', $ndp);
$ndp = preg_replace('#\[img\](.*?)\[/img\]#is', '<center><img src="$1" alt="[IMG]" style="max-width: 98%;" class="image" /></center>', $ndp);
$ndp = preg_replace('#\[color=(.*?)](.*?)\[/color\]#is', '<font color="$1">$2</font>', $ndp);
$ndp = preg_replace('#\[url=(.*?)](.*?)\[/url\]#is', '<a href="$1" target="_blank" class="noload">$2</a>', $ndp);
$ndp = preg_replace('#\[url\](.*?)\[/url\]#is', '<a href="$1" target="_blank" class="noload">$1</a>', $ndp);
$ndp = preg_replace('#\[b\](.*?)\[/b\]#is', '<b>$1</b>', $ndp);
$ndp = preg_replace('#\[i\](.*?)\[/i\]#is', '<i>$1</i>', $ndp);
$ndp = preg_replace('#\[u\](.*?)\[/u\]#is', '<u>$1</u>', $ndp);
$ndp = preg_replace('#\[youtube\](.*?)\[/youtube\]#is', '<iframe preload="auto" src="https://www.youtube.com/embed/$1?autoplay=0" frameborder="0" allowfullscreen></iframe>', $ndp);
$ndp = preg_replace('#\[video\](.*?)\[/video\]#is', '<video width="auto" controls><source src="$1" type="video/mp4">
</video>', $ndp);
$ndp = smile($ndp);
return $ndp;
}
function bbcode($py) {
$rep = array(
':' => '<:>',
'=' => '<=>',
'[' => '<[>',
']' => '<]>'
);
preg_match_all('#\[code=php](.+?)\[\/code]#is',$py,$pupy);
$tong = count($pupy[0])-1;
for($i = 0;$i <= $tong;$i++){
$pp = $pupy[0][$i];
$sc= strpos($pp,'[code=php]');
$ec= strpos($pp,'[/code]');
$code = substr($pp,($sc+10),($ec-$sc-10));
$copy = strtr($code,$rep);
$py = str_replace('[code=php]'.$code.'[/code]','<div class="code"><b>PHP</b></div><div class="list" style="color:#0000BB;">'.$copy.'</div>',$py);
}
preg_match_all('#\[code=text](.+?)\[\/code]#is',$py,$pupy);
$tong = count($pupy[0])-1;
for($i = 0;$i <= $tong;$i++){
$pp = $pupy[0][$i];
$sc= strpos($pp,'[code=text]');
$ec= strpos($pp,'[/code]');
$code = substr($pp,($sc+11),($ec-$sc-11));
$copy = strtr($code,$rep);
$py = str_replace('[code=text]'.$code.'[/code]','<div class="code"><b>TEXT</b></div><div class="list" style="color:#0000BB;">'.$copy.'</div>',$py);
}
preg_match_all('#\[code=twig](.+?)\[\/code]#is',$py,$pupy);
$tong = count($pupy[0])-1;
for($i = 0;$i <= $tong;$i++){
$pp = $pupy[0][$i];
$sc= strpos($pp,'[code=twig]');
$ec= strpos($pp,'[/code]');
$code = substr($pp,($sc+11),($ec-$sc-11));
$copy = strtr($code,$rep);
$py = str_replace('[code=twig]'.$code.'[/code]','<div class="code"><b>TWIG</b></div><div class="list" style="color:#0000BB;">'.$copy.'</div>',$py);
}
preg_match_all('#\[code=html](.+?)\[\/code]#is',$py,$pupy);
$tong = count($pupy[0])-1;
for($i = 0;$i <= $tong;$i++){
$pp = $pupy[0][$i];
$sc= strpos($pp,'[code=html]');
$ec= strpos($pp,'[/code]');
$code = substr($pp,($sc+11),($ec-$sc-11));
$copy = strtr($code,$rep);
$py = str_replace('[code=html]'.$code.'[/code]','<div class="code"><b>HTML</b></div><div class="list" style="color:#0000BB;">'.$copy.'</div>',$py);
}
preg_match_all('#\[code=css](.+?)\[\/code]#is',$py,$pupy);
$tong = count($pupy[0])-1;
for($i = 0;$i <= $tong;$i++){
$pp = $pupy[0][$i];
$sc= strpos($pp,'[code=css]');
$ec= strpos($pp,'[/code]');
$code = substr($pp,($sc+10),($ec-$sc-10));
$copy = strtr($code,$rep);
$py = str_replace('[code=css]'.$code.'[/code]','<div class="code"><b>CSS</b></div><div class="list" style="color:#0000BB;">'.$copy.'</div>',$py);
}
preg_match_all('#\[code=javascript](.+?)\[\/code]#is',$py,$pupy);
$tong = count($pupy[0])-1;
for($i = 0;$i <= $tong;$i++){
$pp = $pupy[0][$i];
$sc= strpos($pp,'[code=javascript]');
$ec= strpos($pp,'[/code]');
$code = substr($pp,($sc+17),($ec-$sc-17));
$copy = strtr($code,$rep);
$py = str_replace('[code=javascript]'.$code.'[/code]','<div class="code"><b>JAVASCRIPT</b></div><div class="list" style="color:#0000BB;">'.$copy.'</div>',$py);
}
preg_match_all('#\[code=htaccess](.+?)\[\/code]#is',$py,$pupy);
$tong = count($pupy[0])-1;
for($i = 0;$i <= $tong;$i++){
$pp = $pupy[0][$i];
$sc= strpos($pp,'[code=htaccess]');
$ec= strpos($pp,'[/code]');
$code = substr($pp,($sc+15),($ec-$sc-15));
$copy = strtr($code,$rep);
$py = str_replace('[code=htaccess]'.$code.'[/code]','<div class="code"><b>HTACCESS</b></div><div class="list" style="color:#0000BB;">'.$copy.'</div>',$py);
}
$black = array(
'<:>' => ':',
'<=>' => '=',
'<[>' => '[',
'<]>' => ']',
);
$py = bb($py);
$py = strtr($py,$black);
return ndlink(nl2br($py));
}
?>