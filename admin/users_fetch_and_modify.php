<!-------------------code for user information fetching ------------------------>    
<?php session_start();
    if($_SESSION['usertype']=='Admin'){
        $userid = $_GET['id'];
        $conn=mysqli_connect('localhost','root','','store_management');
        $sql = "select * from user_table where USER_ID ='$userid'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_assoc($result);
            $username =$row['USER_NAME'];
            $userid =$row['USER_ID'];
            $phoneno =$row['PHONE_NO'];
            $email =$row['EMAIL'];
            $gender =$row['GENDER'];
            $photo =$row['USER_IMG'];
            $password =$row['PASSWORD'];
            $usertype =$row['USER_TYPE'];
    }
}
    
//-------------------- code for user information fetching end --------------------------
    
//-----------------------------code for user information update---------------------------
 if(isset($_GET['update'])){
    $username = trim($_GET['username']);
    $phoneno = trim($_GET['phoneno']);
    $email = trim($_GET['email']);
    $password = trim($_GET['password']);
    $gender =  trim($_GET['gender']);
    $userid = trim($_GET['id']);

    $sql = "UPDATE user_table SET USER_NAME='$username',PHONE_NO='$phoneno',EMAIL='$email',PASSWORD='$password',GENDER='$gender' where USER_ID='$userid' ";

    if(mysqli_query($conn,$sql)){
        echo "<script> alert('information updated') </script>";
        }
    else{
        echo "<script>alert('something is wrong')</script>";
        echo mysqli_error($conn);
        }
}
//----------------code for user information update---------------------- 
    
    //function to check for the selected item in select box
    function selectCheck($value1,$value2)
   {
     if ($value1 == $value2) 
     {
      echo 'selected="selected"';
     } else 
     {
       echo '';
     }
        return;
    }
   
        ?>
