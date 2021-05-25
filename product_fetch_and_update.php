<!-------------------code for product information fetching ------------------------>    
<?php session_start();

    
//-----------------------------code for product information update---------------------------
 if(isset($_GET['update'])){
            $conn=mysqli_connect('localhost','root','','store_management');
            $productid = $_GET['id'];
            $productname =$_GET['productname'];
            $productbrand =$_GET['productbrand'];
            $productquantity =$_GET['productquantity'];
            $productprice =$_GET['productprice'];
            
    $sql = "UPDATE product_table SET PRODUCT_NAME='$productname',BRAND='$productbrand',ITEM_QUANTITY='$productquantity',PRODUCT_PRICE='$productprice' where PRODUCT_ID='$productid' ";

    if(mysqli_query($conn,$sql)){
            echo "<script> alert('information updated') </script>";
        }
    else{   
            $error_str = mysqli_error($conn);
            echo "<script>alert('something is wrong, Error = $error_str')</script>";
        }
}
//---------------------code for user information update ends-------------------------------------

//-------------------- code for product information fetching  --------------------------
 if($_SESSION['usertype']=='Admin' || $_SESSION['usertype']=='Shopkeeper'){
        $productid = $_GET['id'];
        $conn=mysqli_connect('localhost','root','','store_management');
        $sql = "select * from product_table where PRODUCT_ID ='$productid'";
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0){
            $row = mysqli_fetch_assoc($result);
            $productname =$row['PRODUCT_NAME'];
            $productbrand =$row['BRAND'];
            $productquantity =$row['ITEM_QUANTITY'];
            $productprice =$row['PRODUCT_PRICE'];
            
    }
    else{
            header("location:inventory.php");
    }
}

//--------------------------- product information fetching ends----------------------
    
  /*  //function to check for the selected item in select box
    function selectCheck($value1,$value2)
   {
     if ($value1 == $value2) 
     {
      echo 'selected="selected"';
     } else 
     {
       echo '';
     }
        return;
    }
   */
        ?>
