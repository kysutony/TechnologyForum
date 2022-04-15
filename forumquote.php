<?php
$title = 'Trích Dẫn';
include 'head.php';
include 'func.php';
echo '<div class="phdr" style="color:#131CF1;">Trích Dẫn</div>';
if (login){
if (isset($_GET['id']) && isset($_GET['in']) OR $_GET['idd']){
$id = htmlspecialchars($_GET['id']);
$idd = htmlspecialchars($_GET['idd']);
$in = htmlspecialchars($_GET['in']);
if ($in == 'topic'){
$di = mysqli_query($conn,'SELECT id,colp FROM dt_forum WHERE id = "'.$id.'"');
if (mysqli_num_rows($di)){
$pj = mysqli_fetch_assoc($di);
if ($pj['colp'] == 'close'){
echo '<div class="list2">Bạn không thể trích dẫn chủ đề đã đóng cửa !</div>';
include 'foot.php';
die();
}
}
$reqtopic = mysqli_query($conn,'SELECT id,idaccount,title FROM dt_forum WHERE id = "'.$id.'"');
if (mysqli_num_rows($reqtopic)){
$restopic = mysqli_fetch_assoc($reqtopic);
$title = $restopic['title'];
$requ = mysqli_query($conn,'SELECT id,account,ncolor FROM dt_user WHERE id = "'.$restopic['idaccount'].'"');
if (mysqli_num_rows($requ)){
$resus = mysqli_fetch_assoc($requ);
if ($_SESSION['idlogin'] == $resus['id']){
echo '<div class="list2">Bạn không thể trích dẫn chủ đề của chính mình !</div>';
$form = '';
} else {
$u = '<b style="color:'.$resus['ncolor'].'";>'.$resus['account'].'</b>';
$form = '
<div class="list">Trích dẫn chủ đề của '.$u.': '.$ercon.'<br><form action="" method="post"><textarea name="ndcmt" rows="2"></textarea><br><input type="submit" name="qt" value="Đăng"></form></div>';
}
}
if (isset($_POST['qt'])){
$nd = htmlspecialchars($_POST['ndcmt']);
if ($nd == ''){
$ercon = 'Bạn chưa nhập nội dung !';
$er1 = 'err';
}
if ($er1 != 'err' && strlen($nd) < '2'){
$ercon = 'Độ dài nội dung ít nhất là 2 ký tự !';
$er2 = 'err';
}
if ($_SESSION['closeqt'] > time()-10 && $er1 != 'err' && $er2 != 'err' && $ercon == ''){
$ercon = 'Mỗi tin nhắn gửi phải cách nhau 10 giây !';
$er3 = 'err';
}
if ($er3 != 'err' && $er1 != 'err' && $er2 != 'err' && $ercon == ''){
mysqli_query($conn,'UPDATE dt_forum SET lasthd = "'.time().'" WHERE id = "'.$id.'"');
mysqli_query($conn,'INSERT INTO dt_forumcmt SET idaccount = "'.$_SESSION['idlogin'].'",content = "'.$nd.'",idbv = "'.$id.'",tpost = "'.date('H:i:s d/m/Y').'"');
$nf = mysqli_query($conn,'SELECT * FROM dt_forumqt WHERE idfr = "'.$id.'"');
if (mysqli_num_rows($nf)){
while($kg = mysqli_fetch_assoc($nf)){
if ($_SESSION['idlogin'] != $kg['idaccount']){
$jka = mysqli_query($conn,'SELECT * FROM dt_notification WHERE idaccount = "'.$_SESSION['idlogin'].'" && cidacc = "'.$kg['idaccount'].'" && content = "đã bình luận về chủ đề,/forum/'.vntext($titlebv).'-'.$id.'" && goku = "forum"');
if ($b = mysqli_fetch_assoc($jka)){
mysqli_query($conn,'UPDATE dt_notification SET view = "none" WHERE idaccount = "'.$_SESSION['idlogin'].'" && cidacc = "'.$kg['idaccount'].'" && content = "đã bình luận về chủ đề,/forum/'.vntext($titlebv).'-'.$id.'" && goku = "forum" && view = "view"');
} else {
mysqli_query($conn,'INSERT INTO dt_notification SET idaccount = "'.$_SESSION['idlogin'].'",cidacc = "'.$kg['idaccount'].'",content = "đã bình luận về chủ đề,/forum/'.vntext($title).'-'.$id.'",goku = "forum"');
}
}
$_SESSION['closeqt'] = time();
$h5 = mysqli_query($conn,'SELECT id FROM dt_forumcmt ORDER BY id DESC');
$idsa = mysqli_fetch_assoc($h5);
$cquote = mysqli_query($conn,'SELECT * FROM dt_forumquote WHERE idtopic = "'.$id.'" && idcmt = "'.$idsa['id'].'"');
if (mysqli_num_rows($cquote)){
echo 'loi du lieu';
} else {
mysqli_query($conn,'INSERT INTO dt_forumquote SET idtopic = "'.$id.'",idcmt = "",cmtid = "'.$idsa['id'].'"');
}
echo '<script>window.location.href="/forum/'.vntext($title).'-'.$id.'?l='.rand(00,99).'";</script>';
}
}
$ft = mysqli_query($conn,'SELECT * FROM dt_forumqt WHERE idaccount = "'.$_SESSION['idlogin'].'" && idfr = "'.htmlspecialchars($_GET['id']).'"');
if ($tf = mysqli_fetch_assoc($ft)){
echo '';
} else {
mysqli_query($conn,'INSERT INTO dt_forumqt SET idaccount = "'.$_SESSION['idlogin'].'",idfr = "'.$id.'"');
}
}
}
} else {
echo '<div class="list2">ID chủ đề không tồn tại !</div>';
}
echo $form;
} elseif($in == 'comment'){
$di = mysqli_query($conn,'SELECT id,colp FROM dt_forum WHERE id = "'.$id.'"');
if (mysqli_num_rows($di)){
$pj = mysqli_fetch_assoc($di);
if ($pj['colp'] == 'close'){
echo '<div class="list2">Bạn không thể trích dẫn bình luận tại chủ đề đã đóng cửa !</div>';
include 'foot.php';
die();
}
}
$reqtopic = mysqli_query($conn,'SELECT id,idaccount FROM dt_forumcmt WHERE id = "'.$idd.'" && idbv = "'.$id.'"');
if (mysqli_num_rows($reqtopic)){
$restopic = mysqli_fetch_assoc($reqtopic);
$det = mysqli_query($conn,'SELECT id,title FROM dt_forum WHERE id = "'.$id.'"');
if (mysqli_num_rows($det)){
$restopicc = mysqli_fetch_assoc($det);
$title = $restopicc['title'];
} else {
echo '<div class="list2">Chủ đề không tồn tại !</div>';
}
$requ =mysqli_query($conn,'SELECT id,account,ncolor FROM dt_user WHERE id = "'.$restopic['idaccount'].'"');
if (mysqli_num_rows($requ)){
$resus = mysqli_fetch_assoc($requ);
if ($_SESSION['idlogin'] == $resus['id']){
echo '<div class="list2">Bạn không thể trích dẫn bình luận của chính mình !</div>';
$form = '';
} else {
$u = '<b style="color:'.$resus['ncolor'].'";>'.$resus['account'].'</b>';
$form = '
<div class="signup__form" style="max-width: 500px; margin-top: 48px;margin-bottom: 46px;text-align: center;flex-direction: column;align-items: center;justify-content: center;display: flex;">
<div class="list">Trích dẫn bình luận của '.$u.': '.$ercon.'<br><form action="" method="post"><textarea class="form-control" placeholder="Trả lời bình luận" name="ndcmt" rows="2"></textarea><br><input type="submit" name="qt" value="Đăng" class="signup__btn-create btn btn--type-02" style ="width:auto; height:auto;font-size:12px; background-color: #71BBCE; border-radius: 8px;"></form></div></div>';
}
}
if (isset($_POST['qt'])){
$nd = htmlspecialchars($_POST['ndcmt']);
if ($nd == ''){
$ercon = 'Bạn chưa nhập nội dung !';
$er1 = 'err';
}
if ($er1 != 'err' && strlen($nd) < '2'){
$ercon = 'Độ dài nội dung ít nhất là 2 ký tự !';
$er2 = 'err';
}
if ($_SESSION['closeqt'] > time()-10 && $er1 != 'err' && $er2 != 'err' && $ercon == ''){
$ercon = 'Mỗi tin nhắn gửi phải cách nhau 10 giây !';
$er3 = 'err';
}
if ($er3 != 'err' && $er1 != 'err' && $er2 != 'err' && $ercon == ''){
mysqli_query($conn,'UPDATE dt_forum SET lasthd = "'.time().'" WHERE id = "'.$id.'"');
mysqli_query($conn,'INSERT INTO dt_forumcmt SET idaccount = "'.$_SESSION['idlogin'].'",content = "'.$nd.'",idbv = "'.$id.'",tpost = "'.date('H:i:s d/m/Y').'"');
$nf =mysqli_query($conn,'SELECT * FROM dt_forumqt WHERE idfr = "'.$id.'"');
if (mysqli_num_rows($nf)){
while($kg = mysqli_fetch_assoc($nf)){
if ($_SESSION['idlogin'] != $kg['idaccount']){
$jka =mysqli_query($conn,'SELECT * FROM dt_notification WHERE idaccount = "'.$_SESSION['idlogin'].'" && cidacc = "'.$kg['idaccount'].'" && content = "đã bình luận về chủ đề,/forum/'.vntext($titlebv).'-'.$id.'" && goku = "forum"');
if ($b = mysqli_fetch_assoc($jka)){
mysqli_query($conn,'UPDATE dt_notification SET view = "none" WHERE idaccount = "'.$_SESSION['idlogin'].'" && cidacc = "'.$kg['idaccount'].'" && content = "đã bình luận về chủ đề,/forum/'.vntext($titlebv).'-'.$id.'" && goku = "forum" && view = "view"');
} else {
mysqli_query($conn,'INSERT INTO dt_notification SET idaccount = "'.$_SESSION['idlogin'].'",cidacc = "'.$kg['idaccount'].'",content = "đã bình luận về chủ đề,/forum/'.vntext($title).'-'.$id.'",goku = "forum"');
}
}
$_SESSION['closeqt'] = time();
$h5 =mysqli_query($conn,'SELECT id FROM dt_forumcmt ORDER BY id DESC');
$idsa = mysqli_fetch_assoc($h5);
$cquotee =mysqli_query($conn,'SELECT * FROM dt_forumquote WHERE idcmt = "'.$idd.'" && cmtid = "'.$idsa['id'].'"');
if (mysqli_num_rows($cquotee)){
echo 'loi du lieu';
} else {
mysqli_query($conn,'INSERT INTO dt_forumquote SET idtopic = "",idcmt = "'.$idd.'",cmtid = "'.$idsa['id'].'"');
}
echo '<script>window.location.href="/forum/'.vntext($title).'-'.$id.'?l='.rand(00,99).'";</script>';
}
}
$ft =mysqli_query($conn,'SELECT * FROM dt_forumqt WHERE idaccount = "'.$_SESSION['idlogin'].'" && idfr = "'.htmlspecialchars($_GET['id']).'"');
if ($tf = mysqli_fetch_assoc($ft)){
echo '';
} else {
mysqli_query($conn,'INSERT INTO dt_forumqt SET idaccount = "'.$_SESSION['idlogin'].'",idfr = "'.$id.'"');
}
}
}
} else {
echo '<div class="list2">ID bình luận, chủ đề không tồn tại !</div>';
}
echo $form;
}
} else {
echo '<div class="list2">Không tìm thấy tác vụ !</div> ';
}
} else {
echo '<div class="list2">Chỉ dành cho thành viên đã đăng nhập !</div>';
}
include 'foot.php';