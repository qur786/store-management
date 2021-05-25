<?php 
    session_start();
    $conn=mysqli_connect("localhost","root","","store_management");
    $productid = $_GET['id'];
        if($_SESSION['usertype']=='Admin'|| $_SESSION['usertype']=='Shopkeeper'){
        //deleting productphoto
        $result = mysqli_query($conn,"select PRODUCT_IMG from product_table where PRODUCT_ID='$productid'");
        if(!mysqli_num_rows($result)&&mysqli_num_rows($result)>0){
             $row= mysqli_fetch_assoc($result);
             $productphoto = $row['PRODUCT_IMG'];
            if(file_exists("../image/".$productphoto)){
             unlink("../image/".$productphoto);
            }
        }  
        //deleting product details from database
        
        $sql = "delete from product_table where PRODUCT_ID='$productid'" ; 
        $result=mysqli_query($conn,$sql);
        $num_rows = mysqli_affected_rows($conn);
        if($num_rows>0){
               //deleting productphoto
            $result = mysqli_query($conn,"select PRODUCT_IMG from product_table where PRODUCTD_ID='$productid'");
            if(mysqli_num_rows($result)>0){
                $row= mysqli_fetch_assoc($result);
                $producutphoto = $row['PRODUCT_IMG'];
                unlink("../image/".$productphoto);
            }
            
            header("refresh:1; url=inventory.php" );
            echo "<script>alert('deletion of Product with Product id $productid is successful');</script>";
            
            
        }
        else{
            header("refresh:1; url=inventory.php" );
            echo "<script>alert('deletion of Product with Product id $productid is Unsuccessful')</script>";
            
        }
    }
?>