<?php session_start();?>

<html>
<head>
    <title>Users Information</title>
    <link href="user.css" rel="stylesheet">
    <link href="../footer.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>
<body>
    
<!-------------------------- navigation bar start------------------------------------->
    <?php include "admin_nav_bar.html"; ?>
<!--------------------------- navigation bar end ------------------------------------->
<!---------------- inventory table ------------->    
 <div>
     <div class="heading"><p>Employees</p></div>
    <form action="" method="" id="del-form">
        <div class="table-responsive">
        <table class="table table-success table-striped">
              <tr>
                  <th>Si No.</th>
                  <th>User name</th>
                  <th>User Id</th>
                  <th>User type</th>
                  <th>Phone no</th>
                  <th>Email</th>
                  <th>User Image</th>
                  <th></th>
                  <th></th>
            </tr>
<!----------------------------- fetching users information -------------------->
<?php
    $conn=mysqli_connect("localhost","root","","store_management");
    $sql="select * from user_table";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    
    if($num>0){
        $serial_no = 1;
        while($row=mysqli_fetch_array($result))
        {
          ?>
      
          <tr>
              <td><?php echo $serial_no++; ?></td>
              <td ><?php echo $row['USER_NAME']; ?></td>
              <td><?php $userid = $row['USER_ID'];
                    echo $userid;
                  ?></td>
              <td><?php echo $row['USER_TYPE']; ?></td>
              <td><?php echo $row['PHONE_NO']; ?></td>
              <td><?php echo $row['EMAIL']; ?></td>
              <td><img class="user-img" src="<?php echo '../image/'.$row['USER_IMG']; ?>" alt="user-image" height="200px" width="200px"></td>
              
              <td><button type="button" class="btn-group-sm btn-info"><a class="a1" href="edit_user.php?id=<?php echo $userid;?>">Edit</a></button></td>
              <!--  code for directing to  deletion page -->
              <td><button type="button" class="btn-group-sm btn-dark" id="delete_user.php?id=<?php echo $userid;?>" onclick="deleteUser(this.id)"><a class="a2">Delete</a></button></td>
              <!--  code for directing to  deletion page -->
          </tr>
         
          
        <?php
    } 
    echo "</table> "; 
}

 else{
         echo "<script>alert('NO Users Left'); window.location.href='main.php';</script>"; 
     }
    ?>
        </div>
    </form>
 </div>
    
<!----------------------- footer start ------------------------------------------------->
    <?php include"../footer.html" ?>
<!----------------------- footer end --------------------------------------------------->
    
     <script>
        function deleteUser(hrefid) {
            var ask = window.confirm("Are you sure you want to delete this user?");
            if (ask) {
                window.location.href = hrefid;
                
            }
        }
     </script>

        
    </body>
</html>
      

          