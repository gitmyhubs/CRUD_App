<?php
include('connect.php');
if (isset($_POST['register'])) {
  // Fetching data from register input boxes
  $id         = $_GET['id'];
  $username   = $_POST['username'];
  $fname      = $_POST['fname'];
  $lname      = $_POST['lname'];
  $email      = $_POST['email'];
  $mobile     = $_POST['mobile'];
  $address    = $_POST['address'];
  $password   = $_POST['password'];
  $city       = $_POST['city'];
  $state      = $_POST['state'];
  $zip        = $_POST['zip'];
  $gender     = $_POST['gender'];
  $dob        = $_POST['dob'];
  $image      = $_POST['image'];



  $que = "UPDATE users SET id=$id, username='$username', fname='$fname', lname='$lname', 
              email='$email', mobile='$mobile', address='$address', password='$password', city='$city',
              state='$state', zip='$zip', gender='$gender', dob='$dob', image='$image' WHERE id=$id";



  $query = mysqli_query($conn, $que);

  header('location:index.php');
}


?>




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
  <title>Student Registration form</title>
  <script>
    function regValidation() {
      if (document.getElementById('username').value == "") {
        document.getElementById('username').style.border = "1px solid red";
        document.getElementById('username_error').style.color = "#f00";
        document.getElementById('username').focus();
        document.getElementById('username_error').innerHTML = "User Name is required";
        return false;
      }
      if (document.getElementById('fname').value == "") {
        document.getElementById('fname').style.border = "1px solid red";
        document.getElementById('fname_error').style.color = "#f00";
        document.getElementById('fname').focus();
        document.getElementById('fname_error').innerHTML = "First Name is required";
        return false;
      }
      if (document.getElementById('lname').value == "") {
        document.getElementById('lname').style.border = "1px solid red";
        document.getElementById('lname_error').style.color = "#f00";
        document.getElementById('lname').focus();
        document.getElementById('lname_error').innerHTML = "Last Name is required";
        return false;
      }
      if (document.getElementById('email').value == "") {
        document.getElementById('email').style.border = "1px solid red";
        document.getElementById('email_error').style.color = "#f00";
        document.getElementById('email').focus();
        document.getElementById('email_error').innerHTML = "Email is required";
        return false;
      } else {
        var email = document.getElementById('email').value;
        var pat = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;

        if (!pat.test(email)) {
          document.getElementById('email').style.border = "1px solid red";
          document.getElementById('email_error').style.color = "#f00";
          document.getElementById('email').focus();
          document.getElementById('email_error').innerHTML = "Please enter a valid Email";
          return false;
        }

      }
      if (document.getElementById("mobile").value == "") {
        document.getElementById("mobile").style.border = "1px solid red";
        document.getElementById("mobile_error").style.color = "#f00";
        document.getElementById("mobile").focus();
        document.getElementById("mobile_error").innerHTML = "Mobile is Required";
        return false;
      } else {
        var mobile = document.getElementById("mobile").value;
        var mpat = /^\d{10}$/;
        if (!mpat.test(mobile)) {
          document.getElementById("mobile").style.border = "1px solid red";
          document.getElementById("mobile_error").style.color = "#f00";
          document.getElementById("mobile").focus();
          document.getElementById("mobile_error").innerHTML = "Please Enter a Valid 10 Digit Mobile Number";
          return false;
        }
      }
      if (document.getElementById('address').value == "") {
        document.getElementById('address').style.border = "1px solid red";
        document.getElementById('address_error').style.color = "#f00";
        document.getElementById('address').focus();
        document.getElementById('address_error').innerHTML = "Address is required";
        return false;
      }
      if (document.getElementById('password').value == "") {
        document.getElementById('password').style.border = "1px solid red";
        document.getElementById('password_error').style.color = "#f00";
        document.getElementById('password').focus();
        document.getElementById('password_error').innerHTML = "Password is required";
        return false;
      }

      {
        document.getElementById('city').style.border = "1px solid red";
        document.getElementById('acity_error').style.color = "#f00";
        document.getElementById('city').focus();
        document.getElementById('city_error').innerHTML = "City Name is required";
        return false;
      } {
        document.getElementById('state').style.border = "1px solid red";
        document.getElementById('state_error').style.color = "#f00";
        document.getElementById('state').focus();
        document.getElementById('state_error').innerHTML = "State Name is required";
        return false;
      }

      {
        document.getElementById('zip').style.border = "1px solid red";
        document.getElementById('zip_error').style.color = "#f00";
        document.getElementById('zip').focus();
        document.getElementById('zip_error').innerHTML = "Zip Number is required";
        return false;
      } {
        document.getElementById('gender').style.border = "1px solid red";
        document.getElementById('gender_error').style.color = "#f00";
        document.getElementById('gender').focus();
        document.getElementById('gender_error').innerHTML = "Please Choose Gender";
        return false;
      } {
        document.getElementById('dob').style.border = "1px solid red";
        document.getElementById('dob_error').style.color = "#f00";
        document.getElementById('dob').focus();
        document.getElementById('dob_error').innerHTML = "Date Of Birth is Required";
        return false;
      } {
        document.getElementById('image').style.border = "1px solid red";
        document.getElementById('image_error').style.color = "#f00";
        document.getElementById('image').focus();
        document.getElementById('image_error').innerHTML = "Upload Image is Required";
        return false;
      }



    }

    function checkValue(ele) {
      if (ele.value != "") {
        ele.style.border = "1px solid #999";
        document.getElementById(ele.id + "_error").innerHTML = "";
      }
    }
  </script>
