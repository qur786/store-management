  
<?php session_start();

//-------------------code for pending order information fetching ------------------------>  
    if($_SESSION['usertype']=='Admin'){
        $orderid = $_GET['id'];
        $conn=mysqli_connect('localhost','root','','store_management');
        $sql1 = "select * from pending_order_table where ORDER_ID ='$orderid'";
        $result1 = mysqli_query($conn,$sql1);
        if(mysqli_num_rows($result1)>0){
            $row1 = mysqli_fetch_assoc($result1);
            $userid =$row1['USER_ID'];
            $productid =$row1['PRODUCT_ID'];
            $orderquantity =$row1['ORDER_QUANTITY'];
            $orderdate = date("Y-m-d");
    }

    
//-------------------- code for pending order information fetching end --------------------------
  $sqlquan = "select ITEM_QUANTITY from product_table where PRODUCT_ID = '$productid'";      
  $resultquan = mysqli_query($conn,$sqlquan);
        
  if(mysqli_num_rows($resultquan)>0){
      $row = mysqli_fetch_assoc($resultquan);
      $product_aval_quantity = $row['ITEM_QUANTITY'];
      
      if($product_aval_quantity>$orderquantity){
      
                //-------------------- code for order insertion into main table  and deletion from pending table-------------------------
                    $sql2 = "INSERT INTO order_table VALUES('$orderid','$userid','$productid','$orderquantity','$orderdate')";
                    $result2 = mysqli_query($conn,$sql2);
                
                            if(mysqli_affected_rows($conn)>0){
                                $sql3 = "delete from pending_order_table where ORDER_ID='$orderid'" ; 
                                $result3 = mysqli_query($conn,$sql3);
                                
                                if(mysqli_affected_rows($conn)>0){
                                        //header("Location: log.php");
                                     $new_quantity = $product_aval_quantity - $orderquantity;
                                     $result4 = mysqli_query($conn,"update product_table set ITEM_QUANTITY='$new_quantity' where PRODUCT_ID ='$productid'");
                                    
                                      header( "refresh:1; url=pending_orders.php" ); 
                                      echo "<script>alert( 'The order with order ID $orderid is APPROVED' );</script>";
                                    }
                                else{
                                        header("refresh:1; url=pending_orders.php");
                                        echo "<script>alert( 'Try Again' );</script>";
                                    }
                                }
    //-------------------- code for order insertion into main table and deletion from pending ends -------------------------
                        
          
                }
            else{
                  header("refresh:1; url=orders.php");
                  echo "<script>alert( 'Available Quantity is less than the Ordered quantity' );</script>";
                }
  }

    }