<?php
if (isset($_GET['t'])){
echo '<script>window.location.href="/message/'.$_GET['pm'].'";</script>';
}
echo '<div class="list"> <form action="" method="post" id="login">Tin nhắn: '.$ved.'<br><textarea name="nd" rows="2"></textarea><br><input type="submit" name="send" value="Gửi" class="isubmit"></form></div><div class="phdr" style="padding:3px;"></div>';
$laydulieu =mysqli_query($conn,'SELECT count(id) as tong FROM dt_message WHERE (idaccount ="'.$_SESSION['idlogin'].'" AND idpl = "'.$uidm.'") OR (idpl ="'.$_SESSION['idlogin'].'" AND idaccount = "'.$uidm.'")');
$xuatdulieu =mysqli_fetch_assoc($laydulieu);
$tdulieu = $xuatdulieu['tong'];
$vtrang = !empty($xuatdulieu) ? $xuatdulieu['tong'] : '0';
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
$hiendulieu =mysqli_query($conn,'SELECT * FROM dt_message WHERE (idaccount ="'.$_SESSION['idlogin'].'" AND idpl = "'.$uidm.'") OR (idpl ="'.$_SESSION['idlogin'].'" AND idaccount = "'.$uidm.'") ORDER BY id DESC LIMIT '.$batdau.','.$gioihan.'');
if (mysqli_num_rows($hiendulieu)){
while($lay =mysqli_fetch_assoc($hiendulieu)){
if ($lay['view'] != 'no'){
$vieww = 'list';
} else {
$vieww = 'list3';
}
$upl =mysqli_query($conn,'SELECT * FROM dt_user where id = "'.$lay['idaccount'].'"');
if (mysqli_num_rows($upl)){
while($layupl =mysqli_fetch_assoc($upl)){
if ($layupl['lastonl'] > (time()-180)){
$vu = '<img src="/image/default/on.png">';
} else {
$vu = '<img src="/image/default/off.png">';
}
echo '<div class="list1"><table id="'.$value.'" cellpadding="0" cellspacing="1"><tr><td width="auto"><img src="'.$layupl['avatar'].'?i='.rand(000,999).'" width="40" height="40"></td><td><b><a href="../profile/'.$layupl['account'].'" style="color:'.$layupl['ncolor'].';">'.$layupl['account'].'</a></b> <font color="'.$layupl['ncolor'].'">('.$layupl['position'].') '.$vu.'</font><br/>'.$layupl['status'].'<br>'.fud($lay['submess'],'upper').'</td></tr></table></div>';
}
}
echo '<div class="'.$vieww.'">'.bbcode($lay['content']).'</div>';
}
} else {
echo '<div class="list2">Chưa có tin nhắn nào !</div>';
}
if ($vtrang > $gioihan){
echo '<div class="paging">';
if ($dtrang > '1' && $ttrang > '1'){
echo '<a href="?page='.($dtrang-1).'">«</a>';
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
if ($ec['uli'] != '0'){
echo '<div class="phdr">Tổng: '.$ec['uli'].'</div>';
}
?>