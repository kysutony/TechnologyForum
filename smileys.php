<?php
$title='Biểu Tượng Vui';
include 'head.php';
echo '<div class="phdr">Biểu Tượng Vui</div>';
$tet = ':D :)) :) :3 :vx: :vl: :vote: :v :(( :( =)) :good: :hack: :rip: :wow: :yeah: :ym: :yaoming: :yao1: :what: :troll: :troi: :lcb: :1lol: :2lol: :amen: :ban: :bom: :brick: :buoi: :buon: :buonngu: :chan: :chao: :chay: :chay2: :choang: :choang2: :clgt: :dau: :dc: :decu: :den: :die: :dien: :dkm: :fa: :fu: :gach: :ge: :ha: :haha: :haiz: :hehe: :help: :her: :hi: :hihi: :hix: :hixhix: :hoho: :hohuha: :hu: :iurui: :kaka: :keke: :khong: :leuleu: :loa: :lol: :love: :met: :nan: :ngap: :ngau: :ngau2: :ngo: :ngon: :no: :nono: :o: :oa: :oaoa: :oe: :oeoe: :oil: :oil2: :oil3: :pun: :suyt: :them: :tien: :tuc: :x: :xi: :xoaybong: :xoaybong2: :xoaybong3: :sad: :sogood: :sosad:';
$nam = explode(' ',$tet);
$total = count($nam);;
if ($total <= '10'){
$show = $total;
$totalpage = '1';
} else {
$show = '10';
$totalp = ceil($total/$show);
if ($totalp < ($total/$show)){
$totalpage = $totalp+1;
} else {
$totalpage = $totalp;
}
}
$page = $_GET['page'];
if (preg_match('#([0-9]+)#is', $page, $pge) && $page > '0' && $page <= $totalpage){
$nowpage = $page;
} else {
$nowpage = '1';
}
if ($nowpage == '1'){
$star = '0';
} else {
$star = ($nowpage*$show)-$show;
}
$end = $star+($show-1);
for($i = $star; $i <= $end; $i++){
if ($nam[$i]){
$img = str_replace(':','',$nam[$i]);
$resml = array(
')' => '1',
'))' => '2',
'(' => '6',
'((' => '4',
'=))' => '5'
);
$img = '<img src="http://mbkvn.tk/image/default/smile/'.strtr($img,$resml).'.gif">';
echo '<div class="list">'.$img.' '.$nam[$i].'</div>';
}
}
echo '<div class="paging">';
if($nowpage>1){
echo '<a href="?page='.($nowpage-1).'">«</a>';
}
for($p=1; $p<=$totalpage; $p++){
if($nowpage!=$p && $p<$nowpage){
if($nowpage==($totalpage-1) && ($nowpage-3)<=$p){
echo '<a href="?page='.$p.'">'.$p.'</a>';
}elseif($nowpage==$totalpage && ($nowpage-4)<=$p){
echo '<a href="?page='.$p.'">'.$p.'</a>';
}elseif($nowpage>1 && $nowpage<$totalpage && ($nowpage-2)<=$p){
echo '<a href="?page='.$p.'">'.$p.'</a>';
}}}
echo '<span>'.$nowpage.'</span>';
for($p=1; $p<=$totalpage; $p++){
if($nowpage!=$p && $p>$nowpage){
if($nowpage==2 && ($nowpage+3)>=$p){
echo '<a href="?page='.$p.'">'.$p.'</a>';
}elseif($nowpage==1 && ($nowpage+4)>=$p){
echo '<a href="?page='.$p.'">'.$p.'</a>';
}elseif($nowpage>1 && $nowpage<$totalpage && ($nowpage+2)>=$p){
echo '<a href="?page='.$p.'">'.$p.'</a>';
}}}
if($nowpage<$totalpage){
echo '<a href="?page='.($nowpage+1).'">»</a>';
}
if ($nowpage == $totalpage){
if ($totalpage == '1'){
$gourl = '1';
} else {
$gourl = $nowpage-1;
}
} else {
$gourl = $nowpage+1;
}
echo '</div>';
include 'foot.php';
?>