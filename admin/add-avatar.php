<?php
$title = 'Thay Đổi Ảnh Đại Diện';
$trangay = 'Thay Đổi Ảnh Đại Diện,/account/change-avatar';
include '../head.php';
echo '<div class="phdr"><a href="/account" style="color:red;">Tài Khoản</a> / Thay Đổi Ảnh Đại Diện</div>';
if (login){
if (isset($_POST['change'])){
if (isset($_POST['del'])){
$lili = '/image/default/avatar.png';
unlink('image/member/'.$_SESSION['login'].'.png');
$dcbn = 'Xóa';
$vbn = '0';
} else {
$lili = '/image/member/'.$_SESSION['login'].'.png';
$dcbn = 'Thay đổi';
}
if ($vbn != '0'){
if ($_FILES['imup']['name'] == ''){
$erup = 'Bạn chưa chọn ảnh để tải lên !';
$upimggg = '0';
}
if ($upimggg != '0'){
if ($_FILES['imup']['size'] > '2097152'){
$erup = 'Ảnh đại diện giới hạn 2 MB !';
$upimgg = '0';
}
}
if ($upimgg != '0' && $upimggg != '0'){
$fimg = strtolower($_FILES['imup']['name']);
$bc = end(explode('.',$fimg));
if ($bc == 'png' or $bc == 'jpg' or $bc == 'jpeg' or $bc == 'gif'){
} else {
$erup = 'Định dạng hình ảnh cho phép là PNG,JPG,JPEG,GIF !';
$upimg = '0';
}
}
}
if ($upimg != '0' && $upimgg != '0' && $upimggg != '0'){
move_uploaded_file($_FILES['imup']['tmp_name'],'image/member/'.$_SESSION['login'].'.png');
//mysqli_query($conn,'UPDATE dt_user SET avatar = "'.mysqli_real_escape_string(htmlspecialchars($lili)).'" WHERE id = "'.$_SESSION['idlogin'].'"');
mysqli_query($conn,'UPDATE dt_user SET avatar="'.$lili.'" WHERE id = "'.$_SESSION['idlogin'].'"');
echo '<div class="list3">'.$dcbn.' ảnh đại diện thành công !</div>';
}
} else {
$erup = '(Giới hạn 2 MB !)';
}
echo '<div class="list"><form action=""
method="post" enctype="multipart/form-data">Chọn ảnh: '.$erup.'<br><input type="file" name="imup"><br><input type="checkbox" name="del">Xóa ảnh đại diện<br><input type="submit" name="change" value="Thay Đổi"></form></div>';
} else {
echo '<div class="list2">Chỉ dành cho thành viên đã đăng nhập !</div>';
}
include 'foot.php';
?>