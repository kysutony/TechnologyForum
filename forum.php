<?php
error_reporting(0);
include 'func.php';

if (isset($_GET['cate']) && isset($_GET['cate1'])){
$cmn = 'yes';
$trangay = ''.$title.',/forum/'.$_GET['cate'].'/'.$_GET['cate1'].'';
include 'head.php';
$cmd = htmlspecialchars($_GET['cate']).','.htmlspecialchars($_GET['cate1']);
$checkcmn = mysqli_query($conn,'SELECT id,nlink,name FROM dt_forumcmp WHERE nlink = "'.htmlspecialchars($_GET['cate1']).'"');
if ($checkcmnn = mysqli_fetch_assoc($checkcmn)){
$NANA = mysqli_query($conn,'SELECT id,nlink,name FROM dt_forumcmc WHERE nlink = "'.htmlspecialchars($_GET['cate']).'"');
if ($nana = mysqli_fetch_assoc($NANA)){
$nanane = $nana['name'];
$nananee = $nana['nlink'];
}
if ($nanane == '' && $nananee == ''){
echo '<div class="phdr">Lỗi Diễn Đàn</div><div class="list2">Lỗi chuyên mục !</div>';
include 'foot.php';
die();
}
echo '
<div class="phdr">
<a href="forum.php" style="color:#131CF1;">Diễn Đàn</a> > <a href="/forum#'.$nananee.'" style="color:#131CF1;">'.$nanane.'</a> > <a style="color:#5FABBE">'.$checkcmnn['name'].'</a> </div>';
if (login){
if (htmlspecialchars($_GET['cate1']) == 'thong-bao'){
$ngh = mysqli_query($conn,'SELECT id,position FROM dt_user WHERE id = "'.$_SESSION['idlogin'].'"');
if ($nghi = mysqli_fetch_assoc($ngh)){
if ($nghi['position'] == 'Admin' OR $nghi['position'] == 'SMod' OR $nghi['position'] == 'Mod'){
    
echo '<div class="list"><a href="'.$_GET['cate1'].'/new-topic">Chủ Đề Mới</a></div><div class="phdr" style="padding:3px;"></div>';
}
}
} else {
echo '<div class="list"><a href="'.$_GET['cate1'].'/new-topic" style="color:#5B92A0">Chủ Đề Mới</a></div><div class="phdr" style="padding:3px;"></div>';
}
}
include 'exif.php';
} else {
echo '<div class="phdr" >Diễn Đàn</div>';
echo '<div class="list2">Chuyên mục, chuyên mục con không tồn tại !</div>';
}
include 'foot.php';
die();
}
$title = 'Diễn Đàn';
$trangay = 'Diễn Đàn,/forum';
include 'head.php';
echo '
    <div class="phdr" style ="color:#131CF1;">Diễn Đàn</div>';
$reqcmc = mysqli_query($conn,'SELECT * FROM dt_forumcmc ORDER BY id ASC');
if (mysqli_num_rows($reqcmc)){
while($rescmc = mysqli_fetch_assoc($reqcmc)){
echo '<div class="phdr" style ="color:#131CF1;" id="'.$rescmc['nlink'].'">'.$rescmc['name'].'</div>';
$reqcmp = mysqli_query($conn,'SELECT * FROM dt_forumcmp WHERE inid = "'.$rescmc['id'].'" ORDER BY id ASC');
if (mysqli_num_rows($reqcmp)){
while($rescmp = mysqli_fetch_assoc($reqcmp)){
$countcd = mysqli_fetch_assoc(mysqli_query($conn,'SELECT COUNT(id) as cd FROM dt_forum WHERE cm = "'.$rescmc['nlink'].','.$rescmp['nlink'].'"'));
echo '<div class="list" style ="color:#131CF1;">
<a href="forum/'.$rescmc['nlink'].'/'.$rescmp['nlink'].'" style="color:#5B92A0">'.$rescmp['name'].'</a> ['.$countcd['cd'].']</div>';

}
} else {
echo '<div class="list2">Chưa có chuyên mục con nào !</div>';
}
}
} else {
echo '<div class="phdr" style="padding:3px;"></div><div class="list2">Chưa có chuyên mục nào !</div>';
}?>
<?php
include 'foot.php';
?>