<?php 
    session_start();
    $conn=mysqli_connect("localhost","root","","store_management");
    $orderid = $_GET['id'];
    if($_SESSION['usertype']=='Admin'){
        $sql = "delete from pending_order_table where ORDER_ID='$orderid'" ; 
        $result=mysqli_query($conn,$sql);
        $num_rows = mysqli_affected_rows($conn);
        if($num_rows>0){
            header("refresh:1; url=pending_orders.php" );
            echo "<script>alert('Rejected :  order with orderid $orderid ');</script>";
            
            
        }
        else{
            header("refresh:1; url=pending_orders.php" );
            echo "<script>alert('Approved order with orderid $orderid')</script>";
            
        }
    }
?>