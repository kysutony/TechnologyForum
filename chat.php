<?php
$stime1 = date('H:i:s d/m/Y');
if (isset($_POST['send']) && isset($_SESSION['login'])){
$reqpilo = mysqli_query($conn,'SELECT id,position,ncolor FROM dt_user WHERE id = "'.$_SESSION['idlogin'].'"');
if($respilo = mysqli_fetch_assoc($reqpilo)){
$pilo = $respilo['position'];
$mo = $respilo['ncolor'];
}
if ($_POST['nd'] == '#delete' OR $_POST['nd'] == '#del' OR $_POST['nd'] == '#xoa'){
if ($pilo == 'Admin' OR $pilo == 'Mod' OR $pilo == 'SMod'){
mysqli_query('TRUNCATE TABLE dt_chat');
//mysqli_query($conn,'INSERT INTO dt_chat SET idaccount = "2", content = "Chatbox đã được làm sạch bởi [url=/profile/'.$_SESSION['login'].'][color='.$mo.']'.$_SESSION['login'].'[/color][/url] !",subchat1 = "'.$stime1.'"');
echo '<script>window.location.href="/?l='.rand(00,99).'";</script>';
$in = 'not';
}
}
if ($in != 'not'){
if ($_POST['nd'] == ''){
$ved = 'Bạn chưa nhập nội dung !';
$p = '0';
$adg = '0';
}
if (strlen($_POST['nd']) < '2' && $adg != '0'){
$ved = 'Độ dài nội dung ít nhất là 2 ký tự !';
$p = '0';
}
if ($_SESSION['closechat'] > time()-10 && $adg != '0'){
$ved = 'Mỗi tin nhắn gửi phải cách nhau 10 giây !';
$p = '0';
}
if ($p != '0'){
// mysqli_query($conn,'INSERT INTO dt_chat SET idaccount = "'.$_SESSION['idlogin'].'", content = "'.mysqli_real_escape_string(htmlspecialchars($_POST['nd'])).'",subchat1 = "'.$stime1.'"');
$idccc = $_SESSION['idlogin'];
$content = htmlspecialchars($_POST['nd']);
mysqli_query($conn,"INSERT INTO `dt_chat`( `idaccount`, `content`, `subchat1`) VALUES ('$idccc', '$content', '$stime1')");
$_SESSION['closechat'] = time();
echo '<script>window.location.href="/?l='.rand(00,99).'";</script>';
}
}
}
$ec = mysqli_fetch_assoc(mysqli_query($conn,'SELECT COUNT(id) as uli FROM dt_chat'));
echo '<div class="phdr">Chatbox ('.$ec['uli'].')</div>'.$nen.'';
if (login){
echo '<div class="list"> <form action="" method="post" id="login">Nội dung: '.$ved.'<br><textarea name="nd" rows="2">'.$dlchat.'</textarea><br><input type="submit" name="send" value="Gửi" class="isubmit"></form></div><div class="phdr" style="padding:3px;"></div> ';
}
$laydulieu = mysqli_query($conn,'SELECT count(id) as tong FROM dt_chat');
$xuatdulieu = mysqli_fetch_assoc($laydulieu);
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
$hiendulieu = mysqli_query($conn,'SELECT * FROM dt_chat ORDER BY id DESC LIMIT '.$batdau.','.$gioihan.'');
if (mysqli_num_rows($hiendulieu)){
while($lay = mysqli_fetch_assoc($hiendulieu)){
if ($_SESSION['idlogin'] == $lay[
'idaccount']){
if ($ggpd){
$hu = '<a href="?cedit='.$lay['id'].'" class="vp">Edit</a>';
}
} else {
$hu = '';
}
$upl = mysqli_query($conn,'SELECT * FROM dt_user where id = "'.$lay['idaccount'].'"');
if (mysqli_num_rows($upl)){
while($layupl = mysqli_fetch_assoc($upl)){
echo '<div id="ndchat" class="list1"><table id="'.$value.'" cellpadding="0" cellspacing="1"><tr><td width="auto"><img src="'.$layupl['avatar'].'?i='.rand(000,999).'" width="40" height="40"></td><td>'.account($lay['idaccount']).'<br/>'.$layupl['status'].'<br>'.fud($lay['subchat1'],'upper').'</td></tr></table></div>';
}
}
echo '<div class="list">'.bbcode($lay['content']).'<div style="text-align:right;">'.$hu.'</div></div>';
}
}
if ($vtrang > $gioihan){
echo '<div class="paging">';
if ($dtrang > '1' && $ttrang > '1'){
echo '<a href="?page='.($dtrang-1).'">« </a>';
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