<?php

include 'config.php';


?>

<!doctype html>
<html lang="en-US">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, minimum-scale=1, maximum-scale=1">
    <meta name="keywords" content="HTML5 Template">
    <meta name="description" content="Responsive HTML5 Template">
    <meta name="author" content="author.com">
    <title><?=$title?></title>

    <!-- STYLESHEET -->
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <!-- icon -->
    <link rel="stylesheet" href="/fonts/icons/main/mainfont/style.css">
    <link rel="stylesheet" href="/fonts/icons/font-awesome/css/font-awesome.min.css">

    <!-- Vendor -->
    <link rel="stylesheet" href="/vendor/bootstrap/v3/bootstrap.min.css">
    <link rel="stylesheet" href="/vendor/bootstrap/v4/bootstrap-grid.css">
    <!-- Custom -->
    <link rel="stylesheet" href="/css/style.css">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<style>
#noti_Counter {
            display:block;
            position:absolute;
            background:#E1141E;
            color:#FFF;
            font-size:12px;
            font-weight:normal;
            padding:0px 5px;
            margin:-25px 0 0 -16px;
            border-radius:2px;
            -moz-border-radius:2px; 
            -webkit-border-radius:2px;
            z-index:1;
        
        }

#noti_Button {
            width:22px;
            height:22px;
            line-height:22px;
            border-radius:50%;
            -moz-border-radius:50%; 
            -webkit-border-radius:50%;
            background:#FFF;
            margin:-3px 10px 0 10px;
            cursor:pointer;
        }

