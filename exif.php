<?php
$laydulieu = mysqli_query($conn,'SELECT count(id) as tongfo FROM dt_forum WHERE cm = "'.$cmd.'"');
$xuatdulieu = mysqli_fetch_assoc($laydulieu);
$tdulieu = $xuatdulieu['tongfo'];
$vtrang = !empty($xuatdulieu) ? $xuatdulieu['tongfo'] : '0';
$dtrang = isset($_GET['page']) ? $_GET['page'] : '1';
$gioihan = '5';
$laytrang = floor($gioihan/2);
$sotrang = '5';
$ttrang = ceil($tdulieu / $gioihan);
if ($dtrang > $ttrang){
$dtrang = $ttrang;
} else if ($dtrang < '1'){
$dtrang = '1';
}
$batdau = ($dtrang-1) * $gioihan;
$hiendulieu = mysqli_query($conn,'SELECT * FROM dt_forum WHERE cm = "'.$cmd.'" ORDER BY id DESC LIMIT '.$batdau.','.$gioihan.'');
if (mysqli_num_rows($hiendulieu)){
while($lay = mysqli_fetch_assoc($hiendulieu)){
$reqcm = mysqli_query($conn,'SELECT * FROM dt_forumcmt WHERE idbv = "'.$lay['id'].'" ORDER BY id DESC LIMIT 1');
if ($nl = mysqli_fetch_assoc($reqcm)){
$reqcmm = mysqli_query($conn,'SELECT id,account,ncolor FROM dt_user WHERE id = "'.$nl['idaccount'].'"');
if ($nll = mysqli_fetch_assoc($reqcmm)){
$lava = '<a href="profile/'.$nll['account'].'" style="color:'.$nll['ncolor'].';">'.$nll['account'].'</a>';
}
}
if ($lay['rtype'] != 'trong'){
$vli = '<span class="xbun-'.rand(0,7).'">'.$lay['rtype'].'</span>';
}
$jta = mysqli_query($conn,'SELECT id,account,ncolor FROM dt_user WHERE id = "'.$lay['idaccount'].'"');
if ($p2017 = mysqli_fetch_assoc($jta)){
$p2017c = $p2017['ncolor'];
$p2017n = $p2017['account'];
}
$reqni = mysqli_query($conn,'SELECT * FROM dt_forumcmt WHERE idbv = "'.$lay['id'].'" ORDER BY id DESC');
if ($ncb = mysqli_fetch_assoc($reqni)){
$requs =mysqli_query($conn,$conn,'SELECT id,account,ncolor FROM dt_user WHERE id = "'.$ncb['idaccount'].'"');
if ($nhb = mysqli_fetch_assoc($requs)){
$lavaa = '<a href="profile/'.$nhb['account'].'" style="color:'.$nhb['ncolor'].';">'.$nhb['account'].'</a>';
}
}
if ($lavaa == ''){
$lava = '<a href="../../profile/'.$p2017n.'"><font color="'.$p2017c.'">'.$p2017n.'</font></a>';
} else {
$lava = $lavaa;
}
$coun = mysqli_fetch_assoc(mysqli_query($conn,'SELECT COUNT(id) as toforum FROM dt_forumcmt WHERE idbv = "'.$lay['id'].'"'));
if ($lay['colp'] == 'close'){
$img = '<img src="/image/default/topic-close.png">';
} else {
$img = '';
}
echo '<div class="list">'.$img.''.$vli.' <a href="/forum/'.vntext($lay['title']).'-'.$lay['id'].'" style="color:;">'.$lay['title'].'</a> [<img src="../../image/default/bl.png" height="16px" width="16px">'.$coun['toforum'].'] (<a href="../../profile/'.$p2017n.'"><font color="'.$p2017c.'">'.$p2017n.'</font></a>/'.$lava.')</div>';
}
} else {
echo '<div class="list2">Chưa có chủ đề này trong chuyên mục con này !</div>';
}
if ($vtrang > $gioihan){
echo '<div class="paging">';
if ($dtrang > '1' && $ttrang > '1'){
echo '<a href="?page='.($dtrang-1).'">«
</a>';
}
if ($dtrang >= $sotrang){
$trangbatdau = $dtrang-$laytrang;
if ($ttrang > $dtrang+$laytrang){
$trangketthuc = $dtrang+$laytrang;
}
elseif($dtrang <= $ttrang && $dtrang > $ttrang-($sotrang-1)){
$trangbatdau = $ttrang-($sotrang-1);
$trangketthuc = $ttrang;
} else {
$trangketthuc = $ttrang;
}
} else {
$trangbatdau = 1;
if ($ttrang > $sotrang)
$trangketthuc = $sotrang;
else
$trangketthuc = $ttrang;
}
for ($i = $trangbatdau; $i <= $trangketthuc; $i++){
if ($i == $dtrang){
echo '<span>'.$i.'</span>';
} else {
echo '<a href="?page='.$i.'">'.$i.'</a>';
}
}
if ($dtrang < $ttrang && $ttrang > '1'){
echo '<a href="?page='.($dtrang+1).'">»</a>';
}
echo '</div>';
}
?>