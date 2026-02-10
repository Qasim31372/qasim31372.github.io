<?php
include 'db.php';
$donor_id = 1; // Demo, replace with session
$amount = $_POST['amount'];
$details = $_POST['details'];
$method = $_POST['payment_method'];
$receiptPath = "";
if (!empty($_FILES["receipt"]["name"])) {
  $target_dir = "../uploads/receipts/";
  if (!file_exists($target_dir)) { mkdir($target_dir,0777,true); }
  $receiptPath = $target_dir.time()."_".basename($_FILES["receipt"]["name"]);
  move_uploaded_file($_FILES["receipt"]["tmp_name"], $receiptPath);
}
$sql = "INSERT INTO donations (donor_id, amount, details, payment_method, receipt_path) VALUES ($donor_id,'$amount','$details','$method','$receiptPath')";
if ($conn->query($sql)) { echo "Donation added via $method!"; } else { echo "Error: ".$conn->error; }
?>