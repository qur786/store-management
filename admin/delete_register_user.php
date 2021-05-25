<?php 
    session_start();
    $conn=mysqli_connect("localhost","root","","store_management");
    $userid = $_GET['id'];
    if($_SESSION['usertype']=='Admin'){
        //deleting userphoto
            $result = mysqli_query($conn,"select USER_IMG from register_table where USER_ID='$userid'");
            if(mysqli_num_rows($result)>0){
                $row= mysqli_fetch_assoc($result);
                $userphoto = $row['USER_IMG'];
                if(file_exists("../image/".$userphoto)){
                    unlink("../image/".$userphoto);
                }
            }
        
        //deleting user details
        $sql = "delete from register_table where USER_ID='$userid' && USER_TYPE<>'Admin'" ; 
        $result=mysqli_query($conn,$sql);
        $num_rows = mysqli_affected_rows($conn);
        if($num_rows>0){
            
            
            header("refresh:1; url=registration.php" );
            echo "<script>alert('Rejected :  employee with empid $userid ');</script>";
            
            
        }
        else{
            header("refresh:1; url=registration.php" );
            echo "<script>alert('Approved employee with empid $userid')</script>";
            
        }
    }
?>