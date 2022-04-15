<?php
session_start();
include 'func.php';
$title = $_GET['u'];
if (isset($_GET['u'])){
$u = $_GET['u'];
} else {
$u = $_SESSION['login'];
}
$trangay = $u.',/profile/'.$u;
include 'head.php';
echo '<div class="phdr">Trang Cá Nhân</div>';
$userdata =mysqli_query($conn,'SELECT * FROM dt_user WHERE account = "'.$u.'"');
if (mysqli_num_rows($userdata)){
while($udl =mysqli_fetch_assoc($userdata)){
$uid = $udl['id'];
$timeregn = fud($udl['regtime'],'upper');
if (login){
if ($_SESSION['login'] == $u){
$bnn = '<div class="phdr" style="padding:3px;"></div><div class="list"><a href="/account">Tài Khoản</a> | <a href="/fast-login">Đăng Nhập Nhanh</a> | <a href="/message">Tin Nhắn</a></div>';
} else {
$bnn = '<div class="phdr" style="padding:3px;"></div><div class="list"><a href="/message/'.$u.'">Nhắn Tin</a></div>';
}
}
if (strtolower($u) == 'bot'){
$hdc = 'Hôm nay, '.date('H:i:s').'';
} else {
$hdc = fud($udl['datee'],'upper');
}
$countcmtuserp =mysqli_fetch_assoc(mysql_query('SELECT COUNT(id) as lipp FROM dt_forumcmt WHERE idaccount = "'.$udl['id'].'"'));
$thruser =mysqli_fetch_assoc(mysql_query('SELECT COUNT(id) as total FROM dt_forum WHERE idaccount = "'.$udl['id'].'"'));
echo '<div class="list1"><table id="'.$udl['id'].'" cellpadding="0" cellspacing="1"><tr><td width="auto"><img src="'.$udl['avatar'].'?i='.rand(000,999).'" width="40" height="40"/></td><td>'.account($udl['id']).'<br/>'.$udl['status'].'<br>'.$udl['coin'].'</td></tr></table></div>';
echo '<div class="list">Tài khoản: '.$udl['account'].'<br>ID: '.$udl['id'].'<br>Chức vụ: <font color="'.$udl['ncolor'].'">'.$udl['position'].'</font><br>Thư điện tử: '.$udl['email'].'<br>Chủ đề: '.$thruser['total'].'<br>Bình luận: <img src="../image/default/bl.png" height="16px" width="16px">'.$countcmtuserp['lipp'].'<br>Đăng ký lúc: '.$timeregn.'<br>Hoạt động cuối:
'.$hdc.'</div>'.$bnn.'';
if (login){
mysql_query('UPDATE dt_notification SET view = "view" WHERE view = "none" && content = "đã đăng lên tường nhà của bạn-/profile/'.$_GET['u'].'" && cidacc = "'.$_SESSION['idlogin'].'" && goku = "wallhome"');
}
include 'wallhome.php';
}
} else {
echo '<div class="list2">Tài khoản không tồn tại !</div>';
include 'foot.php';
}