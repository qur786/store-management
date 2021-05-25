<!---------------------------- inclusion of order placement file --------------->
<?php include "place_order_work.php"; ?>
<!---------------------------- inclusion of order placement file --------------->

<html>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
<link href="place_order.css" rel="stylesheet">

<script>


  var x=1
  
  function addRow()
  {

    

        var table = document.getElementsByTagName('table')[0];
        
        var newRow = table.insertRow(table.rows.length/2+1);
        

        var cel1 = newRow.insertCell(0);
        var cel2 = newRow.insertCell(1);
        var cel3 = newRow.insertCell(2);
        
   
        cel1.innerHTML ="";
        cel2.innerHTML = "<input type='text' name='productid[]' id='text  "+ x++ +" 'placeholder='Product ID' >";
        cel3.innerHTML ="<input type='text' name='quantity[]' id='text  "+ x++ +" 'placeholder='Quantity' >";

  } 
</script>
</head>
<body>
  
<!------------------------------- navigation bar ----------------------------------->
            <?php include "shopkeeper_nav_bar.html"; ?>
<!-------------------------------- navigation bar ----------------------------------->




<body>
<form action="" method="post">
  <div  style="overflow-x:auto;">
        <table> 
            
            <tr>
                <th>User ID</th>
                <th>Product ID</th>
                <th>Quantity</th>
            </tr>


            <tr>
                <td><input type="text" placeholder="User ID" name="userid" id="UID" required/></td>
                <td><input type="text" placeholder="Product ID" name="productid[]" id="PID" required/></td>
                <td><input type="text" placeholder="Quantity" name="quantity[]" id="Q" required/></td>
            </tr>
            <tr>
                 <td></td>
                <td><button name="submit" type="submit" class="Add_button"  >Place Order</button></td>
                 <td><button class="Add_button" type="button" onclick="addRow();">Add More</button></td>
            </tr>
        </table>
    </div>
</form>
 </body>
</html>