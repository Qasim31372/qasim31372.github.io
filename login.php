<?php
include 'db.php';
$email = $_POST['email'];
$pass = $_POST['password'];
$role = $_POST['role'];
$table = ($role == "farmer") ? "farmers" : (($role == "donor") ? "donors" : "admin");
$sql = "SELECT * FROM $table WHERE email='$email'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  if (password_verify($pass, $row['password'])) {
    echo "Login success as $role!";
  } else { echo "Invalid password!"; }
} else { echo "User not found!"; }
?>