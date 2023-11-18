<?php

if ($_SERVER['REQUEST_METHOD'] == "POST") {
  include 'connect.php';
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM `registration` WHERE `username`='$username' AND `password`='$password'";
  $result = mysqli_query($con, $sql);
  if ($result) {
    $num = mysqli_num_rows($result);
    if ($num > 0) {
      // echo 'login successfully';
      session_start();
      $_SESSION['loggedin'] = true;
      $_SESSION['username'] = $username;
      header('location: home.php');
    } else {
      echo 'invalid username or password';
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

  <title>login</title>
</head>

<body>
  <h1 class="text-center mt-2">Log In To Website</h1>
  <div class="container mt-3">
    <form action="login.php" method="post">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input type="text" class="form-control" placeholder="enter your username" name="username">

        <div class="mb-3">
          <label for="exampleInputPassword1" class="form-label">Password</label>
          <input type="password" class="form-control" placeholder="enter your password" name="password">
        </div>
        <button type="submit" class="btn btn-primary w-100">login</button>
    </form>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>