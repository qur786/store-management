<?php include "login.php"; ?>
<!-- end of the code for login -->

    <html>
        <head>
     <title>Log_in Form</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
     <link rel="stylesheet" href="Login_style.css">
    </head>
    <body>
           
      <div class="container"> 
        <div class="title"> <h1>Login</h1></div>
          <br>
        <form class="row g-3" method="post">

          <div class="input-group mb-3">
            <label class="input-group-text" for="inputGroupSelect01" name="option">Options</label>
            <select class="form-select" id=" " name="usertype">
              <option selected disabled>-Select-</option>
              <option value="Admin">Admin</option>
              <option value="Shopkeeper">Shopkeeper</option>
              <option value="Staff">Staff</option>
            </select>
          </div>

          <div class=" ">
            <label for="User ID" class="form-label">User ID</label>
            <input type="text" class="form-control" name="userid" id="userid" required>
          </div>

          <div class=" ">
            <label for="Password" class="form-label">Password</label>
            <input type="password" class="form-control" name="pswd" id="pswd" required>
          </div>
                  
          <div class="button">
            <input type="submit" name="submit" value="Log in">
          </div>

          <div class=" ">
            <a href="Registration_form.php">Register</a>
          </div>
                   
                 
        
        </form>
      </div>

    </body>
</html>
