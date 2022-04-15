<?php
error_reporting(0);
$title = 'Chủ Đề Mới';
include 'head.php';
include 'func.php';
$cate = $_GET['cate'];
$cate1 = $_GET['cate1'];
if (isset($_GET['cate']) && isset($_GET['cate1'])){
if (isset($_POST['dang'])){
$title = htmlspecialchars($_POST['title']);
$content = $_POST['content'];
$type = htmlspecialchars($_POST['type']);
$date = date('H:i:s d/m/Y');
if ($title == ''){
$ertit = 'Tiêu đề không được bỏ trống !';
$errtit = 'err';
}
if ($content == ''){
$ercon = 'Nội dung không được bỏ trống !';
$errcon = 'err';
}
if ($errtit != 'err' && $errcon != 'err'){
if (strlen($title) < '2'){
$ertit = 'Tiêu đề ít nhất 3 ký tự !';
$nv = 'err';
}
if (strlen($content) < '6'){
$ercon = 'Nội dung ít nhất 6 ký tự !';
$nv = 'err';
}
}
if ($chopheptailentaptin){
if (isset($_POST['attach'])){
if ($_POST['attach'] == 'file'){
$filename = $_FILES['file']['name'];
$filesize = $_FILES['file']['size'];
if ($filename == ''){
$erfileup = 'Bạn chưa chọn tập tin đính kèm !';
$erup = 'err';
}
if ($filesize > '5242880' && $erup != 'err'){
$erfileup = 'Tập tin đính kèm giới hạn 5 MB !';
$erup1 = 'err';
}
$filetype = strtolower(end(explode('.',$_FILES['file']['name'])));
if ($filetype == 'php' OR $filetype == 'html'){
$erfileup = 'Định dạng tập tin không được hỗ trợ !';
$erup2 = 'err';
}

}
}
}//-----------------------------jkhkjhkj
if ($errtit != 'err' && $errcon != 'err' && $nv != 'err' && $erup != 'err' && $erup1 != 'err' && $erup2 != 'err'){
$checktit = mysqli_query($conn,'SELECT title FROM dt_forum WHERE title = "'.$title.'" && cm = "'.htmlspecialchars($_GET['cate']).','.htmlspecialchars($_GET['cate1']).'"');
if (mysqli_fetch_assoc($checktit)){
$liakk = '<div class="list2">Chủ đề đã tồn tại !</div>';
$erry = 'err';
}
}
if ($errtit != 'err' && $errcon != 'err' && $nv != 'err' && $erry != 'err'){
$idacc = $_SESSION['idlogin'];
$cmm = htmlspecialchars($_GET['cate']) .", ". htmlspecialchars($_GET['cate1']);
    //mysqli_query($conn,'INSERT INTO dt_forum SET idaccount = "'.$_SESSION['idlogin'].'",title = "'.$title.'",content = "'.$content.'",tpost = "'.$date.'",cm = "'.htmlspecialchars($_GET['cate']).','.htmlspecialchars($_GET['cate1']).'",rtype = "'.$type.'",lasthd = "'.time().'"');
$time =time();
    mysqli_query($conn,"INSERT INTO `dt_forum`(`idaccount`, `title`, `content`, `tpost`, `cm`, `rtype`, `lasthd`) 
    VALUES ('$idacc','$title','$content','$date','$cmm','$type','$time')");
    
$nga = mysqli_query($conn,'SELECT id FROM dt_forum ORDER BY id DESC LIMIT 1');
if (mysqli_num_rows($nga)){
while($bn = mysqli_fetch_assoc($nga)){
$idbv = $bn['id'];
}
}
//mysqli_query($conn,'INSERT INTO dt_forumqt SET idaccount = "'.$_SESSION['idlogin'].'",idfr = "'.$idbv.'"');
mysqli_query($conn,"INSERT INTO `dt_forumqt`( `idaccount`, `idfr`) VALUES ('$idacc','$idbv')");
$ngaa = mysqli_query($conn,'SELECT id,ncolor FROM dt_user WHERE id = "'.$_SESSION['idlogin'].'"');
if ($lulu = mysqli_fetch_assoc($ngaa)){
$moto = $lulu['ncolor'];
}
//mysqli_query($conn,'INSERT INTO dt_chat SET idaccount = "2", content = "[url=/profile/'.$_SESSION['login'].'][color='.$moto.']'.$_SESSION['login'].'[/color][/url] vừa đăng chủ đề [url=/forum/'.vntext($title).'-'.$idbv.']'.$title.'[/url] tại Diễn Đàn !",subchat1 = "'.$date.'"');
$liak = '<div class="list3">Tạo chủ đề mới thành công !</div>';
$load = 'load';
}
}
$dang ='

<div class="container">
            <div class="create">
                <div class="create__head">
                    <div class="create__title" style="color:#131CF1;">Bài Viết Mới</div>
                   
                </div>

                <form action="" method="post" >
                <div class="create__section">
                    <label class="create__label" for="title" style="color:#131CF1;">Tiêu đề <small style="color:red">'.$ertit.'</small></label>
                    <input type="text" name="title" class="form-control" id="title" placeholder="Tiều đề bài viết" >
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="create__section">
                            <label class="create__label" for="category" style="color:#131CF1;">Thể loại</label>
                            <label class="custom-select">
                                <select id="category" name="type">
                                <option value="trong">-- Chọn --</option>
                                <option value="Thông Báo">Thông Báo</option>
                                <option value="Chia sẻ">Chia sẻ</option>
                                <option value="Hướng Dẫn">Hướng Dẫn</option> 
                                <option value="Giải Đáp">Giái Đáp</option>
                                <option value="Thảo Luận">Thảo Luận</option>
                                <option value="Ý Kiến">Ý Kiến</option>
                                <option value="Tin Tức">Tin tức</option>                               
                                <option value="Khác">Khác</option>
                                </select>
                            </label>                      
                            </div>
                    </div>
                    </div>
                <div class="create__section create__textarea">
                    <label class="create__label" for="description" style="color:#131CF1;">Nội dung <small style="color:red"> '.$ercon.'</small></label>
                 
                    <textarea class="form-control" id="editor1" name="content"></textarea>
                </div>
              
               
                <div class="create__footer">
                <input type="submit" name="dang" class="create__btn-create btn btn--type-02" value="Đăng bài viết" style="background-color: #71BBCE; border-radius: 8px;" >
                   
                </div>
           
            </form>
            </div>

</div>
        ';


$chcm = mysqli_query($conn,'SELECT name,nlink FROM dt_forumcmc WHERE nlink = "'.$_GET['cate'].'"');
if ($ngp = mysqli_fetch_assoc($chcm)){
$ok = $ngp['nlink'];
$ok1 = $ngp['name'];
}
$chcmm = mysqli_query($conn,'SELECT name,nlink FROM dt_forumcmp WHERE nlink = "'.$_GET['cate1'].'"');
if ($ngpp = mysqli_fetch_assoc($chcmm)){
$ok3 = $ngpp['nlink'];
$ok2 = $ngpp['name'];
}
if ($ok != '' && $ok1 != '' && $ok2 != '' && $ok3 != ''){
echo '<div class="phdr"><a href="/forum" style="color:#131CF1;">Diễn Đàn</a> <a>></a> <a href="/forum#'.$ok.'" style="color:#131CF1;">'.$ok1.'</a> <a>></a> <a href="/forum/'.$ok.'/'.$ok3.'" style="color:#131CF1;">'.$ok2.'</a> <a>></a> <a style="color:#71BBCE">Chủ Đề Mới</a></div>'.$liak.''.$liakk.'';
if (login){
if (htmlspecialchars($_GET['cate1']) == 'thong-bao'){
$nghp = mysqli_query($conn,'SELECT id,position FROM dt_user WHERE id = "'.$_SESSION['idlogin'].'"');
if ($nghip = mysqli_fetch_assoc($nghp)){
if ($nghip['position'] == 'Admin' OR $nghip['position'] == 'SMod' OR $nghip['position'] == 'Mod'){
echo $dang;
} else {
echo '<div class="list2">Chuyên mục mẹ hoặc chuyên mục con chỉ dành cho các thành viên quản trị đăng bài !</div>';
}
}
} else {
echo $dang;
}
} else {
echo '<div class="list2">Chỉ dành cho thành viên đã đăng nhập !</div>';
}
} else {
echo '<div class="phdr">Lỗi Diễn Đàn</div><div class="list2">Chuyên mục, chuyên mục con không tồn tại !</div>';
}
} 
include 'foot.php';
if ($load == 'load'){
echo '<script>window.location.href="/forum/'.vntext($title).'-'.$idbv.'";</script>';
} 

?>