</style>
<body>
    <div class="header js-header js-dropdown">
            <div class="container">
                <a href="/">
                    <div class="header__logo-btn" style="margin-left: -52px;">
                                   <img src="/images/image1.png" width = "70px">
     

                    </div></a>
                   
                
                <div class="header__search" style="width: 400px;">
                    <form action="#">
                    <label>
                            <i class="icon-Search js-header-search-btn-open"></i>
                            <input type="search" placeholder="Tìm kiếm trong diễn đàn" class="form-control">
                        </label>
                    </form>
                    <div class="header__search-close js-header-search-btn-close"><i class="icon-Cancel"></i></div>
                    
                    
                </div>

                <div class="header__menu" style=" margin-left: -50px;color: #8d9091 !important; ">

                    <div class="header__menu-btn" data-dropdown-btn="menu">

                        <i class="icon-Menu_Icon"></i>&ensp;Chuyên mục

                    </div>

                    <nav class="dropdown dropdown--design-01" data-dropdown-list="menu">

                       
                        <div>
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
                                <a href="/forum/'.$rescmc['nlink'].'/'.$rescmp['nlink'].'/new-topic" class="category">
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
                            
                           
                               
                                
                           
                        </div>
                       
                    </nav>
                </div>
                <?php
                if (!login){
                ?>
                  <div class="header__notification" style=" color: #8d9091 !important; ">
                    <div class="header__notification-btn">
                    <a href="/registration">
                        <i class="fa fa-user-plus" style=" margin-top: 5px; "></i> &nbsp; Đăng ký
                        </a>
                    </div>
                    
                </div>

                <div class="header__notification" style=" color: #8d9091 !important; ">
                    <div class="header__notification-btn">
                    <a href="/login">
                        <i class="fa fa-user" style=" margin-top: 5px; "></i>&nbsp; Đăng Nhập
                        </a>
                    </div>
                    
                </div>
                <?php
                }else{



                    
                    if (login){
                        $notification =mysqli_query($conn,'SELECT * FROM dt_notification WHERE cidacc = "'.$_SESSION['idlogin'].'" && view = "none" && (goku = "forum" OR goku = "like") ORDER BY id DESC');
                  
                ?>
              

                <div class="header__notification" style="margin-left:-40px ; color: #8d9091 !important; " >
                    <div class="header__notification-btn" data-dropdown-btn="notification" >
                        <i class="icon-Notification" ></i>
                        
                        <?php  
                
                           
       
                            echo '<div id="noti_Counter"> '.mysqli_num_rows($notification).'</div>';
                        
                        
                        ?>
                        Thông báo
                    
                        
                    </div>
                    <div id="notifications" class="dropdown dropdown--design-01" data-dropdown-list="notification">
                        
                    <div>
                    <?php
                   echo '<div class="phdr" style="color:#131CF1;">Thông Báo</div>';
                     if (mysqli_num_rows($notification)){
                    while($getnoti =mysqli_fetch_assoc($notification)){
                    if ($getnoti['goku'] == 'like' OR $getnoti['goku'] == 'forum'){
                    $memi = $getnoti['idaccount'];
                    $lolvn =mysqli_query($conn,'SELECT id,account,ncolor,avatar FROM dt_user WHERE id = "'.$memi.'"');
                    if ($hf =mysqli_fetch_assoc($lolvn)){
                    $kae = $hf['account'];
                    $kidae = $hf['id'];
                    $ava = $hf['avatar'];
                    }
                    $nai = explode(',',$getnoti['content']);
                    if ($nai['0'] == 'đã bình luận'){
                    $mave = end(explode('-',$nai['1']));
                    $lp =mysqli_fetch_assoc(mysqli_query($conn,'SELECT idaccount FROM forumcmt WHERE idbv = "'.$mave.'"'));
                    if ($lp['idaccount'] == $_SESSION['idlogin']){
                    $tg = 'của bạn';
                    }
                    } else {
                    $mav = end(explode('-',$nai['1']));
                    $lip =mysqli_query($conn,'SELECT id,idaccount FROM forum WHERE id = "'.$mav.'"');
                    if ($rlip =mysqli_fetch_assoc($lip)){
                    if ($rlip['idaccount'] == $_SESSION['idlogin']){
                    $tg = 'của bạn';
                    } elseif ($rlip['idaccount'] == $kidae){
                    $tg = 'của bạn ấy';
                    } else {
                    $tg = 'bạn quan tâm';
                    }
                    }
                    }
                    echo '<div class="list">
                    <img style=" border-radius: 250px; width:28px" src="/'.$hf['avatar'].'" width="40" height="40">

                    <a href="/profile/'.$kae.'"><font color="'.$hf['ncolor'].'">'.$kae.'</font> <a href="'.$nai['1'].'?t" style="color:#71BBCE">'.$nai['0'].' '.$tg.'</a></div>';
                    }
                    }
                    } else {
                    echo '<div class="list2">Chưa có thông báo nào !</div>';
                    }
                    } else {
                    echo '<div class="list2">Chỉ dành cho thành viên chưa đăng nhập !</div>';
                    }?>
                            <span><a href="/notification.php">view older notifications...</a></span>
                        </div>
                    </div>
                </div>
                <div class="header__user" style="margin-left:-40px ;padding-right: 15px;" >
                    <div class="header__user-btn" data-dropdown-btn="user">
                       <img src="/<?=$u['avatar']?>" alt="avatar" style="margin-right: 5px; border-radius: 250px;" >
                        <?=$u['status']?><i class="icon-Arrow_Below"></i>
                    </div>

                    
                    <nav class="dropdown dropdown--design-01" data-dropdown-list="user">
                        <!--<div>
                            <div class="dropdown__icons">
                                <a href="#"><i class="icon-Bookmark"></i></a>
                                <a href="#"><i class="icon-Message"></i></a>
                                <a href="/account.php"><i class="icon-Preferences"></i></a>
                                <a href="/logout.php"><i class="icon-Logout"></i></a>
                            </div>
                        </div>-->
                        <div>
                        <ul class="dropdown__catalog" >
                                <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-sliders" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M11.5 2a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM9.05 3a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0V3h9.05zM4.5 7a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM2.05 8a2.5 2.5 0 0 1 4.9 0H16v1H6.95a2.5 2.5 0 0 1-4.9 0H0V8h2.05zm9.45 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm-2.45 1a2.5 2.5 0 0 1 4.9 0H16v1h-2.05a2.5 2.5 0 0 1-4.9 0H0v-1h9.05z"/>
</svg><a href="/account.php" >&nbsp; Cài đặt</a></li>
                                <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-bounding-box" viewBox="0 0 16 16">
  <path d="M1.5 1a.5.5 0 0 0-.5.5v3a.5.5 0 0 1-1 0v-3A1.5 1.5 0 0 1 1.5 0h3a.5.5 0 0 1 0 1h-3zM11 .5a.5.5 0 0 1 .5-.5h3A1.5 1.5 0 0 1 16 1.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 1-.5-.5zM.5 11a.5.5 0 0 1 .5.5v3a.5.5 0 0 0 .5.5h3a.5.5 0 0 1 0 1h-3A1.5 1.5 0 0 1 0 14.5v-3a.5.5 0 0 1 .5-.5zm15 0a.5.5 0 0 1 .5.5v3a1.5 1.5 0 0 1-1.5 1.5h-3a.5.5 0 0 1 0-1h3a.5.5 0 0 0 .5-.5v-3a.5.5 0 0 1 .5-.5z"/>
  <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3zm8-9a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
</svg><a href="/trangcanhan.php" >&nbsp;Trang cá nhân</a></li>
                                <!--<li><a href="#">Badges</a></li>
                                <li><a href="#">My Groups</a></li>-->
                                <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bookmarks" viewBox="0 0 16 16">
  <path d="M2 4a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v11.5a.5.5 0 0 1-.777.416L7 13.101l-4.223 2.815A.5.5 0 0 1 2 15.5V4zm2-1a1 1 0 0 0-1 1v10.566l3.723-2.482a.5.5 0 0 1 .554 0L11 14.566V4a1 1 0 0 0-1-1H4z"/>
  <path d="M4.268 1H12a1 1 0 0 1 1 1v11.768l.223.148A.5.5 0 0 0 14 13.5V2a2 2 0 0 0-2-2H6a2 2 0 0 0-1.732 1z"/>
</svg><a href="/forum" >&nbsp;Chủ đề</a></li>
                                <!--<li><a href="#">Likes</a></li>
                                <li><a href="#">Solved</a></li>-->
                                <li><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
  <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
</svg> <a href="/logout.php"  >&nbsp;Đăng xuất</a></li>
                            </ul>
                        </div>
                    </nav>
            
                </div>
                <div class="header__notification" style="margin:-65px">
                <img src="/fonts/icons/main/New_Topic.svg" style="width:30px; margin-right: 5px;">
                   <a href="/forum">Đăng Bài</a>
                    
                </div>
                   
        </div>
</div>        
                
  <?php    
 }
