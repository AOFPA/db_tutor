<?php
    include("config.php");
    $class_id = $_GET['class_id'];

$sql = "DELETE FROM tbclass WHERE class_id='$class_id';";

if ($conn->query($sql) === TRUE) {
  header("location: index_class_show.php");
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>