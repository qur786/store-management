<?php session_start(); ?>

<html>
<head>
<title>Inventory page</title>
<link href="../footer.css" rel="stylesheet">
<link href="inventory.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
<script src="product_search.js" type="text/javascript"></script>
</head>
<body>
    
<!-- navigation bar start-->
<?php include "admin_nav_bar.html"; ?>
<!-- navigation bar end -->
    
<!-- Data table -->
    
 <div>
     <div class="heading"><p>Inventory</p></div>
    <form action="" method="" id="del-form">
    <div class="table-responsive">
        <table class="table  table-striped">
            <tr>
                <th>Si No.</th>
                <th>Product Name</th>
                <th>Product Id</th>
                <th>Quantity</th>
                <th>Brand</th>
                <th>Price (&#8377;)</th>
                <th>Product Image</th>
                <th></th>
                <th></th>
            </tr>
            
    <!----------------------------- fetching Products information -------------------->
<?php
    $conn=mysqli_connect("localhost","root","","store_management");
    $sql="select * from product_table";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    
    if($num>0){
        $serial_no = 1;
        while($row=mysqli_fetch_assoc($result))
        {
          ?>
      
            
            <tr>
                <td><?php echo $serial_no++;?></td>
                <td class="product-name"><?php echo $row['PRODUCT_NAME'];?></td>
                <td><?php $productid = $row['PRODUCT_ID'];
                          echo $productid;
                    ?></td>
                <td class="product-quantity"><?php echo $row['ITEM_QUANTITY'];?></td>
                <td><?php echo $row['BRAND']?></td>
                <td><?php echo $row['PRODUCT_PRICE']?></td>
                <td><img class="product-image" width="200px" height="200px" src=<?php echo "../image/".$row['PRODUCT_IMG']?> alt="product-image"></td>
                
                <td><button type="button" class="btn-group-sm btn-info"><a class="a1" href="edit_product.php?id=<?php echo $productid; ?>">Edit</a></button></td>
                
                <td><button type="button" class="btn-group-sm btn-dark" id="delete_product.php?id=<?php echo $productid;?>" onclick="deleteProduct(this.id)"><a class="a2">Delete</a></button></td>
            </tr>
            
    <?php
    } 
    echo "</table> "; 
}

 else{
        echo "<script>alert('NO Products Left'); window.location.href='main.php';</script>";  
     }
    ?>
        </div>
    </form>
 </div>

    
<!------------------------------- footer start ---------------------------------->
<?php include"../footer.html" ?>
<!------------------------------- footer end ------------------------------------->
    
     <script>
         //code for changing color of items when the quanitity is different
         var productQuantity = document.getElementsByClassName("product-quantity");
         for(var i=0;i<productQuantity.length;i++){
             if(productQuantity[i].innerHTML<=10){
                 productQuantity[i].style.color = "red";
             }
         }
         
         //confirmation message before deletion
        function deleteProduct(hrefid) {
            var ask = window.confirm("Are you sure you want to delete this Product?");
            if (ask) {
                window.location.href = hrefid;
                
            }
        }
     </script>
     
     
     </body>
</html>