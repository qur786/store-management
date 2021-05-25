<html>
<head>
<title>Orders page</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<link href="orders.css" rel="stylesheet">
<link href="../footer.css" rel="stylesheet">
</head>
<body>
    
<!---------------------------- navigation bar start ---------------------------------->
<?php include "admin_nav_bar.html"; ?>
<!---------------------------- navigation bar end  ----------------------------------->
    
<div>
    <div class="heading"><p>Pending orders</p></div>
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
                <th>Price (Rs.)</th>
                <th></th>
                <th></th>
           <tr>
        
        <!----------------------------- fetching Orders information -------------------->
<?php
    $conn=mysqli_connect("localhost","root","","store_management");
    $sql="SELECT *
            FROM ((pending_order_table
            INNER JOIN user_table ON pending_order_table.USER_ID = user_table.USER_ID)
            INNER JOIN product_table ON pending_order_table.PRODUCT_ID = product_table.PRODUCT_ID);";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_affected_rows($conn);
    if($num>0){
        $serial_no = 1;
        while($row=mysqli_fetch_array($result))
        {
            $orderid = $row["ORDER_ID"];
          ?>
      
            
            <tr>
                <td><?php echo $serial_no++;?></td>
                <td><?php echo $orderid;?></td>
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
                
                
                <td><button type="button" class="btn-group-sm btn-info"><a class="a1" href="accept_pending_order.php?id=<?php echo $orderid;?>">Approve</a></button></td>
                
                <td><button type="button" class="btn-group-sm btn-dark" id="delete_pending_order.php?id=<?php echo $orderid;?>" onclick="deleteOrder(this.id)"><a class="a2">Deny</a></button></td>
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
        
     <script>
        function deleteOrder(hrefid) {
            var ask = window.confirm("Are you sure you want to delete this Order?");
            if (ask) {
                window.location.href = hrefid;
                
            }
        }
     </script>
    
</body>
</html>