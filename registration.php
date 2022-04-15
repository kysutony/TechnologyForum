<?php


$title = 'Đăng Ký';
$trangay = 'Đăng Ký,registration';
include 'head.php';
if (!login){
include 'func.php';
if (isset($_POST['registration'])){
$account = ($_POST['account']);
$account1 = str_replace($account1," ","");
$password = htmlspecialchars($_POST['password']);
$repassword = htmlspecialchars($_POST['repassword']);
$email = htmlspecialchars(strtolower($_POST['email']));
$captcha = htmlspecialchars($_POST['code']);
if ($account == ''){
$eracc = 'Bạn chưa nhập tên tài khoản !';
$xulya = '0';
}
if ($password == ''){
$erpass = 'Bạn chưa nhập mật khẩu !';
$xulya = '0';
}
if ($repassword == ''){
$errepass = 'Bạn chưa nhập lại mật khẩu !';
$xulya = '0';
}
if ($email == ''){
$eremail = 'Bạn chưa nhập email !';
$xulya = '0';
}
if ($captcha == ''){
$ercap = 'Bạn chưa nhập mã xác nhận !';
$xulya = '0';
}
if ($xulya != '0'){
if(!preg_match('#^[a-zA-Z0-9-._]+$#i',$account,$dcm)){
$eracc = 'Chỉ cho phép đăng ký tài khoản có ký tự a-z,A-Z,0-9,-. ! _';
$xuly = '0';
}
if(!preg_match('#^[a-zA-Z0-9-._]+$#i',$password,$dcm)){
$erpass = 'Chỉ cho phép đăng ký mật khẩu có ký tự a-z,A-Z,0-9,-. ! _';
$xuly = '0';
}
if(!preg_match('#^[a-zA-Z0-9-._]+@gmail\.com$#i',$email,$dcm)){
$eremail = 'Chỉ cho phép đăng ký thư điện tử có ký tự a-z,A-Z,0-9,-. _ và @gmail.com !';
$xuly = '0';
}
}
if ($xuly != '0' && $xulya != '0'){
if (strlen($account) > '15'){
$eracc = 'Tên tài khoản giới hạn 15 ký tự !';
$xuly1 = '0';
}
if (strlen($password) > '20'){
$erpass = 'Mật khẩu giới hạn 20 ký tự !';
$xuly1 = '0';
}
if (strlen($email) > '30'){
$eremail = 'Thư điện tử giới hạn 30 ký tự !';
$xuly1 = '0';
}
if ($xuly1 != '0'){
if (strlen($account) < '3'){
$eracc = 'Tên tài khoản ít nhất 3 ký tự !';
$xuly11 = '0';
}
if (strlen($password) < '6'){
$erpass = 'Mật khẩu ít nhất 6 ký tự !';
$xuly11 = '0';
}
if (strlen($email) < '8'){
$eremail = 'Thư điện tử ít nhất 8 ký tự !';
$xuly11 = '0';
}
}
if ($xuly11 != '0'){
$sql = mysqli_query($conn, "SELECT account FROM dt_user WHERE account = '$account'");
if (mysqli_num_rows($sql) > '0'){
$eracc= 'Tài khoản đã tồn tại !';
$insert = '0';
}
if ($repassword != $password){
$errepass = 'Mật khẩu nhập lại không đúng !';
$insert = '0';
}
$sqll = mysqli_query($conn,"SELECT email FROM dt_user WHERE email = '$email'");
if (mysqli_num_rows($sqll) > '0'){
$eremail= 'Email đã tồn tại !';
$insert = '0';
}
if (isset($_POST['code'])){
if ($captcha == $_SESSION['captcha']){
echo '';
} else {
$ercap = 'Mã xác nhận không đúng !';
$insert = '0';
}
}
if ($insert != '0'){
$timereg = date('H:i:s d/m/Y');
$password = md5($password);
$rtext=rtext(10);
$uagent = $_SERVER['HTTP_USER_AGENT'];

$run = mysqli_query($conn,"INSERT INTO `dt_user`(`account`, `password`, `email`,`position`,`ncolor`, `regtime`, `fastcode`, `uagent`,datee)
VALUES ('$account', '$password', '$email','Member','#71BBCE', '$regtime', '$rtext', `uagent` ,'.$timereg')");
//  echo "INSERT INTO `dt_user`(`account`, `password`, `email`, `regtime`, `fastcode`, `uagent`,datee)
//  VALUES ('$account', '$password', '$email', '$regtime', '$rtext', `uagent` ,'.$timereg')";
// var_dump($run );
// echo '<script>alert("Đăng kí thành công")</script>,click <a href="index.php"</a>';
echo '<script>alert("Đăng kí thành công")</script> ,<script>window.location.href="login.php";</script>';
}
}
}
}
if ($eracc == '' && $_POST['registration'] == ''){
$eracc = '(Tên tài khoản ít nhất là 3 ký tự ,nhiều nhất là 15 ký tự)';
}
if ($erpass == '' && $_POST['registration'] == ''){
$erpass = '(Mật khẩu ít nhất là 6 ký tự ,nhiều nhất là 20 ký tự)';
}
if ($errepass == '' && $_POST['registration'] == ''){
$errepass = '(Nhập lại mật khẩu đã nhập khung trên)';
}
if ($eremail == '' && $_POST['registration'] == ''){
$eremail = '(Thư điện tử dùng để lấy lại mật khẩu ,ký tự nhiều nhất 30 ký tự)';
}

echo'  <main class="signup__main">
<img class="signup__bg" src="images/signup-bg.png" alt="bg">

<div class="container">
    <div class="signup__container">
        <div class="signup__logo">
        <img src="images/image1.png" width="30%">
        </div>

        <div class="signup__head">
            <h3>Hãy tạo tài khoản TopTech</h3>
            <p>Tạo tài khoản để mở thêm chức năng đăng bài, trả lời, bỏ phiếu và nhiều thứ khác.</p>
        </div>
        <div class="signup__form">
        <form action="registration.php" method="POST">
                
            <div class="signup__section">
                <label class="signup__label" for="account" name ="user1">Tên tài khoản:
                 <small style="color:red">'.$eracc.'</small></label>
                <input type="text" class="form-control" value="" name="account">
            </div>
            <div class="signup__section">
                <label class="signup__label" for="password">Mật khẩu:  <small style="color:red">'.$erpass.'</small></label>
               
                    <input type="password" class="form-control" value="" name ="password">
                    
                </div>

                <div class="signup__section">
                <label class="signup__label" for="password">Nhập lại mật khẩu: <small style="color:red"> '.$errepass.'</small></label>
         
                    <input type="password" class="form-control" value="" name ="repassword">
                    
          
            </div>
            <div class="signup__section">
            <label class="signup__label" for="password">Thư điện tử:  <small style="color:red"> '.$eremail.'</small></label>
     
                <input type="text" class="form-control" value="" name ="email">
                
      
        </div>
        <div class="signup__section">
<label class="signup__label" for="password">Mã xác nhận [<img src="vung.php">]: <small style="color:red">'.$ercap.'</small></label>
 
            <input type="text" class="form-control" value="" name ="code">
            
  
    </div>
    <input type="submit" name="registration" class="signup__btn-create btn btn--type-02" value="Đăng Ký" style="background-color: #71BBCE; border-radius: 8px;">

           
           


            <span>Already have an account?</span> 
            <b><a href="login.php" style="color:#131CF1" >Sign in!!!</a></b>

        </div>
        </form>
    </div>
</div>
</main>';





} else {
echo '<div class="phdr">Đăng Ký</div><div class="list2">Chỉ dành cho thành viên chưa đăng nhập !</div>';
}
include 'foot.php';
?>