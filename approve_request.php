<?php
include 'db.php';
$id = $_GET['id'];
$sql = "UPDATE farmers SET status='Approved' WHERE id=$id";
if ($conn->query($sql)) { echo "Request approved!"; } else { echo "Error: ".$conn->error; }
?>