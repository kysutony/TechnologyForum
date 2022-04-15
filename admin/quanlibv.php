<?php
$title = "Trang chu";

include '../head.php';
include '../func.php';

if($u['position'] !='Admin'){
    echo '<meta http-equiv="refresh" content="0 ;url=/err.php">'; 
    die();
}
?>

<?php

$idbv = $_GET['xoabaiviet'];
                                       if(isset($idbv)){
                                           mysqli_query($conn, "DELETE FROM `dt_forum` WHERE id='$idbv'");
                                           echo'<script>alert("Xóa Thành Công")</script>'; 
                                        
                                        }
                                    
?>
<?php

$anidbv = $_GET['anbaiviet'];
                                       if(isset($anidbv)){
                                           mysqli_query($conn, "UPDATE `dt_forum` SET `anbv`='1' WHERE id='$anidbv'");
                                           echo'<script>alert("Ẩn Thành Công") </script>';

                                       }
                                    
?>

<div class="container">
            <div class="posts">
                <div class="posts__head">
                    <div class="posts__topic">Bài Viết</div>
                    <div class="posts__category">Category</div>
                    <div class="posts__users">Users / Reply</div>
                    <div class="posts__users">>>> Activity <<<</div>
                    
                    
                </div>
                <div class="posts__body">

               

              

<?php
$i=0;
$reqcdhd = mysqli_query($conn,'SELECT * FROM dt_forum   ORDER BY lasthd DESC LIMIT 10');
if (mysqli_num_rows($reqcdhd)){
while($rescdhd = mysqli_fetch_assoc($reqcdhd)){
$reqcdhdauthor = mysqli_query($conn,'SELECT id,account,position,ncolor FROM dt_user WHERE id = "'.$rescdhd['idaccount'].'"');
if ($rescdhdauthor =mysqli_fetch_assoc($reqcdhdauthor)){
$author = '<a href="/profile/'.$rescdhdauthor['account'].'" style="color:'.$rescdhdauthor['ncolor'].';"> '.$rescdhdauthor['account'].''.'</a>';
}
$reqcdhdcmt = mysqli_query($conn,'SELECT id,idaccount,idbv FROM dt_forumcmt WHERE idbv = "'.$rescdhd['id'].'" ORDER BY id DESC');
if (mysqli_num_rows($reqcdhdcmt)){
if ($rescdhdcmt = mysqli_fetch_assoc($reqcdhdcmt)){
$reqcdhdcmtuser = mysqli_query($conn,'SELECT id,account,position,ncolor FROM dt_user WHERE id = "'.$rescdhdcmt['idaccount'].'"');
if ($rescdhdcmtuser = mysqli_fetch_assoc($reqcdhdcmtuser)){
$cmtuser = '<a href="/profile/'.$rescdhdcmtuser['position'].'" style="color:'.$rescdhdcmtuser['ncolor'].'; " > '.$rescdhdcmtuser['account'].'</a>';
}
}
} else {
$cmtuser = $author;
}
if ($rescdhd['rtype'] != 'trong'){
$rtype = '<span class="xbun-'.rand(0,7).'">'.$rescdhd['rtype'].'</span>';
}
$light2018 = mysqli_fetch_assoc(mysqli_query($conn,'SELECT COUNT(id) as cmtcount FROM dt_forumcmt WHERE idbv = "'.$rescdhd['id'].'"'));
if ($rescdhd['colp'] == 'close'){
$img = '<img src="image/default/topic-close.png">';
} else {
$img = '';
}

$c = array("bg-f9bc64","bg-348aa7","bg-4436f8","bg-5dd39e","bg-ff755a", "bg-bce784", "bg-83253f", "bg-c49bbb", "bg-3ebafa", "bg-c6b38e", "bg-a7cdbd","bg-525252","bg-777da7","bg-368f8b");
$random_keysc=array_rand($c,3);
$ran = ($i%2==0) ? '' : 'bg-f2f4f6';
echo' <div class="posts__item '.$ran.'">
<div class="posts__section-left">
    <div class="posts__topic">
        <div class="posts__content">
          <a href="/forum/'.vntext($rescdhd['title']).'-'.$rescdhd['id'].'">
                <h3>'.$rescdhd['title'].'</h3>
            </a>
        </div>
    </div>
    <div class="posts__category"><a href="#" class="category"><i class="'.$b[$random_keysc[0]].'"></i>'.$rtype.'</a></div>
</div>
<div class="posts__section-right">
    <div class="posts__users">
        <div>
        '.$author.'
        </div>

        / 

        <div>
        '.$cmtuser.'
        </div>
      
    </div>
                <div>   
                                <div class="topic__funtion"  style ="margin-left:20px">                              
                                <a href="?xoabaiviet='.$rescdhd['id'].'"><span style=" padding: 0 5px; font-size: 13px;  top: 50%; right: 0; border-radius: 20px; background-color: #71BBCE; color: #ffffff; align-items: center;">Xoá</span></a>
                                
                                <a href="?anbaiviet='.$rescdhd['id'].'"><span style=" padding: 0 8px; font-size: 13px;  top: 50%; right: 0; border-radius: 20px; background-color: #71BBCE; color: #ffffff; align-items: center;">Ẩn</span></a>
                                    </div>    
                </div>
</div>
</div>';



$i++;
}
} else {
echo '<div class="list2">Diễn Đàn chưa có chủ đề hoạt động !</div>';
}

echo'  </div>
</div>
</div>
</div>';

?>

<?php
include '../foot.php'; ?> 