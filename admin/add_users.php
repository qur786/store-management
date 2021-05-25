<!-- Add new user page -->
<html>
     <?php
        session_start();
    if(isset($_POST["submit"]))
    {
        $conn=mysqli_connect("localhost","root","","store_management");
        $userid=uniqid("emp");
        $username=$_POST["username"];
        $phoneno=$_POST["phoneno"];
        $email=$_POST["email"];
        $password=uniqid();
        $gender=$_POST["gender"];
    //image inserting
        $path = "../image/";
        $image_name = uniqid().$_FILES["image"]["name"];
        $image_path = $path.basename($image_name);
        if(move_uploaded_file($_FILES["image"]["tmp_name"],$image_path));  
        $userphoto=basename($image_name);
    //image inserting 
        $usertype=$_POST["usertype"];
        $sql="insert into user_table values('$userid','$username','$phoneno','$email','$password','$gender','$userphoto','$usertype')";
        if(mysqli_query($conn,$sql))
        {
           
            echo "<script> alert('Data are inserted');</script>";
            echo "<script> alert('user id for ".$username." is ".$userid." and password is ".$password."');</script>";
        }
        else
        {
           // echo "<script> alert('something is wrong')</script>";
            $error = mysqli_error($conn);
            echo $error;
           // echo "<script> alert( '<?php $error>');</script>";
        }
    }
    ?>
    
    <script>
         
         
         function validation()
           {
                 var mob = document.getElementById("phoneno").value;
               // mobile number validation
               if(mob.length<10){
                   alert("enter 10 digits for mobile number");
                   return false;
               }



            }
       </script>
    
<head>
<title>add new user</title>
<script src="add_users.js"></script>
<link href="add_users.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>
<body>
    
<!-- navigation bar start-->
<?php include "admin_nav_bar.html"; ?>
<!-- navigation bar end -->
    
<!-- add new user -->
<div class="form_div">
    <form id="form1" method="POST" onsubmit="return validation()" enctype="multipart/form-data">
        <h4 font-family="sans-serif">Add New User</h4>
        <br>
        <label>Upload profile picture</label>
        <br>
        <input type='file' name="image" id="userphoto" required>
        <br><br>
        <label>Enter User Name</label>
        <br>
        <input type="text" class="form_control" name="username" id="username" required>
        <br><br>
        <label>Email Id</label>
        <br>
        <input type="email" class="form_control" name="email" id="email" required>
        <br><br>
        <label>Contact Number</label>
        <br>
        <input type="number" class="form_control"  name="phoneno" id="phoneno" required>
        <br><br>
        <label>Gender</label>
        <br>
        <select class="form_control" name="gender" id="gender" required>
            <option disabled >---</option>
            <option>Male</option>
            <option>Female</option>
            <option>Other</option>
        </select>
        <br><br>
        <label>User Type</label><br>
        <select class="form_control" name="usertype" id="usertype" required>
            <option disabled >---</option>
            <option>Shopkeeper</option>
            <option>Staff</option>
        </select>
        <br><br>
        <input type="submit" name="submit" id="submit">
        <br><br>
    </form>
</div>
</body>
</html>
	