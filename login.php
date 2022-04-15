<?php
$title = 'Đăng Nhập';
$trangay = 'Đăng Nhập,/login';
include 'head.php';
if (login){
echo '<div class="phdr">Đăng Nhập</div><div class="list2">Chỉ dành cho thành viên chưa đăng nhập !</div>';
} else {

if (isset($_POST['login'])){
$account = htmlspecialchars($_POST['account']);
$password = htmlspecialchars($_POST['password']);
if ($account == ''){
$eracc = 'Bạn chưa nhập tài khoản !';
$xlp = '0';
}
if ($password == ''){
$erpass = 'Bạn chưa nhập mật khẩu !';
$xlp = '0';
}
if ($_POST['code'] == ''){
$ercode = 'Bạn chưa nhập mã xác nhận !';
$xlp = '0';
}
if ($xlp != '0'){
$req = mysqli_query($conn,"SELECT * FROM dt_user WHERE account = '$account'");

// var_dump($req);
if ($res = mysqli_fetch_assoc($req)){
$pe = $res['account'];
$pee = $res['id'];
if (md5($password) != $res['password']){
$erpass = 'Mật khẩu không đúng !';
$loginn = '0';
}
} else {
$eracc = 'Tài khoản không tồn tại !';
$loginn = '0';
}
}
if ($loginn != '0' && $xlp != '0'){
if ($_POST['code'] == $_SESSION['captcha']){
echo '';
} else {
$ercode = 'Mã xác nhận không đúng !';
$xle = '0';
}
if ($xle != '0'){
$_SESSION['login'] = $pe;
$_SESSION['idlogin'] = $pee;
echo '<script>alert("Đăng nhập thành công")</script> ,click <a href="index.php" style="color:;">vào đây</a> để về Trang Chủ !</div>';
$vgh = 'ok';
}
}
}


echo' <main class="signup__main">
<img class="signup__bg" src="images/signup-bg.png" alt="bg">

<div class="container">
    <div class="signup__container">
        <div class="signup__logo">
            <img src="images/image1.png" width="30%">
        </div>

        <div class="signup__head">
            <h3>Đăng nhập để mở thêm nhiều chức năng</h3>
            <p>Đăng nhập thì bạn sẽ có nhiều quyền như thêm bài viết, bình luận, thích bài viết. </p>
        </div>
        <div class="signup__form">
           
        <form action="login.php" method="POST">
            <div class="signup__section">
                <label class="signup__label" for="username">Tên đăng nhập <small style="color:red">'.$eracc.'</small></label>
                <input type="text" class="form-control" id="account" name="account" value="'.$account.'">
            </div>
        
            <div class="signup__section">
                <label class="signup__label" for="password">Mật khẩu <small style="color:red">'.$erpass.'</small></label>
               
                    <input type="password" class="form-control" id="password" name="password" value="">
                   
           
            </div>
            <div class="signup__section">
            <label class="signup__label" for="password">Mã xác nhận [<img src="vung.php">]:  <small style="color:red">'.$ercode.'</small></label>
           
                <input class="form-control" name="code" value="">
               
       
        </div>
<input type="submit" name="login" value="Đăng Nhập" class="signup__btn-create btn btn--type-02" style="color:white; background-color: #71BBCE; border-radius: 8px;">

            <a href="#"  class="signup__label" for="password">Nếu chưa có tài khoản hãy đăng ký tài khoản </a>
            <b><a href="registration.php" style="color:#131CF1"class="signup__label" >Đăng kí ngay !!!</a></b>
        </form>
        </div>
    </div>
</div>
</main>';
/*echo '<div class="list"><form action="/login" method="post">Tài khoản: '.$eracc.'<br><input type="text" name="account" value="">
<br>Mật khẩu: '.$erpass.'<br><input type="password" name="password" value=""><br>Mã xác nhận [<img src="vung.php">]: '.$ercode.'<br>
<input type="text" name="code"><br><input type="submit" name="login" value="Đăng Nhập"></form></div>';
*/


}
include 'foot.php';
if ($vgh == 'ok'){
echo '<script>window.location.href="/";</script>';
}
?>