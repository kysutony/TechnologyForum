<?php
$title = 'Tài Khoản';
$trangay = 'Tài Khoản,/account';
include 'head.php';

echo '<div class="signup__container">

<div class="signup__form" style="max-width: 500px; margin-top: 48px;margin-bottom: 46px;text-align: center;flex-direction: column;align-items: center;justify-content: center;display: flex;">
<div class="phdr"><a href="trangcanhan.php" style ="color:#131CF1 ">Tài Khoản</a></div>';
if (login){
echo '<div class="list"><a href="/doianhbia.php" style="color:#131CF1 ;">Thay Đổi Icon Đại Diện</a></div>
<div class="list"><a href="account/change-status" style="color:#131CF1;">Thay Đổi Tên Người Dùng</a></div>
<div class="list"><a href="account/change-password" style="color:#131CF1;">Thay Đổi Mật Khẩu</a></div>
</div></div>';
} else {
echo '< class="list2">Chỉ dành cho thành viên đã đăng nhập !
';
}
include 'foot.php';