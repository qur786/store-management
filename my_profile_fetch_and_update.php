<!-------------------code for user information fetching ------------------------>    
<?php session_start();
    if($_SESSION['userid']){
        $conn=mysqli_connect('localhost','root','','store_management');
        $sql = "select * from user_table where USER_ID ='$_SESSION[userid]'";
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
            $userphoto =$row['USER_IMG'];
    }
}
else
    {
        header("location:main.php");
    }
    
//-------------------- code for user information fetching end --------------------------
    
//-----------------------------code for user information update---------------------------
 if(isset($_POST['submit'])){
    $username = $_POST['username'];
    $phoneno = $_POST['phoneno'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender =  $_POST['gender'];
    $userid = $_SESSION['userid'];
    $gender=$_POST["gender"];
     
     if( !empty($_FILES['image']['tmp_name']) && is_uploaded_file($_FILES['image']['tmp_name'])){
     //deleting user image 
    if(file_exists("../image/".$userphoto)){
        unlink("../image/".$userphoto);
    }
     //deleting user image 
    //image inserting
        $path = "../image/";
        $image_name = uniqid().$_FILES["image"]["name"];
        $image_path = $path.basename($image_name);
        move_uploaded_file($_FILES["image"]["tmp_name"],$image_path);  
        $userphoto=basename($image_name);
    //image inserting 
     }
     
    $sql = "UPDATE user_table SET USER_NAME='$username',PHONE_NO='$phoneno',EMAIL='$email',PASSWORD='$password',GENDER='$gender',USER_IMG='$userphoto' where USER_ID='$userid' ";
     $result2 = mysqli_query($conn,$sql);
    if(mysqli_affected_rows($conn)>0){
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
