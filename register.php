<?php
include 'db.php';
$role = $_POST['role'];
$name = $_POST['name'];
$email = $_POST['email'];
$pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
if ($role == "farmer") {
  $sql = "INSERT INTO farmers (name,email,password) VALUES ('$name','$email','$pass')";
} elseif ($role == "donor") {
  $sql = "INSERT INTO donors (name,email,password) VALUES ('$name','$email','$pass')";
} else {
  $sql = "INSERT INTO admin (name,email,password) VALUES ('$name','$email','$pass')";
}
if ($conn->query($sql)) { echo "Signup successful!"; } else { echo "Error: ".$conn->error; }
?>