<!-- Add new user page -->

<!-------------------------users information fetch and update starts ---------->
<?php 
    
    include "users_fetch_and_modify.php";
?> 
<!------------------------- users information fetch and update end ------------->

<html>
<head>
<title>Modify user information</title>
<link href="edit_user.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>
<body>
    
<!-- navigation bar start-->
<?php include "admin_nav_bar.html"; ?>
<!-- navigation bar end -->
    
<!-- user details -->
<div class="form_div">
    <form id="form1" method="" action="">
         <h4 font-family="sans-serif">Edit User Details</h4><br>
         <label>Usertype</label>
        <br>
        <select class="form_control" name="usertype" id="usertype" value=<?php echo "$usertype";?> disabled=true>
        <option <?php selectCheck($usertype,"Admin"); ?> >Admin</option>
        <option <?php selectCheck($usertype,"Shopkeeper"); ?> >Shopkeeper</option>
        <option <?php selectCheck($usertype,"Staff"); ?> >Staff</option>
        </select>
        <br><br>
        <label for="username">Name</label><br>
        <input type="text" class="form_control  card-text" name="username" id="username" value=<?php echo "$username";?> readonly required>
        <br><br>
        <label>email</label><br>
        <input type="email" class="form_control" name="email" id="email" value=<?php echo "$email";?> readonly required> 
        <br><br>
        <label>password</label><br>
        <input type="text" class="form_control"  name="password" id="pswd" value=<?php echo "$password";?> readonly required>
        <br><br>
        <label>phone no</label><br>
        <input type="number" class="form_control"  name="phoneno" id="phoneno" value=<?php echo "$phoneno";?> readonly required>
        <br><br>
        <label>Gender</label>
        <br>
        <select class="form_control" name="gender" id="gender" value=<?php echo "$gender";?> disabled=true>
        <option <?php selectCheck($gender,"Male"); ?> >Male</option>
        <option <?php selectCheck($gender,"Female"); ?> >Female</option>
        <option <?php selectCheck($gender,"Other"); ?> >Other</option>
        </select>
        <br><br>

        <input type="button" id="edit" value="Edit">
        <input type="hidden" name="update" id="submit" value="Update">
        <input type="hidden" name="id" id="userid" value="<?php echo $userid ?>">
        <br><br>

</form>
</div>
<!-- javascript to make the input field readonly and when user clicks on edit button make 
it writeble -->
    
<script>
    
    document.getElementById("edit").onclick = function makeinputwritable(){
        var ids = ["username","pswd","phoneno","gender","email"];
       
             for(var i=0;i<ids.length;i++){
            document.getElementById(ids[i]).readOnly = false;
                 
        }
        document.getElementById("gender").disabled=false;
        document.getElementById("submit").type="submit";
        document.getElementById("edit").type="hidden";
        document.getElementById("usertype").disabled=false;
        
        

    } 

</script>
    

</body>
</html>
	