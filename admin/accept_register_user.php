  
<?php session_start();

//-------------------code for user information fetching ------------------------>  
    if($_SESSION['usertype']=='Admin'){
        $userid = $_GET['id'];
        $conn=mysqli_connect('localhost','root','','store_management');
        $sql = "select * from register_table where USER_ID ='$userid'";
        $result1 = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result1)>0){
            $row = mysqli_fetch_assoc($result1);
            $username =$row['USER_NAME'];
            $userid =$row['USER_ID'];
            $phoneno =$row['PHONE_NO'];
            $email =$row['EMAIL'];
            $gender =$row['GENDER'];
            $userphoto =$row['USER_IMG'];
            $password =$row['PASSWORD'];
            $usertype =$row['USER_TYPE'];
    }

    
//-------------------- code for user information fetching end --------------------------
        
$sql1 = "INSERT INTO user_table VALUES('$userid','$username','$phoneno','$email','$password','$gender','$userphoto','$usertype')";
        $result2 = mysqli_query($conn,$sql1);
        if(mysqli_num_rows($result1)>0){
            $sql2 = "delete from register_table where USER_ID='$userid' && USER_TYPE<>'Admin'" ; 
             $result3 = mysqli_query($conn,$sql2);
                if(mysqli_affected_rows($conn)>0){
                    //header("Location: log.php");
                    header( "refresh:1; url=registration.php" ); 
                    echo "<script>alert( 'The employee with employee ID $userid is APPROVED' );</script>";
                }
                else{
                    header("refresh:1; url=registration.php");
                    echo "<script>alert( 'Try Again' );</script>";
                }
        }
    }