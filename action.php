<?php
$title = 'Thao Tác';
$trangay = 'Thao Tác,/action';
include 'head.php';
if (login){
if (isset($_GET['u'])){
$u = htmlspecialchars($_GET['u']);
$u1 = htmlspecialchars($_GET['u1']);
$u2 = htmlspecialchars($_GET['u2']);
$u3 = htmlspecialchars($_GET['u3']);
$u4 = htmlspecialchars($_GET['u4']);
if ($u == 'wallhome' && $u4 == 'delete'){
echo '<div class="phdr">Xóa Bài Viết Tại Tường Nhà</div>';
$checkwh = mysqli_query($conn,'SELECT id,content FROM dt_wallhome WHERE id = "'.$u3.'"');
if (!mysqli_fetch_assoc($checkwh)){
echo '<div class="list2">Không tìm thấy bài viết với id '.$u3.' !</div>';
} else {
if ($u2 == $_SESSION['idlogin']){
mysqli_query($conn,'DELETE FROM dt_wallhome WHERE id = "'.$u3.'"');
echo '<div class="list3">Xóa bài viết tại tường nhà thành công !</div>';
$v = 'loca';
} else {
echo '<div class="list2">Bạn không có quyền xóa bài viết này ở tường nhà !</div>';
}
}
}
if ($u == 'forum' && $u4 == 'like'){
echo '<div class="phdr">Like Chủ Đề Ở Diễn Đàn</div>';
if ($u2 == $_SESSION['idlogin']){
echo '<div class="list2">Bạn không thể tự like bài viết của chính mình !</div>';
} else {
if ($_SESSION['idlogin'] != $u3){
$ft = mysqli_query($conn,'SELECT * FROM dt_forumqt WHERE idaccount = "'.$_SESSION['idlogin'].'" && idfr = "'.htmlspecialchars($_GET['u3']).'"');
if ($tf = mysqli_fetch_assoc($ft)){
echo '';
} else {
mysqli_query($conn,'INSERT INTO dt_forumqt SET idaccount = "'.$_SESSION['idlogin'].'",idfr = "'.htmlspecialchars($_GET['u3']).'"');
}
}
$checkfr = mysqli_query($conn,'SELECT id,title FROM dt_forum WHERE id = "'.$u3.'" && idaccount = "'.$u2.'"');
if (!mysqli_fetch_assoc($checkfr)){
echo '<div class="list2">Không tìm thấy chủ đề với id '.$u3.',idaccount '.$u2.' !</div>';
} else {
$cu = mysqli_query($conn,'SELECT * FROM ulike WHERE idaccount = "'.$_SESSION['idlogin'].'" && fomb = "forum" && blike = "'.$u3.'"');
if (mysqli_fetch_assoc($cu)){
echo '<div class="list2">Bạn đã like chủ đề này rồi !</div>';
} else {
if ($_SESSION['idlogin'] != $u2){
mysqli_query($conn,'INSERT INTO dt_notification SET idaccount = "'.$_SESSION['idlogin'].'",content = "đã thích chủ đề,/forum/'.$u1.'-'.$u3.'",cidacc = "'.$u2.'",goku = "like"');
}
mysqli_query($conn,'INSERT INTO ulike SET idaccount = "'.$_SESSION['idlogin'].'",fomb = "forum",blike = "'.$u3.'"');
echo '<div class="list3">Like chủ đề thành công !</div>';
$loci = 'loca';
}
}
}
}
if ($u == 'forum' && substr($u4,0,7) == 'likecmt'){
die();
echo '<div class="phdr">Like Bình Luận Ở Diễn Đàn</div>';
$cdm = mysqli_fetch_assoc(mysqli_query($conn,'SELECT idaccount,idbv FROM dt_forumcmt WHERE id = "'.substr($u4,7,1).'" && idbv = "'.$u3.'"'));
if ($cdm['idaccount'] == $_SESSION['idlogin']){
echo $cdm['idaccount'];
echo '<div class="list2">Bạn không thể tự like bình luận của chính mình !</div>';
} else {
if ($_SESSION['idlogin'] != $u3){
$ft = mysqli_query($conn,'SELECT * FROM dt_forumqt WHERE idaccount = "'.$_SESSION['idlogin'].'" && idfr = "'.htmlspecialchars($_GET['u3']).'"');
if ($tf = mysqli_fetch_assoc($ft)){
echo '';
} else {
mysqli_query($conn,'INSERT INTO dt_forumqt SET idaccount = "'.$_SESSION['idlogin'].'",idfr = "'.htmlspecialchars($_GET['u3']).'"');
}
}
$checkfr = mysqli_query($conn,'SELECT id FROM dt_forumcmt WHERE idbv = "'.$u3.'" && idaccount = "'.$u2.'"');
if (!mysqli_fetch_assoc($checkfr)){
echo '<div class="list2">Không tìm thấy bình luận với id '.$u3.',idaccount '.$u2.' !</div>';
} else {
$cu = mysqli_query($conn,'SELECT * FROM ulike WHERE idaccount = "'.$_SESSION['idlogin'].'" && clp = "'.substr($u4,7,1).'" && fomb = "cmt" && blike = "'.$u3.'"');
if (mysqli_fetch_assoc($cu)){
echo '<div class="list2">Bạn đã like bình luận này rồi !</div>';
} else {
if ($_SESSION['idlogin'] != $u2){
mysqli_query($conn,'INSERT INTO dt_notification SET idaccount = "'.$_SESSION['idlogin'].'",content = "đã thích bình luận,/forum/'.$u1.'-'.$u3.'",cidacc = "'.$u2.'",goku = "like"');
}
mysqli_query($conn,'INSERT INTO ulike SET idaccount = "'.$_SESSION['idlogin'].'",clp = "'.substr($u4,7,1).'",fomb = "cmt",blike = "'.$u3.'"');
echo '<div class="list3">Like bình luận thành công !</div>';
$loci = 'loca';
}
}
}
}
if ($u4 == 'close' && $u == 'forum'){
echo '<div class="phdr">Đóng Cửa Chủ Đề</div>';
$readmin = mysqli_query($conn,'SELECT id,position FROM dt_user WHERE id = "'.$_SESSION['idlogin'].'"');
if ($rsadmin = mysqli_fetch_assoc($readmin)){
if ($rsadmin['position'] == 'Admin'  OR $rsadmin['position'] == 'SMod' OR $rsadmin['position'] == 'Mod'){
mysqli_query($conn,'UPDATE dt_forum SET colp = "close" WHERE id = "'.$u3.'"');
echo '<div class="list3">Đóng cửa chủ đề thành công !</div>';
$iu = 'loca';
} else {
echo '<div class="list2">Bạn không có quyền đóng cửa chủ đề này !</div>';
}
}
}
if ($u4 == 'open' && $u == 'forum'){
echo '<div class="phdr">Mở Cửa Chủ Đề</div>';
$readmin = mysqli_query($conn,'SELECT id,position FROM dt_user WHERE id = "'.$_SESSION['idlogin'].'"');
if ($rsadmin = mysqli_fetch_assoc($readmin)){
if ($rsadmin['position'] == 'Admin' OR $rsadmin['position'] == 'SMod' OR $rsadmin['position'] == 'Mod'){
mysqli_query($conn,'UPDATE dt_forum SET colp = "noclose" WHERE id = "'.$u3.'"');
echo '<div class="list3">Mở cửa chủ đề thành công !</div>';
$iu = 'loca';
} else {
echo '<div class="list2">Bạn không có quyền mở chủ đề này !</div>';
}
}
}
}
include 'foot.php';
if ($v == 'loca'){
echo '<script>window.location.href="/profile/'.$u1.'";</script>';
}
if ($loci == 'loca'){
echo '<script>window.location.href="/forum/'.$u1.'-'.$u3.'";</script>';
}
if ($iu == 'loca'){
echo '<script>window.location.href="/forum/'.$u1.'-'.$u3.'";</script>';
}
} else {
echo '<div class="phdr">Thao Tác</div><div class="list2">Chỉ dành cho thành viên đã đăng nhập !</div>';
include 'foot.php';
}