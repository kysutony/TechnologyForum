<?php
$title = "Trang chu";

include'../head.php';
include'../func.php';
if($u['position'] !='Admin'){
    echo '<meta http-equiv="refresh" content="0 ;url=/err.php">'; 
    die();
}

//  if(!$r_user){
//    echo '<meta http-equiv="refresh" content="0 ;url=/">'; 
//    die();
//  }

?> 


 <?php
if(isset($_POST['them'])){//kieerm tra nguoi dung co nhan nut hay khong
       
    $tenCM = $_POST['tenCM'];
    
   if(empty($tenCM) ){ //kieerm rea neesu nnguoi dugn bo trong , thi thong bao keeu nguoi dugn hhap voo
       echo '<script>alert("Không được để trống"); </script>';
       
       }
      else 
       {
        
           //$sql = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `tbl_chuyenmuc` WHERE ten='$tenCM' "));
          
          $sql = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `dt_forumcmc` WHERE 'name'='$tenCM' "));
            if ( $sql !=0)
               {
                echo '<script>alert("Chuyên mục đã tồn tại"); </script>';
               }
              else {
              
                  $nlinkcm = vntext($tenCM); 
              //mysqli_query($conn, "INSERT INTO `tbl_chuyenmuc`(`ten`) VALUES ('$tenCM')");
             
              mysqli_query($conn, "INSERT INTO `dt_forumcmc`(`name`, `nlink`) VALUES ('$tenCM', '$nlinkcm')");
            
                   echo '<script>alert("Thành Công"); </script>';
               }
        }
      }
  
?>




<?php
if(isset($_POST['them2'])){//kieerm tra nguoi dung co nhan nut hay khong
       
    $tenCM2 = $_POST['tenCM2'];
    
   if(empty($tenCM2) ){ //kieerm rea neesu nnguoi dugn bo trong , thi thong bao keeu nguoi dugn hhap voo
       echo '<script>alert("Không được để trống"); </script>';
       
       }
      else 
       {
        
           //$sql = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `tbl_chuyenmuc` WHERE ten='$tenCM' "));
          
          $sql2 = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM `dt_forumcmp` WHERE 'name'='$tenCM2' "));
            if ( $sql2 > 0)
               {
                echo '<script>alert("Chuyên mục đã tồn tại"); </script>';
               }
              else {
              
                  $nlinkcm2 = vntext($tenCM2); 
              //mysqli_query($conn, "INSERT INTO `tbl_chuyenmuc`(`ten`) VALUES ('$tenCM')");
             //$inidcmc= $_POST['idne'];
             $type = htmlspecialchars($_POST['cmc']);
              mysqli_query($conn, "INSERT INTO `dt_forumcmp`(`name`, `nlink`, `inid`) VALUES ('$tenCM2', '$nlinkcm2','$type')");
            
                   echo '<script>alert("Thành Công"); </script>';
               }
        }
      }
  
?>


<?php
if(isset($_POST['xoa'])){//kieerm tra nguoi dung co nhan nut hay khong
       
    
              //mysqli_query($conn, "INSERT INTO `tbl_chuyenmuc`(`ten`) VALUES ('$tenCM')");
              
              $type = htmlspecialchars($_POST['cmc']);
              mysqli_query($conn, "DELETE FROM `dt_forumcmc` WHERE id='$type'");
            
                   echo '<script>alert("Xóa Thành Công"); </script>';
               }
            
      
  
?>


<?php
if(isset($_POST['xoa2'])){//kieerm tra nguoi dung co nhan nut hay khong
       
    
              //mysqli_query($conn, "INSERT INTO `tbl_chuyenmuc`(`ten`) VALUES ('$tenCM')");
              
              $type = htmlspecialchars($_POST['cmp']);
              mysqli_query($conn, "DELETE FROM `dt_forumcmp` WHERE id='$type'");
            
                   echo '<script>alert("Xóa Thành Công"); </script>';
               }
            
      
  
?>



