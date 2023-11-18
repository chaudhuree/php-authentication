<?php

$HOSTNAME = "localhost";
$USERNAME = "root";
$PASSWORD = "root";
$DATABASE = "signupforms";

$con = mysqli_connect($HOSTNAME, $USERNAME, $PASSWORD, $DATABASE);

if ($con) {
  echo "Connection Successful";
} else {
  die("Connection failed: " . mysqli_connect_error());
}
