<?php session_start(); ?>

<html>
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    
    <link href="product.css" rel="stylesheet">
    <link href="footer.css" rel="stylesheet">
    <script type="text/javascript" src="product_search.js"></script>
    
</head>
<body>
<!------------------------ navigation bar------------------------------------>
    <?php include "staff_nav_bar.html"; ?>
<!------------------------ navigation bar------------------------------------>



 
<!------------products details divs------------------------------------->
<center>
<div class="products" id="products">
    
<!----------------------------- fetching Product information -------------------->
<?php
    $conn=mysqli_connect("localhost","root","","store_management");
    $sql="select * from product_table";
    $result=mysqli_query($conn,$sql);
    $num=mysqli_num_rows($result);
    
    if($num>0){
      
        while($row=mysqli_fetch_array($result))
        {
           
          ?>

        <div class="card">
          <img src="<?php echo "../image/".$row['PRODUCT_IMG'];?>"  
               class="card-img-top product-img" alt="product">
          <div class="card-body">
            <h5 class="product-name"><?php echo $row['PRODUCT_NAME']; ?></h5>
            <h6 class="product_id">Product Id : <?php echo $row['PRODUCT_ID']; ?></h6>
              <h5 class="product-quantity">quantity : <?php echo $row['ITEM_QUANTITY'];?></h5>
            <h6>Brand : <?php echo  $row['BRAND']?></h6>
            <p class="product-description"><?php echo  $row['PRODUCT_DESC'];?></p>
          </div>
        </div>
        <?php
            }
    } 
    else{
        header("refresh:1,url:main.php");
        echo "<script>alert('No Products Available');</script>";
    }
    ?>


    <!-------------- PRODUCT QUANTITY ------------------->
    <script>
          
         //code for changing color of items when the quanitity is different
         var productQuantity = document.getElementsByClassName("product-quantity");
         for(var i=0;i<productQuantity.length;i++){
             var quantityString = productQuantity[i].innerHTML
             var actualQuantity = quantityString.match(/\d+/);
             if(actualQuantity<=10){
                 productQuantity[i].style.color = "red";
             }
         }
    </script>
    
 </div>
</center>
<!-------------------------- footer ------------------------------------->
    <?php include "staff_footer.html"; ?>
<!-------------------------- footer ------------------------------------->

    
</body>
</html>