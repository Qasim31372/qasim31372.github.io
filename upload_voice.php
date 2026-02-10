<?php
include 'db.php';
$role = $_POST['role'];
$target_dir = "../uploads/voices/";
if (!file_exists($target_dir)) { mkdir($target_dir,0777,true); }
$target_file = $target_dir.time()."_".basename($_FILES["voiceFile"]["name"]);
if (move_uploaded_file($_FILES["voiceFile"]["tmp_name"], $target_file)) {
  $sql = "INSERT INTO voice_notes (sender_role, note_path) VALUES ('$role','$target_file')";
  $conn->query($sql);
  echo "Voice note uploaded!";
} else { echo "Upload failed!"; }
?>