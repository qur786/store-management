<?php session_start(); 


    if(isset($_POST['submit'])){
        
            if($_SESSION['usertype'] == 'Shopkeeper'){
                $total_orders=count($_POST['productid']);
                
                if($total_orders>0){
                    $conn = mysqli_connect("localhost","root","","store_management");
                    $userid = $_POST['userid'];
                    
                    for($i=0;$i<$total_orders;$i++){
                        $orderid = uniqid("ord");
                        $productid = $_POST['productid'][$i];
                        $orderquantity = $_POST['quantity'][$i];
            
                        $sqlquan = "select ITEM_QUANTITY from product_table where PRODUCT_ID = '$productid'";   
                        $resultquan = mysqli_query($conn,$sqlquan);
                        if(mysqli_num_rows($resultquan)>0){
                              $row = mysqli_fetch_assoc($resultquan);
                              $product_aval_quantity = $row['ITEM_QUANTITY'];

                              if($product_aval_quantity>$orderquantity){
                                   $sql = "insert into pending_order_table values('$orderid','$userid','$productid','$orderquantity')";
                                   $result = mysqli_query($conn,$sql);
                                    if(mysqli_affected_rows($conn)>0){
                                    echo "<script>alert('The Orders are Placed , Wait for Admin Approval')</script>";
                                        }
                                   else{
                                         echo "<script>alert('Try Again! Order failed')</script>";
                                        }
                                  
                                }
                             else{
                                     echo "<script>alert( 'for product with product id $productid ,Available Quantity is less than the Ordered quantity' );</script>";
                                    }
                            }
                    }
                }
            }
    }
?>