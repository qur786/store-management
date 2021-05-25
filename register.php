
<?php
    if(isset($_POST['submit']))
    {   
        $conn=mysqli_connect('localhost','root','','store_management');
     
        $userid=uniqid("emp");
        $username = htmlspecialchars(trim($_POST['username']));
        $phoneno = $_POST['phone'];
        $email = htmlspecialchars(trim($_POST['email']));
        $password=htmlspecialchars(trim($_POST['pswd']));
        $gender = htmlspecialchars(trim($_POST['gender']));
        
     //image inserting
        $path = "image/";
        $image_name = uniqid().$_FILES["image"]["name"];
        $image_path = $path.basename($image_name);
        move_uploaded_file($_FILES["image"]["tmp_name"],$image_path); 
        
        $userphoto=basename($image_name);
    //image inserting 
        $usertype ="Staff";
        
        $sql = "INSERT INTO register_table VALUES('$userid','$username','$phoneno','$email','$password','$gender','$userphoto','$usertype')";
        
        $result = mysqli_query($conn,$sql);
        if($result==true){
            //header("Location: log.php");
             header( "refresh:2; url=index.php" ); 
            echo "<script>alert( 'NOTE DOWN Your EMPLOYEE ID : $userid ' )</script>";
            
        }
        else{
            header("Location: Registration_form.html");
            echo "try again";
        }
    }
?>