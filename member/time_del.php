<?php
    include("config.php");
    $time_id = $_GET['time_id'];

$sql = "DELETE FROM tbtime WHERE time_id='$time_id';";

if ($conn->query($sql) === TRUE) {
  header("location: index_time_show.php");
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>