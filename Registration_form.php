  <!DOCTYPE html>
<?php include "register.php"; ?>
   <head>
     <title>Registration Form</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
     <link rel="stylesheet" href="Registration_style.css">

       <!-- javascript for password validation -->

       <script>
         
         //password Validation
         function validation()
           {
                 var a = document.getElementById("inputpassword").value;
                 var b = document.getElementById("inputconfirmpassword").value;
                 var mob = document.getElementById("phoneno").value;
               // mobile number validation
               if(mob.length<10){
                   alert("enter 10 digits for mobile number");
                   return false;
               }

                //password Validate
             if(a=="")
               {
                 alert("Please Enter Your Password");
                 return false;
                }

             if(b=="")
               {
                 alert("Please Enter Your confirm Password");
                 return false;
                }

             if ((a.length < 8) || (a.length > 16) )
                {
                 alert("Your Password must be 8 to 15 Character");
                 return false;
                }

             if(a!=b)
               {
                 alert("Your Password is not same");
                 return false;  
                }
        
              if(a.search(/[0-9]/)== -1 ||  a.search(/[0-9]/)== -1)
               {
                 alert("please write password of atleast 1 Numeric Character");
                 return false;
                }

            }
       </script>
    </head>



    <body>
      <div class="container">

        <div class="title">Registration </div><br>

          <div class="content">                
            
            <form  class="row g-3" name="form" method="post" onsubmit="return validation()" enctype="multipart/form-data">
                    
              <div class="col-md-6">
                <label for="Name" class="form-label">Enter your Name</label>
                <input type="text" class="form-control" id=" " name="username" required>
              </div>
             
              
              <div class="col-md-6">
               
                 <span class="details" >Gender</span>
                 <select class="form-select form-select-lg mb-3" name="gender" aria-label=".form-select-lg example">
                    <option selected >-Select-</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Others">other</option>
                  </select>
                
              </div>
              
              
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Email :</span>
                <input type="text" name="email" class="form-control" placeholder="example@email.com" aria-label="Username" aria-describedby="basic-addon1" required>
              </div>
              
              <div class="input-group mb-3">
                <span class="input-group-text" id="basic-addon1">Phone Number :</span>
                <input type="text" id="phoneno" name="phone" class="form-control" placeholder=" " aria-label="Username" aria-describedby="basic-addon1" required>
              </div>
              
              <div class="input-group mb-3">
                <label class="input-group-text"  for="inputGroupFile01">Upload your photo :</label>
                <input type="file" name="image" class="form-control" id="inputGroupFile01" required>
              </div>
              
              
              <div class="col-md-6">
                <label for="Password" class="form-label">Password</label>
                <input type="password" name="pswd" class="form-control" id="inputpassword" required>
              </div>

              <div class="col-md-6">
                <label for="Password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="inputconfirmpassword" required>
              </div>
                      
              <div class="button">
                <input type="submit" name="submit" value="Register">
              </div>
                <div class=" ">
                    <a href="Log.php">back to login</a>
                </div>                                    
            </form>
          </div>
        </div>

    </body>
  </html>
