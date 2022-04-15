<?php
error_reporting(0);
$titleforum = 'yes';
$trangay = ''.$title.',/forum/'.htmlspecialchars($_GET['na']).'-'.htmlspecialchars($_GET['id']).'';
include 'head.php';


$sql = 'SELECT * FROM `trangcanhan`';
$result = mysqli_query($conn, $sql);
if (isset($_GET['t'])){
mysqli_query($conn, 'UPDATE dt_notification SET view = "view" WHERE cidacc = "'.$_SESSION['idlogin'].'" && content = "đã bình luận về chủ đề,/forum/'.htmlspecialchars($_GET['na']).'-'.htmlspecialchars($_GET['id']).'"');
mysqli_query($conn, 'UPDATE dt_notification SET view = "view" WHERE cidacc = "'.$_SESSION['idlogin'].'" && content = "đã thích chủ đề,/forum/'.htmlspecialchars($_GET['na']).'-'.htmlspecialchars($_GET['id']).'"');
$hehi = explode(',',$trangay);
echo '<script>window.location.href="'.$hehi['1'].'";</script>';
}
include 'func.php';
include 'bbcode.php';
$reqthr = mysqli_query($conn, 'SELECT * FROM dt_forum WHERE id = "'.htmlspecialchars($_GET['id']).'"');
if ($resthr = mysqli_fetch_assoc($reqthr)){
$cm = $resthr['cm'];
$nv1 = explode(',',$resthr['cm']);
$nasa = mysqli_query($conn, 'SELECT id,nlink,name FROM dt_forumcmc WHERE nlink = "'.$nv1['0'].'"');
if ($nani = mysqli_fetch_assoc($nasa)){
$nanii = $nani['name'];
$nanit = $nani['nlink'];
}
$nasag = mysqli_query($conn, 'SELECT id,nlink,name FROM dt_forumcmp WHERE nlink = "'.$nv1['1'].'"');
if ($nanig = mysqli_fetch_assoc($nasag)){
$naniii = $nanig['name'];
$nanitt = $nanig['nlink'];
}
$geview = mysqli_fetch_assoc(mysqli_query($conn, 'SELECT COUNT(id) as mef FROM dt_user WHERE onlin = "'.$title.',/forum/'.htmlspecialchars($_GET['na']).'-'.htmlspecialchars($_GET['id']).'"'));
////echo '<div class="phdr"><a href="/forum" style="color:white;">Diễn Đàn</a> / <a href="/forum#'.$nanit.'" style="color:white;">'.$nanii.'</a> / 
///<a href="/forum/'.$nanit.'/'.$nanitt.'" style="color:white;">'.$naniii.'</a></div>';
//chuyen muc
$hf = explode(',',$trangay);
mysqli_query($conn, 'UPDATE dt_forum SET viewr = viewr+1 WHERE id = "'.htmlspecialchars($_GET['id']).'"');
$viewtotal = mysqli_fetch_assoc(mysqli_query($conn, 'SELECT viewr FROM dt_forum WHERE id = "'.htmlspecialchars($_GET['id']).'"'));
if ($resthr['colp'] == 'close'){
$closed = '<div class="list2"><img src="../../image/default/topic-close.png"> Chủ đề đã đóng cửa !</div>';
}
if ($resthr['rtype'] != "trong"){
$abcd = '<a href="#" class="bg-4f80b0"><span class="xbun-'.rand(0,7).'">'.$resthr['rtype'].'</span></a>';
}
?>

<main>
        <div class="container">
            <div class="nav">
                <div class="nav__categories js-dropdown">
                    <div class="nav__select">
                    <div class="btn-select" data-dropdown-btn="categories" style="border-radius: 8px; color:#131CF1;">Tất cả chuyên mục</div>
                        <nav class="dropdown dropdown--design-01" data-dropdown-list="categories">
                        <?php

                   
$reqcmc = mysqli_query($conn,'SELECT * FROM dt_forumcmc ORDER BY id ASC');
if (mysqli_num_rows($reqcmc)){
  while($rescmc = mysqli_fetch_assoc($reqcmc)){
    $a = array("bg-f9bc64","bg-348aa7","bg-4436f8","bg-5dd39e","bg-ff755a", "bg-bce784", "bg-83253f", "bg-c49bbb", "bg-3ebafa", "bg-c6b38e", "bg-a7cdbd","bg-525252","bg-777da7","bg-368f8b");
    $random_keys=array_rand($a,3);
    echo'<h3 id="'.$rescmc['nlink'].'">'.$rescmc['name'].'</h3>
    <ul class="dropdown__catalog row">
    ';
 
  $reqcmp = mysqli_query($conn,'SELECT * FROM dt_forumcmp WHERE inid = "'.$rescmc['id'].'" ORDER BY id ASC');
    if (mysqli_num_rows($reqcmp)){
      while($rescmp = mysqli_fetch_assoc($reqcmp)){
        $b = array("bg-f9bc64","bg-348aa7","bg-4436f8","bg-5dd39e","bg-ff755a", "bg-bce784", "bg-83253f", "bg-c49bbb", "bg-3ebafa", "bg-c6b38e", "bg-a7cdbd","bg-525252","bg-777da7","bg-368f8b");
        $random_keysb=array_rand($b,3);
        $countcd = mysqli_fetch_assoc(mysqli_query($conn,'SELECT COUNT(id) as cd FROM dt_forum WHERE cm = "'.$rescmc['nlink'].','.$rescmp['nlink'].'"'));
        echo' <li class="col-xs-6">
        <a href="/forum/'.$rescmc['nlink'].'/'.$rescmp['nlink'].'" class="category">
        <i class="'.$b[$random_keysb[0]].'"></i>'.$rescmp['name'].'</a>
        </li>';
        //['.$countcd['cd'].']
       
      }
    } else {
      echo' <li class="col-xs-6">
      <a href="#" class="category">
      <i class="'.$a[$random_keys[0]].'"></i> Chưa có chuyên mục con nào !</a>
      </li>';
   
    }
    echo' </ul>';
  }
} else {
  echo'<h3 id="'.$rescmc['nlink'].'">Chưa có chuyên mục nào !</h3>';

}

$fu = mysqli_fetch_assoc(mysqli_query($conn, 'SELECT * FROM dt_user WHERE id = "'.$resthr['idaccount'].'"'));


?>
                        </nav>
                    </div>
                    <div class="nav__select">
                    <div class="btn-select" data-dropdown-btn="tags" style="border-radius: 8px; color:#131CF1;">Thẻ</div>
                        <div class="dropdown dropdown--design-01" data-dropdown-list="tags">
                            <div class="tags">
                                <a href="#" class="bg-4f80b0">gaming</a>
                                <a href="#" class="bg-424ee8">nature</a>
                                <a href="#" class="bg-36b7d7">entertainment</a>
                                <a href="#" class="bg-ef429e">selfie</a>
                                <a href="#" class="bg-7cc576">camera</a>
                                <a href="#" class="bg-3a3a17">username</a>
                                <a href="#" class="bg-6f7e9c">funny</a>
                                <a href="#" class="bg-f26522">photography</a>
                                <a href="#" class="bg-a3d39c">climbing</a>
                                <a href="#" class="bg-92278f">adventure</a>
                                <a href="#" class="bg-8781bd">dreams</a>
                                <a href="#" class="bg-f1ab32">life</a>
                                <a href="#" class="bg-3b96ca">reason</a>
                                <a href="#" class="bg-348aa7">social</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--<div class="nav__menu js-dropdown">
                    <div class="nav__select">
                        <div class="btn-select" data-dropdown-btn="menu">Latest</div>
                        <div class="dropdown dropdown--design-01" data-dropdown-list="menu">
                            <ul class="dropdown__catalog">
                                <li><a href="#">Latest</a></li>
                                <li><a href="#">Unread</a></li>
                                <li><a href="#">Rising</a></li>
                                <li><a href="#">Most Liked</a></li>
                                <li><a href="#">Follow Feed</a></li>
                            </ul>
                        </div>
                    </div>
                    <ul>
                        <li class="active"><a href="#">Latest</a></li>
                        <li><a href="#">Unread</a></li>
                        <li><a href="#">Rising</a></li>
                        <li><a href="#">Most Liked</a></li>
                        <li><a href="#">Follow Feed</a></li>
                    </ul>
                </div>-->
                <div class="nav__thread">
                    <p style="border-radius: 8px; color:#131CF1;">Điều hướng:</p>
                    <a href="#" class="nav__thread-btn nav__thread-btn--prev" style="border-radius: 8px; color:#131CF1;"><i class="icon-Arrow_Left"></i>Trước</a>
                    <a href="#" class="nav__thread-btn nav__thread-btn--next" style="border-radius: 8px; color:#131CF1;">Sau<i class="icon-Arrow_Right"></i></a>
                </div>
            </div>
            <div class="topics">
                <div class="topics__heading">
                    <h2 class="topics__heading-title"><?=$resthr['title']?></h2>
                    <div class="topics__heading-info">
                        <a href="#" class="category"><i class="bg-3ebafa"></i> <?=$nanii?></a>
                        <div class="tags">
                            <?=$abcd?>

                        </div>
                    </div>
                </div>
                <div class="topics__body">
                    <div class="topics__content">
                        <div class="topic">
                            <div class="topic__head">
                                <div class="topic__avatar">
                                    <a href="#" class="avatar"><img style=" border-radius: 250px;" src="/<?=$fu['avatar']?>" alt="avatar"></a>
                                </div>
                                <div class="topic__caption">
                                    <div class="topic__name">
                                        <a href="/trangcanhan/<?=$fu['id']?>"><?=$fu['status']?></a>
                                    </div>
                                    <div class="topic__date"><i class="icon-Watch_Later"></i> <?=fud($resthr['tpost'],'upper')?></div>
                                    <div class="topic__funtion" style ="margin-left:20px">
                                   
                                    
                                    
<?php
 if ($resthr['idaccount'] == $u['id'] || $u['position'] == 'Admin'){
?>
  <a href="/forum/<?=$_GET['na'].'-'.$_GET['id']?>.edit"><span style=" padding: 0 5px; font-size: 13px;  top: 50%; right: 0; border-radius: 20px; background-color: #71BBCE; color: #ffffff; align-items: center;">Sửa</span></a><!--user-->
                                   
<?php
}
?>

                                    
                                   <?php
                                   if($u['position'] == 'Admin'){
                                    
                                       $xidbv = $_GET['xoabaiviet'];
                                       if(isset($xidbv)){
                                           mysqli_query($conn, "DELETE FROM `dt_forum` WHERE id='$xidbv'");
                                           echo'<script>alert("Xóa Thành Công"); </script><meta http-equiv="refresh" content="1;url=/">';

                                       }
                                    echo' <a href="?xoabaiviet='.$resthr['id'].'"><span style=" padding: 0 5px; font-size: 13px;  top: 50%; right: 0; border-radius: 20px; background-color: #71BBCE; color: #ffffff; align-items: center;">Xoá</span></a><!-- admin-->
                                    ';
                                   }
                                }
                                   ?>
                                <?php
                                   if($u['position'] == 'Admin' || $u['position'] == 'Member'){
                                     
                                        if ($resthr['idaccount'] == $u['id']|| $u['position'] == 'Admin'){
                                       

                                        
                                       $anidbv = $_GET['anbaiviet'];
                                       if(isset($anidbv)){
                                           mysqli_query($conn, "UPDATE `dt_forum` SET `anbv`='1' WHERE id='$anidbv'");
                                           echo'<script>alert("Ẩn Thành Công"); </script><meta http-equiv="refresh" content="1;url=/">';

                                       }
                                    echo' <a href="?anbaiviet='.$resthr['id'].'"><span style=" padding: 0 5px; font-size: 13px;  top: 50%; right: 0; border-radius: 20px; background-color: #71BBCE; color: #ffffff; align-items: center;">Ẩn</span></a><!-- admin-->
                                    ';
                                }
                                   
                                   
                                   ?>


                                    </div>
                                </div>
                            </div>
                            <div class="topic__content">
                                <div class="topic__text">
                                   <?=nl2br($resthr['content'])?>
                                    </div>
                                <div class="topic__footer">
                                    <!--<div class="topic__footer-likes">
                                        <div>
                                            <a href="#"><i class="icon-Upvote"></i></a>
                                            <span>201</span>
                                        </div>
                                        <div>
                                            <a href="#"><i class="icon-Downvote"></i></a>
                                            <span>08</span>
                                        </div>
                                        <div>
                                            <a href="#"><i class="icon-Favorite_Topic"></i></a>
                                            <span>39</span>
                                        </div>
                                    </div>-->
                                    
                                    <div class="topic__footer-share">
                                        <div data-visible="desktop">
                                            <a href="#"><i class="icon-Favorite_Topic"></i>&nbsp;Thích</a> 
                                            
                                        </div>
                                        <div data-visible="mobile">
                                            <a href="#"><i class="icon-More_Options"></i></a>
                                        </div>
                                        <a href="#"><i class="icon-Reply_Fill"></i>&nbsp;Chia Sẻ</a>
                                    </div>
                                </div>
                            
                        
                       
                            
                              
                        <div class="topic__title">
                                
                            
                            <?php
                                    include 'cmt.php';
                                  
                                    ?>
                            
                        </div>
                                    
                               
                              

                            
                        </div>
                         
                      
                        
                    </div>
                    
                </div>
                <!--<div class="topics__title"><i class="icon-Watch_Later"></i>This topic will close 6 months after the last reply.</div>
                <div class="topics__control">
                    <a href="#" class="btn"><i class="icon-Bookmark"></i>Bookmark</a>
                    <a href="#" class="btn"><i class="icon-Share_Topic"></i>Share</a>
                    <a href="#" class="btn"><i class="icon-Flag_Topic"></i>Flag</a>
                    <a href="#" class="btn"><i class="icon-Add_User"></i>Invite</a>
                    <a href="#" class="btn"><i class="icon-Track"></i>Track</a>
                    <a href="#" class="btn btn--type-02" data-visible="desktop"><i class="icon-Reply_Fill"></i>Reply</a>
                </div>-->
                <div class="topics__title">Chủ đề gợi ý</div>
            </div>
            <div class="posts">
                <div class="posts__head">
                    <div class="posts__topic">Chủ đề</div>
                    <div class="posts__category">Chuyên mục</div>
                    <div class="posts__users">Người dùng</div>
                    <div class="posts__replies">Trả lời</div>
                    <div class="posts__views">Lượt xem</div>
                    <div class="posts__activity" style="color:black">Hoạt động</div>
                </div>
                <div class="posts__body">
                <?php
$i=0;
$reqcdhd = mysqli_query($conn,'SELECT * FROM dt_forum where anbv= 0 ORDER BY lasthd DESC LIMIT 3');
if (mysqli_num_rows($reqcdhd)){
while($rescdhd = mysqli_fetch_assoc($reqcdhd)){
$reqcdhdauthor = mysqli_query($conn,'SELECT id,account,ncolor FROM dt_user WHERE id = "'.$rescdhd['idaccount'].'"');
if ($rescdhdauthor =mysqli_fetch_assoc($reqcdhdauthor)){
$author = '<a href="/profile/'.$rescdhdauthor['account'].'" style="color:'.$rescdhdauthor['ncolor'].';">'.$rescdhdauthor['account'].'</a>';
}
$reqcdhdcmt = mysqli_query($conn,'SELECT id,idaccount,idbv FROM dt_forumcmt WHERE idbv = "'.$rescdhd['id'].'" ORDER BY id DESC');
if (mysqli_num_rows($reqcdhdcmt)){
if ($rescdhdcmt = mysqli_fetch_assoc($reqcdhdcmt)){
$reqcdhdcmtuser = mysqli_query($conn,'SELECT id,account,ncolor FROM dt_user WHERE id = "'.$rescdhdcmt['idaccount'].'"');
if ($rescdhdcmtuser = mysqli_fetch_assoc($reqcdhdcmtuser)){
$cmtuser = '<a href="/profile/'.$rescdhdcmtuser['account'].'" style="color:'.$rescdhdcmtuser['ncolor'].';">'.$rescdhdcmtuser['account'].'</a>';
}
}
} else {
$cmtuser = $author;
}
if ($rescdhd['rtype'] != "trong"){
$rtype = '<a href="#" ><span style="color:#8e9091;width:auto; text-align: center" class="xbun-'.rand(0,7).'">'.$rescdhd['rtype'].'</span></a>';
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

        / &nbsp;

        <div>
        '.$cmtuser.'
        </div>
     
    </div>
    <div class="posts__replies">'.$light2018['cmtcount'].'</div>
    <div class="posts__views">'.$rescdhd['viewr'].'</div>
    <div class="posts__activity">'.$rescdhd['tpost'].'</div>
</div>
</div>';



$i++;
}
} else {
echo '<div class="list2">Diễn Đàn chưa có chủ đề hoạt động !</div>';
}

echo'  </div>
</div>
</div>';
?>
<?php
/*
echo '<div class="list"><a href="" style="color:;">Tìm Kiếm</a> |
 Lượt xem: '.$viewtotal['viewr'].'</div><div class="phdr" style="padding:3px;">
 </div><div class="list"> dfdfdf</div>'.$closed;
 */
//echo '<br/>'.$resthr['content'];
/*if (!isset($_GET['page']) OR $_GET['page'] == '1'){
$countcmtuserp = mysqli_fetch_assoc(mysqli_query($conn, 'SELECT COUNT(id) as lipp FROM dt_forumcmt WHERE idaccount = "'.$resthr['idaccount'].'"'));
/*echo '<div class="phdr"><table width="100%" cellpadding="0" cellspacing="0"><tbody><tr><td width="auto" style="text-align: left;">
'.fud($resthr['tpost'],'upper').'</td><td width="auto" style="text-align: right;">#1</td></tr></tbody></table></div>';*/
}
/*$reqN = mysqli_query($conn, 'SELECT * FROM dt_user WHERE id = "'.$resthr['idaccount'].'"');
if ($resni = mysqli_fetch_assoc($reqN)){
if (login){
$hilike = mysqli_query($conn, 'SELECT * FROM ulike WHERE idaccount = "'.$_SESSION['idlogin'].'" && fomb = "forum" && blike = "'.htmlspecialchars($_GET['id']).'"');
if (!mysqli_fetch_assoc($hilike) && $resthr['idaccount'] != $_SESSION['idlogin']){
$likem = '<a class="vp" href="/action/forum/'.htmlspecialchars($_GET['na']).'/'.$resthr['idaccount'].'/'.htmlspecialchars($_GET['id']).'/like" style="color:;">Like</a>';
}
}
if (isset($_SESSION['login']) && $_SESSION['idlogin'] != $resthr['idaccount']){
$qt = '<a href="/forum/'.htmlspecialchars($_GET['na']).'_'.htmlspecialchars($_GET['id']).'/'.htmlspecialchars($_GET['id']).'/topic" class="vp">Quote</a>';
}
$fileattach = mysqli_query($conn, 'SELECT * FROM dt_forumfile WHERE fileid = "'.$_GET['id'].'"');
if ($file = mysqli_fetch_assoc($fileattach)){
$attach = '<div class="attach">Tập Tin Đính Kèm</div><div class="listf"><a href="'.$file['fileurl'].'" style="color:;">'.$file['filename'].'</a> <font color="#666">'.file_size($file['filesize']).'</font></div>';
}
$like = mysqli_fetch_assoc(mysqli_query($conn, 'SELECT COUNT(id) as tlike FROM ulike WHERE fomb = "forum" && blike = "'.htmlspecialchars($_GET['id']).'"'));
if ($like['tlike'] != '0'){
$glikef = mysqli_query($conn, 'SELECT * FROM ulike WHERE fomb = "forum" && blike = "'.htmlspecialchars($_GET['id']).'"');
if (mysqli_num_rows($glikef)){
while($idlike = mysqli_fetch_assoc($glikef)){
$kigoo = $idlike['idaccount'];
$nime = mysqli_query($conn, 'SELECT id,account,ncolor FROM dt_user WHERE id = "'.$kigoo.'"');
if (mysqli_num_rows($nime)){
while($nike = mysqli_fetch_assoc($nime)){
if ($kigoo == $_SESSION['idlogin']){
$clike = mysqli_fetch_assoc(mysqli_query($conn, 'SELECT COUNT(*) as ti FROM ulike WHERE fomb = "forum" && blike = "'.htmlspecialchars($_GET['id']).'"'));
if ($clike['ti'] == '1'){
$ban = 'Bạn';
} else {
$ban = 'Bạn, ';
}
}
if ($kigoo != $_SESSION['idlogin']){
$kigo[] = '<a href="../profile/'.$nike['account'].'"><font color="'.$nike['ncolor'].'">'.$nike['account'].'</font></a>';
}
}
}
}
}
$mylike = '<div class="phdr" style="padding:3px;"></div><div class="list">'.$ban.''.implode(', ',$kigo).'  thích chủ đề này !</div>';
}
if (!isset($_GET['page']) OR $_GET['page'] == '1'){
if ($resthr['edit']){
$aa = explode('-',$resthr['edit']);
$po = mysqli_query($conn, 'SELECT id,account,ncolor FROM dt_user WHERE id = "'.$aa['1'].'"');
$pp = mysqli_fetch_assoc($po);
$edit = '<div class="list4" style="margin-bottom:2px;">Edited by <a href="/profile/'.$pp['account'].'" style="color:'.$pp['ncolor'].';">'.$pp['account'].'</a> ('.fud($aa['0'],'upper').')</div>';
}
$pgh = mysqli_fetch_assoc(mysqli_query($conn, 'SELECT position FROM dt_user WHERE id = "'.$_SESSION['idlogin'].'"'));
if ($_SESSION['idlogin'] == $resthr['idaccount']){
if ($pgh['position'] == 'Member'){
if ($resthr['edit'] == ''){
$editt = '<div style="text-align:right;"><a href="/forum/'.$_GET['na'].'-'.$_GET['id'].'.edit" class="vp" style="color:;">Chỉnh Sửa</a></div>';
}
} else {
$editt = '<div style="text-align:right;"><a href="/forum/'.$_GET['na'].'-'.$_GET['id'].'.edit" class="vp" style="color:;">Chỉnh Sửa</a></div>';
}
}
//echo '<div class="list1"><table id="" cellpadding="0" cellspacing="1"><tr><td width="auto"><img src="'.$resni['avatar'].'?i='.rand(000,999).'" width="40" height="40"></td><td>'.account($resni['id']).'<br/>'.$resni['status'].'<br><img src="../image/default/bl.png" height="16px" width="16px">'.$countcmtuserp['lipp'].'</td></tr></table></div><div class="list">'.$resthr['content'].' '.$attach.' '.$edit.'</div><div style="text-align:right;" class="list">'.$bg.' '.$qt.' '.$likem.' '.$editt.'</div></div>'.$mylike.'';
}
}

$rig = mysqli_query($conn, 'SELECT id,position FROM dt_user WHERE id = "'.$_SESSION['idlogin'].'"');
if ($nig = mysqli_fetch_assoc($rig)){
if ($nig['position'] == 'Admin' OR $nig['position'] == 'SMod' OR $nig['position'] == 'Mod'){
echo '<div class="phdr">Chức Năng</div>';
if ($resthr['colp'] != 'close'){
$topicc = '<a href="/action/forum/'.htmlspecialchars($_GET['na']).'/'.$_SESSION['idlogin'].'/'.$_GET['id'].'/close" style="color:;" class="noload">Đóng Cửa Chủ Đề</a>';
} else {
$topicc = '<a href="/action/forum/'.htmlspecialchars($_GET['na']).'/'.$_SESSION['idlogin'].'/'.$_GET['id'].'/open" style="color:;" class="noload">Mở Cửa Chủ Đề</a>';
}
echo '<div class="list">'.$topicc.'</div>';
}
}
} else {
echo '<div class="phdr"><a href="/forum" style="color:#fff;">Diễn Đàn</a></div><div class="list2">Chủ đề không tồn tại !</div>';
}*/ ?> <?php
include 'foot.php';
?>