<?php 
    @session_start();

    // ***********************  USER REGISTRATION TO DATABASE  **********************************//
    if(isset($_POST['register']))
    {
        // Fetching data from register input boxes
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
        // $image      = $_POST['image'];
       
        include('connect.php'); //connecting to the Database

        $result = mysqli_query($conn, "INSERT into users(username,fname,lname,email,mobile,address,password,city,state,zip,gender,dob) 
        values('$username','$fname','$lname','$email','$mobile','$address','$password','$city','$state','$zip',' $gender','$dob')");

        
         if (mysqli_affected_rows($conn)==1) {
          echo ("
            <div class='alert alert-success text-center' role='alert'>
            Register Data sent Successfully..!!
          </div>
            
        ");
           
        //header('location:index.php');
        } 
        else {
            echo ("
                <div class='alert alert-danger text-center' role='alert'>
                Opps..!! Please try after some time..!!
              </div>
            ");
        }
        
    }

?>

<?php 

    if(isset($_POST['login']))
    {
        $username = $_POST['username'];
        $password = $_POST['password'];

        include('connect.php');

        $query = "SELECT * FROM `users` WHERE username='$username' AND password='$password'";
        $result = mysqli_query($conn,$query);
        $count = mysqli_num_rows($result);
        if($count>0)
        {
            mysqli_fetch_assoc($result);
            // $_SESSION['user_id'] = $row['id'];
            // $_SESSION['username'] = $row['username'];

            echo ("
            <div class='alert alert-success' role='alert'>
            login Successfully..!!
          </div>
            
        ");
            // header("location:index.php");
            exit;
        }
        else{
            echo ("
            <div class='alert alert-danger text-center' role='alert'>
            Opps..!! Wrong User Name/Password Combination
          </div>
        ");
        }

    }

?>