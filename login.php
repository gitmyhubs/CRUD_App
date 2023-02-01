<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Student Login form</title>

    <script>
        function loginValidation()
        {
            if(document.getElementById('username').value=="")
                {
                    document.getElementById('username').style.border="1px solid red";
                    document.getElementById('username_error').style.color="#f00";
                    document.getElementById('username').focus();
                    document.getElementById('username_error').innerHTML="User Name is required";
                    return false; 
                }
                if(document.getElementById('password').value=="")
                {
                    document.getElementById('password').style.border="1px solid red";
                    document.getElementById('password_error').style.color="#f00";
                    document.getElementById('password').focus();
                    document.getElementById('password_error').innerHTML="Password is required";
                    return false; 
                }
        }
        function checkValue(ele)
            {
            if(ele.value!="")
                {
                ele.style.border="1px solid #999";
                document.getElementById(ele.id+"_error").innerHTML="";
                }
            }
    </script>
     
</head>
<body>
   
    <div class="container">
      <div class="row">
        <h2>Student Login form</h2>
        <!-- database connection -->
       <?php include("server.php"); ?>
        
        <form name="loginform" method="POST" action="" id="loginform" class="col-md-4" onsubmit="return loginValidation()">
            <div class="form-row ">
                <div class="form-group">
                    <label for="username">User Name:</label>
                    <input type="text" onblur="checkValue(this)" class="form-control" id="username" name="username" placeholder="User Name" autocomplete="off">
                    <span id="username_error" style="color:red;"></span>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" onblur="checkValue(this)" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off">
                    <span id="password_error" style="color:red;"></span>
                </div>
            </div>
        
            <button type="submit" class="btn btn-primary" name="login" id="login" onsubmit="loginValidation();">Login</button> 
        </form>
       
        </div>  

        
    </div>
   
  
</body>
</html>