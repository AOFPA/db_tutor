<?php
    include("config.php");
    $reg_id = $_GET['reg_id'];

$sql = "DELETE FROM tbregister WHERE reg_id = '$reg_id';";

if ($conn->query($sql) === TRUE) {
  header("location: index.php");
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>