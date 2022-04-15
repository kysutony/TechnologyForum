<?php
$title = 'Chỉnh Sửa Chủ Đề';
include 'head.php';
include 'func.php';
echo '<div class="container"><div class="phdr">Chỉnh Sửa Chủ Đề</div>';
$id = htmlspecialchars($_GET['id']);
if (login){
$cto = mysqli_query($conn,'SELECT * FROM dt_forum WHERE id = "'.$id.'"');
if (mysqli_num_rows($cto)){
$avd = mysqli_fetch_assoc($cto);
$ctop = mysqli_query($conn,'SELECT * FROM dt_user WHERE id = "'.$_SESSION['idlogin'].'"');
$avdp = mysqli_fetch_assoc($ctop);
if (($u['position'] != 'Admin') && ($avd['idaccount'] !=$u['id'])){
echo '<div class="list2">Không thể chỉnh sửa chủ đề do bạn không phải người đăng !</div>';
} else {
if (isset($_POST['edit'])){
$dp = mysqli_fetch_assoc(mysqli_query($conn,'SELECT * FROM dt_forum WHERE id = "'.$id.'"'));
$ct =mysqli_real_escape_string($conn, $_POST['ct']);
if ($ct == ''){
$erct = 'Bạn chưa nhập nội dung !';
} elseif(strlen($ct) < '3'){
$erct = 'Nội dung ít nhất 3 ký tự !';
} elseif ($ct == $dp['content']){
echo '<div class="list2">Không có nội dung được chỉnh sửa !</div>';
} else {
mysqli_query($conn,"UPDATE dt_forum SET content = '$ct' WHERE id = '$id'");
echo '<script>alert("Chỉnh sửa thành Công")</script>';
$locp = 'loc';
}
}
$dd = mysqli_fetch_assoc(mysqli_query($conn,'SELECT * FROM dt_forum WHERE id = "'.$id.'"'));
echo '<div class="list">Nội dung: '.$erct.'<form method="post"><textarea name="ct" rows="4" id="editor1">'.$dd['content'].'</textarea><br>
<input type="submit" name="edit" value="Sửa" class="btn btn" style="background-color: #71BBCE; border-radius: 8px;"></form></div></div>';
}
} else {
echo '<div class="list2">Chủ đề không tồn tại !</div>';
}
} else {
echo '<div class="list2">Chỉ dành cho thành viên đã đăng nhập !</div>';
}
include 'foot.php';
if ($locp == 'loc'){
echo '<script>window.location.href="/forum/'.vntext($avd['title']).'-'.$id.'";</script>';
}