?>
    </div>
            
           
            </div>
            <script>
    $(document).ready(function () {

        // ANIMATEDLY DISPLAY THE NOTIFICATION COUNTER.
        $('#noti_Counter')
            .css({ opacity: 0 })
            .text('')      // ADD DYNAMIC VALUE (YOU CAN EXTRACT DATA FROM DATABASE OR XML).
            .css({ top: '-10px' })
            .animate({ top: '-2px', opacity: 1 }, 500);

        $('#noti_Button').click(function () {

            // TOGGLE (SHOW OR HIDE) NOTIFICATION WINDOW.
            $('#notifications').fadeToggle('fast', 'linear', function () {
                if ($('#notifications').is(':hidden')) {
                    $('#noti_Button').css('background-color', '#2E467C');
                }
                // CHANGE BACKGROUND COLOR OF THE BUTTON.
                
            });

            $('#noti_Counter').fadeOut('slow');     // HIDE THE COUNTER.

            return false;
        });

        // HIDE NOTIFICATIONS WHEN CLICKED ANYWHERE ON THE PAGE.
        $(document).click(function () {
            $('#notifications').hide();

            // CHECK IF NOTIFICATION COUNTER IS HIDDEN.
            if ($('#noti_Counter').is(':hidden')) {
                // CHANGE BACKGROUND COLOR OF THE BUTTON.
                $('#noti_Button').css('background-color', '#2E467C');
            }
        });

        $('#notifications').click(function () {
            return false;       // DO NOTHING WHEN CONTAINER IS CLICKED.
        });
    });
