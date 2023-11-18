<?php
$success = 0;
$user = 0;
if ($_SERVER['REQUEST_METHOD'] == "POST") {
  include 'connect.php';
  $username = $_POST['username'];
  $password = $_POST['password'];
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
  $sql = "SELECT * FROM `registration` WHERE `username`='$username'";
  $result = mysqli_query($con, $sql);
  if ($result) {
    $num = mysqli_num_rows($result);
    if ($num > 0) {
      // echo 'Username already taken';
      $user = 1;
    } else {
      $sql = "INSERT INTO `registration` (`username`, `password`) VALUES ('$username', '$hashedPassword')";
      $result = mysqli_query($con, $sql);
      if ($result) {
        // echo 'Sign up successfully';
        $success = 1;
        header('location: login.php');
      } else {
        die('Data not inserted' . mysqli_error($con));
      }
    }
  }
}

?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <title>sign up</title>
</head>

<body>
  <!-- alert message -->
  <?php
  if ($success) {
    echo '<div class="alert alert-success" role="alert">
    User has been created successfully
  </div>';
  }
  if ($user) {
    echo '<div class="alert alert-danger" role="alert">
    User with the same name already exists!
  </div>';
  }
  ?>
  <h1 class="text-center mt-2">Sign Up Form</h1>
  <div class="container mt-3">
    <form action="signup.php" method="post">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input type="text" class="form-control" placeholder="enter your username" name="username">

        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" placeholder="enter your password" name="password">
        </div>
        <button type="submit" class="btn btn-primary w-100">Submit</button>
    </form>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>