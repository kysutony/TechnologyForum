<?php
$title = 'Tin Nhắn';
$trangay = 'Tin Nhắn,/message';
include 'head.php';
include 'bbcode.php';
include 'func.php';
if (login){
if (isset($_POST['pm'])){
if ($_POST['tk'] != ''){
echo '<script>window.location.href="/message/'.$_POST['tk'].'";</script>';
} else {
$erptk = 'Bạn chưa nhập tài khoản muốn nhắn tin !';
}
}
if (isset($_GET['pm'])){
$requidm =mysqli_query($conn,'SELECT id,account FROM dt_user WHERE account = "'.$_GET['pm'].'"');
if($resuidm =mysqli_fetch_assoc($requidm)){
$uidm = $resuidm['id'];
$tentk = $resuidm['account'];
}
$requidmm =mysqli_query($conn,'SELECT id,account FROM dt_user WHERE account = "'.$_SESSION['login'].'"');
if($resuidmm =mysqli_fetch_assoc($requidmm)){
$uidmm = $resuidmm['id'];
$tentkk = $resuidmm['account'];
}
$stime1 = date('H:i:s d/m/Y');
if (isset($_POST['send'])){
if ($_POST['nd'] == ''){
$ved = 'Bạn chưa nhập tin nhắn !';
$p = '0';
$adg = '0';
}
if (strlen($_POST['nd']) < '2' && $adg != '0'){
$ved = 'Độ dài tin nhắn ít nhất là 2 ký tự !';
$p = '0';
}
if ($_SESSION['closemess'] > time()-10 && $adg != '0'){
$ved = 'Mỗi tin nhắn gửi phải cách nhau 10 giây !';
$p = '0';
}
if ($p != '0'){
mysql_query('INSERT INTO dt_message SET idaccount = "'.$_SESSION['idlogin'].'", idpl = "'.$uidm.'",content = "'.mysql_real_escape_string(htmlspecialchars($_POST['nd'])).'",submess = "'.$stime1.'"');
if ($_SESSION['login'] == $uidmm){
} else {
$reqnoti =mysqli_query($conn,'SELECT * FROM dt_notification WHERE idaccount = "'.$_SESSION['idlogin'].'" && content = "Tin nhắn mới từ-/message/'.$tentkk.'"
&&  cidacc = "'.$uidm.'" && goku = "message"');
if ($resnoti =mysqli_fetch_assoc($reqnoti)){
mysql_query('UPDATE dt_notification SET view = "none" WHERE idaccount = "'.$_SESSION['idlogin'].'" && content = "Tin nhắn mới từ-/message/'.$tentkk.'"
&& cidacc = "'.$uidm.'" && goku = "message" && view = "view"');
} else {
mysql_query('INSERT INTO dt_notification SET idaccount = "'.$_SESSION['idlogin'].'", content = "Tin nhắn mới từ-/message/'.$tentkk.'",cidacc = "'.$uidm.'",goku = "message"');
}
}
$reqed =mysqli_query($conn,'SELECT * FROM dt_messageed WHERE (idaccount ="'.$_SESSION['idlogin'].'" AND gidacc = "'.$uidm.'") OR (gidacc ="'.$_SESSION['idlogin'].'" AND idaccount = "'.$uidm.'")');
if($resed =mysqli_fetch_assoc($reqed)){
mysql_query('UPDATE dt_messageed SET last = "'.time().'" WHERE (idaccount ="'.$_SESSION['idlogin'].'" AND gidacc = "'.$uidm.'") OR (gidacc ="'.$_SESSION['idlogin'].'" AND idaccount = "'.$uidm.'")');
} else {
mysql_query('INSERT INTO dt_messageed SET idaccount = "'.$_SESSION['idlogin'].'", gidacc = "'.$uidm.'",last = "'.time().'"');
}
$_SESSION['closemess'] = time();
echo '<script>window.location.href="?l='.rand(00,99).'";</script>';
}
}
$ec =mysqli_fetch_assoc(mysql_query('SELECT COUNT(id) as uli FROM dt_message WHERE (idaccount ="'.$_SESSION['idlogin'].'" AND idpl = "'.$uidm.'") OR (idpl ="'.$_SESSION['idlogin'].'" AND idaccount = "'.$uidm.'")'));
echo '<div class="phdr"><a href="/message" style="color:#fff;">Tin Nhắn</a> / '.$_GET['pm'].'</div>';
if ($_GET['pm'] == $_SESSION['login']){
echo '<div class="list2">Bạn không thể tự nhắn tin với mình !</div>';
$dep = '0';
}
if ($dep != '0'){
$requt =mysqli_query($conn,'SELECT account FROM dt_user WHERE account = "'.$_GET['pm'].'"');
if($resut =mysqli_fetch_assoc($requt)){
if ($_GET['pm'] != $tentk){
echo '<script>window.location.href="/message/'.$tentk.'";</script>';
}
} else {
echo '<div class="list2">Thành viên '.$_GET['pm'].' không tồn tại !</div>';
$ccc = '0';
}
}
if ($ccc != '0' && $dep != '0'){
mysql_query('UPDATE dt_notification SET view = "view" WHERE view = "none" && cidacc = "'.$_SESSION['idlogin'].'" && goku = "message" && content = "Tin nhắn mới từ-/message/'.$_GET['pm'].'"');
mysql_query('UPDATE dt_message SET view = "view" WHERE idpl ="'.$_SESSION['idlogin'].'" && idaccount = "'.$uidm.'" AND view = "no"');
include 'pm.php';
}
} else {
echo '<div class="phdr">Tin Nhắn</div><div class="list">Tài khoản muốn nhắn tin ? '.$erptk.'<form action="" method="post"><input type="text" name="tk"><br><input type="submit" name="pm" value="PM"></form></div><div class="phdr">Danh Sách PM</div>';
$reqmail =mysqli_query($conn,'SELECT * FROM dt_messageed WHERE idaccount = "'.$_SESSION['idlogin'].'" OR gidacc = "'.$_SESSION['idlogin'].'"  ORDER BY last DESC');
if(mysqli_num_rows($reqmail)){
while($resmail =mysqli_fetch_assoc($reqmail)){
if ($resmail['idaccount'] == $_SESSION['idlogin']){
$hgb = $resmail['gidacc'];
} else {
$hgb = $resmail['idaccount'];
}
$reqmai =mysqli_query($conn,'SELECT id,account,ncolor FROM dt_user WHERE id = "'.$hgb.'"');
if ($resmai =mysqli_fetch_assoc($reqmai)){
echo '<div class="list"><a href="/message/'.$resmai['account'].'" style="color:'.$resmai['ncolor'].';">'.$resmai['account'].'</a> '.$plio.'</div>';
}
}
} else {
echo '<div class="list2">PM trống !</div>';
}
}
} else {
echo '<div class="phdr">Tin Nhắn</div><div class="list2">Chỉ dành cho thành viên đã đăng nhập! </div>';
}
include 'foot.php';
?>