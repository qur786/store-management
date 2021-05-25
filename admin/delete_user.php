<?php 
    session_start();
    $conn=mysqli_connect("localhost","root","","store_management");
    $userid = $_GET['id'];
    if($_SESSION['usertype']=='Admin'){
         //deleting userphoto
         $result = mysqli_query($conn,"select * from user_table where USER_ID='$userid'");
         if(mysqli_num_rows($result)>0){
          $row= mysqli_fetch_assoc($result);
          $userphoto = $row['USER_IMG'];
          if(file_exists("../image/".$userphoto)){     
            unlink("../image/".$userphoto);
            }
         }
        // deleting the user details
        $sql = "delete from user_table where USER_ID='$userid' && USER_TYPE<>'Admin'" ; 
        $result=mysqli_query($conn,$sql);
        $num_rows = mysqli_affected_rows($conn);
        if($num_rows>0){
            
                header("refresh:1; url=users.php" );
                echo "<script>alert('deletion of employee with empid $userid is successful');</script>";
            
            
        }
        else{
            header("refresh:1; url=users.php" );
            echo "<script>alert('deletion of employee with empid $userid is unsuccessful')</script>";
            
        }
}

?>