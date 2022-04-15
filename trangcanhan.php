<?php

$title = "Trang chu";
include 'head.php';
?> 
<?php
$sql = 'SELECT * FROM `trangcanhan`';
$result = mysqli_query($conn, $sql);

if(isset($_POST['dang'])){
    $nd =$_POST['noidung'];
    $id_acc = $u['id'];
    $time = time();

    if($nd != ''){
        mysqli_query($conn, "INSERT INTO `trangcanhan`( `noi_dung`, `id_account`, `time`) VALUES ('$nd', '$id_acc', $time)");
        echo "Đã thêm thành công";
        
    }
}
?>


<main class="signup__main">
        <img class="signup__bg" src="images/signup-bg.png" alt="bg">

        <div class="container">
            <div class="signup__container">
                <div class="signup__logo">
                    <img src="<?=$u['avatar']?>" width="30%" style="border-radius: 250px;">
                </div>

                <div class="signup__head">
                    <a href="doianhbia.php" ><span style=" padding: 0 5px; font-size: 15px;  top: 50%; right: 0; border-radius: 20px; background-color: #ff6f00; color: #ffffff; align-items: center;">Sửa icon</span></a>
                    <h3><?=$u['account']?></h3>
                    <p><?=$u['status']?></p>
                </div>
                <div class="signup__form">
                   
              
                    <div class="signup__section">
                        <label style="color:#131CF1;">ID:</label>
                        <?=$u['id']?>
                    </div>

                    <div class="signup__section">
                        <label style="color:#131CF1;">Tên:</label><br>
                        <label><?=$u['status']?></label>
                        <div>
                        <a href="change-status.php" ><span style=" position: absolute; padding: 0 5px; font-size: 13px;  top: 24%; right: 41px; border-radius: 20px; background-color: #ff6f00; color: #ffffff; align-items: center;">Đổi</span></a>
                        </div>
                    </div>
                    <div class="signup__section">
                        <label style="color:#131CF1;">Chức vụ:</label>
                        <label ><?=$u['position']?></label>
                    </div>
                    <div class="signup__section">
                        <label style="color:#131CF1;">Mail:</label>
                        <?=$u['email']?>
                    </div>
                    
                    <div class="signup__section">
                        <label style="color:#131CF1;">Đăng kí lúc:</label>
                        <?=$u['datee']?>
                    </div>
                    <div class="signup__section">
                        <label style="color:#131CF1;">Hoạt động lần cuối:</label>
                        <?=$u['lastonl']?>
                    
                    </div>
                    <div class="signup__section">
                        <label style="color:#131CF1;">Mô tả:</label>
                        <?php while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) : ?>
                <tr>
                <td><?php echo $row['noi_dung']; ?></td>
                    </tr>
                <?php endwhile; ?>
                <a href="change-status.php" ><span style=" position: absolute; padding: 0 5px; font-size: 13px;  top: 76%; right: 41px; border-radius: 20px; background-color: #ff6f00; color: #ffffff; align-items: center;">Đổi</span></a>

                    </div>
                    <div class="signup__section">

                        <label style="color:#131CF1;">Trạng thái hoạt động</label>

                        <div class="message-input" style ="position: absolute; height: 26px; padding: 0 8px; margin-top: 52px; top: 79%; right: 0; border-radius: 3px; background-color: #3cb878; color: #ffffff; align-items: center;">

                            <span class="message-input__strong">Đang hoạt động</span>
                               
                        </div>

                    </div>
      
                    
                </form>
                </div>
                <div class="signup__form">
                <a href="change-avatar.php" class="btn">Ảnh đại diện</a>
                <a href="change-password.php" class="btn">Mật Khẩu</a>
                
                </div>
                <div class="signup__form">
                <div class="signup__section">
                    <h5>Tường nhà</h5>
<br><br>
                        <label style="color:#131CF1;">Nội dung:</label>
                        <br><br>
                        <form action ="trangcanhan.php" method="post">
                        <input type="text" name ="noidung" style="width: 100%; padding: 12px 20px;margin: 8px 0;box-sizing: border-box;"><br><br>
                        <input type="submit" name="dang" value="Đăng" class="signup__btn-create btn btn--type-02" style ="width:auto; background-color: #71BBCE; border-radius: 8px; margin-left:10px">
                        </form>
                    </div>

                </div>
            </div>
            </div>
        </div>


<?php
include 'foot.php';

?>