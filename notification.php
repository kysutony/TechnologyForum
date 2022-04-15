<?php
$title = 'Thông Báo';
include 'head.php';
echo '<div class="phdr" style="color:#131CF1;">Thông Báo</div>';
if (login){
$notification =mysqli_query($conn,'SELECT * FROM dt_notification WHERE cidacc = "'.$_SESSION['idlogin'].'" && view = "none" && (goku = "forum" OR goku = "like") ORDER BY id DESC');
if (mysqli_num_rows($notification)){
while($getnoti =mysqli_fetch_assoc($notification)){
if ($getnoti['goku'] == 'like' OR $getnoti['goku'] == 'forum'){
$memi = $getnoti['idaccount'];
$lolvn =mysqli_query($conn,'SELECT id,account,ncolor,avatar FROM dt_user WHERE id = "'.$memi.'"');
if ($hf =mysqli_fetch_assoc($lolvn)){
$kae = $hf['account'];
$kidae = $hf['id'];
$ava = $hf['avatar'];
}
$nai = explode(',',$getnoti['content']);
if ($nai['0'] == 'đã thích bình luận'){
$mave = end(explode('-',$nai['1']));
$lp =mysqli_fetch_assoc(mysqli_query($conn,'SELECT idaccount FROM forumcmt WHERE idbv = "'.$mave.'"'));
if ($lp['idaccount'] == $_SESSION['idlogin']){
$tg = 'của bạn';
}
} else {
$mav = end(explode('-',$nai['1']));
$lip =mysqli_query($conn,'SELECT id,idaccount FROM forum WHERE id = "'.$mav.'"');
if ($rlip =mysqli_fetch_assoc($lip)){
if ($rlip['idaccount'] == $_SESSION['idlogin']){
$tg = 'của bạn';
} elseif ($rlip['idaccount'] == $kidae){
$tg = 'của bạn ấy';
} else {
$tg = 'bạn quan tâm';
}
}
}
echo '<div class="signup__form" style="max-width: 500px; margin-top: 48px;margin-bottom: 46px;text-align: center;flex-direction: column;align-items: center;justify-content: center;display: flex;">
<div class="list">
<img style=" border-radius: 250px;  width:40px" src="/'.$hf['avatar'].'">
 <a href="/trangcanhan.php'.$kae.'"><font color="'.$hf['ncolor'].'">'.$kae.'</font> <a href="'.$nai['1'].'" style="color:#71BBCE">'.$nai['0'].' '.$tg.'</a></div></div>';
 
}
}
} else {
echo '<div class="list2">Chưa có thông báo nào !</div>';
}
} else {
echo '<div class="list2">Chỉ dành cho thành viên chưa đăng nhập !</div>';
}
include 'foot.php';