</head>

<body>
  <div class="container">
    <div class="row">
      <h1 class="text-center">Update Student Form</h1>
      <!-- database connection -->
      <?php include('server.php'); ?>

      <form name="sentRegister" id="registerForm" class="form-group" method="POST" action="" onsubmit="return regValidation()" enctype="multipart/form-data">
        <div class="form-group col-md-12">
          <label for="username">User Name:</label>
          <input type="text" onblur="checkValue(this)" name="username" class="form-control" id="username" placeholder="User name" autocomplete="off">
          <span id="username_error" style="color:red;"></span>
        </div>
        <div class="form-row">

          <div class="form-group col-md-6">
            <label for="firstname">First Name:</label>
            <input type="text" onblur="checkValue(this)" class="form-control" id="fname" name="fname" placeholder="First name" autocomplete="off">
            <span id="fname_error" style="color:red;"></span>
          </div>
          <div class="form-group col-md-6">
            <label for="lastname">Last Name:</label>
            <input type="text" onblur="checkValue(this)" class="form-control" id="lname" name="lname" placeholder="Last name" autocomplete="off">
            <span id="lname_error" style="color:red;"></span>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="email">Email:</label>
            <input type="email" onblur="checkValue(this)" class="form-control" id="email" name="email" placeholder="Email" autocomplete="off">
            <span id="email_error" style="color:red;"></span>
          </div>
          <div class="form-group col-md-6">
            <label for="mobile">Mobile:</label>
            <input type="tel" onblur="checkValue(this)" class="form-control" id="mobile" name="mobile" placeholder="Mobile" autocomplete="off">
            <span id="mobile_error" style="color:red;"></span>
          </div>
        </div>
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="address">Address:</label>
            <input type="text" onblur="checkValue(this)" class="form-control" id="address" name="address" placeholder="Address" autocomplete>
            <span id="address_error" style="color:red;"></span>
          </div>
          <div class="form-group col-md-6">
            <label for="password">Password:</label>
            <input type="password" onblur="checkValue(this)" class="form-control" id="password" name="password" placeholder="Password" autocomplete="off">
            <span id="password_error" style="color:red;"></span>
          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="city">City:</label>
            <input type="text" onblur="checkValue(this)" class="form-control" id="city" name="city" autocomplete="off">
            <span id="city_error" style="color:red;"></span>
          </div>
          <div class="form-group col-md-4">
            <label for="state">State:</label>
            <select id="state" class="form-control" name="state">
              <option selected>Choose...</option>
              <option>Andhra Pradesh</option>
              <option>Arunachal Pradesh</option>
              <option>Assam</option>
              <option>Bihar</option>
              <option>Chhattisgarh</option>
              <option>Goa</option>
              <option>Gujarat</option>
              <option>Haryana</option>
              <option>Himachal Pradesh</option>
              <option>Jharkhand</option>
              <option>Karnataka</option>
              <option>Kerala</option>
              <option>Madhya Pradesh</option>
              <option>Maharashtra</option>
              <option>Manipur</option>
              <option>Meghalaya</option>
              <option>Mizoram</option>
              <option>Nagaland</option>
              <option>Odisha</option>
              <option>Punjab</option>
              <option>Rajasthan</option>
              <option>Sikkim</option>
              <option>Tamil Nadu</option>
              <option>Telangana</option>
              <option>Tripura</option>
              <option>Uttar Pradesh</option>
              <option>Uttarakhand</option>
              <option>West Bengal</option>

            </select>
            <span id="state_error" style="color:red;"></span>
          </div>
          <div class="form-group col-md-2">
            <label for="zip">Zip:</label>
            <input type="text" onblur="checkValue(this)" class="form-control" id="zip" name="zip" autocomplete="off">
            <span id="zip_error" style="color:red;"></span>

          </div>
        </div>

        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="gender" name="gender">Gender:</label>
            <select id="gender" name="gender" class="form-control">
              <option selected>Choose...</option>
              <option>Male</option>
              <option>Female</option>
              <option>Other</option>
            </select>
            <span id="gender_error" style="color:red;"></span>
          </div>
          <div class="form-group col-md-6">
            <label for="dob">Date of Birth:</label>
            <input type="date" class="form-control" name="dob" placeholder="Date of Birth">
            <span id="dob_error" style="color:red;"></span>
          </div>
        </div>
        <div class="form-group col-md-12">
          <label>Upload Image:</label>
          <input type="file" onblur="checkValue(this)" name="image" id="image" class="form-control">
          <span id="image_error" style="color:red;"></span>



        </div>
        <center>
          <button type="submit" class="btn btn-primary" name="register" id="register" onsubmit="regValidation();">Update</button>

        </center>

      </form>
    </div>


  </div>


</body>

</html>