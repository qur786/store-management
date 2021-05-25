
        // onkeyup use
        const searchFun = () => {
            // take value and convert uppercase from input section
            let filter = document.getElementById('myInput').value.toUpperCase();
            
            let myProduct = document.getElementsByClassName('product-name');
           
            for(var i=0;i<myProduct.length;i++)
            {  
               var productName = myProduct[i];
                if (productName) {
                    let textvalue = productName.textContent || productName.innerHTML;
                   // item in list them print 
                    if (textvalue.toUpperCase().indexOf(filter) > -1) {
                        productName.parentElement.style.display = "";
                    }
                    // item not in list then show none
                    else {
                        productName.parentElement.style.display = "none";
                        

                    }
                }
               
            
            }
        }
     