<?php
$conn = mysqli_connect("localhost","root","","data_wap");
$title = 'Trang Chủ';
$trangay = 'Trang Chủ,/';
include 'head.php';
include 'bbcode.php';
include 'func.php';
//include 'chat.php';

?>
   <div class="container">
            <div class="nav">
                <div class="nav__categories js-dropdown">
                    <div class="nav__select">
                        <div class="btn-select" data-dropdown-btn="categories"style="border-radius: 8px; color:#131CF1;">Tất cả chuyên mục</div>
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

?>
                            
                        </nav>
                    </div>
                    <div class="nav__select">
                        <div class="btn-select" data-dropdown-btn="tags"style="border-radius: 8px; color:#131CF1;">Thẻ</div>
                        <div class="dropdown dropdown--design-01" data-dropdown-list="tags">
                            <div class="tags">
                                <a href="mini-game/rock-paper-scissors" class="bg-4f80b0">gaming</a>
                                <a href="#" class="bg-424ee8">nature</a>
                                <a href="#" class="bg-36b7d7">entertainment</a>
                                <!-- <a href="#" class="bg-ef429e">selfie</a>
                                <a href="#" class="bg-7cc576">camera</a>
                                <a href="#" class="bg-3a3a17">username</a>
                                <a href="#" class="bg-6f7e9c">funny</a>
                                <a href="#" class="bg-f26522">photography</a>
                                <a href="#" class="bg-a3d39c">climbing</a>
                                <a href="#" class="bg-92278f">adventure</a>
                                <a href="#" class="bg-8781bd">dreams</a>
                                <a href="#" class="bg-f1ab32">life</a>
                                <a href="#" class="bg-3b96ca">reason</a>
                                <a href="#" class="bg-348aa7">social</a> -->
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
            </div>
            <div class="posts">
                <div class="posts__head">
                    <div class="posts__topic">Bài Viết</div>
                    <div class="posts__category">Chuyên mục</div>
                    <div class="posts__users">Người Dùng</div>
                    <div class="posts__replies">Trả Lời</div>
                    <div class="posts__views">Lượt Xem</div>
                    <div class="posts__activity">Hoạt Động</div>
                </div>
                <div class="posts__body">


               
              

<?php
$i=0;
$reqcdhd = mysqli_query($conn,'SELECT * FROM dt_forum where anbv=0 ORDER BY lasthd DESC LIMIT 10');
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
include 'foot.php';
?>