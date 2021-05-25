
        // onkeyup use
        const searchFun = () => {
            // take value and convert uppercase from input section
            let filter = document.getElementById('myInput').value.toUpperCase();
            
            let myOrders = document.getElementsByClassName('order-id');
           
            for(var i=0;i<myOrders.length;i++)
            {  
               var orderId = myOrders[i];
                if (orderId) {
                    let textvalue = orderId.textContent || orderId.innerHTML;
                   // item in list them print 
                    if (textvalue.toUpperCase().indexOf(filter) > -1) {
                        orderId.parentElement.style.display = "";
                    }
                    // item not in list then show none
                    else {
                        orderId.parentElement.style.display = "none";
                        

                    }
                }
               
            
            }
        }
     