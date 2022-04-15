<?php

if (isset($_GET['t'])){
$ffh = explode(',',$trangay);
echo '<script>window.location.href="'.$ffh['1'].'";</script>';
}
include 'bbcode.php';
include 'head.php';
include 'config.php';
if (isset($_POST['sendd']) && isset($_SESSION['login'])){
if ($_POST['ndd'] == ''){
$erndd = 'Bạn chưa nhập nội dung !';
$p = '0';
$adg = '0';
}
if (strlen($_POST['ndd']) < '2' && $adg != '0'){
$erndd = 'Độ dài nội dung ít nhất là 2 ký tự !';
$p = '0';
}
if ($_SESSION['closechatt'] > time()-10 && $adg != '0'){
$erndd = 'Mỗi nội dung gửi phải cách nhau 10 giây !';
$p = '0';
}
if ($p != '0'){
$swall1 = date('H:i:s d/m/Y');
mysqli_query($conn, 'INSERT INTO dt_wallhome SET idaccount = "'.$_SESSION['idlogin'].'", content = "'.mysqli_real_escape_string(htmlspecialchars($_POST['ndd'])).'",fidacc = "'.$uid.'",subwall1 = "'.$swall1.'"');
if ($_SESSION['login'] == $udl['account'] && isset($_SESSION['login'])){
echo '';
} else {
$reqwall =mysqli_query($conn,'SELECT * FROM dt_notification WHERE idaccount = "'.$_SESSION['idlogin'].'" && content = "đã đăng lên tường nhà của bạn-/profile/'.$_GET['u'].'" && cidacc = "'.$uid.'" && goku = "wallhome"');
if ($reswall =mysqli_fetch_assoc($reqwall)){
mysqli_query($conn, 'UPDATE dt_notification SET view = "none" WHERE idaccount = "'.$_SESSION['idlogin'].'" && content = "đã đăng lên tường nhà của bạn-/profile/'.$_GET['u'].'" && cidacc = "'.$uid.'" && goku = "wallhome" && view = "view"');
} else {
mysqli_query($conn, 'INSERT INTO dt_notification SET idaccount = "'.$_SESSION['idlogin'].'", content = "đã đăng lên tường nhà của bạn-/profile/'.$_GET['u'].'",cidacc = "'.$uid.'",goku = "wallhome"');
}
}
header('location:/profile/'.$u.'?i='.rand(0,99).'');
$_SESSION['closechatt'] = time();
echo '<script>window.location.href="?l='.rand(00,99).'";</script>';
}
}
$ec2 =mysqli_fetch_assoc(mysqli_query($conn, 'SELECT COUNT(id) as ulii FROM dt_wallhome where fidacc = "'.$uid.'"'));
echo '<div class="phdr">Tường Nhà </div>';
if (login){
echo '<div class="list"> <form action="" method="post">Nội dung: '.$erndd.'<br><textarea name="ndd"></textarea><br><input type="submit" name="sendd" value="Đăng" class="isubmit"></form></div><div class="phdr" style="padding:3px;"></div>';
} else {
echo '';
}
$laydulieu =mysqli_query($conn,'SELECT count(id) as tong FROM dt_wallhome WHERE fidacc = "'.$uid.'"');
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
$hiendulieu =mysqli_query($conn,'SELECT * FROM dt_wallhome WHERE fidacc = "'.$uid.'" ORDER BY id DESC LIMIT '.$batdau.','.$gioihan.'');
if (mysqli_num_rows($hiendulieu)){
while($lay =mysqli_fetch_assoc($hiendulieu)){
$upl =mysqli_query($conn,'SELECT * FROM dt_user where id = "'.$lay['idaccount'].'"');
if (mysqli_num_rows($upl)){
while($layupl =mysqli_fetch_assoc($upl)){
if ($layupl['lastonl'] > (time()-180)){
$t36 = '<img src="image/default/on.png">';
} else {
$t36 = '<img src="image/default/off.png">';
}
if ($_SESSION['idlogin'] == $uid){
$act = '(<a href="action/wallhome/'.$u.'/'.$uid.'/'.$lay['id'].'/delete" style="color:red;">Xóa</a>)';
}
echo '<div class="list1"><table id="'.$value.'" cellpadding="0" cellspacing="1"><tr><td width="auto"><img src="'.$layupl['avatar'].'?i='.rand(000,999).'" width="40" height="40"/></td><td><b><a href="profile/'.$layupl['account'].'" style="color:'.$layupl['ncolor'].';">'.$layupl['account'].'</a></b> <font color="'.$layupl['ncolor'].'">('.$layupl['position'].')</font> '.$t36.'<br/>'.$layupl['status'].'<br>'.fud($lay['subwall1'],'upper').'</td></tr></table></div>';
}
}
echo '<div class="list">'.bbcode($lay['content']).'
 '.$act.'</div>';
}
} else {
echo '<div class="list2">Chưa có nội dung  nào trên tường nhà !</div>';
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
if ($ec2['ulii'] != '0'){
echo '<div class="phdr">Tổng: '.$ec2['ulii'].'</div>';
}
include 'foot.php';
?>