<?php
include 'head.php';

$sql = 'SELECT * FROM `binhluan`';
$result = mysqli_query($conn, $sql);
if (login){
if(isset($_POST['dan'])){
    $id = $sql['id'];
    $nd = $_POST['noi_dung'];
    $id_acc = $u['id_account'];
    $id_bv = $_POST['idbv'];
    $t_post = $_POST['tpost'];
 

    if($nd != ''){
        mysqli_query($conn, "INSERT INTO `binhluan`(`id`, `id_account`, `noidung`, `idbv`, `tpost`) VALUES ('[$id]','[$id_acc]','[$nd]','[$id_bv]','[$t_post]')");
        
        
    }
}
    echo '<form action="" method="post">
    <div class="phdr" style="padding:3px;"></div><div class="list">'.$ercon.'<br><textarea name="noi_dung" placeholder="Bình luận công khai" rows="1" cols="30"></textarea><br><br>
    <input type="submit" name="dan" class="create__btn-create btn btn--type-02" value="Bình luận" style="background-color: #71BBCE; border-radius: 8px;" ></form></div>';
    
    }
?>