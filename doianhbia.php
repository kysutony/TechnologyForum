<?php
$title = 'Thay Đổi Ảnh Đại Diện';
$trangay = 'Thay Đổi Ảnh Đại Diện,/account/doianhbia';
include 'head.php';
$sql = 'SELECT * FROM `dt_user` ';
$result = mysqli_query($conn, $sql);
if(isset($_POST['submit'])){

    $a =$_POST['result'];

        mysqli_query($conn, 'UPDATE dt_user SET avatar= "'.$_POST['result'].'" WHERE id = "'.$_SESSION['idlogin'].'"');
        echo '<script>alert("Thay đổi thành công")</script>,<script>window.location.href="trangcanhan.php";</script>';
        
}



echo'<div class="container">
<div class="row">

    <div class="col-md-12">
        <a href="/" style="color:#131CF1;">Diễn Đàn</a> > <a style="color:#71BBCE;">Đổi ảnh bìa</a>
    </div>

    <div class="col-md-12">
        <br>
        <p>Chọn 1 icon bất kì làm ảnh bìa:</p>
        <div class="row">
        <form method="post">
           
            ';
            $i = 0;
            for ($i; $i<24;$i++){
                echo' <div class="col-md-2">
                <input type="radio" id="'.$i.'" name="result" value="icon/'.$i.'.png">
                <label for="'.$i.'"><img src="icon/'.$i.'.png" ></label>

            </div>';

                
            }
echo' <div class="col-md-2" style="padding-top:10px">
<input type="submit" name="submit" value="Đổi" class="signup__btn-create btn btn--type-02" style ="width:auto; background-color: #71BBCE; border-radius: 8px;">
</div>';
            echo'</form></div></div></div></div>';


/*
echo'
    <div class="container">
        <div class="row">

            <div class="col-md-12">
                <a href="/" style="color:#131CF1;">Diễn Đàn</a> > <a style="color:#71BBCE;">Đổi ảnh bìa</a>
            </div>

            <div class="col-md-12">
                <br>
                <p>Chọn 1 hình bất kì làm ảnh bìa:</p>
                <div class="row">
                    
                    <div class="col-md-2" style="padding-bottom:5px">
                    <form method="post">
                        <input type="radio" id="0" name="result" value="icon/0.png">
                        <label for="0"><img src="icon/0.png"></label>
                    </div>
                    <div class="col-md-2">
                    <form method="post">
                        <input type="radio" id="1" name="result" value="icon/1.png">
                        <label for="1"><img src="icon/1.png"></label>

                    </div>
                    <div class="col-md-2">
                        <input type="radio" id="2" name="result" value="icon/2.png">
                        <label for="2"><img src="icon/2.png" ></label>

                    </div>
                    <div class="col-md-2">
                        <input type="radio" id="3" name="result" value="icon/3.png">
                        <label for="3"><img src="icon/3.png" ></label>

                    </div>
                    <div class="col-md-2">
                        <input type="radio" id="4" name="result" value="icon/4.png">
                        <label for="4"><img src="icon/4.png" ></label>

                    </div>
                    <div class="col-md-2">
                        <input type="radio" id="5" name="result" value="icon/5.png">
                        <label for="5"><img src="icon/5.png" ></label>

                    </div>
                    <div class="col-md-2">
                        <input type="radio" id="6" name="result" value="icon/6.png">
                        <label for="6"><img src="icon/6.png" ></label>
                    </div>

                    <div class="col-md-2">
                        <input type="radio" id="7" name="result" value="icon/7.png">
                        <label for="7"><img src="icon/7.png" ></label>
                    </div>

                    <div class="col-md-2">
                        <input type="radio" id="8" name="result" value="icon/8.png">
                        <label for="8"><img src="icon/8.png" ></label>
                    </div>

                    <div class="col-md-2">
                        <input type="radio" id="9" name="result" value="icon/9.png">
                        <label for="9"><img src="icon/9.png" ></label>
                    </div>

                    <div class="col-md-2">
                        <input type="radio" id="10" name="result" value="icon/10.png">
                        <label for="10"><img src="icon/10.png" ></label>
                    </div>

                    <div class="col-md-2">
                        <input type="radio" id="11" name="result" value="icon/11.png">
                        <label for="11"><img src="icon/11.png" ></label>
                    </div>
                
                    <div class="col-md-2">
                        <input type="radio" id="12" name="result" value="icon/12.png">
                        <label for="12"><img src="icon/12.png" ></label>
                    </div>

                    <div class="col-md-2">
                        <input type="radio" id="13" name="result" value="icon/13.png">
                        <label for="13"><img src="icon/13.png" ></label>
                    </div>

                    <div class="col-md-2">
                        <input type="radio" id="14" name="result" value="icon/14.png">
                        <label for="14"><img src="icon/14.png" ></label>
                    </div>

                    <div class="col-md-2">
                        <input type="radio" id="15" name="result" value="icon/15.png">
                        <label for="15"><img src="icon/15.png" ></label>
                    </div>

                    <div class="col-md-2">
                        <input type="radio" id="16" name="result" value="icon/16.png">
                        <label for="16"><img src="icon/16.png" ></label>
                    </div>

                    <div class="col-md-2">
                        <input type="radio" id="20" name="result" value="icon/20.png">
                        <label for="20"><img src="icon/20.png" ></label>
                    </div>

                    <div class="col-md-2" style="padding-top:10px">
                        <input type="submit" name="submit" value="Đổi" class="signup__btn-create btn btn--type-02" style ="width:auto; background-color: #71BBCE; border-radius: 8px;">
                        </form>
                    </div>
                    
                </div>

            </div>
        </div>
    </div>
';
*/

include 'foot.php';
?>