<?php 
    $chon=' <div class="container">
         <div class="create">
        
        <form action="" method="post" >
       
        <div class="row">
            <div class="col-md-12">
                <div class="create__section">
                    <label class="create__label" for="category" style="color:#131CF1;">Thể loại
                    <label class="custom-select">
                        <select id="category" name="type">
                        <option value="0" >-- Chọn --</option>
                        <option value="1" >Ban Quản Trị</option>
                        <option value="2" >Thảo Luận Wap/Web</option>
                        <option value="3" >Mã Nguồn</option> 
                        <option value="4" >WapBuilder</option>
                        <option value="6" >Chém gió</option>
                        
                         </select>
                    </label>
                    </label>
       
                </div>
            </div>
           
   
    </form>
    </div>  
    ';
        

    ?> 



 <div class="signup__form">
                <div class="signup__section">
                    <h5>Thêm chuyên mục chính</h5>

                        <label>Nội dung:</label>
                        <br><br>
                        <form action="quanlicm.php" method="POST">
                        <input  type="text" name ="tenCM" style="width: 100%; padding: 12px 20px;margin: 8px 0;box-sizing: border-box;"><br><br>
                        <input type="submit" name="them" value="Thêm" class="signup__btn-create btn btn--type-01" style ="width:auto; background-color: #71BBCE; border-radius: 8px; margin-left:10px">
                        </form>
                    </div>

                </div>
<!---------------------------------------------------------------------------->
<hr>

<div class="signup__form">
                <div class="signup__section">
                    <h5>Thêm chuyên mục phụ</h5>
                    <form action="quanlicm.php" method="POST">
                    <label for="cars">Chuyên mục chính:</label>
                    <select name="cmc" id="">
                    <option value="#" >-- Chọn --</option>
                    
<?php
$cmc = mysqli_query($conn, "Select * from dt_forumcmc");
while($rw = mysqli_fetch_array($cmc)){
echo '<option value="'.$rw['id'].'">'.$rw['name'].'</option>';
}
?></select>
    
    <br>

                        <label>Tên chuyên mục phụ:</label>
                        <br><br>
                        
                        <input  type="text" name ="tenCM2" style="width: 100%; padding: 12px 20px;margin: 8px 0;box-sizing: border-box;"><br><br>
                        <input type="submit" name="them2" value="Thêm" class="signup__btn-create btn btn--type-01" style ="width:80px; background-color: #71BBCE; border-radius: 8px; margin-left:10px">
                        </form>
                    </div>

                </div>            




<!----------------------------------------------------------------------------------------------------------->


                <div class="signup__form">
                <div class="signup__section">
                    <h5> Xóa chuyên mục chính</h5> 
                    <form action="quanlicm.php" method="POST">
                    <label for="cars">Chọn mục cần xóa:</label>
                    <select name="cmc" id="">
                    <option value="#" >-- Chọn --</option>
                    
<?php
$cmc = mysqli_query($conn, "Select * from dt_forumcmc");
while($rw = mysqli_fetch_array($cmc)){
echo '<option value="'.$rw['id'].'">'.$rw['name'].'</option>';
}
?></select>
    
    <br>

                        
                        <br>
                        
                        
                        <input type="submit" name="xoa" value="Xóa" class="signup__btn-create btn btn--type-01" style ="width:80px; background-color: #71BBCE; border-radius: 8px; margin-left:10px">
                        </form>
                    </div>

                </div>          
                
                
                

<!-------------------------------------------------------------------------------->
     

<div class="signup__form">
                <div class="signup__section">
                    <h5> Xóa chuyên mục phụ</h5> 
                    <form action="quanlicm.php" method="POST">
                    <label for="cars">Chọn mục cần xóa:</label>
                    <select name="cmp" id="">
                    <option value="#" >-- Chọn --</option>
<?php
$cmp = mysqli_query($conn, "Select * from dt_forumcmp");
while($rwp = mysqli_fetch_array($cmp)){
echo '<option value="'.$rwp['id'].'">'.$rwp['name'].'</option>';
}
?></select>
    
    <br>

                        
                        <br>
                        
                        
                        <input type="submit" name="xoa2" value="Xóa" class="signup__btn-create btn btn--type-01" style ="width:80px; background-color: #71BBCE; border-radius: 8px; margin-left:10px">
                        </form>
                    </div>

                </div>          
                
                
                

<!-- <form  action="themchuyenmuc.php" style="color:#131CF1 ;" method="POST">
thêm chuyên mục <input type="text" name="tenCM"><br>
<button type="submit" name="them">Them</button>
</form>  -->
                    <!-- <option value="Ý Kiến">Ý Kiến</option>
                         <option value="WapeGo">WapeGo</option>
                         <option value="Xtgem">Xtgem</option>
                         <option value="Wap4">Wap4</option>
                         <option value="Mp3">Mp3</option>
                         <option value="Mp4">Mp4</option>
                         <option value="Khác">Khác</option> -->
                         
                         
<?php
include'../foot.php'; 