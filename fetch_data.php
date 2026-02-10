<?php
include 'db.php';
$role = $_GET['role'];
if ($role=="farmer") {
  $result = $conn->query("SELECT request,status,animal_pic FROM farmers WHERE id=1");
  while($row=$result->fetch_assoc()) {
    echo "<p><b>Request:</b> ".$row['request']." | <b>Status:</b> ".$row['status']."</p>";
    if ($row['animal_pic']) echo "<img src='".$row['animal_pic']."' width='150'>";
  }
}
if ($role=="donor") {
  $result = $conn->query("SELECT amount,details,payment_method,receipt_path FROM donations");
  while($row=$result->fetch_assoc()) {
    echo "<p><b>Donation:</b> $".$row['amount']." | ".$row['payment_method']." | ".$row['details']."</p>";
    if ($row['receipt_path']) echo "<img src='".$row['receipt_path']."' width='150'>";
  }
}
if ($role=="admin") {
  $result = $conn->query("SELECT id,name,request,status FROM farmers WHERE status='Pending'");
  while($row=$result->fetch_assoc()) {
    echo "<p>".$row['name']." requested: ".$row['request']." | <a href='approve_request.php?id=".$row['id']."'>Approve</a></p>";
  }
}
?>