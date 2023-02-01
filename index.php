<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

  <title>Student Dashboard</title>
</head>

<body>
  <div class="container-fluid">
    
    <button class="btn btn-primary my-4"><a href="register.php" class="text-light">Add Student</a></button>
    <h1 class="text-center text-secondary">Display Student Data</h1>
    <!-- table -->
    <table class="table">
      <thead>
        <tr class="bg-dark text-white text-center">
          <th scope="col">Sl/no.</th>
          <th scope="col">User Name:</th>
          <th scope="col">First Name:</th>
          <th scope="col">Last Name:</th>
          <th scope="col">Email:</th>
          <th scope="col">Mobile:</th>
          <th scope="col">Address:</th>
          <th scope="col">Password:</th>
          <th scope="col">City:</th>
          <th scope="col">State:</th>
          <th scope="col">Zip:</th>
          <th scope="col">Gender:</th>
          <th scope="col">DOB:</th>
          <th scope="col">Upload Image:</th>
          <th scope="col">Update:</th>
          <th scope="col">Delete:</th>

        </tr>
      </thead>
      <tbody>

        <?php
        include('connect.php');
        $q = "SELECT * FROM users";
        $query = mysqli_query($conn, $q);

        while ($res = mysqli_fetch_array($query)) {
        ?>

          <tr class="text-center">
            <td> <?php echo $res['id']; ?> </td>
            <td><?php echo $res['username']; ?></td>
            <td><?php echo $res['fname']; ?></td>
            <td><?php echo $res['lname']; ?></td>
            <td><?php echo $res['email']; ?></td>
            <td><?php echo $res['mobile']; ?></td>
            <td><?php echo $res['address']; ?></td>
            <td><?php echo $res['password']; ?></td>
            <td><?php echo $res['city']; ?></td>
            <td><?php echo $res['state']; ?></td>
            <td><?php echo $res['zip']; ?></td>
            <td><?php echo $res['gender']; ?></td>
            <td><?php echo $res['dob']; ?></td>
            <td><?php echo $res['image']; ?></td>
            <td>
              <button class="btn btn-primary">
                <a href="update.php?id=<?php echo $res['id']; ?>" class="text-white">Update</a>
              </button>
            </td>
            <td>
              <button class="btn btn-danger">
                <a href="delete.php?id=<?php echo $res['id']; ?>" class="text-white">Delete</a>
              </button>
            </td>

          </tr>
        <?php
        }
        ?>


      </tbody>
    </table>

  </div>


</body>

</html>