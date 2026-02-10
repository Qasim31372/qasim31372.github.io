<?php
include 'db.php';
$farmer_id = 1; // Demo, replace with session
$request = $_POST['request'];
$picPath = "";
if (!empty($_FILES["animal_pic"]["name"])) {
  $target_dir = "../uploads/animals/";
  if (!file_exists($target_dir)) { mkdir($target_dir,0777,true); }
  $picPath = $target_dir.time()."_".basename($_FILES["animal_pic"]["name"]);
  move_uploaded_file($_FILES["animal_pic"]["tmp_name"], $picPath);
}
$sql = "UPDATE farmers SET request='$request', status='Pending', animal_pic='$picPath' WHERE id=$farmer_id";
if ($conn->query($sql)) { echo "Request submitted!"; } else { echo "Error: ".$conn->error; }
?>