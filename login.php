<!-- php code for login -->
<?php
if(isset($_POST['submit']))
    {
        $userid=htmlspecialchars(trim($_POST['userid']));
        $password=htmlspecialchars(trim($_POST['pswd']));
        $usertype = trim($_POST['usertype']);

        if($userid&&$password&&$usertype)
            { 
                $conn=mysqli_connect('localhost','root','','store_management');
                if(!mysqli_connect_error()){
                    $sql="select * from user_table where USER_ID='$userid' AND PASSWORD='$password' AND USER_TYPE='$usertype' ";
                    $result = mysqli_query($conn,$sql); 
                    if( mysqli_num_rows($result) > 0)
                    {    session_start();
                        $_SESSION["userid"] = $userid;
                        $_SESSION["usertype"] = $usertype;
                           if($usertype=='Admin')
                            {  
                           // header('location: ./admin/main.html');
                            header( "refresh:2; url=./admin/main.php" );

                            }
                         else if($usertype == 'Shopkeeper'){
                             header('refresh:2; url=./shopkeeper/main.php');
                            }
                        else if($usertype == 'Staff'){
                            header('refresh:2; url=./staff/main.php');
                            }

                    
                    }

                else
                    {
                    echo "<script>alert( 'userid or password is wrong or you are not registered as $usertype' );</script>";
                    }
        }
    else{
        echo "<script>alert('can't connect to Database')</script>";
    }
 }
else 
     {
        echo"<script>alert( 'data is missing' );</script>";
    }
}


?>
