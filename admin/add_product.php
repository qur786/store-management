<!-- Add new product page -->
<html>
    
<html>
    <!-- php to insert a product details -->
     <?php
        session_start();
    if(isset($_POST["submit"]))
    {
        $conn=mysqli_connect("localhost","root","","store_management");
        
        $productname=$_POST["productname"];
        $productid=uniqid("pro");
        $productbrand=$_POST["productbrand"];
        $productquantity=$_POST["productquantity"];
    //image inserting
        $path = "../image/";
        $image_name = uniqid().$_FILES["image"]["name"];
        $image_path = $path.basename($image_name);
        if(move_uploaded_file($_FILES["image"]["tmp_name"],$image_path));  
        $productphoto=basename($image_name);
    //image inserting 
        $productdescription=$_POST["productdescription"];
        $productprice=$_POST["productprice"];
        
        $sql="insert into product_table values('$productname','$productid','$productbrand','$productprice','$productquantity','$productphoto','$productdescription')";
        $result=mysqli_query($conn,$sql);
        $row_aff_num=mysqli_affected_rows($conn);
        
        if($row_aff_num>0)
        {
           
            echo "<script> alert('Data are inserted');</script>";
            echo "<script> alert('product id for ".$productname." is ".$productid."');</script>";
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
    
<head>
<title>add new item</title>
<link href="add_product.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>
<body>
    
<!-- navigation bar start-->
<?php include "admin_nav_bar.html"; ?>
<!-- navigation bar end -->
    
<!-- New product details form -->
<div class="form_div">
    <form id="form1" method="POST" enctype="multipart/form-data">
        <h4 font-family="sans-serif">Add New Product</h4>
    <br>
        <label>Enter  Product name</label><br>
        <input type="text" class="form_control" name="productname" id="productname" required>
    <br><br>
        <label>Brand</label><br>
        <input type="text" class="form_control" name="productbrand" id="productbrand" required>
    <br><br>
    <label>Quantity</label><br>
        <input type="number" class="form_control" name="productquantity" id="productquantity" required>
    <br><br>
        <label>Price (&#8377;)</label><br>
        <input type="number" class="form_control" name="productprice" id="productprice" required>
    <br><br>
        <label>Descriptions</label><br>
        <textarea class="desc" name="productdescription" id="productprice" required></textarea>
    <br><br>
        <label>Upload Product Image</label><br>
        <input type="file" name="image" id="productphoto" required>
    <br><br>
        <input type="submit" name="submit" id="submit">
    <br><br>
    </form>
</div>
</body>
</html>
	