</script>
<?php
/*


<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.0//EN" "http://www.wapforum.org/DTD/xhtml-mobile10.dtd">
<html lang="vi">
<head>
<meta http-equiv="Content-Type" content="text/html; charset="UTF-8"/>
<meta name="viewport" content="width=device-width,initial-scale=1">
<meta http-equiv="content-language" content="vi">
<title><?php echo $title; ?></title>
<?php
if (login){
$themep = mysqli_fetch_assoc(mysqli_query($conn,'SELECT theme FROM dt_user WHERE account = "'.$_SESSION['login'].'"'));
$themec = $themep['theme'];
if ($themec == 'bopbt'){

}
} else {
$themec = 'style';
}
$loadjs = 'ok';
?>
<link type="text/css" rel="stylesheet" href="/otfi/css/<?php echo $themec; ?>.css?t=<?php echo time(); ?>" media="all,handheld"/>
<link rel="shortcut icon" href="/image/design/m.png" />
<?php
if ($loadjs){
echo '<script src="/otfi/js/jquery-3.2.1.min.js"></script><script src="/js/pace.js"></script>';
}
?>
</head>
<body>
<loadpg>
<div class="list" style="border-top:1px solid #d5d5d5;"><a id="load" href="/" style="color:#777;font-size:17px;">MBKVN.TK</a></div>
<?php
if (!isset($_SESSION['login'])){
echo '<div class="phdr" style="margin-top:0px;"><a href="/" style="color:white;">Trang Chủ</a> | <a href="/login" style="color:white;">Đăng Nhập</a> | <a href=""/registration style="color:white;">Đăng Ký</a></div>';
} else {
$kj = mysqli_fetch_assoc(mysqli_query($conn,'SELECT COUNT(id) as jk FROM dt_notification WHERE cidacc = "'.$_SESSION['idlogin'].'" && view = "none" && (goku = "like" OR goku = "forum")'));
if ($kj['jk'] != '0'){
$kpg = '('.$kj['jk'].')';
}
$unam = mysqli_fetch_assoc(mysqli_query($conn,'SELECT account FROM dt_user WHERE id = "'.$_SESSION['idlogin'].'"'));
$uname = $unam['account'];
echo '<div class="phdr" style="margin-top:0px;"><a href="/" style="color:white;">Trang Chủ</a> | <a href="/profile/'.$uname.'" style="color:white;">'.$uname.'</a> | <a href="/account" style="color:white;">Tài Khoản</a> | <a href="/message" style="color:white;">Tin Nhắn</a> | <a href="/notification" style="color:white;">Thông Báo '.$kpg.'</a> | <a href="/logout" style="color:white;">Đăng Xuất</a></div>';
}
?>
<?php
$reqi = mysqli_query($conn,'SELECT * FROM dt_notification WHERE cidacc = "'.$_SESSION['idlogin'].'" && (goku = "message" or goku = "wallhome") && view = "none" ORDER BY id DESC LIMIT 1');
if(mysqli_num_rows($reqi)){
while($resi = mysqli_fetch_assoc($reqi)){
if ($resi['goku'] == 'message' OR $resi['goku'] == 'wallhome'){
$req4 = mysqli_query($conn,'SELECT id,account FROM dt_user WHERE id = "'.$resi['idaccount'].'"');
if($res4 = mysqli_fetch_assoc($req4)){
$p45 = $res4['account'];
}
$tach = explode('-',$resi['content']);
$np = mysqli_fetch_assoc(mysqli_query($conn,'SELECT COUNT(id) as mailpl FROM dt_message WHERE idaccount = "'.$resi['idaccount'].'" && idpl = "'.$_SESSION['idlogin'].'" && view = "no"'));
$np1 = mysqli_fetch_assoc(mysqli_query($conn,'SELECT COUNT(id) as mailpl1 FROM dt_message WHERE idpl = "'.$_SESSION['idlogin'].'" && view = "no"'));
if ($np['mailpl'] > '1'){
$eu = '('.$np['mailpl'].')';
}
if ($np1['mailpl1'] != '0'){
$eui = $np1['mailpl1'].'|';
}
if ($resi['goku'] == 'message'){
$nnb = '<div class="list2">Chưa đọc: <a href="'.$tach['1'].'?t=read">Tin nhắn từ '.$p45.' '.$eu.'</a></div>';
} else {
echo '<div class="list2"><a href="'.$tach['1'].'?t=read">'.$p45.' '.$tach['0'].'</a></div>';
}
}
}
$nnn = mysqli_fetch_assoc(mysqli_query($conn,'SELECT COUNT(id) as mailp FROM dt_notification WHERE cidacc = "'.$_SESSION['idlogin'].'" && view = "none" && goku = "message"'));
if ($nnn['mailp'] != '0'){
if ($nnn['mailp'] > '1'){
echo '<div class="list2">Chưa đọc: <a href="'.$tach['1'].'?t=read" style="color:;">'.$eui.''.$nnn['mailp'].' tin nhắn</a></div>';
} else {
echo $nnb;
}
}
}
*/?>
