<!-- Edit  product page -->

<!-------------------- product fetch and modification code --------------------->
        <?php   
                include "../product_fetch_and_update.php";
        ?> 
 <!-------------------- product fetch and modification code ends--------------------->

<html>
<head>
<title>Edit Products</title>
<link href="edit_product.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</head>
<body>
    
<!-- navigation bar start-->
<?php include "admin_nav_bar.html"; ?>
<!-- navigation bar end -->
    
<!-- New product details form -->
    <div class="form_div">
        <form id="form1" method="" action="">
             <h4 font-family="sans-serif">Edit Product Details</h4><br>
                <label>Product name</label><br>
                <input type="textbox" value="<?php echo $productname; ?>" class="form_control" name="productname" id="productname" readonly>
                <br><br>
                <label>Brand</label><br>
                <input type="textbox" value="<?php echo $productbrand; ?>" class="form_control" name="productbrand" id="productbrand" readonly>
                <br><br>
                <label>Quantity</label><br>
                <input type="textbox" value="<?php echo $productquantity; ?>" class="form_control" name="productquantity" id="productquantity" readonly>
                <br><br>
                <label>Price (&#8377;)</label><br>
                <input type="textbox" value="<?php echo $productprice; ?>" class="form_control" name="productprice" id="productprice" readonly>
                <br><br>
            
            
               <input type="hidden" name="id" value="<?php echo $productid;?>" id="productid">
        
                <input type="button" id="edit" value="Edit">
                <input type="hidden" name="update" id="submit" value="Update">
                <br><br>
        </form>
</div>

<!-- javascript to make the input field readonly and when user clicks on edit button make 
it writeble -->
    
<script>
    
    // script to make elements readonly true
    var ids = ["productname","productbrand","productquantity","productprice"];
    for(var i=0;i<ids.length;i++){
         document.getElementById(ids[i]).readOnly = true;
                 
        }
    
    // function to make elements readonly false
    document.getElementById("edit").onclick = function makeinputwritable(){
            for(var i=0;i<ids.length;i++){
            document.getElementById(ids[i]).readOnly = false;
                 
        }
      
         document.getElementById("submit").type="submit";
        document.getElementById("edit").type="hidden";

    } 

</script>
</body>
</html>
	