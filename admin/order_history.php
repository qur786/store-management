<html>
<head>
<title> Order History page</title>

<link href="../footer.css" rel="stylesheet">
<link href="orders.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous">
    </script>
<script src="../order_search.js">
</script>
</head>
<body>
    
<!---------------------------- navigation bar start ---------------------------------->
<?php include "Admin_nav_bar.html"; ?>
<!---------------------------- navigation bar end  ----------------------------------->
    
<div>
    <div class="heading"><p>Approved orders</p></div>
        <!--order Data table -->
    <div class="table-responsive">
        <table class="table table-dark table-striped">
            <tr>
                <th>Si No.</th>
                <th>Order Id</th>
                <th>User Name</th>
                <th>User ID</th>
                <th>Product name</th>
                <th>Product ID</th>
                <th>Quantity</th>
                <th>Price (&#8377;)</th>
                <th>Date Of Approval</th>
            </tr>  
          
        
        <!----------------------------- fetching Orders information -------------------->
<?php
   
    
    $conn=mysqli_connect("localhost","root","","store_management");
    $sql="SELECT *
            FROM ((order_table
            INNER JOIN user_table ON order_table.USER_ID = user_table.USER_ID)
            INNER JOIN product_table ON order_table.PRODUCT_ID = product_table.PRODUCT_ID);";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_affected_rows($conn);
    if($num>0){
        $serial_no = 1;
        while($row=mysqli_fetch_array($result))
        {
          ?>
      
            
            <tr>
                <td><?php echo $serial_no++;?></td>
                <td class="order-id"><?php echo $row['ORDER_ID'];?></td>
                <td><?php echo $row['USER_NAME'];?></td>
                <td><?php $userid = $row['USER_ID'];
                        echo $userid;
                    ?></td>
                <td><?php echo $row['PRODUCT_NAME'];?></td>
                <td><?php echo $row['PRODUCT_ID']?></td>
                <td><?php 
                        $orderquantity = $row['ORDER_QUANTITY'];
                        echo $orderquantity;    ?></td>
                <td><?php echo $row['PRODUCT_PRICE'] * $orderquantity; ?></td>
                <td><?php echo $row['ORDER_DATE'] ; ?></td>
            </tr>    
                
              
            
    <?php
    } 
    echo "</table> "; 
}

 else{
        echo "<script>alert('NO Orders Left'); window.location.href='main.php';</script>";  
     }

 
        
    ?>
                
</div>       
    
<!-- footer start -->
<?php include"../footer.html"; ?>
<!-- footer end -->
    
</body>
</html>